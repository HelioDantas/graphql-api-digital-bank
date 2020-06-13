<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use \App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        (new Collection([1, 2, 3, 4, 5]))
            ->map(fn () => Account::query()->create(['saldo' => '100']));

    }
}
