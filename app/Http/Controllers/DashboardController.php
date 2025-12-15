<?php

namespace App\Http\Controllers;

use App\Models\Fridge;
use App\Models\FridgeProduct;

class DashboardController extends Controller
{
public function index()
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    $user = auth()->user();
    $fridges = Fridge::where('user_id', $user->id)->get();

    $products = FridgeProduct::with('product','fridge')
        ->whereHas('fridge', fn ($q) => $q->where('user_id', $user->id))->get();

    return view('dashboard', ['fridges' => $fridges,'products' => $products]);
}



}
