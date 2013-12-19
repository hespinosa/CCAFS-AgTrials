<?php

/**
 * TbLocation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    trialsites
 * @subpackage model
 * @author     Herlin R. Espinosa G. - CIAT-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TbLocation extends BaseTbLocation {

    public function __toString() {
        return $this->getLctname();
    }

    //INICIO FUNCION PARA GRABAR O ACTUALIZAR
    public function save(Doctrine_Connection $conn = null) {
        //CONVERSION DE TEXTOS (MAYUSCULA - minuscula - Primera palabra en mayuscula)
        $this->setLctname(ucfirst(strtolower($this->getLctname())));

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
        $this->hasOne('TbCountry', array(
            'local' => 'id_country',
            'foreign' => 'id_country'));

        $this->hasMany('TbTrialsite', array(
            'local' => 'id_location',
            'foreign' => 'id_location'));

        $timestampable0 = new Doctrine_Template_Timestampable(array());
        $this->actAs($timestampable0);
    }

}