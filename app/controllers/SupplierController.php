<?php

class SupplierController extends BaseController
{
    public function getIndex()
	{
		$suppliers = Supplier::all();
        return View::make('suppliers.index', array('suppliers' => $suppliers));
	}
	public function getForm($id = null)
	{
        $supplier = Supplier::find($id);
        $cities = City::orderBy('name','asc')->get()->lists('name','id');
        $addresses = SupplierAddress::where('suppliers_id', '=', $id)->get();
        $contacts = SupplierContact::where('suppliers_id', '=', $id)->get();
		return View::make('suppliers.form',array(
            'supplier' => $supplier,
            'cities' => $cities,
            'addresses' => $addresses,
            'contacts' => $contacts,
            'person_types' => Supplier::$person_types,
            'types' => Supplier::$types
        ));
	}
	public function postForm()
	{
		$input = Input::all();
        $validator = Supplier::validateForm($input);
        if ($validator -> fails()) {
            return Redirect::to('proveedores/form')->withErrors($validator)->withInput();
        } else {
            $isNew = false;
            if (empty($input['id'])) {
                $supplier = New Supplier;	
                $isNew = true;
            } else {
                $supplier = Supplier::find($input['id']);
            }
            if ($supplier) {                
                if ($supplier->saveInfo($input)) {
                    if ($isNew) {
                        Session::flash('success', 'El proveedor se ha creado exitosamente');
                    } else {
                        Session::flash('success', 'El proveedor se ha actualizado exitosamente');
                    }
                } else {
                    if ($isNew) {
                        Session::flash('error', 'Error al crear el proveedor');
                    } else {
                        Session::flash('error', 'Error al actualizar el proveedor');
                    }
                }
            } else {
                Session::flash('error', 'El proveedor buscada no existe');
            }
            return Redirect::to('proveedores');
        }
	}
    public function getDelete($id)
	{
        $supplier = Supplier::find($id);
        if ($supplier) {
            try {
                if ($supplier->delete()) {
                    Session::flash('success', 'El proveedor se ha eliminado exitosamente');
                } else {
                    Session::flash('error', 'Error al eliminar el proveedor');
                }
            } catch(Exception $e) {
                Session::flash('error', 'Error al eliminar el proveedor, verifique que no tenga elementos asociados');
            }
        } else {
            Session::flash('error', 'El proveedor buscada no existe');
        }
        return Redirect::to('proveedores');
	}
}
