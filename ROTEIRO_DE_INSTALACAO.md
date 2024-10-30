1. Clone o repositório do projeto


```
git clone https://github.com/gabrielcy-maker/puc-mg_eixo3_GP4.git
```

```
cd puc-mg_eixo3_GP4
```

2. Configuração do Ansible

Certifique-se de que o Ansible esteja corretamente configurado em seu ambiente e que as bibliotecas do Fortigate estejam instaladas:

```
sudo apt install ansible
```
```
ansible-galaxy collection install fortinet.fortios
```
3. Configuração do Servidor Web

Instale um servidor web (Apache ou Nginx) e o PHP para rodar a interface de login e o processo de inclusão de hosts:

```
sudo apt install apache2 php libapache2-mod-php
```

4. Configuração da Interface Web

Coloque os arquivos do projeto na pasta /var/www/html (ou equivalente):

```
sudo cp -r * /var/www/html/
```

5. Configuração do Arquivo de Inventário do Ansible

Verifique o arquivo de inventário do Ansible (por padrão, hosts.ini) para garantir que os novos hosts sejam adicionados corretamente:

```
nano /etc/ansible/hosts.ini
```

6. Permissões

Certifique-se de que as permissões para o arquivo de inventário e scripts PHP estejam corretas:

```
sudo chown -R www-data:www-data /var/www/html
```
```
sudo chmod -R 755 /var/www/html
```
7. Acesso à Interface

Agora, você pode acessar a interface web via navegador:

🌐 http://seu-ip/login.php

Insira seu nome de usuário e senha para adicionar novos hosts ao inventário do Ansible.

