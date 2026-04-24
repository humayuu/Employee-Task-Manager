<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'due_date', 'user_id', 'status'])]
class Task extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
