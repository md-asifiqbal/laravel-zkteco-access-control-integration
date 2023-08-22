# Laravel ZKTeco Access Control

This package provides an easy way to manage ZKTeco access control devices in Laravel.

## Documentation
You can find the API documentation for this package from ZKTeco Service Provider. 

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

AccessControl::getToken();
```

You don't need to use `getToken()` for below methods. You can use it for custom uses.

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

###  Areas 

```php

#Get area info
AccessControl::getAreas($page = 1, $page_size = 10, $code = null, $name = null, $state = null, $code_icontains = null, $name_icontains = null);

#get area info by id
AccessControl::getArea($id);

#create area
AccessControl::createArea($data);

#update area
AccessControl::updateArea($id, $data);

#delete area
AccessControl::deleteArea($id);
```

###  Departments 

```php

#Get department info
AccessControl::getDepartments($page = 1, $page_size = 10, $dept_code = null, $dept_name = null, $dept_code_icontains = null, $dept_name_icontains = null, $ordering = 'id');

#get department info by id
AccessControl::getDepartment($id);

#create department
AccessControl::createDepartment($data);

#update department
AccessControl::updateDepartment($id, $data);

#delete department
AccessControl::deleteDepartment($id);

```

###  Positions 

```php

//Get position info
AccessControl::getPositions($page = 1, $page_size = 10, $position_code = null, $position_name = null, $position_code_icontains = null, $position_name_icontains = null, $ordering = 'id');

//get position info by id
AccessControl::getPosition($id);

//create position
AccessControl::createPosition($data);

//update position
AccessControl::updatePosition($id, $data);

//delete position
AccessControl::deletePosition($id);

```

### Employees 

```php
//get employee list
AccessControl::getEmployees($page = 1, $page_size = 10, $emp_code = null, $emp_code_icontains = null, $first_name = null, $first_name_icontains = null, $last_name = null, $last_name_icontains = null, $department = null, $areas = null);
//get employee info by id
AccessControl::getEmployee($id);

//create employee
AccessControl::createEmployee($data);

//update employee
AccessControl::updateEmployee($id, $data);

//delete employee
AccessControl::deleteEmployee($id);

//adjust area
AccessControl::adjustArea($data);

//adjust department
AccessControl::adjustDepartment($data);

//adjust resign
AccessControl::adjustResign($data);

//delete bio template
AccessControl::deleteBioTemplate($data);

//resync to device
AccessControl::resyncToDevice($data);

```

### Resigns 

```php

//get resign list
AccessControl::getResigns($page = 1, $page_size = 10, $employee = null, $resign_type = null, $resign_date = null);

//get resign info by id
AccessControl::getResign($id);

//create resign
AccessControl::createResign($data);

//update resign
AccessControl::updateResign($id, $data);

//delete resign
AccessControl::deleteResign($id);

//reinstatement
AccessControl::reinstatement($data);

```
## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or submit a pull request.

## License

This package is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
