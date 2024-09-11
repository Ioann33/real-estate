<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'user_id',
        'task_id',
    ];
    protected $casts = [
        'task_id' => 'int'
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public static function getCommentsByTask(int $id): Collection
    {
        return self::query()->where('task_id', $id)->get();
    }
}
