<!-- resources/views/main.blade.php -->

@extends('layout')

@section('main')
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <main role="main" class="inner cover">
            <h1 class="cover-heading">Заявка на кредит</h1>
            @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Форма -->
            <form action="{{ route('form.submit') }}" method="POST">
                @csrf <!-- CSRF-токен -->
                <div class="form-group">
                    <label for="full_name" class="sr-only">Фамилия и имя</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Фамилия и имя" required>
                </div>
                <div class="form-group">
                    <label for="address" class="sr-only">Адрес проживания</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Адрес проживания" required>
                </div>
                <div class="form-group">
                    <label for="phone" class="sr-only">Телефон</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Телефон" required>
                </div>
                <div class="form-group">
                    <label for="company" class="sr-only">Выберите компанию</label>
                    <select class="form-control" id="company" name="company" required>
                        <option value="" disabled selected>Выберите компанию</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="term" class="sr-only">Срок кредита (в месяцах)</label>
                    <input type="number" class="form-control" id="term" name="term" placeholder="Срок кредита (в месяцах)" required>
                </div>
                <div class="form-group">
                    <label for="repayment_period" class="sr-only">Период погашения (в месяцах)</label>
                    <input type="number" class="form-control" id="repayment_period" name="repayment_period" placeholder="Период погашения (в месяцах)" required>
                </div>
                <div class="form-group">
                    <label for="amount" class="sr-only">Сумма кредита</label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Сумма кредита" required>
                </div>
                <button type="submit" class="btn btn-lg btn-secondary">Отправить</button>
            </form>
        </main>
    </div>
@endsection
