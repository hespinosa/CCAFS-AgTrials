<?php

/**
 * TbContactperson
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    trialsites
 * @subpackage model
 * @author     Herlin R. Espinosa G. - CIAT-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TbContactperson extends BaseTbContactperson {

    public function __toString() {
        return $this->getCnprfirstname() . " " . $this->getCnprlastname();
    }

    //INICIO FUNCION PARA GRABAR O ACTUALIZAR
    public function save(Doctrine_Connection $conn = null) {
        //PASAMOS TODO EL TEXTO A PRIMERA EN MAYUSCULA Y SOLO MINUSCULA
        $this->setCnprfirstname(ucwords(strtolower($this->getCnprfirstname())));
        $this->setCnprlastname(ucwords(strtolower($this->getCnprlastname())));
        $this->setCnpraddress(ucfirst(strtolower($this->getCnpraddress())));
        $this->setCnprphone(strtolower($this->getCnprphone()));
        $this->setCnpremail(strtolower($this->getCnpremail()));

        //REGISTRO DE USUARIO DE CREACION O ACTUALIZACION
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        if ($this->isNew()) {
            $this->setIdUser($id_user);
            $this->setIdUserUpdate(null);
        } else {
            if ($this->getIdUser() == null)
                $this->setIdUser(null);
            $this->setIdUserUpdate($id_user);
        }

        return parent::save($conn);
    }

    //CONFIGURACION PARA GUARDAR CREATE AT Y UPDATE AT
    public function setUp() {
        parent::setUp();
        $this->hasOne('TbContactpersontype', array(
            'local' => 'id_contactpersontype',
            'foreign' => 'id_contactpersontype'));

        $this->hasOne('TbInstitution', array(
            'local' => 'id_institution',
            'foreign' => 'id_institution'));

        $this->hasOne('TbCountry', array(
            'local' => 'id_country',
            'foreign' => 'id_country'));

        $this->hasMany('TbTrial', array(
            'local' => 'id_contactperson',
            'foreign' => 'id_contactperson'));

        $this->hasMany('TbTrialgroup', array(
            'local' => 'id_contactperson',
            'foreign' => 'id_contactperson'));

        $this->hasMany('TbTrialsite', array(
            'local' => 'id_contactperson',
            'foreign' => 'id_contactperson'));

        $timestampable0 = new Doctrine_Template_Timestampable(array());
        $this->actAs($timestampable0);
    }

}