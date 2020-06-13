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

    public function testMutationsAccountsSacarContaNaoExiste(): void
    {
        $valorSacado = (float)100 - 20;
        $this->graphQL(/** @lang GraphQL */ '
           mutation Sacar($conta:ID) {    
                  sacar(conta:$conta, valor:20) {   
                                conta
                                saldo
                    }
            }
        ', ['conta' => 70999888])
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'sacar' => null
                ]
            ]);

    }

    public function testMutationsAccountsSacarValorMaiorQueSaldoRetornaErro(): void
    {
        $account = factory(Account::class)->create();

        $this->graphQL(/** @lang GraphQL */ '
           mutation Sacar($conta:ID) {    
                  sacar(conta:$conta, valor:20000099) {   
                                conta
                                saldo
                    }
            }
        ', ['conta' => $account->conta])
            ->assertStatus(200)
            ->assertJson([
                'errors' => [
                    ['message' => 'Saldo insuficiente.']
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

    public function testMutationsAccountsDepositarContaCasoNaoExistaRetornaNull(): void
    {

        $this->graphQL(/** @lang GraphQL */ '
           mutation Depositar($conta:ID) {    
                  depositar(conta:$conta, valor:20) {   
                                conta
                                saldo
                    }
            }
        ', ['conta' => 809807878])
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'depositar' => null
                ]
            ]);

    }

    public function testMutationsAccountsDepositarDepositoMenorOuIgualRetornaContaSemAlterar(): void
    {
        $account = factory(Account::class)->create();

        $this->graphQL(/** @lang GraphQL */ '
           mutation Depositar($conta:ID) {    
                  depositar(conta:$conta, valor:0) {   
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
                        'saldo' => $account->saldo,
                    ]
                ]
            ]);

    }


}


