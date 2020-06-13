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

    public function testMutationsAccountsSacar(): void
    {
        $account = factory(Account::class)->create();

        $valorSacado = (float)$account->saldo - 20;
        $this->graphQL(/** @lang GraphQL */ '
           mutation Sacar($conta:ID) {    
                  sacar(conta:$conta, valor:20) {   
                                conta
                                saldo
                    }
            }
        ', ['conta' => $account->conta])
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'sacar' => [
                        'conta' => $account->conta,
                        'saldo' => $valorSacado,
                    ]
                ]
            ]);

    }

    public function testMutationsAccountsDepositar(): void
    {
        $account = factory(Account::class)->create();

        $valorSacado = (float)$account->saldo + 20;
        $this->graphQL(/** @lang GraphQL */ '
           mutation Depositar($conta:ID) {    
                  depositar(conta:$conta, valor:20) {   
                                conta
                                saldo
                    }
            }
        ', ['conta' => $account->conta])
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'depositar' => [
                        'conta' => $account->conta,
                        'saldo' => $valorSacado,
                    ]
                ]
            ]);

    }

}


