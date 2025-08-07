<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BloodGroupModel;

class ApiDataController extends BaseController
{
    public function blood_group_api_data()
    {
        $blood_group_model = new BloodGroupModel();
        $blood_groups = $blood_group_model->findAll();
        return $this->response->setJSON([
            'data' => $blood_groups
        ]);
    }
}
