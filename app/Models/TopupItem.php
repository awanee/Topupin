<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopupItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'game_id',
        'name',
        'price',
        'image', // PERBAIKAN: Tambahkan 'image' ke dalam array ini
    ];

    /**
     * Get the game that owns the topup item.
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
