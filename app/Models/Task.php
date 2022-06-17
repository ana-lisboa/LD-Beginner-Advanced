<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'project_id', 'done', 'due_date'];

    protected $casts = [
        'due_at' => 'datetime'
    ];

    protected function remainingTime(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                $dueAt = Carbon::createFromFormat('Y-m-d H:i:s', $attributes['due_at']);

                return $dueAt->diffForHumans([
                    'parts' => 2,
                ]);
            }
        );
    }
}
