<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    use HasFactory;
    protected $table = 'pengarangs';
    protected $guarded = [];

    public function buku()
    {
        return $this->hasMany(Buku::class, 'id_pengarang');
    }
}
