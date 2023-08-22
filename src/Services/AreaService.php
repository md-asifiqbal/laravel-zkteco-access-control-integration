<?php

namespace Asif160627\ZktecoAccessControl\Services;

use Illuminate\Support\Facades\Http;
use Asif160627\ZktecoAccessControl\Traits\Connection;

trait AreaService 
{

    use Connection;

    //get Area List

    public function getAreas($page = 1, $page_size = 10, $area_code = null, $area_name = null, $area_code_icontains = null, $area_name_icontains = null, $ordering = 'id')
    {

        $url = $this->getConfig('url') . '/personnel/api/areas/';
        try {
            $response = Http::withHeaders($this->headers)->withUrlParameters([
                'page' => $page,
                'page_size' => $page_size,
                'area_code' => $area_code,
                'area_name' => $area_name,
                'area_code_icontains' => $area_code_icontains,
                'area_name_icontains' => $area_name_icontains,
                'ordering' => $ordering,
            ])->get($url)->json();
            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    // get Area Details

    public function getArea($id)
    {
        $url = $this->getConfig('url') . '/personnel/api/areas/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->get($url)->json();
            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //create Area

    public function createArea($data)
    {

        $url = $this->getConfig('url') . '/personnel/api/areas/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'area_code' => $data['area_code'],
                'area_name' => $data['area_name'],
                'parent_area' => $data['parent_area'] ?? NULL,
            ])->json();
            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //update Area

    public function updateArea($id, $data)
    {

        $url = $this->getConfig('url') . '/personnel/api/areas/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->put($url, [
                'area_code' => $data['area_code'],
                'area_name' => $data['area_name'],
                'parent_area' => $data['parent_area'] ?? NULL,
            ])->json();
            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //delete Area

    public function deleteArea($id)
    {

        $url = $this->getConfig('url') . '/personnel/api/areas/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->delete($url)->json();
            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }
}
