<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\User;

class AccountController extends Controller
{
    public function index()
    {
        
    }
    
    public function orders()
    {
        $orders = Auth::user()->orders;
        
        return view('store.orders', compact('orders'));
    }
}
