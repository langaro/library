# Livraria

## Descrição

O projeto Livraria é um sistema completo para gerenciamento de livros, onde usuários podem se registrar, logar, deslogar, cadastrar, editar, deletar e listar livros. Os livros podem ser filtrados e os resultados são paginados. Além disso, o projeto inclui exemplos de validação de dados utilizando métodos padrão e a biblioteca `laravel-data`. Também há uma integração com um serviço para ver o clima.

## Estrutura do Projeto

- `backend/` - Aplicação Laravel para a API.
- `frontend/` - Aplicação Angular para a interface do usuário.

## Funcionalidades

### Backend (Laravel)

- Registro de usuários
- Login e logout de usuários
- CRUD de livros (criar, listar, atualizar e deletar)
- Filtragem de livros por título, descrição, autor, número de páginas e data de publicação
- Paginação de resultados
- Validação de dados utilizando métodos padrão e `laravel-data`
- Integração com um serviço para ver o clima

### Frontend (Angular)

- Interface de usuário para interagir com a API
- Formulários para registro, login e CRUD de livros
- Listagem paginada e filtrada de livros

## Pré-requisitos

### Backend

- PHP >= 8.0
- Composer
- Banco de dados (MySQL, PostgreSQL, etc.)

### Frontend

- Node.js
- Angular CLI

## Instalação e Configuração

### Backend

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/livraria.git
   cd livraria/backend

2. Instale as dependências:
   ```bash
   composer install

3. Copie o arquivo .env.example para .env e configure as variáveis de ambiente:
   ```bash
   cp .env.example .env

4. Gere a chave da aplicação:
   ```bash
   php artisan key:generate

5. Configure o banco de dados no arquivo .env.


6. Execute as migrações e os seeders:
   ```bash
   php artisan migrate --seed
   
7. Inicie o servidor:
   ```bash
   php artisan serve

### Frontend

1. Navegue até o diretório do frontend:
   ```bash
   cd ../frontend

2. Instale as dependências:
   ```bash
   npm install

3. Inicie o servidor de desenvolvimento:
   ```bash
   ng serve
   
4. Acesse a aplicação no navegador em http://localhost:4200.

## Uso

### Endpoints da API

A API possui os seguintes endpoints principais:

```bash
   - POST /register - Registro de um novo usuário
   - POST /login - Login de usuário
   - POST /logout - Logout de usuário
   - GET /books - Listar livros com filtros e paginação
   - POST /books - Cadastrar um novo livro
   - PUT /books/{id} - Atualizar um livro existente
   - DELETE /books/{id} - Deletar um livro 
   ```
#### Os seeds da aplicação criarão um usuário com as credenciais abaixo e também alguns livros para testar a aplicação.
```bash
   E-mail: teste@library.com
   Senha: password
   ```

## Exemplos de Validação
A validação de dados é demonstrada utilizando dois métodos:

- Método Padrão - Utiliza as regras de validação diretamente no controlador.
- Laravel Data - Utiliza a biblioteca laravel-data para gerenciar e validar dados.


## Integração com Serviço de Clima
A aplicação inclui uma integração com um serviço externo para ver o clima. Esta funcionalidade pode ser encontrada no backend e serve como exemplo de como integrar serviços externos com o Laravel.