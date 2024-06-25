@extends('layout')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12"> <!-- Изменено с col-md-10 на col-md-12 для увеличения ширины -->
                <div class="card">
                    <div class="card-header">Все кредиты пользователей</div>

                    <div class="card-body">
                        @if ($credits->isEmpty())
                            <p>Нет активных кредитов.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Имя пользователя</th>
                                        <th>Полное имя клиента</th>
                                        <th>Телефон клиента</th>
                                        <th>Сумма кредита</th>
                                        <th>Процентная ставка</th>
                                        <th>Ежемесячный платеж</th>
                                        <th>Дата кредита</th>
                                        <th>Компания</th>
                                        <th>Статус</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($credits as $credit)
                                        <tr>
                                            <td>{{ $credit->user->name }}</td>
                                            <td>
                                                {{ $credit->client ? $credit->client->full_name : 'Неизвестно' }}
                                            </td>
                                            <td>
                                                {{ $credit->client ? $credit->client->phone : 'Неизвестно' }}
                                            </td>
                                            <td>{{ $credit->loan_amount }}</td>
                                            <td>{{ $credit->interest_rate }}%</td>
                                            <td>{{ $credit->monthly_payment }}</td>
                                            <td>{{ $credit->loan_date }}</td>
                                            <td>{{ $credit->company ? $credit->company->name : 'Неизвестно' }}</td>
                                            <td>
                                                @if ($credit->paid)
                                                    <span class="badge badge-success">Оплачено</span>
                                                @else
                                                    <span class="badge badge-warning">Не оплачено</span>
                                                @endif
                                            </td>
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
