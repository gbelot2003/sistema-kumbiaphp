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

	/**
	 * @throws KumbiaException
	 */
	public function create()
	{
		$this->pageTitle = "Creacion de nuevo usuario";
		if(Input::hasPost('user')){

			$user 		= Load::model('user');
			$usuario 	= Input::post('user');

			$pass['pass'] 		= $usuario['password'];
			$repass['pass']		= $usuario['repassword'];

			if($pass === $repass){
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
		} else {
			Redirect::toAction('');
		}

	}
}
