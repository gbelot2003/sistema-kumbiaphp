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

		/** Relaciones */
		$this->belongs_to('rol', 'rol_id');

		/** Validaciones */

		/**
		 * Validacion de caracteres de usuario
		 */
		$this->validates_length_of('user', 25, 4, "too_short: El usuario debe tener <b>Minimo 4 caracteres</b>");

		/**
		 * Validación de caracteres de password
		 */
		$this->validates_length_of('password', 50, 6, "too_short: El Password debe tener <b>Minimo 6 caracteres</b>");
		/**
		 * Validación como unico a user
		 * no se deben permitir repeticiones
		 */
		$this->validates_uniqueness_of("user");

		/**
		 * Validación numerica de rol_id
		 */
		$this->validates_numericality_of("rol_id");

	}

	/**
	 * Encriptamos password antes de crear
	 */
	protected function before_create()
	{
		$this->password = sha1($this->password);
	}

	/**
	 * Encriptamos password antes de editar
	 */
	protected function before_update()
	{
		$this->password = sha1($this->password);
	}

	/**
	 * @var string
	 * ejecutamos en metodo no_borrar_superusuario antes de borrar
	 * No se debe eliminar al superusuario por ningun motivo
	 */
	public $before_delete = "no_borrar_superadmin";

	/**
	 * @return string
	 * Metodo de no_borrar_usuario
	 */
	public function no_borrar_superadmin()
	{
		if($this->id === '1')
		{
			Flash::error('No puedes borrar al super administrador');
			return 'cancel';
		}
	}

	/**
	 * Llamada a mensaje despues de borrado un usuario
	 */
	public function after_delete()
	{
		Flash::valid("Se a borrado el usuario $this->user");
	}

}