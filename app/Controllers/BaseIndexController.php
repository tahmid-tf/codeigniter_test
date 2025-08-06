<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class BaseIndexController extends BaseController
{
    public function index()
    {
        return view("index_page");
    }

    public function registration_form()
    {
        $model = new UserModel();

        // Get POST data
        $data = [
            'name' => $this->request->getPost('name'),
            'contact' => $this->request->getPost('contact'),
            'blood_group' => $this->request->getPost('blood_group'),
            'district' => $this->request->getPost('district'),
            'thana' => $this->request->getPost('thana'),
            'donation_date' => $this->request->getPost('donation_date'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $model->insert($data);
        return redirect()->to('/')->with('message', 'Registration successful!');
    }

    public function user_data()
    {
        $model = new UserModel();

        // Get all rows from the 'users' table
        $data['users'] = $model->findAll();

        return $this->response->setJSON([
            'data' => $data
        ]);
    }
}
