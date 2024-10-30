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
