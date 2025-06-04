<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKarya extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'foto_path'];

    public function karyas()
    {
        return $this->hasMany(Karya::class);
    }
}
