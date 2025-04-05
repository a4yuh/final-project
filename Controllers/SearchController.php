<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class SearchController extends Controller
{
    public function index()
    {
        // 1. Get the user’s search query from the GET request
        $query = $this->request->getGet('query');
        if (empty($query)) {
            // If no query is provided, redirect or show an error message
            echo "No search query provided.";
            return;
        }

        // 2. RAWG API Key (the one that worked in your hardcoded test)
        $apiKey = '97a14e8c12b4422ebd07464e15203a40';

        // 3. Build the URL with the user’s search term
        $url = 'https://api.rawg.io/api/games'
             . '?key=' . $apiKey
             . '&search=' . urlencode($query)
             . '&page_size=1';

        // 4. Initialize cURL with SSL verification disabled if needed (for local dev)
        $client = \Config\Services::curlrequest(['verify' => false]);

        try {
            // 5. Execute the request
            $response = $client->get($url);
            $rawgData = json_decode($response->getBody(), true);

            // 6. Check if there’s at least one result
            if (isset($rawgData['results'][0])) {
                $game = $rawgData['results'][0];

                // 7. Pass data to a view for display
                return view('rawg_results', [
                    'query' => $query,
                    'game'  => $game
                ]);
            } else {
                echo "No results found for: " . esc($query);
            }
        } catch (\Exception $e) {
            // If something goes wrong with cURL
            echo "cURL Error: " . $e->getMessage();
        }
    }
}