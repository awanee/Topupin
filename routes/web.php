<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/popular-games', function () {
    $games = [
        [
            'title' => 'Minecraft Java & Bedrock Edition - Microsoft',
            'image' => 'imgpopuler2.png',
            'price' => 285500
        ],
        [
            'title' => 'Minecraft Java & Bedrock Edition - Microsoft',
            'image' => 'imgpopuler1.png',
            'price' => 285500
        ],
        [
            'title' => 'Resident Evil Village',
            'image' => 'imgpopuler3.png',
            'price' => 285500
        ],
        [
            'title' => 'GHOST of tsushima',
            'image' => 'imgpopuler4.png',
            'price' => 285500
        ],
        [
            'title' => 'GHOST of tsushima',
            'image' => 'imgpopuler5.png',
            'price' => 285500
        ],
        [
            'title' => 'Minecraft Java & Bedrock Edition - Microsoft',
            'image' => 'imgpopuler6.png',
            'price' => 285500
        ],
        [
            'title' => 'Minecraft Java & Bedrock Edition - Microsoft',
            'image' => 'imgpopuler2.png',
            'price' => 285500
        ],
        [
            'title' => 'Minecraft Java & Bedrock Edition - Microsoft',
            'image' => 'imgpopuler1.png',
            'price' => 285500
        ],
        [
            'title' => 'Resident Evil Village',
            'image' => 'imgpopuler3.png',
            'price' => 285500
        ],
        [
            'title' => 'GHOST of tsushima',
            'image' => 'imgpopuler4.png',
            'price' => 285500
        ],
        [
            'title' => 'GHOST of tsushima',
            'image' => 'imgpopuler5.png',
            'price' => 285500
        ],
        [
            'title' => 'Minecraft Java & Bedrock Edition - Microsoft',
            'image' => 'imgpopuler6.png',
            'price' => 285500
        ],
        [
            'title' => 'Minecraft Java & Bedrock Edition - Microsoft',
            'image' => 'imgpopuler2.png',
            'price' => 285500
        ],
        [
            'title' => 'Minecraft Java & Bedrock Edition - Microsoft',
            'image' => 'imgpopuler1.png',
            'price' => 285500
        ],
        [
            'title' => 'Resident Evil Village',
            'image' => 'imgpopuler3.png',
            'price' => 285500
        ],
        [
            'title' => 'GHOST of tsushima',
            'image' => 'imgpopuler4.png',
            'price' => 285500
        ],
        [
            'title' => 'GHOST of tsushima',
            'image' => 'imgpopuler5.png',
            'price' => 285500
        ],
        [
            'title' => 'Minecraft Java & Bedrock Edition - Microsoft',
            'image' => 'imgpopuler6.png',
            'price' => 285500
        ],
    ];

    return view('popularGames', compact('games'));
});
