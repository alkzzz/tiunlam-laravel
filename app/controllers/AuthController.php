<?php

class AuthController extends BaseController {

	public function showlogin()
	{
		return View::make('auth.login');
	}

	public function register()
	{
		return View::make('auth.register');
	}

	public function simpan()
	{
		$rules = array(
			'nama'	   => 'required|alpha_num|min:4',
			'username' => 'required|alpha_num|min:4',
			'email'	   => 'required|email|unique:users',
			'password' => 'required|alphaNum|min:4',
			'password_confirmation' => 'required|alphaNum|min:4'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('/admin/register')
				->withErrors($validator) //
				->withInput(Input::except('password'));
		} else {

			$datauser = array(
				'nama'		=> Input::get('nama'),
				'username' 	=> Input::get('username'),
				'email'		=> Input::get('email'),
				'password' 	=> Hash::make(Input::get('password')),
			);
		}

			if (User::create($datauser)) {
				return Redirect::to('/admin');
			}
			else {
				return Redirect::to('/admin/register');
			}
	}

	public function login()
	{

		$rules = array(
			'username' => 'required',
			'password' => 'required|alphaNum|min:4'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('/login')
				->withErrors($validator) //
				->withInput(Input::except('password'));
		} else {

			$datauser = array(
				'username' 	=> Input::get('username'),
				'password' 	=> Input::get('password')
			);

			if (Auth::attempt($datauser)) {
				return Redirect::to('/admin');
			}
			else {
				return Redirect::to('/admin/login');
			}
		}
	}

	public function logout()
	{
    Auth::logout();
    return Redirect::to('/');
	}

}
