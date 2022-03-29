<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;
    protected $table = 'labs';
    protected $guarded = ['id'];

    public function club()
    {
        return $this->belongsTo('\App\Models\Club');
    }
}
