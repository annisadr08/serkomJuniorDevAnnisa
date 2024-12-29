<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
    'nama',
    'email',
    'no_hp',
    'semester',
    'ipk',
    'jenis_beasiswa',
    'berkas',
    'status_ajuan'
    ];
     
}
