<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['title', 'description', 'position', 'list_id', 'user_id'];
    public function list()
    {
        return $this->belongsTo(Lists::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
