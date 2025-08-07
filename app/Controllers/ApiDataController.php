<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BloodGroupModel;
use App\Models\DistrictModel;
use App\Models\ThanaModel;

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

    public function thana_api_data()
    {
        $thana_model = new ThanaModel();
        $search = $this->request->getGet('q');
        if ($search) {
            $thanas = $thana_model
                ->like('thana', $search)
                ->findAll();
        }else{
            $thanas = [];
        }

        return $this->response->setJSON([
            'data' => $thanas
        ]);
    }


    public function thana_by_district_api_data()
    {
        $thana_model = new ThanaModel();
        $district = $this->request->getGet('district');
        $search = $this->request->getGet('q');

        if ($district) {
            $district_model = new DistrictModel();
            $district_row = $district_model->where('district', $district)->first();

            if ($district_row) {
                $district_id = $district_row['id'];

                $builder = $thana_model->where('district_id', $district_id);

                if (!empty($search)) {
                    $builder = $builder->like('thana', $search);
                }

                $thanas = $builder->findAll();
            } else {
                $thanas = [];
            }
        } else {
            $thanas = [];
        }

        return $this->response->setJSON([
            'data' => $thanas
        ]);
    }







}
