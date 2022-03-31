<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Kyslik\ColumnSortable\SortableLink;

class Lab extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'labs';
    protected $guarded = ['id'];
    public $sortable = ['id', 'lab_name'];

    public function club()
    {
        return $this->belongsTo('\App\Models\Club');
    }
}
