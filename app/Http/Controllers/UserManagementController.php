<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserManagement;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class UserManagementController extends Controller
{
    public function index(){
        $users = UserManagement::all();
        return view('user-management.index', compact('users'));
    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//$title = 'User Management | USER CREATE';
        return view('user-management.create');
    }
    /**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
        $title = 'User Management | USER STORE';
        $request->validate([
			'name' => 'required|string|max:25',
			'email' => 'required|string|email|unique:users|max:35',
            'password' => 'required|string|min:8',
    ]);
	// Creatiing a new user
	$user = new UserManagement();
	$user->name = $request->input('name');
	$user->email = $request->input('email');
	$user->password = bcrypt($request->input('password'));
	$user->save();

	// Redirecting back to index with success message
	return redirect()->route('user-management.index')->with('Success', "Congratulations,User created successfully!");
}
    /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
        $title = 'User Management | USER SHOW';
	}

    
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id) {
		$title = 'User Management | USER EDIT';
		$user = UserManagement::find($id);
        return view('user-management.edit', compact('user'));
    }

    /**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$user = UserManagement::find($id);
		$user->name = $request->input('name');
		$user->email = $request->input('email');
		// Update other user fields as needed
	
		$user->save();
	
		return redirect()->route('user-management.index')->with('Success', "User updated successfully!");
	}
	
    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$user = UserManagement::find($id);
		$user->delete();
	
		return redirect()->route('user-management.index')->with('Success', "User deleted successfully!");
	}
	

    //Datatables
	public function getList(Request $request)
	{
        if ($request->ajax()) {
			$data = UserManagement::latest()->get();
			
			return Datatables::of($data)
				->addColumn('action', function($row) {
					// Modify this part to add action buttons for edit and delete
					$btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
					$btn .= ' <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
					return $btn;
				})
				->rawColumns(['action'])
				->make(true);
		}
		return response()->json(['message' => 'Invalid request'], 400);
    }

}
