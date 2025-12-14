<?php

namespace App\Http\Controllers;

use App\Models\Fridge;

class DashboardController extends Controller
{
public function index()
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    $user = auth()->user();
    $fridges = Fridge::all()->where('user_id', $user);
    return $fridges;
   // return view('dashboard', [])
}



}
