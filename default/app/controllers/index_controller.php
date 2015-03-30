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
	}

}
