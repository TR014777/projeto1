# 🏢 Painel Administrativo

Este projeto é um **site institucional** com um **painel administrativo** que permite gerenciar **produtos**, **fornecedores** e **clientes** por meio de operações **CRUD** (Create, Read, Update, Delete).  
Além disso, o painel inclui um **dashboard** com uma visão geral dos dados cadastrados.

---

## 🚀 Funcionalidades

### 🌐 Site Institucional
- Página inicial apresentando a empresa/instituição.
- Seções informativas (sobre, serviços, contato, etc.).
- Design responsivo e moderno.

### 🛠️ Painel Administrativo
- **Login de acesso** (restrito a administradores).
- **Dashboard interativo** com estatísticas gerais.
- **Gerenciamento completo (CRUD)** de:
  - 🧾 Produtos  
  - 🏭 Fornecedores  
  - 👥 Clientes  

---

## 🗄️ Estrutura do Banco de Dados

O projeto utiliza **MySQL** como sistema de gerenciamento de banco de dados.  
Antes de iniciar, é necessário criar o banco de dados e suas tabelas.

### 🔧 Configuração do Banco de Dados

1. Acesse o **phpMyAdmin** pelo XAMPP.  
2. Crie um novo banco de dados com o nome:

```sql
CREATE DATABASE projeto1;
```

3. Selecione o banco projeto1 e execute os seguintes comandos SQL:

```sql
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL,
    preco DECIMAL(10,2) NOT NULL
);

CREATE TABLE fornecedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    empresa VARCHAR(150),
    telefone VARCHAR(20),
    email VARCHAR(100)
);

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cidade VARCHAR(100),
    estado VARCHAR(2)
);
```

---

### ⚙️ Tecnologias Utilizadas

- PHP – Backend e integração com MySQL

- MySQL – Banco de dados relacional

- Bootstrap – Estilização responsiva

- XAMPP – Ambiente de desenvolvimento com Apache e MySQL

---

### 💻 Como Executar o Projeto

1. Instalar o XAMPP

Baixe e instale o XAMPP.
Durante a instalação, mantenha os serviços Apache e MySQL.
 
2. Clonar ou Copiar o Projeto

Coloque a pasta do projeto dentro do diretório:

```makefile
C:\xampp\htdocs\
```

Exemplo:
```makefile
C:\xampp\htdocs\projeto1\
```

3. Iniciar o server

Abra o XAMPP Control Panel e inicie:

- ✅ Apache
- ✅ MySQL

4. Criar o Banco de Dados

Acesse o phpMyAdmin e execute os comandos SQL listados acima.

5. Configurar o Arquivo de Conexão

No projeto, edite o arquivo de conexão (exemplo: config/conexao.php) com as credenciais corretas:

```php
<?php
$conexao = mysqli_connect("localhost", "root", "");

if (!$conexao) {
    die("Conexão com o servidor falhou: " . mysqli_connect_error());
}

$bd = mysqli_select_db($conexao, "projeto1");

if (!$bd) {
    die("Banco de dados não encontrado!");
}
?>
```

6. Acessar o Sistema

Abra o navegador e acesse:
- 🌍 Site Institucional: http://localhost/projeto1
- 🔐 Painel Administrativo: http://localhost/projeto1/admin

---