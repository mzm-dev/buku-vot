<?php

App::uses('AppModel', 'Model');

/**
 * category Model
 *
 * @property Particular $Particular
 */
class activity extends AppModel {
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Particular' => array(
            'className' => 'Particular',
            'foreignKey' => 'activity_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
