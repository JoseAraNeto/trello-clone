<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model

{
    protected $fillable = ['title', 'position', 'board_id'];
    public function board()
    {
        return $this->belongsTo(Board::class);
    }
    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
