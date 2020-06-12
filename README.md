<p>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
</p>

#Graphql api digital bank


> Versão do laravel: 7.15.0
>
> Versão do PHP: 7.4.0
>
> CHARSET: UTF-8
>
> Apache/2.4.38


### Instruções.


1.  Crie o arquivo .env a parte do .env.exemple e coloque as credencias de banco de dados(use mysql de preferencia, porem o projeto também roda postgres.

2.  Rode o comando `composer install` para instalar as dependencias

3.  Rode o comando ` php artisan migrate` para crias as tabelas no banco de dados

4.  Para start a api digite o comando `php artisan serve` e aperte enter(A API irá rodar por padrão na url: http://127.0.0.1:8000/).

5.  Você pode usar o [Laravel GraphQL Playground ](https://github.com/mll-lab/laravel-graphql-playground) para fazer as consulta na api.Está disponivel na rota /graphql-playground (http://127.0.0.1:8000/graphql-playground)

6.  Agora é só usar!!!

7.  Para rodar os test use o comando ` php artisan test`


### Web Server Configuration

Use a [documentação ](https://laravel.com/docs/7.x/installation#web-server-configuration) do laravel caso precise configura apache ou nginx.


