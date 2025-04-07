<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class SearchController extends Controller
{
    public function index()
    {
        $query = $this->request->getGet('query');
        if (empty($query)) {
            echo "No search query provided.";
            return;
        }
        
        
        $apiKey = 'c150235ea5ef4af98023301e417667ae';
        
        $url = 'https://api.rawg.io/api/games'
             . '?key=' . $apiKey
             . '&search=' . urlencode($query)
             . '&page_size=1';
             
        // Initialize cURL client with SSL verification disabled (for local dev)
        $client = \Config\Services::curlrequest(['verify' => false]);
        
        try {
            $response = $client->get($url);
            $rawgData = json_decode($response->getBody(), true);
            
            if (isset($rawgData['results'][0])) {
                $game = $rawgData['results'][0];
                return view('rawg_results', [
                    'query' => $query,
                    'game'  => $game
                ]);
            } else {
                echo "No results found for: " . esc($query);
            }
        } catch (\Exception $e) {
            echo "cURL Error: " . $e->getMessage();
        }
    }
}