<?php

namespace Ds\Logs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExceptionLogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'line_no', 'method', 'function', 'error_message'
    ];
}
