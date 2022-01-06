<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sport;

class UpcomingGame extends Model
{
    use HasFactory;
     protected $fillable =[
    'category_id','title','sports_image','sports_description','sports_description','sports_time'
    ];

     public function category()
    {
     return $this->belongsTo(Sport::class);
    }
}
