<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pageleftmodule_sub extends Model
{
    use HasFactory;
    protected $table = 'pageleftmodule_subs';
    // protected $primaryKey = 'PAGE_LEFT_MODULE_SUB_ID';
    protected $fillable = [
        'modulsub_name',
        'modulsub_detail',
        'modulsub_img',
        'module_id',
        'module_name'
    ];
}
