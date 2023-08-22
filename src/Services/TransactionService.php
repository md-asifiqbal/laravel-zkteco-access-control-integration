<?php

namespace Asif160627\ZktecoAccessControl\Services;

use Illuminate\Support\Facades\Http;
use Asif160627\ZktecoAccessControl\Traits\Connection;

trait TransactionService
{

    use Connection;

    // get Transactions List

    public function getTransactions($page = 1, $page_size = 10, $emp_code = null, $terminal_sn = null, $terminal_alias = null, $start_time = null, $end_time = null)
    {

        $url = $this->getConfig('url') . '/iclock/api/transactions/';
        try {
            $response = Http::withHeaders($this->headers)->withUrlParameters([
                'page' => $page,
                'page_size' => $page_size,
                'emp_code' => $emp_code,
                'terminal_sn' => $terminal_sn,
                'terminal_alias' => $terminal_alias,
                'start_time' => $start_time,
                'end_time' => $end_time,
            ])->get($url)->json();
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


    // get Transaction Report

    public function getTransactionReport($page = 1, $page_size = 10, $start_date = null, $end_date = null, $departments = null, $areas = null)
    {

        $url = $this->getConfig('url') . '/att/api/transactionReport/';
        try {
            $response = Http::withHeaders($this->headers)->withUrlParameters([
                'page' => $page,
                'page_size' => $page_size,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'departments' => $departments,
                'areas' => $areas,
            ])->get($url)->json();
            return $response;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }
}
