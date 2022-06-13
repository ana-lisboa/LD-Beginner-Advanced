<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'started_at', 'ended_at'];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    protected function active(): Attribute
    {
        return Attribute::make(
            get: (function ($value, $attributes) {
                if ($attributes['ended_at'] == null) {
                    return false;
                }

                $endedAt = Carbon::createFromFormat('Y-m-d', $attributes['ended_at']);

                return $endedAt->isBefore(now());
            })
        )->shouldCache();
    }
}
