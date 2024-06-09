<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $companies = [
            ['name' => 'Сбербанк'],
            ['name' => 'Тинькофф Банк'],
            ['name' => 'Альфа-Банк'],
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}
