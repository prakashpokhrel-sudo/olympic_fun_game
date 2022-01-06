<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponcer extends Model
{
    use HasFactory;
     protected $fillable =[
    'sponcer_name','sponcer_image'
    ];
}
