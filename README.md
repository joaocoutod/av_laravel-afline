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


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=Dev_teste
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=dev_teste
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
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

### Lista de ordens de serviço (criar e exlui ordens)
<img width="100%" src="https://github.com/joaocoutod/laravel-test-backend/blob/b55e6d28efc0d3c52ac62587dac59c76708905bb/public/img/img_home.PNG" alte="home">


### Solicita Serviço
<img width="100%" src="https://github.com/joaocoutod/laravel-test-backend/blob/f0eca03830718a444c1629766fcbfba8c27ea067/public/img/img_inserir_solicitacao.PNG" alte="home">

<hr>

### Lista de Clientes (cria, edita e exlui clientes)
<img width="100%" src="https://github.com/joaocoutod/laravel-test-backend/blob/b55e6d28efc0d3c52ac62587dac59c76708905bb/public/img/img_clientes.PNG" alte="clientes">


### Criar Novo Cliente
<img width="100%" src="https://github.com/joaocoutod/laravel-test-backend/blob/f0eca03830718a444c1629766fcbfba8c27ea067/public/img/img_inserir_clientes.PNG" alte="clinetes">

<hr>

### Lista de Serviços (cria, edita e exlui clientes)
<img width="100%" src="https://github.com/joaocoutod/laravel-test-backend/blob/b55e6d28efc0d3c52ac62587dac59c76708905bb/public/img/img_clientes.PNG" alte="serviços">


### Criar Novo Serviço
<img width="100%" src="https://github.com/joaocoutod/laravel-test-backend/blob/f0eca03830718a444c1629766fcbfba8c27ea067/public/img/img_inserir_clientes.PNG" alte="serviços">
