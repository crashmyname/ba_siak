<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    public $table = 'suratmasuk';
    protected $guarded = ['suratmasuk_id'];
    protected $primaryKey = 'suratmasuk_id';
}
