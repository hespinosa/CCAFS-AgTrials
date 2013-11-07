<?php

/**
 * TbVariety
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    trialsites
 * @subpackage model
 * @author     Herlin R. Espinosa G. - CIAT-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TbVariety extends BaseTbVariety {

    public function __toString() {
        return $this->getTbCrop() . ' - ' . $this->getVrtname();
    }

    //INICIO FUNCION PARA GRABAR O ACTUALIZAR
    public function save(Doctrine_Connection $conn = null) {
        //CONVERSION DE TEXTOS (MAYUSCULA - minuscula - Primera palabra en mayuscula)
        //$this->setVrtname(ucfirst(strtolower($this->getVrtname())));
        $this->setVrtsynonymous(ucfirst(strtolower($this->getVrtsynonymous())));

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
        $this->hasOne('TbOrigin', array(
            'local' => 'id_origin',
            'foreign' => 'id_origin'));

        $this->hasOne('TbCrop', array(
            'local' => 'id_crop',
            'foreign' => 'id_crop'));

        $this->hasMany('TbTrialvariety', array(
            'local' => 'id_variety',
            'foreign' => 'id_variety'));

        $timestampable0 = new Doctrine_Template_Timestampable(array());
        $this->actAs($timestampable0);
    }

}