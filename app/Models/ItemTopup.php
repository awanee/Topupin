<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Game;


class ItemTopup extends Model
{
     use HasFactory;

    protected $fillable = ['game_id', 'name', 'amount_name'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }//
}
