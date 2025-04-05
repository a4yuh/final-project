<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\OrderModel;

class CheckoutController extends Controller
{
    public function index()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        $cart = $session->get('cart') ?? [];
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        return view('checkout/checkout', ['cart' => $cart, 'total' => $total]);
    }

    public function process()
    {
        $session = session();

        $orderData = [
            'user_id' => $session->get('user_id'),
            'fullname' => $this->request->getPost('fullname'),
            'address' => $this->request->getPost('address'),
            'phone' => $this->request->getPost('phone'),
            'order_details' => json_encode($session->get('cart')),
            'total_amount' => array_reduce($session->get('cart') ?? [], fn($sum, $item) => $sum + $item['price'] * $item['qty'], 0),
        ];

        $orderModel = new OrderModel();
        $orderModel->insert($orderData);

        $session->remove('cart');

        return redirect()->to('/checkout/confirmation');
    }

    public function confirmation()
    {
        return view('checkout/confirmation');
    }
}