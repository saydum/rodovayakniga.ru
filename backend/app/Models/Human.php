<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'biography',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function father(): BelongsTo
    {
        return $this->belongsTo(Human::class, 'father_id');
    }

    public function mother(): BelongsTo
    {
        return $this->belongsTo(Human::class, 'mother_id');
    }


    public function shareTreeLink(): HasOne
    {
        return $this->hasOne(ShareTreeLink::class, 'human_id', 'id');
    }
}