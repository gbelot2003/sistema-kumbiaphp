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

		$this->query = Load::model('user')->find();
	}

	public function create()
	{
		$this->pageTitle = "Crear nuevo usuario";
		if(Input::hasPost('user')){
			$user = Load::model('user');
			if($user->save(Input::post('user'))){
				Flash::valid('El usuario a sido creado');
				Redirect::toAction('');
			} else {
				Flash::error('A ocurrido un error');
				Redirect::toAction('');
			}
		}
	}

	public function edit($id)
	{

	}

	public function delete($id)
	{

	}
}
