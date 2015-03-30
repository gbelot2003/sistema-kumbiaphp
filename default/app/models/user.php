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

	protected function before_create()
	{
		$this->password = sha1($this->password);
	}

	protected function before_update()
	{
		$this->password = sha1($this->password);
	}

	public $before_delete = "no_borrar_superadmin";

	public function no_borrar_superadmin()
	{
		if($this->id === '1')
		{
			Flash::error('No puedes borrar al super administrador');
			return 'cancel';
		}
	}

	public function after_delete()
	{
		Flash::valid("Se a borrado el usuario $this->user");
	}

}