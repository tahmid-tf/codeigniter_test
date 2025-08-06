<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        $phone = $this->request->getPost('phone');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('contact', $phone)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id' => $user['id'],
                'name'    => $user['name'],
                'logged_in' => true
            ]);
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Invalid phone or password');
        }
    }

//    public function user()
//    {
//        if (!session()->get('logged_in')) {
//            return redirect()->to('/login');
//        }
//
//        return view('user_dashboard', [
//            'user' => session()->get()
//        ]);
//    }

    public function user()
    {
        if (session()->get('logged_in')) {
            return $this->response->setJSON([
                'status' => 'success',
                'user' => [
                    'id'    => session()->get('user_id'),
                    'name'  => session()->get('name'),
                    'phone' => session()->get('phone')
                ]
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'User not authenticated'
            ]);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->back();
    }
}
