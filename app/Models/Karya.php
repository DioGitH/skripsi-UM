<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;
    public function user()
{
    return $this->belongsTo(User::class);
}

public function jenisKarya()
{
    return $this->belongsTo(JenisKarya::class);
}

public function files()
{
    return $this->hasMany(KaryaFile::class);
}

}
