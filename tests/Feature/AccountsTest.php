<?php

namespace Tests\Feature;


use App\Models\Account;
use Tests\TestCase;

class AccountsTest extends TestCase
{

    public function testQueriesAccountsFindBalance(): void
    {
        $account = factory(Account::class)->create();


        $this->graphQL(/** @lang GraphQL */ "
            {
                saldo(conta: {$account->conta}) {
                    conta
                    saldo
                 }
             }
        ")->assertStatus(200)
            ->assertJson([
                'data' => [
                    'saldo' => [
                        'conta' => $account->conta,
                        'saldo' => $account->saldo,
                    ]
                ]
            ]);
    }


}


