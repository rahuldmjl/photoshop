<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		$permissions = Permission::orderBy('id', 'DESC')->get(); //->paginate(5)
		/*return view('permission.index', compact('permissions'))
			->with('i', ($request->input('page', 1) - 1) * 5);*/
		return view('permission.index', compact('permissions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$permissions = Permission::select();

		return view('permission.create', compact('permissions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required|unique:permissions',
		]);

		$permission = Permission::create(['name' => $request->input('name')]);

		return redirect()->route('permissions.index')
			->with('success', 'Permission created successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$permission = Permission::find($id);
		return view('permission.edit', compact('permission'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$this->validate($request, [
			'name' => 'required',
		]);

		$permission = Permission::find($id);
		$permission->name = $request->input('name');
		$permission->save();

		return redirect()->route('permissions.index')
			->with('success', 'Permission updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		DB::table("permissions")->where('id', $id)->delete();
		return response()->json([
			'success' => 'Record deleted successfully!',
		]);
		return redirect()->route('roles.index')
			->with('success', 'Permission deleted successfully');
	}
}
