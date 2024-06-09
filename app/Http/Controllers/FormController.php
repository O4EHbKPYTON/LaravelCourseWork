<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Responsible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function showForm()
    {
        $responsibles = Responsible::all();
        $randomResponsible = $responsibles->random();

        return view('main', compact('responsibles', 'randomResponsible'));
    }

    public function submit(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'patronymic' => 'nullable|string|max:255',
            'passport' => 'required|string|max:11|regex:/^\d{4} \d{6}$/',
            'phone' => 'required|string|regex:/^\+7 \(\d{3}\) \d{3}-\d{4}$/',
            'amount' => 'required|numeric',
            'term' => 'required|integer',
            'address' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'responsible_id' => 'required|integer|exists:responsibles,id',
        ]);

        $interest_rate = $this->getInterestRate($validated['term']);
        $monthly_payment = $this->calculateMonthlyPayment($validated['amount'], $interest_rate, $validated['term']);
        $validated['monthly_payment'] = $monthly_payment;
        $validated['user_id'] = Auth::id();

        Post::create($validated);

        return redirect()->route('credit.form')->with('success', 'Ваша заявка успешно отправлена!');
    }

    private function calculateMonthlyPayment($amount, $interest_rate, $term)
    {
        $monthly_interest_rate = ($interest_rate / 100) / 12;
        $denominator = 1 - pow(1 + $monthly_interest_rate, -$term);
        return ($amount * $monthly_interest_rate) / $denominator;
    }

    private function getInterestRate($term)
    {
        if ($term <= 12) {
            return 10;
        } elseif ($term <= 24) {
            return 12;
        } else {
            return 15;
        }
    }
}
