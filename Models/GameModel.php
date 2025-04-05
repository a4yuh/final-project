<?php

namespace App\Models;

use CodeIgniter\Model;

class GameModel extends Model
{
    protected $table      = 'games';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'genre', 'description', 'image'];
    
    // Enable timestamps if you're using created_at and updated_at fields
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Retrieves all games that match a given genre.
     *
     * @param string $genre The genre to filter games by.
     * @return array An array of games sorted by title in ascending order.
     */
    public function getGamesByGenre($genre)
    {
        return $this->where('genre', $genre)
                    ->orderBy('title', 'ASC')
                    ->findAll();
    }
}

