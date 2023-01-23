### Sobre a NGestor
##### Não perca mais tempo procurando seu técnico.
Somos uma empresa de tecnologia voltada a simplificação de processos de gestão de ordem de serviços! Desde a criação até a conclusão do serviço, seja ele de telecons, prestação de serviços, entre outros.


##### Teste Full Stack Laravel
O objetivo deste teste é entendermos um pouco mais sobre seus conhecimentos de Frontend e Backend no Laravel.

##### Requisitos
- PHP 7.1+
- Laravel (Preferência 5.8+)
- Docker Engine

##### Orientações
Faça um fork deste projeto.

Para facilitar o seu desenvolvimento, nós disponibilizamos um ``docker-compose.yml`` com o serviços que utilizamos habitualmente no nosso dia a dia.

#### O Desafio
Simular o cadastro de um cliente e criar uma ordem de serviço para o mesmo.

##### Funcionalidade 1:
  - Permitir o cadastro de um CLIENTE com algumas características. 
  - O cadastro de um CLIENTE deve possuir:
  - Nome, e-mail, rua, número, complemento, bairro, cidade, estado;

Para que o cadastro ocorra deverá haver validações em dois níveis. Frontend e backend:
- 1 - nome, e-mail, rua, bairro, cidade e estado são campos obrigatórios;
- 2 - e-mail deverá ser validado;

##### Funcionalidade 2:
  - Contexto: Permitir visualização dos SERVIÇOS cadastrados.
    Os dados dos SERVIÇOS deverão ser carregados via request assíncrona. Esses dados deverão ser exibidos numa tabela e ao menos uma das colunas serem ordenáveis.
    Dados que deverão ser exibidos na tabela:
  - Nome do serviço;
  - Status (Ativo / Desativado)
  - Coluna para ações (remover).

##### Funcionalidade 3:
  - Contexto: permitir a remoção de um SERVIÇO via chamada assíncrona com atualização posterior da lista de SERVIÇOS.

##### Funcionalidade 4:
  - Contexto: Criação de uma ORDEM DE SERVICO que permita associação com um CLIENTE. Uma ORDEM DE SERVIÇO possui os seguintes campos:
  - Data Abertura (deverá ser selecionável);
  - Serviço (deverá ser selecionável);

##### Regras específicas sobre a criação de uma ORDEM DE SERVIÇO:

- Todos os campos da  ORDEM DE SERVIÇO são obrigatórios;


### Extras

- Usabilidade (A usabilidade das funcionalidades fica a cargo do desenvolvedor) :D


### Entrega
Deixar um repositório público e nos enviar por e-mail - o mesmo e-mail que foi enviado o teste.
