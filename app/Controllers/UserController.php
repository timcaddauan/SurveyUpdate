<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class UserController extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form' . 'image']);


        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t match'
                ]
            ];

            if (! $this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                $this->setUserSession($user);
                //$session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/');
            }
        }
        echo view('/login', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function UserTableList()
    {
        $fetchUser = new UserModel();
        $data['users'] = $fetchUser->findAll();
        return view('pages/usertable', $data);
    }

    public function createAccount()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'first_name' => 'required|min_length[3]|max_length[20]',
                'last_name' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_user.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();

                $newData = [
                    'first_name' => $this->request->getVar('first_name'),
                    'last_name' => $this->request->getVar('last_name'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session = session();               
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/login');
            }
        }

        echo view('/register', $data);
    }


    public function profileSettings()
    {

        $data = [];
        helper(['form']);
        $model = new UserModel();

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'first_name' => 'required|min_length[3]|max_length[20]',
                'last_name' => 'required|min_length[3]|max_length[20]',
                'username' => 'required|min_length[3]|max_length[15]',
                'password' => 'required|min_length[8]|max_length[255]',               
            ];

            if ($this->request->getPost('password') != '') {
                $rules['password'] = 'required|min_length[8]|max_length[255]';
                $rules['password_confirm'] = 'matches[password]';
            }


            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {

                $newData = [
                    'id' => session()->get('id'),
                    'first_name' => $this->request->getPost('first_name'),
                    'last_name' => $this->request->getPost('last_name'),
                    'username' => $this->request->getPost('username'),
                ];
                 // If a new password is provided, hash and update it
                if ($this->request->getPost('password') != '') {
                    $newData['password'] = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
                }
                if ($model->save($newData)) {
                    session()->setFlashdata('success', 'Profile updated successfully.');
                } else {
                    session()->setFlashdata('error', 'Something went wrong while updating your profile.');
                }
                return redirect()->to('/settings');
            }
        }

        $data['user'] = $model->where('id', session()->get('id'))->first();

        echo view('/pages/profilesettings', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }


    public function ShowUser()
    {
        $model = new UserModel();
        $data['ShowUser'] = $model->GETUser();
        return view('/pages/UserProfile', $data);
    }

    public function showUserProfile($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->getUserById($id); // Fetch user by ID

        if (!$data['user']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('User not found');
        }

        return view('/pages/UserProfile', $data); // Pass data to the view
    }


}
