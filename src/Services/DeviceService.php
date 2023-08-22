<?php

namespace Asif160627\ZktecoAccessControl\Services;

use Illuminate\Support\Facades\Http;
use Asif160627\ZktecoAccessControl\Traits\Connection;

trait DeviceService
{

    use Connection;

    // get Devices List

    public function getDevices($page = 1, $page_size = 10, $sn = null, $alias = null, $state = null, $area = null, $sn_icontains = null, $alias_icontains = null)
    {

        $url = $this->getConfig('url') . '/iclock/api/terminals/';
        try {
            $response = Http::withHeaders($this->headers)->withUrlParameters([
                'page' => $page ?? 1,
                'page_size' => $page ?? 10,
                'sn' => $sn,
                'alias' => $alias,
                'state' => $state,
                'area' => $area,
                'sn_icontains' => $sn_icontains,
                'alias_icontains' => $alias_icontains
            ])->get($url)->json();
            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    // get Device Details

    public function getDevice($id)
    {
        $url = $this->getConfig('url') . '/iclock/api/terminals/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->get($url)->json();
            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }
}
