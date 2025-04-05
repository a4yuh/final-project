<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $allowedFields = ['user_id', 'fullname', 'address', 'phone', 'order_details', 'total_amount'];
    protected $useTimestamps = true;
}