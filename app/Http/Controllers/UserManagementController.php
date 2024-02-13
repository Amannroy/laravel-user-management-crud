<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index(){
        $users = [
            ['id' => 1, 'name' => 'Aman Roy', 'email' => 'aman@roy.com', 'password' => '*********'],
            ['id' => 2,'name' => 'Virat Kohli', 'email' => 'virat@kohli.com', 'password' => '*********']
            
        ];
        return view('user-management.index',  ['users' => $users]);
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
        return view('user-management.edit');
    }

    /**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
        $title = 'User Management | USER UPDATE';
    }
    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
        $title = 'User Management | USER DESTROY';
    }

    //Datatables
	public function getList(Request $request)
	{
   
    }

}
