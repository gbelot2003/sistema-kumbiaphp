<?php
/**
 * Controlador User
 * 
 * @category App
 * @package Controllers
 */
class UserController extends AdminController
{
	public function index()
	{
		$this->pageTitle = "Configuración de Usuarios";

		$this->header = array(
			'id' => array(
				'title' => 'No'
			),
			'user' => array(
				'title' => 'Usuario',
				'url' => 'user/edit/',
			),
			'Delete' => array(
				'title' => 'Delete',
				'url' => 'user/del/',
				'del' => 'delete'
			)
		);

		$this->query = Load::model('user')->find();
	}
}
