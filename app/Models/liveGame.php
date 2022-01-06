<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sport;

class liveGame extends Model
{
    use HasFactory;
    protected $fillable =[
    'category_id','title','embed_code','type'
    ];

    public function category()
    {
     return $this->belongsTo(Sport::class);
    }
     
}
