<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;
    public $table = 'suratkeluar';
    protected $guarded = ['suratkeluar_id'];
    protected $primaryKey = 'suratkeluar_id';
}
