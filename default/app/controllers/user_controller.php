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
			$this->pass 		= Input::post('password');
			$this->repass		= Input::post('repassword');

			if($this->pass == $this->repass){
				if($user->save(Input::post('user'))){
					Flash::valid('El usuario a sido creado');
					Redirect::toAction('');
				} else {
					Flash::error('A ocurrido un error');
					Redirect::toAction('');
				}
			}else{
				Flash::error('El password debe ser igual');
			}

		}
	}

	public function edit($id)
	{
		$this->pageTitle = "Editar usuario";

		$this->user = Load::model('user')->find_by_id((int) $id);
	}

	public function delete($id)
	{
		$user = Load::model('user')->find_by_id((int) $id);
		if($user->delete()){
			
			Redirect::toAction('');
		}

	}
}
