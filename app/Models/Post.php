<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function autor()
    {
        return $this->belongsTo(User::class, 'autor_id', 'id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'post_id', 'id');
    }
}
