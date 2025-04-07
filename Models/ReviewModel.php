<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table      = 'reviews';
    protected $primaryKey = 'id';
    protected $allowedFields = ['game_id', 'user_id', 'review_text', 'rating'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}