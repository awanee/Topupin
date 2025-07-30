<?php
// File: app/Models/Game.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'logo',
        'category',
        'needs_server_id',
    ];

    /**
     * Tipe data atribut yang harus di-cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'needs_server_id' => 'boolean',
    ];

    /**
     * Mendefinisikan relasi many-to-many ke model Category.
     * Sebuah game bisa memiliki banyak kategori.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * PERBAIKAN: Mendefinisikan relasi one-to-many ke model TopupItem.
     * Sebuah game bisa memiliki banyak item top-up.
     * * Ganti 'App\Models\TopupItem' jika nama model Anda berbeda (misal: Nominal, Product).
     */
    public function topupItems()
    {
        return $this->hasMany(\App\Models\TopupItem::class);
    }
}
