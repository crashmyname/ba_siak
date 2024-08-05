<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    use HasFactory;
    public $table = 'detailproduct';
    protected $guarded = ['detail_id'];
    protected $primaryKey = 'detail_id';
}
