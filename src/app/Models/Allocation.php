<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use  Illuminate\Database\Eloquent\Relations\BelongsTo;

class Allocation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['campaign', 'date', 'promoter_id', 'pdv_id'];

    public function promoter(): BelongsTo
    {
        return $this->belongsTo(Promoter::class);
    }

    public function pdv(): BelongsTo
    {
        return $this->belongsTo(Pdv::class);
    }
}
