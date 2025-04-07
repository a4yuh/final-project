<?php

namespace App\Controllers;
use App\Models\OrderModel;
use CodeIgniter\Controller;

class OrderController extends Controller
{
    public function checkout()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return view('orders/checkout');
    }

    public function placeOrder()
    {
        $model = new OrderModel();
        $data = [
            'user_id'  => session()->get('user_id'),
            'game_id'  => $this->request->getPost('game_id'),
            'quantity' => $this->request->getPost('quantity'),
            'total_price' => $this->request->getPost('total_price')
        ];
        $model->insert($data);
        return redirect()->to('/user/dashboard')->with('message', 'Order placed successfully!');
    }
}
