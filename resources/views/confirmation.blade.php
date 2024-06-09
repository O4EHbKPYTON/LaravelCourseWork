@extends('layout')

@section('main')
    <div class="container mt-5">
        <h1 class="display-4">Подтверждение</h1>
        <p class="lead">Ваша заявка на кредит успешно отправлена!</p>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Детали кредита</h5>
                <p class="card-text">Сумма кредита: ₽{{ $credit->loan_amount }}</p>
                <p class="card-text">Срок: {{ $credit->term }} месяцев</p>
                <p class="card-text">Процентная ставка: {{ $credit->interest_rate }}%</p>
                <p class="card-text">Ежемесячный платеж: ₽{{ $credit->monthly_payment }}</p>
            </div>
        </div>
    </div>
@endsection
