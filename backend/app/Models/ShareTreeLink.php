<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShareTreeLink extends Model
{
    use HasFactory;

    protected $table = 'share_tree_links';

    protected $fillable = [
        'link',
        'human_id'
    ];

    public function human(): BelongsTo
    {
        return $this->belongsTo(Human::class, 'id', 'human_id');
    }
}
