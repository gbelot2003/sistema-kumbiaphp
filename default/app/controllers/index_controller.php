<?php

/**
 * Controller por defecto si no se usa el routes
 * 
 */

class IndexController extends AppController
{

    public function index()
    {
		$this->navActive['inicio'] = "active";
    }

	public function login()
	{
		$this->navActive['login'] = "active";

		if(Input::hasPost('user', 'password')){
			$pdw = sha1(Input::post('password'));
			$user = Input::post('user');

			$auth = new Auth("model", "class: user", "user: $user", "password: $pdw");
			if($auth->authenticate()){
				Redirect::to('index');
			} else {
				Flash::error('Ha habido un error en tu login, por favor verifica tu usuario y password');
			}
		}
	}

	public function logout()
	{
		if(Auth::destroy_identity()){
			Flash::valid('deslogeado');
			Redirect::to('/');
		} else {
			Redirect::to('/');
		}
	}

}
