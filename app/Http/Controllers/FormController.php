<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\OwnershipTypes;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Credit;

class FormController extends Controller
{
    public function showForm()
    {
        $ownershipTypes = OwnershipTypes::all(); // Получаем список компаний
        return view('main', ['ownershipTypes' => $ownershipTypes]);
    }
    // Добавляем middleware auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function submit(Request $request)
    {
        // Получаем id текущего пользователя
        $userId = auth()->id();

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'term' => 'required|integer|min:1',
            'repayment_period' => 'required|integer|min:1',
        ]);

        $validated['user_id'] = $userId;

        // Проверяем существует ли компания с таким названием
        $company = Company::firstOrCreate(['name' => $validated['company']]);

        Client::create($validated);
        $amount = $request->amount;
        $term = $request->term;
        $repaymentPeriod = $request->repayment_period;

        if ($term <= 6) {
            $interestRate = 20;
        } elseif ($term <= 12) {
            $interestRate = 15;
        } elseif ($term <= 24) {
            $interestRate = 10;
        } else {
            $interestRate = 5;
        }

        $monthlyPayment = $this->calculateMonthlyPayment($amount, $term, $interestRate);

        $credit = new Credit();
        $credit->user_id = Auth::id();
        $credit->loan_amount = $amount;
        $credit->term = $term;
        $credit->loan_date = now();
        $credit->interest_rate = $interestRate;
        $credit->monthly_payment = $monthlyPayment;
        $credit->company_id = $company->id; // Используем id компании
        $credit->save();

        return view('confirmation', ['credit' => $credit]);
    }
    private function calculateMonthlyPayment($amount, $term, $interestRate)
    {
        // Процентная ставка в абсолютном значении (например, 10% ставка = 0.1)
        $monthlyInterestRate = $interestRate / 100 / 12;

        // Количество платежей (в месяцах)
        $totalPayments = $term;

        // Формула для расчета ежемесячного платежа
        // M = P * (r * (1 + r)^n) / ((1 + r)^n - 1)
        // где:
        // M - ежемесячный платеж
        // P - сумма кредита
        // r - месячная процентная ставка
        // n - общее количество платежей
        $monthlyPayment = $amount * ($monthlyInterestRate * pow(1 + $monthlyInterestRate, $totalPayments)) / (pow(1 + $monthlyInterestRate, $totalPayments) - 1);

        return round($monthlyPayment, 2); // Округляем до двух знаков после запятой
    }
}
