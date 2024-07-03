<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Human extends Model
{
    use HasFactory;

    protected $table = "humans";

    protected $fillable = [
        'name',
        'last_name',
        'surname',
        'birth_date',
        'image',
        'mother_id',
        'father_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
