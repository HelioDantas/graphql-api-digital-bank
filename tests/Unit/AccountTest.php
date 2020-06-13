<?php

namespace Tests\Feature;


use App\Models\Account;
use Tests\TestCase;

class AccountTest extends TestCase
{

    public function testFindAccount()
    {
        $account = factory(Account::class)->create();

        $accountFind = Account::query()->find($account->conta);

        $this->assertEquals($account->conta, $accountFind->conta);

    }

    public function testUpdateAccount()
    {
        $account = factory(Account::class)->create();
        $saldo = $account->saldo - 20;
        $account->update(['saldo' => $saldo]);

        $this->assertEquals(80, $account->saldo);

    }

}


