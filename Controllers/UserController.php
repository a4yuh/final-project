<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function login()
    {
        helper(['form']);
        return view('auth/login');
    }

    public function signup()
    {
        helper(['form']);
        return view('auth/signup');
    }

    public function register()
    {
        helper(['form']);
        $rules = [
            'username' => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return view('auth/signup', ['validation' => $this->validator]);
        }

        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
        $model->insert($data);

        return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
    }

    public function authenticate()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'user_id'  => $user['id'],
                'username' => $user['username'],
                'logged_in'=> true
            ]);
            return redirect()->to('/user/dashboard');
        }

        return redirect()->to('/login')->with('error', 'Invalid email or password.');
    }

    public function dashboard()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return view('user/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
