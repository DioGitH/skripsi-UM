<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    use HasFactory;
    protected $table = 'profesis';
    protected $fillable = ['nama'];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function jenisKaryas()
    {
        return $this->hasMany(JenisKarya::class);
    }
}
