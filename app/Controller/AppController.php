<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * Themes
     *
     * @var array
     */
    public $theme = "MzmsTheme";
    public $helpers = array(        
        'FilterResults.Search' => array(
            'operators' => array(
                'LIKE' => 'containing',
                'NOT LIKE' => 'not containing',
                'LIKE BEGIN' => 'starting with',
                'LIKE END' => 'ending with',
                '=' => 'equal to',
                '!=' => 'different',
                '>' => 'greater than',
                '>=' => 'greater or equal to',
                '<' => 'less than',
                '<=' => 'less or equal to'
            )
        )
    );
    public $components = array(
        'Paginator',
        'Acl',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'username'),
                    'scope' => array('User.status' => 1)
                )
            ),
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session', 'RequestHandler',
        'FilterResults.Filter' => array(
            'auto' => array(
                'paginate' => false,
                'explode' => true, // recommended
            ),
            'explode' => array(
                'character' => ' ',
                'concatenate' => 'AND',
            )
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow("login", "logut"); //must comment after generate action for cakephp 2.0
        //$this->Auth->allow(); //must comment after generate action for cakephp 2.1
        //Configure AuthComponent
        $this->Auth->flash = array("element" => "AclManagement.error", "key" => "auth", "params" => array());
        $this->Auth->loginAction = '/users/login';
        //$this->Auth->logoutRedirect = array('plugin' => false, 'controller' => 'books', 'action' => 'home');
        //$this->Auth->loginRedirect = array('plugin' => false, 'controller' => 'books', 'action' => 'index');
    }

}
