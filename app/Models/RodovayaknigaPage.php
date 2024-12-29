<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RodovayaknigaPage extends Model
{
    protected $table = 'rodovayakniga_pages';

    protected $fillable = [
        'rodovayakniga_id',
        'text',
        'human_id'
    ];

    public function rodovayakniga(): BelongsTo
    {
        return $this->belongsTo(Rodovayakniga::class);
    }

    public function human(): BelongsTo
    {
        return $this->belongsTo(Human::class);
    }
}
