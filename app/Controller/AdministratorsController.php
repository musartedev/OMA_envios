<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AdministratorsController extends AppController {

	public $uses=array('User');
	public function beforeFilter() {
	 	parent::beforeFilter();
	 	$this->layout="admin";
	 	$user=$this->User->find('first',array(
			'conditions' => array(
					'User.id' => $this->Auth->user('id')
			),
			'recursive' => -1,
			'fields' => array('User.name','User.last_name')
			));

		$this->set(compact('user'));
    }	


	public function index(){
		$this->set('title_for_layout', 'OMA Envios | Administrador');

		
	}

	public function listShipments(){
		$this->set('title_for_layout', 'OMA Envios | Envíos');

	}

	public function listarFacturas(){
		$this->set('title_for_layout', 'OMA Envíos | Facturación');
		

	}

}