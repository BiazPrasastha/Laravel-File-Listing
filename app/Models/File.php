<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['title', 'file', 'user_id'];
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    use HasFactory;
}
