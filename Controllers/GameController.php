<?php

namespace App\Controllers;

use App\Models\GameModel;
use CodeIgniter\Controller;

class GameController extends Controller
{
    protected $gameModel;

    public function __construct()
    {
        $this->gameModel = new GameModel();
    }

    public function genre($genre)
    {
        // Fetch games for the given genre
        $data['games'] = $this->gameModel->getGamesByGenre($genre);

        // Pass the genre along if you want to display it in the view
        $data['genre'] = ucfirst($genre);

        // Load the listing view (or any other view file you prefer)
        return view('listing', $data);
    }
}

