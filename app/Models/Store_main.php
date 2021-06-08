<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store_main extends Model
{
    use HasFactory;
    protected $table = 'store_mains';
    protected $primaryKey = 'STORE_ID';
}
