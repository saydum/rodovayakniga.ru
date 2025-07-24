<?php

namespace App\Models;

use App\Http\Requests\Human\UpdateHumanRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'rod_id',
        'gender',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function rod(): BelongsTo
    {
        return $this->belongsTo(Rod::class);
    }

    public function father(): BelongsTo
    {
        return $this->belongsTo(Human::class, 'father_id');
    }

    public function mother(): BelongsTo
    {
        return $this->belongsTo(Human::class, 'mother_id');
    }

    public function siblings(): HasMany
    {
        return $this->hasMany(Human::class, 'father_id', 'mother_id')
            ->orWhere('mother_id', $this->mother_id)
            ->where('id','!=', $this->id)
        ;
    }

    public function unclesAndAunts()
    {
        // Получаем братьев и сестер отца
        $fatherSiblings = Human::where('father_id', $this->father_id)
            ->where('id', '!=', $this->id) // Исключаем самого себя
            ->get();

        // Получаем братьев и сестер матери
        $motherSiblings = Human::where('mother_id', $this->mother_id)
            ->where('id', '!=', $this->id) // Исключаем самого себя
            ->get();

        // Возвращаем объединенные коллекции
        return $fatherSiblings->merge($motherSiblings);
    }

    public function shareTreeLink(): HasOne
    {
        return $this->hasOne(ShareTreeLink::class, 'human_id', 'id');
    }
}
