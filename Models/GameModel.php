<?php

namespace App\Models;

use CodeIgniter\Model;

class GameModel extends Model
{
    protected $table      = 'games';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 
        'genre', 
        'description', 
        'image', 
        'released_date',
        'rating'
    ];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
