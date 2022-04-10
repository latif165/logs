# Laravel Logs (Activity, Request and Exceptions)

This package will helps you to main your project exception, activity and request logs.

## Prerequisites
php 8.0 =<
laravel 7 =<

## Installation

Use the composer package manager to install this package.

```bash
composer require developers-studio/logs
```

## Register Service Provider

```php
// config/app.php
'providers' => [
    ...
    Ds\Logs\LogsServiceProvider::class
]
```

If you are using laravel 7 or 8 then you have no need to add middleware in app/Http/Kernal.php or if you are using laravel 9 then you have to add it.

```php
// app/Http/Kernal.php
'api' => [
     ...
     \Ds\Logs\Http\Middleware\RequestLog::class
],
```

## Run migrations
```php
php artisan migrate
```

## Usage

## Request Logs

It will automatically store request and response. For listing of request logs use the following command.
```php
// Call the package model
// use Ds\Logs\Models\ApiRequestLog;
 ApiRequestLog::all(); or ApiRequestLog::paginate();
```

## Activity Logs
For storing activity log
```php
public function FuncationName() {
 LogActivity::info('Activity Subject will be here!');
}
```
For listing activity logs
```php
// Call package model (ActivityLog)
// use Ds\Logs\Models\ActivityLog;
ActivityLog::all(); or ActivityLog::paginate();
```

## Exception Logs 
For storing exception logs
```php
// import class LogException
// use Ds\Logs\Helpers\LogException;
public function FunctionName(){
  try {
     ...
     ...
  } catch (\Exception $e) {
    return LogException::store(__METHOD__, $e, __FUNCTION__);
  }
}
```
For listing of exception logs
```php
// import class ExceptionLogs
// use Ds\Logs\Models\ExceptionLogs;
ExceptionLogs::all(); or ExceptionLogs::paginate();
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://github.com/latif165/logs/blob/main/LICENSE)
