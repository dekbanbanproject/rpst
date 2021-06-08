<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store_sub extends Model
{
    use HasFactory;
    protected $table = 'store_subs';
    protected $primaryKey = 'STORE_SUB_ID';
}
