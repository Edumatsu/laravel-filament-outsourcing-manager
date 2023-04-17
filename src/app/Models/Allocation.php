<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    use HasFactory;

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
