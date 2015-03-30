<?php
/**
 * Controlador User
 * 
 * @category App
 * @package Controllers
 */
class UserController extends AdminController
{

	public function before_filter()
	{
		$this->siteTitle = "Administración de Usuarios";
		$this->pageTitle = $this->siteTitle;
	}

	public function index()
	{
		$this->query = Load::model('user')->find();
	}

	public function create()
	{
		$this->pageTitle = "Creacion de nuevo usuario";
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
