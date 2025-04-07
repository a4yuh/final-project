<?php

namespace App\Controllers;

use App\Models\ReviewModel;
use CodeIgniter\Controller;

class ReviewController extends Controller
{
    public function saveReview()
    {
        $game_id     = $this->request->getPost('game_id');
        $user_id     = $this->request->getPost('user_id'); // Optional – adjust if using user sessions
        $review_text = $this->request->getPost('review_text');
        $rating      = $this->request->getPost('rating');
        
        $reviewModel = new ReviewModel();
        $data = [
            'game_id'     => $game_id,
            'user_id'     => $user_id,
            'review_text' => $review_text,
            'rating'      => $rating
        ];
        $reviewModel->insert($data);
        
        return $this->response->setJSON(['status' => 'success', 'message' => 'Review added successfully']);
    }
}