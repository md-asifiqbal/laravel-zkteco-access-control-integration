<?php

namespace Asif160627\ZktecoAccessControl\Contracts;

interface AccessServiceInterface
{
    public function getDevices($page = 1, $page_size = 10, $sn = null, $alias = null, $state = null, $area = null, $sn_icontains = null, $alias_icontains = null);
    public function getDevice($id);
    public function createDevice($data);
    public function updateDevice($id, $data);
    public function deleteDevice($id);
    public function clearCommand($data);
    public function clearCapture($data);
    public function clearAll($data);
    public function uploadAll($data);
    public function uploadTransaction($data);
    public function reboot($data);

    public function getTransactions($page = 1, $page_size = 10, $emp_code = null, $terminal_sn = null, $terminal_alias = null, $start_time = null, $end_time = null);
    public function getTransaction($id);
    public function deleteTransaction($id);
    public function exportTransaction($export_type = 'xls', $page = 1, $page_size = 10, $emp_code = null, $terminal_sn = null, $terminal_alias = null, $start_time = null, $end_time = null);
    public function getTransactionReport($page = 1, $page_size = 10, $start_date = null, $end_date = null, $departments = null, $areas = null);


    public function getAreas($page = 1, $page_size = 10, $code = null, $name = null, $state = null, $code_icontains = null, $name_icontains = null);
    public function getArea($id);
    public function createArea($data);
    public function updateArea($id, $data);
    public function deleteArea($id);

    public function getDepartments($page = 1, $page_size = 10, $dept_code = null, $dept_name = null, $dept_code_icontains = null, $dept_name_icontains = null, $ordering = 'id');
    public function getDepartment($id);
    public function createDepartment($data);
    public function updateDepartment($id, $data);
    public function deleteDepartment($id);

    public function getPositions($page = 1, $page_size = 10, $position_code = null, $position_name = null, $position_code_icontains = null, $position_name_icontains = null, $ordering = 'id');
    public function getPosition($id);
    public function createPosition($data);
    public function updatePosition($id, $data);
    public function deletePosition($id);

    public function getEmployees($page = 1, $page_size = 10, $emp_code = null, $emp_code_icontains = null, $first_name = null, $first_name_icontains = null, $last_name = null, $last_name_icontains = null, $department = null, $areas = null);
    public function getEmployee($id);
    public function createEmployee($data);
    public function updateEmployee($id, $data);
    public function deleteEmployee($id);
    public function adjustArea($data);
    public function adjustDepartment($data);
    public function adjustResign($data);
    public function deleteBioTemplate($data);
    public function resyncToDevice($data);

    public function getResigns($page = 1, $page_size = 10, $employee = null, $resign_type = null, $resign_date = null);
    public function getResign($id);
    public function createResign($data);
    public function updateResign($id, $data);
    public function deleteResign($id);
    public function reinstatement($data);
}
