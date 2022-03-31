<?php

namespace Ds\Logs\Helpers;

use Ds\Logs\Models\ExceptionLogs;

class LogException
{

    /**
     * Author: Muhammd Latif
     * store
     * Description: This funcation will store your exception in database. That will helps
     * for debugging. It will store method, line number, error message, and function in
     * which error occurred.
     * @param $method
     * @param $exception
     * @param $function
     * @return void
    */

    public static function store($method, $exception, $function)
    {
    	$logException = [];
        $logException['line_no'] = $exception->getLine();
        $logException['method'] = $method;
        $logException['function'] = $function;
        $logException['error_message'] = $exception->getMessage();
        ExceptionLogs::create($logException);
    }
}
