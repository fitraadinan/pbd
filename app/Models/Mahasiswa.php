<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Mahasiswa extends Model
{
    use HasFactory;
    use Sortable;
    protected $table='mahasiswas';
    protected $guarded=['id'];
    public $sortable = ['id', 'nim', 'nama', 'th_masuk', 'no_telepon'];

    public function club()
    {
        return $this->belongsTo('\App\Models\Club');
    }
}
