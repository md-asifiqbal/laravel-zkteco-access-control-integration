<?php

namespace Asif160627\ZktecoAccessControl\Services;

use Asif160627\ZktecoAccessControl\Contracts\AccessServiceInterface;
use Asif160627\ZktecoAccessControl\Traits\Connection;
use Illuminate\Support\Facades\Http;

class AccessControlService implements AccessServiceInterface
{
    use Connection;

    // get Devices List

    public function getDevices($page = 1, $page_size = 10, $sn = null, $alias = null, $state = null, $area = null, $sn_icontains = null, $alias_icontains = null)
    {

        $url = $this->getConfig('url') . '/iclock/api/terminals/';
        try {
            $response = Http::withHeaders($this->headers)->get($url, [
                'page' => $page ?? 1,
                'page_size' => $page ?? 10,
                'sn' => $sn,
                'alias' => $alias,
                'state' => $state,
                'area' => $area,
                'sn_icontains' => $sn_icontains,
                'alias_icontains' => $alias_icontains,
            ])->json();

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

    //create Device

    public function createDevice($data)
    {
        $url = $this->getConfig('url') . '/personnel/api/areas/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'sn' => $data['sn'],
                'alias' => $data['alias'],
                'ip_address' => $data['ip_address'],
                'terminal_tz' => $data['terminal_tz'],
                'heartbeat' => $data['heartbeat'],
                'area' => $data['area'],
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //update Device

    public function updateDevice($id, $data)
    {
        $url = $this->getConfig('url') . '/iclock/api/terminals/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->put($url, [
                'sn' => $data['sn'],
                'alias' => $data['alias'],
                'ip_address' => $data['ip_address'],
                'terminal_tz' => $data['terminal_tz'],
                'heartbeat' => $data['heartbeat'],
                'area' => $data['area'],
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //delete Device

    public function deleteDevice($id)
    {
        $url = $this->getConfig('url') . '/iclock/api/terminals/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->delete($url)->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //Clear command

    public function clearCommand($data)
    {
        $url = $this->getConfig('url') . '/iclock/api/terminals/clear_command/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'terminals' => $data['terminals']
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //Clear capture

    public function clearCapture($data)
    {
        $url = $this->getConfig('url') . '/iclock/api/terminals/clear_capture/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'terminals' => $data['terminals']
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //Clear all

    public function clearAll($data)
    {
        $url = $this->getConfig('url') . '/iclock/api/terminals/clear_all/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'terminals' => $data['terminals']
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //Upload all

    public function uploadAll($data)
    {
        $url = $this->getConfig('url') . '/iclock/api/terminals/upload_all/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'terminals' => $data['terminals']
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //Upload transaction

    public function uploadTransaction($data)
    {
        $url = $this->getConfig('url') . '/iclock/api/terminals/upload_transaction/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'terminals' => $data['terminals']
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //Reboot

    public function reboot($data)
    {
        $url = $this->getConfig('url') . '/iclock/api/terminals/reboot/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'terminals' => $data['terminals']
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }


    // get Transactions List

    public function getTransactions($page = 1, $page_size = 10, $emp_code = null, $terminal_sn = null, $terminal_alias = null, $start_time = null, $end_time = null)
    {

        $url = $this->getConfig('url') . '/iclock/api/transactions/';
        try {
            $response = Http::withHeaders($this->headers)->get($url, [
                'page' => $page,
                'page_size' => $page_size,
                'emp_code' => $emp_code,
                'terminal_sn' => $terminal_sn,
                'terminal_alias' => $terminal_alias,
                'start_time' => $start_time,
                'end_time' => $end_time,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    // get Transaction Details
    public function getTransaction($id)
    {
        $url = $this->getConfig('url') . '/iclock/api/transactions/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->get($url)->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //delete Transaction

    public function deleteTransaction($id)
    {
        $url = $this->getConfig('url') . '/iclock/api/transactions/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->delete($url)->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //export Transaction

    public function exportTransaction($export_type = 'xls', $page = 1, $page_size = 10, $emp_code = null, $terminal_sn = null, $terminal_alias = null, $start_time = null, $end_time = null)
    {
        $url = $this->getConfig('url') . '/iclock/api/transactions/export/';
        try {
            $response = Http::withHeaders($this->headers)->get($url, [
                'export_type' => $export_type,
                'page' => $page,
                'page_size' => $page_size,
                'emp_code' => $emp_code,
                'terminal_sn' => $terminal_sn,
                'terminal_alias' => $terminal_alias,
                'start_time' => $start_time,
                'end_time' => $end_time,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    // get Transaction Report

    public function getTransactionReport($page = 1, $page_size = 10, $start_date = null, $end_date = null, $departments = null, $areas = null)
    {

        $url = $this->getConfig('url') . '/att/api/transactionReport/';
        try {
            $response = Http::withHeaders($this->headers)->get($url, [
                'page' => $page,
                'page_size' => $page_size,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'departments' => $departments,
                'areas' => $areas,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //get Area List

    public function getAreas($page = 1, $page_size = 10, $area_code = null, $area_name = null, $area_code_icontains = null, $area_name_icontains = null, $ordering = 'id')
    {

        $url = $this->getConfig('url') . '/personnel/api/areas/';
        try {
            $response = Http::withHeaders($this->headers)->get($url, [
                'page' => $page,
                'page_size' => $page_size,
                'area_code' => $area_code,
                'area_name' => $area_name,
                'area_code_icontains' => $area_code_icontains,
                'area_name_icontains' => $area_name_icontains,
                'ordering' => $ordering,
            ])->json();

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
                'parent_area' => $data['parent_area'] ?? null,
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
                'parent_area' => $data['parent_area'] ?? null,
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

    //get Department List

    public function getDepartments($page = 1, $page_size = 10, $dept_code = null, $dept_name = null, $dept_code_icontains = null, $dept_name_icontains = null, $ordering = 'id')
    {

        $url = $this->getConfig('url') . '/personnel/api/departments/';
        try {
            $response = Http::withHeaders($this->headers)->get($url, [
                'page' => $page,
                'page_size' => $page_size,
                'dept_code' => $dept_code,
                'dept_name' => $dept_name,
                'dept_code_icontains' => $dept_code_icontains,
                'dept_name_icontains' => $dept_name_icontains,
                'ordering' => $ordering,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    // get Department Details

    public function getDepartment($id)
    {
        $url = $this->getConfig('url') . '/personnel/api/departments/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->get($url)->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //create Department

    public function createDepartment($data)
    {

        $url = $this->getConfig('url') . '/personnel/api/departments/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'dept_code' => $data['dept_code'],
                'dept_name' => $data['dept_name'],
                'parent_dept' => $data['parent_dept'] ?? null,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //update Department

    public function updateDepartment($id, $data)
    {

        $url = $this->getConfig('url') . '/personnel/api/departments/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->put($url, [
                'dept_code' => $data['dept_code'],
                'dept_name' => $data['dept_name'],
                'parent_dept' => $data['parent_dept'] ?? null,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //delete Department

    public function deleteDepartment($id)
    {

        $url = $this->getConfig('url') . '/personnel/api/departments/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->delete($url)->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //get Position

    public function getPositions($page = 1, $page_size = 10, $position_code = null, $position_name = null, $position_code_icontains = null, $position_name_icontains = null, $ordering = 'id')
    {

        $url = $this->getConfig('url') . '/personnel/api/positions/';
        try {
            $response = Http::withHeaders($this->headers)->get($url, [
                'page' => $page,
                'page_size' => $page_size,
                'position_code' => $position_code,
                'position_name' => $position_name,
                'position_code_icontains' => $position_code_icontains,
                'position_name_icontains' => $position_name_icontains,
                'ordering' => $ordering,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    // get Position Details

    public function getPosition($id)
    {
        $url = $this->getConfig('url') . '/personnel/api/positions/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->get($url)->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //create Position

    public function createPosition($data)
    {

        $url = $this->getConfig('url') . '/personnel/api/positions/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'position_code' => $data['position_code'],
                'position_name' => $data['position_name'],
                'parent_position' => $data['parent_position'] ?? null,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //update Position

    public function updatePosition($id, $data)
    {

        $url = $this->getConfig('url') . '/personnel/api/positions/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->put($url, [
                'position_code' => $data['position_code'],
                'position_name' => $data['position_name'],
                'parent_position' => $data['parent_position'] ?? null,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //delete Position

    public function deletePosition($id)
    {

        $url = $this->getConfig('url') . '/personnel/api/positions/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->delete($url)->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //get Employee List

    public function getEmployees($page = 1, $page_size = 10, $emp_code = null, $emp_code_icontains = null, $first_name = null, $first_name_icontains = null, $last_name = null, $last_name_icontains = null, $department = null, $areas = null)
    {

        $url = $this->getConfig('url') . '/personnel/api/employees/';
        try {
            $response = Http::withHeaders($this->headers)->get($url, [
                'page' => $page,
                'page_size' => $page_size,
                'emp_code' => $emp_code,
                'emp_code_icontains' => $emp_code_icontains,
                'first_name' => $first_name,
                'first_name_icontains' => $first_name_icontains,
                'last_name' => $last_name,
                'last_name_icontains' => $last_name_icontains,
                'department' => $department,
                'areas' => $areas,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    // get Employee Details

    public function getEmployee($id)
    {
        $url = $this->getConfig('url') . '/personnel/api/employees/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->get($url)->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //create Employee

    public function createEmployee($data)
    {
        $url = $this->getConfig('url') . '/personnel/api/employees/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'emp_code' => $data['emp_code'],
                'department' => $data['department'],
                'area' => $data['area'],
                'hire_date' => $data['hire_date'] ?? null,
                'first_name' => $data['first_name'] ?? null,
                'last_name' => $data['last_name'] ?? null,
                'gender' => $data['gender'] ?? null,
                'mobile' => $data['mobile'] ?? null,
                'national' => $data['national'] ?? null,
                'address' => $data['address'] ?? null,
                'email' => $data['email'] ?? null,
                'app_status' => $data['app_status'] ?? 0,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //update Employee

    public function updateEmployee($id, $data)
    {
        $url = $this->getConfig('url') . '/personnel/api/employees/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->put($url, [
                'emp_code' => $data['emp_code'],
                'department' => $data['department'],
                'area' => $data['area'],
                'hire_date' => $data['hire_date'] ?? null,
                'first_name' => $data['first_name'] ?? null,
                'last_name' => $data['last_name'] ?? null,
                'gender' => $data['gender'] ?? null,
                'mobile' => $data['mobile'] ?? null,
                'national' => $data['national'] ?? null,
                'address' => $data['address'] ?? null,
                'email' => $data['email'] ?? null,
                'app_status' => $data['app_status'] ?? 0,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //delete Employee

    public function deleteEmployee($id)
    {
        $url = $this->getConfig('url') . '/personnel/api/employees/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->delete($url)->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //adjust area

    public function adjustArea($data)
    {
        $url = $this->getConfig('url') . '/personnel/api/employees/adjust_area/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'areas' => $data['areas'],
                'employees' => $data['employees'],
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //adjust department

    public function adjustDepartment($data)
    {
        $url = $this->getConfig('url') . '/personnel/api/employees/adjust_department/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'department' => $data['department'],
                'employees' => $data['employees'],
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //adjust regsin

    public function adjustResign($data)
    {
        $url = $this->getConfig('url') . '/personnel/api/employees/adjust_regsin/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'resign_date' => $data['resign_date'],
                'employees' => $data['employees'],
                'reason' => $data['reason'] ?? null,
                'disableatt' => $data['disableatt'] ?? true,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //Delete bio template

    public function deleteBioTemplate($data)
    {
        $url = $this->getConfig('url') . '/personnel/api/employees/del_bio_template/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'employees' => $data['employees'],
                'finger_print' => $data['finger_print'] ?? false,
                'face' => $data['face'] ?? false,
                'finger_vein' => $data['finger_vein'] ?? false,
                'palm' => $data['palm'] ?? false,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //Resync to device

    public function resyncToDevice($data)
    {
        $url = $this->getConfig('url') . '/personnel/api/employees/resync_to_device/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'employees' => $data['employees'],
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //get Resign List

    public function getResigns($page = 1, $page_size = 10, $employee = null, $resign_type = null, $resign_date = null)
    {

        $url = $this->getConfig('url') . '/personnel/api/resigns/';
        try {
            $response = Http::withHeaders($this->headers)->get($url, [
                'page' => $page,
                'page_size' => $page_size,
                'employee' => $employee,
                'resign_type' => $resign_type,
                'resign_date' => $resign_date
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }


    // get Resign Details

    public function getResign($id)
    {
        $url = $this->getConfig('url') . '/personnel/api/resigns/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->get($url)->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //create Resign

    public function createResign($data)
    {
        $url = $this->getConfig('url') . '/personnel/api/resigns/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'employee' => $data['employee'],
                'disableatt' => $data['disableatt'],
                'resign_date' => $data['resign_date'],
                'reason' => $data['reason'] ?? null,
                'disableatt' => $data['disableatt'] ?? true,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //update Resign

    public function updateResign($id, $data)
    {
        $url = $this->getConfig('url') . '/personnel/api/resigns/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->put($url, [
                'employee' => $data['employee'],
                'disableatt' => $data['disableatt'],
                'resign_date' => $data['resign_date'],
                'reason' => $data['reason'] ?? null,
                'disableatt' => $data['disableatt'] ?? true,
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //delete Resign

    public function deleteResign($id)
    {
        $url = $this->getConfig('url') . '/personnel/api/resigns/' . $id . '/';
        try {
            $response = Http::withHeaders($this->headers)->delete($url)->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    //Reinstatement

    public function reinstatement($data)
    {
        $url = $this->getConfig('url') . '/personnel/api/resigns/reinstatement/';
        try {
            $response = Http::withHeaders($this->headers)->post($url, [
                'resigns' => $data['resigns'],
            ])->json();

            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }
}
