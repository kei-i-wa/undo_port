<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Undolist extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    const LEVEL_VALUE = [
        1 => '★☆☆',
        2 => '★★☆',
        3 => '★★★',
    ];
    
     public function getLevelString()
    {
        return $this::LEVEL_VALUE[ $this->level ] ?? '';
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
