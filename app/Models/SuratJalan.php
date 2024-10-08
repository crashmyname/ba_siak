<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;
    public $table = 'suratjalan';
    protected $guarded = ['suratjalan_id'];
    protected $primaryKey = 'suratjalan_id';
}
