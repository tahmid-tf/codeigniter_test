<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BloodGroupModel;
use App\Models\DistrictModel;

class ApiDataController extends BaseController
{
    public function blood_group_api_data()
    {
        $blood_group_model = new BloodGroupModel();
        $search = $this->request->getGet('q'); // `q` is used by select2 for search input

        if ($search) {
            $blood_groups = $blood_group_model
                ->like('blood_group', $search)
                ->findAll();
        } else {
            // Return an empty array when no search term is provided
            $blood_groups = [];
        }

        return $this->response->setJSON([
            'data' => $blood_groups
        ]);
    }

    public function districts_api_data()
    {
        $district_model = new DistrictModel();
        $search = $this->request->getGet('q');

        if ($search) {
            $districts = $district_model
                ->like('district', $search)
                ->findAll();
        } else {
            $districts = [];
        }

        return $this->response->setJSON([
            'data' => $districts
        ]);
    }


}
