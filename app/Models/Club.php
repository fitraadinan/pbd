<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Club extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'clubs';
    protected $guarded = ['id'];
    public $sortable = ['id', 'club_name', 'hari', 'jam'];

    public function lab()
    {
        return $this->hasOne('\App\Models\Lab');
    }
    
}
