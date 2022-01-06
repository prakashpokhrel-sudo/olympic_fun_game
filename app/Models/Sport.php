<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\liveGame;

class Sport extends Model
{
    use HasFactory;
    protected $fillable =[
    'sports_category_title','sports_category_image'
    ];

     public function livegame(){
      return $this->hasMany(liveGame::class);
    }
    
}
