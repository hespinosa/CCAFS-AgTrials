<?php

/**
 * TbTrialgroup
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    trialsites
 * @subpackage model
 * @author     Herlin R. Espinosa G. - CIAT-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TbTrialgroup extends BaseTbTrialgroup {

    public function __toString() {
        return $this->getTrgrname();
    }

    //INICIO FUNCION PARA GRABAR O ACTUALIZAR
    public function save(Doctrine_Connection $conn = null) {
        //CONVERSION DE TEXTOS (MAYUSCULA - minuscula - Primera palabra en mayuscula)
        $this->setTrgrname(ucfirst(strtolower($this->getTrgrname())));

        //REGISTRO DE USUARIO DE CREACION O ACTUALIZACION
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        if ($this->isNew()) {
            $this->setIdUser($id_user);
            $this->setIdUserUpdate(null);
        } else {
            if($this->getIdUser() == null)
                $this->setIdUser(null);
            $this->setIdUserUpdate($id_user);
        }

        return parent::save($conn);
    }

    //CONFIGURACION PARA GUARDAR CREATE AT Y UPDATE AT
    public function setUp() {
        parent::setUp();
        $this->hasOne('TbTrialgrouptype', array(
            'local' => 'id_trialgrouptype',
            'foreign' => 'id_trialgrouptype'));

        $this->hasOne('TbPrimarydiscipline', array(
            'local' => 'id_primarydiscipline',
            'foreign' => 'id_primarydiscipline'));

        $this->hasOne('TbObjective', array(
            'local' => 'id_objective',
            'foreign' => 'id_objective'));

        $this->hasOne('TbInstitution', array(
            'local' => 'id_institution',
            'foreign' => 'id_institution'));

        $this->hasOne('TbContactperson', array(
            'local' => 'id_contactperson',
            'foreign' => 'id_contactperson'));

        $this->hasMany('TbBibliography', array(
            'local' => 'id_trialgroup',
            'foreign' => 'id_trialgroup'));

        $this->hasMany('TbTrial', array(
            'local' => 'id_trialgroup',
            'foreign' => 'id_trialgroup'));

        $timestampable0 = new Doctrine_Template_Timestampable(array());
        $this->actAs($timestampable0);
    }

}