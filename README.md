

# Graphql api digital bank


> Versão do laravel: 7.15.0
>
> Versão do PHP: 7.4.0
>
> CHARSET: UTF-8
>
> Apache/2.4.38



##### URl da api .
>http://graphql-api-digital-bank.herokuapp.com/graphql-playground
>
A [api](http://graphql-api-digital-bank.herokuapp.com/graphql-playground) está rodando no [heroku](https://dashboard.heroku.com/)


### Instruções rodando a aplicação com docker.




1. Clone o repositorio `git clone https://github.com/HelioDantas/DockerLaravel.git`

1. Crie uma pasta `app` no diretorio `www` na raiz do DockerLaravel e mova some o conteudo de dentro da pasta graphql-api-digital-bank para  pasta `app`.

3. `docker-compose up` para rodar a imagem no modo interativo.(Rodando na porta 80)

4.  Crie o arquivo .env a parte do .env.exemple e coloque as credencias de banco de dados(use mysql)

5.  Rode o comando `composer install` para instalar as dependências

6.  Rode o comando ` php artisan migrate` para crias as tabelas no banco de dados

7.  Você pode usar o [Laravel GraphQL Playground ](https://github.com/mll-lab/laravel-graphql-playground) para fazer as consulta na api, estará disponivel na rota /graphql-playground (http://127.0.0.1/graphql-playground)

8.  Agora é só usar!!!

9.  Para rodar os test use o comando ` php artisan test`(irá gerar o relatorio de cobertura na pasta report na raiz do projeto)

10. Para criar dados no banco de dados rode o comando `php artisan tinker`

11. Com o tinker aberto rode o comando: `factory(App\Models\Account::class, 100)->create()`

12. Caso esteja em produção use o comando `php artisan db:seed --class=AccountSeeder`


### Instruções rodando a aplicação com o artisan.


1.  Crie o arquivo .env a parte do .env.exemple e coloque as credencias de banco de dados(use mysql)

2.  Rode o comando `composer install` para instalar as dependências

3.  Rode o comando ` php artisan migrate` para criar as tabelas no banco de dados

4.  Para start a api digite o comando `php artisan serve` e aperte enter(A API irá rodar por padrão na url: http://127.0.0.1:8000/).

5.  Você pode usar o [Laravel GraphQL Playground ](https://github.com/mll-lab/laravel-graphql-playground) para fazer as consulta na api, estará disponivel na rota /graphql-playground (http://127.0.0.1:8000/graphql-playground)

6.  Agora é só usar!!!

7.  Para rodar os test use o comando ` php artisan test`(irá gerar o relatório de cobertura na pasta report na raiz do projeto)

8. Para criar dados no banco de dados rode o comando `php artisan tinker`

9. Com o tinker aberto rode o comando: `factory(App\Models\Account::class, 100)->create()`

10. Caso esteja em produção use o comando `php artisan db:seed --class=AccountSeeder`

### Web Server Configuration

Use a [documentação ](https://laravel.com/docs/7.x/installation#web-server-configuration) do laravel caso precise configura apache ou nginx.


