# Laravel ZKTeco Access Control

This package provides an easy way to manage ZKTeco access control devices in Laravel.

## Installation

You can install the package via composer:

```bash
composer require asif160627/laravel-zkteco-integrate
```

## Usage

### Configuration

First, publish the package's configuration file:

```bash
php artisan vendor:publish --provider="Asif160627\GenerateResources\ResourceServiceProvider"
```

This will create a `access_control.php` file in your `config` directory. In this file, you can specify the IP address and port of your ZKTeco device.

Set `username` , `password` and `url` in your `.env` file:

```bash
ZKTECO_ACCESS_URL="http://127.0.1.1:8000"
ZKTECO_ACCESS_USERNAME="demo"
ZKTECO_ACCESS_PASSWORD="demo@#"

```

### Connecting to the Device

You can connect to the device and get token using the `getToken` method:

```php
use Asif160627\ZktecoAccessControl\Facades\AccessControl;

ZKAccess::getToken();
```

### Available Methods

###  Device 

```php
use Asif160627\ZktecoAccessControl\Facades\AccessControl;

#get device info
AccessControl::getDevices($page = 1, $page_size = 10, $sn = null, $alias = null,    $state = null, $area = null, $sn_icontains = null, $alias_icontains = null);

#get device info by id
AccessControl::getDevice($id);

#create device
AccessControl::createDevice($data);

#update device
AccessControl::updateDevice($id, $data);

#delete device
AccessControl::deleteDevice($id);

#clear command
AccessControl::clearCommand($data);

#clear capture
AccessControl::clearCapture($data);

#clear all
AccessControl::clearAll($data);

#clear transaction
AccessControl::uploadAll($data);

#upload transaction
AccessControl::uploadTransaction($data);

#upload user
AccessControl::reboot($data);

```

###  Transactions 

```php

#get transaction info
AccessControl::getTransactions($page = 1, $page_size = 10, $device = null, $user = null, $start_time = null, $end_time = null, $device_sn = null, $user_icontains = null);

#get transaction info by id
AccessControl::getTransaction($id);

#export transaction
    AccessControl::exportTransaction($export_type = 'xls', $page = 1, $page_size = 10, $emp_code = null, $terminal_sn = null, $terminal_alias = null, $start_time = null, $end_time = null);

#get transaction report
    AccessControl::getTransactionReport($page = 1, $page_size = 10, $start_date = null, $end_date = null, $departments = null, $areas = null);

#delete transaction
AccessControl::deleteTransaction($id);

```

