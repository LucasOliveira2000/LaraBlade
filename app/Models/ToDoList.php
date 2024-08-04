<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ToDoList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'titulo',
        'descricao'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($toDoList) {
            $toDoList->uuid = (string) Str::uuid();
        });
    }

    public function users() {return $this->belongsTo(User::class);}
}
