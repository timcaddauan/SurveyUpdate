<?php

namespace App\Controllers;

class Auth extends BaseController
{
    
    public function index()
    {
        return view('/login');
    }

   
    public function logout()
    {
        $session = session();
        $session->remove('isLoggedIn');
        return redirect()->to('/login');
    }

}
