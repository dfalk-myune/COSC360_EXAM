<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ToDo extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'title', 'description', 'deadline', 'status', 'user_id'
    ];

    protected $table = 'todos';

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
