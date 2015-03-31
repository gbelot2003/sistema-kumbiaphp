<?php

/**
 * Controller por defecto si no se usa el routes
 * 
 */

class IndexController extends AppController
{
		protected function before_filter()
	{
		$this->pageTitle = NULL;
	}

    public function index()
    {
		$this->navActive['inicio'] = "active";
    }

	public function login()
	{
		if(!Auth::is_valid()){
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
		} else {
			Flash::warning('Ya estas logueado');
			Redirect::toAction('');
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
