🌐 Projeto de Backup Automático de Fortigate com Ansible

Este projeto foi desenvolvido para facilitar o backup dos dispositivos Fortigate de maneira automatizada utilizando Ansible. Além disso, ele permite a inclusão dinâmica de hosts no arquivo de inventário do Ansible por meio de uma interface web amigável, com autenticação de login.
🚀 Funcionalidades Principais

    Backup Automático dos Fortigate:
    Utilizando as bibliotecas do Ansible, este projeto realiza backups automáticos dos dispositivos Fortigate, garantindo que as configurações críticas estejam sempre salvas e acessíveis.

    Interface de Login 🔑:
    Uma página de login foi criada para garantir que apenas usuários autorizados possam acessar o sistema. Ao realizar o login com sucesso, o usuário pode acessar a área de inclusão de hosts.

    Inclusão Automática de Hosts 🖥️:
    Após o login, o usuário é direcionado à página de gerenciamento de hosts, onde pode adicionar novos dispositivos Fortigate ao arquivo de inventário do Ansible. Isso facilita a automação do processo de inclusão de novos dispositivos para backup.

    Execução via Script Bash 📝:
    Quando um novo host é adicionado, o processo é automatizado por meio de um script PHP (process.php) que chama um script Bash. Este script formata a entrada e adiciona a linha necessária no arquivo de inventário do Ansible.

🛠️ Método de Instalação
1. Clone o repositório do projeto

bash

[git clone https://github.com/seu-usuario/seu-repositorio.git](https://github.com/gabrielcy-maker/puc-mg_eixo3_GP4.git)
cd puc-mg_eixo3_GP4

2. Configuração do Ansible

Certifique-se de que o Ansible esteja corretamente configurado em seu ambiente e que as bibliotecas do Fortigate estejam instaladas:

bash

sudo apt install ansible
ansible-galaxy collection install fortinet.fortios

3. Configuração do Servidor Web

Instale um servidor web (Apache ou Nginx) e o PHP para rodar a interface de login e o processo de inclusão de hosts:

bash

sudo apt install apache2 php libapache2-mod-php

4. Configuração da Interface Web

Coloque os arquivos do projeto na pasta /var/www/html (ou equivalente):

bash

sudo cp -r * /var/www/html/

5. Configuração do Arquivo de Inventário do Ansible

Verifique o arquivo de inventário do Ansible (por padrão, hosts.ini) para garantir que os novos hosts sejam adicionados corretamente:

bash

nano /etc/ansible/hosts.ini

6. Permissões

Certifique-se de que as permissões para o arquivo de inventário e scripts PHP estejam corretas:

bash

sudo chown -R www-data:www-data /var/www/html
sudo chmod -R 755 /var/www/html

7. Acesso à Interface

Agora, você pode acessar a interface web via navegador:

arduino

http://seu-ip/login.php

Insira seu nome de usuário e senha para adicionar novos hosts ao inventário do Ansible.
