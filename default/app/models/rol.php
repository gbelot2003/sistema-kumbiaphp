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
		/** Relaciones */
		$this->has_many('user');

		/** Validaciones */

		/**
		 * Validación de caracteres de rol
		 */
		$this->validates_length_of('rol', 15, 3, "too_short: El usuario debe tener <b>Minimo 3 caracteres</b>");

		/**
		 * Validación como unico a Rol
		 * no se deben permitir repeticiones
		 */
		$this->validates_uniqueness_of("rol");
	}

	/**
	 * @var string
	 * ejecutamos en metodo no_borrar_administrador antes de borrar
	 * No se debe eliminar el rol de administrador por ningun motivo
	 */
	public $before_delete = "no_borrar_admin";

	/**
	 * @return string
	 * Metodo de no_borrar_usuario
	 */
	public function no_borrar_admin()
	{
		if($this->rol === 'administrador')
		{
			Flash::error('No puedes borrar al Rol de <strong>administrador</strong>');
			return 'cancel';
		}
	}

	/**
	 * Llamada a mensaje despues de borrado un rol
	 */
	public function after_delete()
	{
		Flash::valid("Se a eliminado el rol $this->user");
	}

}