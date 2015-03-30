<?php
/**
 * Modelo Rol
 * 
 * @category App
 * @package Models
 */
class Rol extends ActiveRecord
{
	protected function initialize()
	{
		$this->has_many('user');
	}
}