<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Allocation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['campaign', 'date', 'promoter_id', 'pdv_id'];

    public function promoter()
    {
        return $this->belongsTo(Promoter::class);
    }

    public function pdv()
    {
        return $this->belongsTo(Pdv::class);
    }
}
