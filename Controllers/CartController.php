<?php

namespace App\Controllers;

use App\Models\GameModel;
use CodeIgniter\Controller;

class CartController extends Controller
{
    public function index()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        return view('cart/index', ['cart' => $cart]);
    }

    public function add($id)
    {
        $gameModel = new GameModel();
        $game = $gameModel->find($id);

        if (!$game) {
            return redirect()->to('/games')->with('error', 'Game not found.');
        }

        $session = session();
        $cart = $session->get('cart') ?? [];

        // Check if already added
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $game['id'],
                'title' => $game['title'],
                'price' => $game['price'],
                'quantity' => 1
            ];
        }

        $session->set('cart', $cart);
        return redirect()->to('/cart');
    }

    public function remove($id)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $session->set('cart', $cart);
        }

        return redirect()->to('/cart');
    }

    public function clear()
    {
        session()->remove('cart');
        return redirect()->to('/cart');
    }
}