<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
 public function index()
 {
    return view('login');
 }
 public function login(Request $request){
     // validate the data
     $request->validate([
       'email' => 'required',
       'password' => 'required',
     ]);
     //Login code
 }
 public function register_view(){
    return view('signup');
 }
 public function register(Request $request){
    dd($request->all());
 }
}
