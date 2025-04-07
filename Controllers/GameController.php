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

    // Method to save the game data from the API to the local DB
    public function saveLocalGame()
    {
        // Get data from the POST request
        $title        = $this->request->getPost('title');
        $genre        = $this->request->getPost('genre');
        $description  = $this->request->getPost('description');
        $image        = $this->request->getPost('image');
        $releasedDate = $this->request->getPost('released_date');
        $rating       = $this->request->getPost('rating');

        // Insert into the games table
        $this->gameModel->insert([
            'title'         => $title,
            'genre'         => $genre,
            'description'   => $description,
            'image'         => $image,
            'released_date' => $releasedDate,
            'rating'        => $rating
        ]);

        // Redirect to the saved games list
        return redirect()->to('/saved-games');
    }

    // Method to list all saved games
    public function listSaved()
    {
        $data['games'] = $this->gameModel->findAll();
        return view('saved_games', $data);
    }
}
