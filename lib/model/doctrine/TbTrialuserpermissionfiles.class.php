<?php

/**
 * TbTrialuserpermissionfiles
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    trialsites
 * @subpackage model
 * @author     Herlin R. Espinosa G. - CIAT-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TbTrialuserpermissionfiles extends BaseTbTrialuserpermissionfiles {

//INICIO FUNCION PARA GRABAR O ACTUALIZAR
    public function save(Doctrine_Connection $conn = null) {
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
        $this->hasOne('SfGuardUser', array(
            'local' => 'id',
            'foreign' => 'id_userpermission'));

        $this->hasOne('TbTrial', array(
            'local' => 'id_trial',
            'foreign' => 'id_trial'));

        $timestampable0 = new Doctrine_Template_Timestampable(array());
        $this->actAs($timestampable0);
    }

}