<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'slug'];

    /**
     * Mendefinisikan relasi many-to-many ke model Game.
     * Sebuah kategori bisa memiliki banyak game.
     */
    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
}
