<?php
/**
 * Controlador Rol
 * 
 * @category App
 * @package Controllers
 */
class RolController extends AdminController
{
	public function index()
	{
		$this->pageTitle = 'Administración de Roles';
		$this->rol = Load::model('rol')->find();
	}

	public function create()
	{
		$this->pageTitle = 'Creación de Roles';
		if(Input::hasPost('rol')){
			$rol = Load::model('rol');
			$newrol = Input::post('rol');
			if($rol->save($newrol)){
				Flash::valid('Nuevo rol administrativo agregado');
				Redirect::toAction('');
			} else {
				Flash::error('A ocurrido un error al tratar de salvar la entrada');
				Redirect::toAction('');
			}
		}
	}

	public function edit($id)
	{
		$this->pageTitle = 'Edición de Roles';

		if(Input::hasPost('rol')){
			$rol = Load::model('rol')->find_by_id((int) $id);

			$newrol = Input::post('rol');

			if($rol->save($newrol)){
				Flash::valid("El <strong>Rol</strong> administrativo a sido editado");
				Redirect::toAction('');
			} else {
				Flash::error("A ocurrido un error al tratar de <strong>editar</strong> la entrada");
				Redirect::toAction('');
			}

		}
	}

	public function delete($id)
	{
		$rol = Load::model('rol')->find_by_id((int) $id);
		if($rol->delete()){
			Redirect::toAction('');
		} else {
			Redirect::toAction('');
		}
	}
}
