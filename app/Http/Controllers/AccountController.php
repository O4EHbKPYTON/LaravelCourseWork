<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Credit; // Импортируем модель Credit

class AccountController extends Controller
{
    /**
     * Show the user's account page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Получаем кредиты пользователя из таблицы credits
        $credits = Credit::where('user_id', Auth::id())->get();

        return view('account', compact('credits'));
    }

    public function adminCredits()
    {
        $credits = Credit::with('user')->get();
        return view('admin.credits', ['credits' => $credits]);
    }
}
