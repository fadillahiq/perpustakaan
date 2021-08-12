<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggotas';
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id_anggota');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_anggota');
    }
}
