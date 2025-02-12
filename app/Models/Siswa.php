<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    public function kelas(){
        return $this->hasOne(Kelas::class, 'id', 'kelas_id');
    }
}
