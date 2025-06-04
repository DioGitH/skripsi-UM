<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryaFile extends Model
{
    use HasFactory;
    public function karya()
    {
        return $this->belongsTo(Karya::class);
    }

}
