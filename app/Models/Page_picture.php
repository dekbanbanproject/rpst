<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page_picture extends Model
{
    use HasFactory;
    protected $table = 'page_pictures';
    protected $primaryKey = 'picture_id';
}
