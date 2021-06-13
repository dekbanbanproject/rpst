<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pageleftmodule extends Model
{
    use HasFactory;
    protected $table = 'pageleftmodules';
    protected $primaryKey = 'module_id';
}
