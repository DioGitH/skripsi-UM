<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKarya extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'foto_path'];

        protected $table = 'jenis_karyas'; // kalau kamu tetap ingin pakai nama ini
    public function karyas()
        {
            return $this->hasMany(Karya::class, 'jenis_karya_id'); // pastikan nama foreign key benar
        }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function profesi()
{
    return $this->belongsTo(Profesi::class);
}
}
