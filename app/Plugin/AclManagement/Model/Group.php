<?php

App::uses('AclManagementAppModel', 'AclManagement.Model');

/**
 * Group Model
 *
 * @property Group $Group
 */
class Group extends AclManagementAppModel {

    public $name = 'Group';
    public $useTable = "groups";
    public $validate = array(
        'name' => array(
            'notEmpty' => array('rule' => 'notEmpty', 'message' => 'Group name can not be empty.'),
            'unique' => array('rule' => 'isUnique', 'message' => 'Group name already in use.')
        )
    );
    public $actsAs = array('Acl' => array('type' => 'requester'));

    function parentNode() {
        return null;
    }

//    public $hasMany = array(
//        'Latter' => array(
//            'className' => 'Latter',
//            'foreignKey' => 'group_id',
//            'dependent' => false,
//            'conditions' => '',
//            'fields' => '',
//            'order' => '',
//            'limit' => '',
//            'offset' => '',
//            'exclusive' => '',
//            'finderQuery' => '',
//            'counterQuery' => ''
//        )
//    );

}
