<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Support\Str;
use Libraries\database_drivers\mysql\DB;
use Libraries\Redirect\Redirector;
use Libraries\Request\Request;

class AuthController extends Controller
{

    public function index() {
        $data = [];
        if (session()->exists('login_fail')) {
            $data['error'] = session()->get('login_fail');
            session()->forget('login_fail');
        }
        else if (session()->exists('error')) {
            $data['error'] = session()->get('error');
            session()->forget('error');
        }
        else if (session()->exists('success')) {
            $data['success'] = session()->get('success');
            session()->forget('success');
        }
        return view('auth.index', $data);
    }

    public function process_login(Request $request) {
        $user = new Users();
        $is_login = false;
        $token = bin2hex(Str::random(50));
            $data = $user
                ->where('email_address', $request->get('email_address'))->first();
            if (!empty($data->attributes)) {

                if (password_verify($request->get('password'), $data->password)) {
                    $is_login = $user->where('id', $data->id)->update([
                        '_token' => $token
                    ]);

                    session()->put('_token', $token);
                    session()->put('is_login', $is_login);
                    session()->put('name', $data ? $data->name : 'Guess');
                    if ($data->role == 1) {
                    redirect()->route('admin');
                    }
                } else {
                    session()->put('is_login', false);
                    session()->put('login_fail', 'Password is incorrect!');
                    redirect()->back();
                }

            } else {
                session()->put('login_fail', 'Account not valid!');
                redirect()->back();
            }
            session()->put('success', 'Login successful!');
            Redirector::to(url());
    }

    public function logout() {
        session()->put('is_login', false);
        session()->forget('name');
        session()->forget('_token');
        Redirector::to(url());
    }

    public function register() {
        $data = [];
        if (session()->exists('error')) {
            $data['error'] = session()->get('error');
            session()->forget('error');
        }
        return view ('auth.register', $data);
    }

    public function process_register(Request $request) {
        $token = bin2hex(Str::random(50));
        $user = new Users();
        $data = $user->where('email_address', $request->get('email_address'))->first();
        if (isset($data)) {
            session()->put('error', 'Email Exists');
            redirect()->back();
        }
        $user->create([
            'name' => $request->get('name'),
            'email_address' => $request->get('email_address'),
            'password' => password_hash($request->get('password'), PASSWORD_DEFAULT),
            'phone' => $request->get('phone'),
            'gender' => $request->get('gender'),
            'registered_at' => now(),
            '_token' => $token,
            'role' => 0
        ]);
        session()->put('success', 'Account was created');
        redirect()->to(url());
    }
}