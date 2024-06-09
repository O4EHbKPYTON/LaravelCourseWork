@extends('layout')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Личный кабинет</div>

                    <div class="card-body">
                        @if ($credits->isEmpty())
                            <p>У вас нет активных кредитов.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Сумма кредита</th>
                                        <th>Процентная ставка</th>
                                        <th>Ежемесячный платеж</th>
                                        <th>Дата кредита</th>
                                        <th>Компания</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($credits as $credit)
                                        <tr>
                                            <td>{{ $credit->loan_amount }}</td>
                                            <td>{{ $credit->interest_rate }}%</td>
                                            <td>{{ $credit->monthly_payment }}</td>
                                            <td>{{ $credit->loan_date }}</td>
                                            <td>{{ $credit->company ? $credit->company->name : 'Unknown' }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
