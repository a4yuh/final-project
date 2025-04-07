<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    // Show the login form
    public function login()
    {
        return view('login');
    }
    
    // Show the registration form
    public function signup()
    {
        return view('register');
    }
    
    // Process the login form submission
    public function authenticate()
    {
        $session = session();
        $model   = new UserModel();
        $email   = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            if (password_verify($password, $pass)) {
                $ses_data = [
                    'id'       => $data['id'],
                    'username' => $data['username'],
                    'email'    => $data['email'],
                    'logged_in'=> true
                ];
                $session->set($ses_data);
                $session->setFlashdata('msg', 'Login successful!');
                // Redirect to home page
                return redirect()->to('/');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to(base_url('login'));
            }
        } else {
            $session->setFlashdata('msg', 'Email not found');
            return redirect()->to(base_url('login'));
        }
    }
    
    // Process the registration form submission
    public function register()
    {
        helper(['form']);
        $rules = [
            'username'         => 'required|min_length[3]|max_length[20]',
            'email'            => 'required|valid_email|is_unique[users.email]',
            'password'         => 'required|min_length[6]|max_length[255]',
            'password_confirm' => 'matches[password]'
        ];
        
        if (!$this->validate($rules)) {
            return view('register', [
                'validation' => $this->validator
            ]);
        } else {
            $model = new UserModel();
            $data = [
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            // Set flash message and redirect to login page
            session()->setFlashdata('msg', 'Registration successful. Please log in.');
            return redirect()->to(base_url('login'));
        }
    }
    
    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
