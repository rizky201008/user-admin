<?php

namespace App\Models;

use App\Models\Agama;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailData extends Model
{
    use HasFactory;

    protected $table = 'detail_data';

    protected $guarded = [];

    public function agama() {
        return $this->belongsTo(Agama::class, 'id_agama', 'id');
    }
}
