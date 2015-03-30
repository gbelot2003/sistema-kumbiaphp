<?php
/**
 * Modelo User
 * 
 * @category App
 * @package Models
 */
class User extends ActiveRecord
{
	protected function initialize(){
		$this->belongs_to('rol', 'rol_id');
	}

}