<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ItemTopup;
use App\Models\Account;

class Game extends Model
{
     use HasFactory;

    protected $fillable = ['nama'];

    public function itemTopups()
    {
        return $this->hasMany(ItemTopup::class);
    }
}
