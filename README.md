### Passo a passo
Clone Repositório
```sh
git clone https://github.com/joaocoutod/laravel-test-backend.git my-project

```
```sh
cd my-project/
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env (opcional)
```dosini
APP_NAME=Dev_teste

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=dev_teste
DB_USERNAME=root
DB_PASSWORD=root

```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container app com o bash
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Suba as migrates
```sh
php artisan migrate
```

Acesse o projeto
[http://localhost:8989](http://localhost:8989)


<hr>

### Lista de ordens de serviço (criar e exclui ordens)
<img width="100%" src="https://github.com/joaocoutod/laravel-test-backend/blob/f08f7182fe049d3b99848f87121276dc8a20b86d/public/img/img_home.PNG" alte="home">


### Solicita Serviço
<img width="100%" src="https://github.com/joaocoutod/laravel-test-backend/blob/f08f7182fe049d3b99848f87121276dc8a20b86d/public/img/img_inserir_solicitacao.PNG" alte="home">

<hr>

### Lista de Clientes (cria, edita e exclui clientes)
<img width="100%" src="https://github.com/joaocoutod/laravel-test-backend/blob/f08f7182fe049d3b99848f87121276dc8a20b86d/public/img/img_clientes.PNG" alte="clientes">


### Criar Novo Cliente
<img width="100%" src="https://github.com/joaocoutod/laravel-test-backend/blob/f08f7182fe049d3b99848f87121276dc8a20b86d/public/img/img_inserir_clientes.PNG" alte="clinetes">

<hr>

### Lista de Serviços (cria, edita e exclui clientes)
<img width="100%" src="https://github.com/joaocoutod/laravel-test-backend/blob/f08f7182fe049d3b99848f87121276dc8a20b86d/public/img/img_clientes.PNG" alte="serviços">


### Criar Novo Serviço
<img width="100%" src="https://github.com/joaocoutod/laravel-test-backend/blob/f08f7182fe049d3b99848f87121276dc8a20b86d/public/img/img_inserir_clientes.PNG" alte="serviços">
