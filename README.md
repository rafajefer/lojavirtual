# Loja Virtual 2.0

Este projeto foi desenvolvido como parte de um estudo sobre o PHP (Ecommerce), seguindo o curso do mjailton.

---

## **Pré-requisitos**  

Antes de começar, certifique-se de ter os seguintes requisitos:  

- **PHP** 7.4  
- **MySQL** 5.7  

Ou, alternativamente, utilize **Docker** (recomendado):  

- **Docker** instalado em seu sistema  

---

## **Instalação e Configuração**  

1. **Clone o projeto:**  

```sh
git clone git@github.com:rafajefer/lojavirtual.git
```

```sh
cd lojavirtual/
```

2. **Crie o arquivo `Config.php` a partir do exemplo:**  

```sh
cp .docker/Config.sample.php classes/Config.php
```

3. **Crie o arquivo `.htaccess.php` a partir do exemplo:**  

```sh
cp .docker/.htaccess.sample .htaccess
```
```sh
cp .docker/admin/.htaccess.sample admin/.htaccess
```

4. **Suba os containers do projeto:**  

```sh
docker compose up -d
```

---

## **Acessando a Aplicação**  

Após a inicialização, a aplicação estará disponível em:  

- **Aplicação:** [http://localhost:8000](http://localhost:8000)  

### **Área Administrativa**  

- **URL:** [http://localhost:8000/admin](http://localhost:8000/admin)  
- **Usuário:** `john.doe@email.com.br`  
- **Senha:** `123mudar`  

### **PhpMyAdmin**  

- **URL:** [http://localhost:8001](http://localhost:8001)  
- **Usuário:** `root`  
- **Senha:** `root`  

---

## **Comandos Úteis**  

### **Gerenciamento do Docker**  

- Acessar o container:  
```sh
docker compose exec server bash
```
- Acessar o container via root
```sh
docker exec -u root -it server bash
```

- Parar os containers:  
```sh
docker compose down
```
- Acessar o banco de dados via terminal:  
```sh
docker exec -it db mysql -u root -proot lojavirtual
```

### **Erros comuns**  
- Caso receba erro ao da build .docker/mysql_data/lojavirtual: permission denied
```sh
sudo chown -R $USER:$USER .docker/mysql_data/
```

- Caso receba erro de containers já criados
```sh
docker rm server db phpmyadmin
```
