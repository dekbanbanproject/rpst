<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depart extends Model
{
    use HasFactory;
    protected $table = 'departs';
    protected $primaryKey = 'departs_id';

}
