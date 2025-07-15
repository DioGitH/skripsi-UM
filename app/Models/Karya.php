<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jenis_karya_id',
        'title',
        'subject',
        'language',
        'publisher',
        'description',
        'creator',
        'source',
        'date',
        'contributor',
        'rights',
        'keteranganStatus',
        'relation',
        'format',
        'identifier',
        'coverage',
        'file_path'
    ];
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
