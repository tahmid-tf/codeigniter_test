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
        $model = new \App\Models\UserModel();

        // Get query parameters
        $group = $this->request->getGet('group');
        $district = $this->request->getGet('district');
        $thana = $this->request->getGet('thana');
        $date = $this->request->getGet('date');

        // Start query
        $builder = $model;

        if ($group) {
            $builder->where('blood_group', $group);
        }

        if ($district) {
            $builder->where('district', $district);
        }

        if ($thana) {
            $builder->where('thana', $thana);
        }

        if ($date) {
            $now = date('Y-m-d');
            switch ($date) {
                case 'Last 7 days':
                    $builder->where('donation_date >=', date('Y-m-d', strtotime('-7 days')));
                    break;
                case 'Last 30 days':
                    $builder->where('donation_date >=', date('Y-m-d', strtotime('-30 days')));
                    break;
                case '3 months ago':
                    $builder->where('donation_date >=', date('Y-m-d', strtotime('-3 months')));
                    break;
                case '6+ months ago':
                    $builder->where('donation_date <=', date('Y-m-d', strtotime('-6 months')));
                    break;
            }
        }

        $users = $builder->findAll();

        return $this->response->setJSON(['data' => ['users' => $users]]);
    }

}
