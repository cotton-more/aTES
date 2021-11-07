<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static Builder uncompleted()
 */
class Task extends Model
{
    use HasFactory;

    private const STATUS_COMPLETED = 'completed';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeUncompleted(Builder $query): Builder
    {
        return $query->where('status', '!=', self::STATUS_COMPLETED);
    }

    public function notCompleted(): bool
    {
        return $this->status !== self::STATUS_COMPLETED;
    }

    public function complete(): void
    {
        $this->status = self::STATUS_COMPLETED;

        $this->save();
    }

    public function assignedTo(User $doer)
    {

    }
}
