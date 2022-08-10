<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'writer_name'];
    public function getSingerInfo(){
        return $this->belongsTo(Singer::class,'singer_id');
    }
}
