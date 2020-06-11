<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\CustomException;
use App\Models\Account;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Sacar
{
    /**
     * Return a value for the field.
     *
     * @param null $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param mixed[] $args The arguments that were passed into the field.
     * @param \Nuwave\Lighthouse\Support\Contracts\GraphQLContext $context Arbitrary data that is shared between all fields of a single query.
     * @param \GraphQL\Type\Definition\ResolveInfo $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     * @throws \Exception
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $conta = Account::query()->find($args['conta']);
        if (empty($conta)) {
            return null;
        }
        if ($conta->saldo >= $args['valor']) {
            $newSaldo = (float)$conta->saldo - $args['valor'];
            $conta->saldo = $newSaldo;
            $conta->save();
            return $conta;
        }
        throw new CustomException('Saldo insuficiente.', 'graphql');
    }
}
