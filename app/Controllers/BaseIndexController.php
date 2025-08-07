<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use DateTime;

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

        // Get filters from GET parameters
        $group = $this->request->getGet('group');
        $district = $this->request->getGet('district');
        $thana = $this->request->getGet('thana');
        $dateFilter = $this->request->getGet('date');

        // Build query with filters
        $builder = $model;

        if ($group) {
            $builder = $builder->like('blood_group', $group);
        }
        if ($district) {
            $builder = $builder->where('district', $district);
        }
        if ($thana) {
            $builder = $builder->where('thana', $thana);
        }

        // Filter based on donation_date range
        if ($dateFilter) {
            $today = date('Y-m-d');
            switch ($dateFilter) {
                case 'Last 7 days':
                    $dateFrom = date('Y-m-d', strtotime('-7 days'));
                    $builder = $builder->where('donation_date >=', $dateFrom);
                    break;
                case 'Last 30 days':
                    $dateFrom = date('Y-m-d', strtotime('-30 days'));
                    $builder = $builder->where('donation_date >=', $dateFrom);
                    break;
                case '3 months ago':
                    $dateTo = date('Y-m-d', strtotime('-3 months'));
                    $builder = $builder->where('donation_date <=', $dateTo);
                    break;
                case '6+ months ago':
                    $dateTo = date('Y-m-d', strtotime('-6 months'));
                    $builder = $builder->where('donation_date <=', $dateTo);
                    break;
            }
        }

        $users = $builder->findAll();

        // Format donation_date to "Xy Xm Xd ago"
        foreach ($users as &$user) {
            $user['donation_date'] = $this->formatDateDiff($user['donation_date']);
        }

        return $this->response->setJSON(['data' => ['users' => $users]]);
    }

// Helper function to format date difference
    private function formatDateDiff($date)
    {
        $datetime1 = new DateTime($date);
        $datetime2 = new DateTime(); // now
        $interval = $datetime1->diff($datetime2);

        $result = '';
        if ($interval->y > 0) {
            $result .= $interval->y . 'y ';
        }
        if ($interval->m > 0) {
            $result .= $interval->m . 'm ';
        }
        if ($interval->d > 0) {
            $result .= $interval->d . 'd ';
        }
        if ($result === '') {
            $result = 'Today';
        } else {
            $result .= 'ago';
        }

        return trim($result);
    }


    public function updateUser()
    {
        $id = $this->request->getPost('id');
        $model = new \App\Models\UserModel();

        // Get existing user data
        $existingUser = $model->find($id);

        // Get new password input
        $newPassword = $this->request->getPost('password');

        // Prepare data array
        $data = [
            'name'          => $this->request->getPost('name'),
            'contact'       => $this->request->getPost('contact'),
            'blood_group'   => $this->request->getPost('blood_group'),
            'district'      => $this->request->getPost('district'),
            'thana'         => $this->request->getPost('thana'),
            'donation_date' => $this->request->getPost('donation_date'),
            'password'      => $newPassword ? password_hash($newPassword, PASSWORD_DEFAULT) : $existingUser['password']
        ];

        $model->update($id, $data);

        return redirect()->back()->with('message', 'User updated successfully');
    }

}
