## Projeto de Algebra Linear

# Propósito do projeto:

Realizar o escaloamento e visualização de Col(A), Lin(A), N(A) e N(A^T) de uma matriz n x n, onde o usuário insere as dimensões e os valores da matriz, em seguida gera a matriz. Após isso, o usuário pode escolher entre escalonar a matriz e criar a imagem com as representações dos subespaços.

> ⚠️ **Atenção:** Certifique-se de ativar o ambiente virtual antes de executar scripts Python com os arquivos PHP.

## ✅ Requisitos

* Python 3.10+ instalado
* PHP instalado (Windows ou Linux)
* pip (gerenciador de pacotes Python)
* Virtualenv (recomendado)

---

## 💻 Ambiente Virtual Python

### Criar e ativar o ambiente virtual

**Windows:**

```bash
python -m venv venv
venv\Scripts\activate
```

**Linux/macOS:**

```bash
python3 -m venv venv
source venv/bin/activate
```

---

### Instalar dependências do `requirements.txt`

```bash
pip install -r requirements.txt
```

---

## 🐘 Instalar o PHP

### Windows:

1. Baixe o PHP em [https://windows.php.net/download/](https://windows.php.net/download/)
2. Extraia o conteúdo e adicione o caminho da pasta PHP à variável de ambiente `Path`
3. Verifique no terminal:

```bash
php -v
```

### Linux (Debian/Ubuntu):

```bash
sudo apt update
sudo apt install php
php -v
```

---

## 🌐 Rodar servidor local em `localhost:3000`

### Comando para iniciar o Servidor:

```bash
php -S localhost:3000
```

(O comando deve ser executado no diretório onde está seu arquivo `index.php` ou `escalona.php`.)

---

## 📁 Estrutura de Exemplo

O repositório pode ser clonado normalmente. Recomenda-se criar o ambiente virtual **dentro da pasta do projeto**, como abaixo:

```plaintext
Algebra-Linear/
├── venv/
├── index.php
├── escalona.php
├── main.py
├── requirements.txt
└── README.md
```

