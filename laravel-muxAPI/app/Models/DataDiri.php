<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    use HasFactory;
    public $fillable = ['nama', 'tanggal_lahir', 'kewarganegaraan'];
}
