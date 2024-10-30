# PONTIFÍCIA UNIVERSIDADE CATÓLICA DE MINAS GERAIS
## CURSO SUPERIOR DE TECNOLOGIA EM REDES DE COMPUTADORES - EAD

# RELATÓRIO TÉCNICO
## Desenvolvimento de Sistema para Redes de Computadores

**Integrantes do grupo:**
- Débora Duarte
- Diego Duarte
- Gabriel Amaral
- Marcelo Oliveira
- Gabriel Dias
- Patrick Niemayer

### 2024

---

## Sumário
1. [INTRODUÇÃO](#introdução)  
   1.1 [Contextualização](#contextualização)  
   1.2 [Justificativa](#justificativa)  
   1.3 [Objetivo Geral](#objetivo-geral)  
   1.4 [Objetivos Específicos](#objetivos-específicos)  
   
2. [Problema](#problema)  
   2.1 [Registro da reunião com o parceiro](#registro-da-reunião-com-o-parceiro)  
   2.2 [Descrição do problema](#descrição-do-problema)  
   
3. [Estudo de Mercado](#estudo-de-mercado)  
   3.1 [Soluções Existentes](#soluções-existentes)  
   3.2 [Comparação das Soluções](#comparação-das-soluções)  
   
4. [ANÁLISE DE PERFIL E DEMANDAS DOS USUÁRIOS](#análise-de-perfil-e-demandas-dos-usuários)  
   4.1 [Personas](#personas)  
   4.2 [Histórias de usuários](#histórias-de-usuários)  
   
5. [PROJETO DE INTERFACES](#projeto-de-interfaces)  
   
6. [ARQUITETURA TECNOLÓGICA DA SOLUÇÃO](#arquitetura-tecnológica-da-solução)  

---

## INTRODUÇÃO

### 1.1 Contextualização

Este trabalho tem como objetivo apresentar uma solução semi-automática, desenvolvida em Ansible, para a realização de backups de ativos de rede de forma simples e acessível. A solução foi projetada para ser utilizada por qualquer operador, independentemente do nível de experiência, por meio de uma interface GUI interativa e autoexplicativa. A empresa utilizada no projeto, para pensar no problema e apresentar a solução, é a **PROOF by SEK**, representada pelo Gerente do SOC, **Iran Ferreira**.

O problema identificado foi a necessidade de inserir manualmente certos dados em arquivos no servidor em bash, o que resultava em um processo demorado e sujeito a falhas. A solução proposta simplifica esse processo ao permitir que o backup seja iniciado com apenas um clique, automatizando as tarefas e reduzindo a complexidade para o usuário final. Como demonstração, a aplicação foi testada com dois dispositivos Fortigate, exemplificando a eficiência dessa abordagem.

### 1.2 Justificativa

A automação do preenchimento do arquivo *hosts.ini* no Ansible é uma iniciativa fundamental para o cliente, pois elimina um processo manual que, além de consumir tempo e recursos da equipe, está sujeito a erros. Atualmente, cada atualização do inventário de máquinas envolve riscos significativos de falhas humanas, o que pode comprometer a eficiência operacional e a execução de tarefas automatizadas.

A criação de uma interface HTML, integrada ao código em *C#* e *bash*, também contribui para simplificar e centralizar esse processo. Isso permite que, mesmo aqueles com menos experiência técnica, possam atualizar o inventário de forma rápida e segura, aumentando a produtividade e reduzindo o tempo necessário para implementar mudanças. Como resultado, as interrupções nas operações automatizadas são minimizadas.

Em resumo, essa automação traz uma melhoria substancial para a eficiência do ambiente de TI do cliente, proporcionando maior confiabilidade na gestão dos inventários de máquinas, elementos essenciais para a execução eficaz das tarefas.

### 1.3 Objetivo Geral
Principal objetivo do procedimento/ferramenta.
Backup de Ativos de segurança: Visando facilitar o uso dos usuários na automação
de ativos de segurança, desenvolvemos uma interface gráfica intuitiva e acessível.
Essa interface foi projetada para simplificar o processo de adição e gestão de ativos
de segurança, permitindo que usuários com diferentes níveis de habilidade técnica
possam interagir com as ferramentas de forma eficiente e prática.
Por meio dessa interface, conseguimos "esconder" a complexidade técnica
envolvida na configuração e manutenção dos sistemas de segurança. Em vez de
precisar mergulhar em detalhes complicados, o usuário pode realizar as tarefas
necessárias de maneira mais simples e direta, quase como se estivesse usando um
aplicativo comum. Essa abordagem não apenas melhora a experiência do usuário,
mas também garante que os ativos sejam configurados e monitorados corretamente,
seguindo as melhores práticas de segurança.
Além disso, ao reduzir a necessidade de intervenção manual e minimizar o risco de
erros, a interface gráfica contribui para uma proteção mais segura dos ativos. Com
essa solução, o processo de configurar e monitorar os ativos de segurança se torna
mais acessível e menos chance de erros, garantindo uma proteção mais
consistente. A interface também ajuda a economizar tempo e recursos, tornando a
segurança geral mais eficiente sem complicar o trabalho dos usuários.


### 1.4 Objetivos Específicos

1.4 Objetivos Específicos
Objetivos Específicos
No desenvolvimento e implementação de um sistema de gerenciamento
automatizado utilizando Ansible, a integração com scripts Bash, e a interface com
um backend em C#, é essencial definir objetivos específicos para assegurar que o
sistema seja robusto, eficiente e fácil de usar. Abaixo estão os pontos específicos
que queremos alcançar e o caminho detalhado para o desenvolvimento de cada um.
Configuração Inicial do Ambiente Ansible
Pontos Específicos:
● Instalar e configurar o Ansible em um ambiente Linux, com a versão
específica necessária (por exemplo, Ansible 2.9.27).
● Garantir que todos os componentes necessários (bibliotecas, módulos, e
collections) sejam corretamente instalados e configurados.
Caminho para Desenvolvimento:
● Instalação do Ansible: Utilizar pip para instalar a versão exata do Ansible
necessária para o ambiente. Caso surjam problemas, como o comando
ansible não sendo encontrado, ajustes serão feitos no PATH ou
reconfiguração do ambiente será necessária.
● Configuração do ansible.cfg: Criar e configurar o arquivo ansible.cfg para
definir os caminhos de inventário, módulos, plugins, e logs. O arquivo deve
estar localizado em um diretório apropriado (como /etc/ansible/ para
configurações globais ou no diretório do projeto para configurações
específicas).
● Instalação de Collections: Criar um arquivo requirements.yml e utilizar o
comando ansible-galaxy para instalar todas as collections necessárias,
garantindo que o ambiente esteja preparado para o gerenciamento de
dispositivos como firewalls Fortinet e outros.
Criação e Gerenciamento do Inventário Ansible
Pontos Específicos:
● Desenvolver uma solução para adicionar e gerenciar hosts no inventário
Ansible, permitindo uma inserção fácil e automatizada de novos dispositivos.
● Garantir que o inventário seja bem organizado e que as informações críticas
(como IPs, tokens de acesso, etc.) sejam armazenadas de forma segura e
acessível.
Caminho para Desenvolvimento:
● Criação do Arquivo hosts.ini: Estruturar o arquivo de inventário em grupos de
hosts, como [fw-fgt], com todas as variáveis necessárias definidas para cada
host. Assegurar que o arquivo esteja formatado corretamente para evitar
erros de parsing pelo Ansible.
● Desenvolvimento de Script Bash para Inserção de Hosts: Criar um script Bash
que solicita ao usuário as informações necessárias (nome do host, IP, token
de acesso, etc.) e adiciona esses hosts ao arquivo de inventário de forma
automatizada. O script também deve verificar a existência de grupos e
adicioná-los se necessário.
Desenvolvimento e Execução de Playbooks Ansible
Pontos Específicos:
● Escrever e executar playbooks Ansible para realizar tarefas automatizadas,
como backup de configurações de dispositivos de rede.
● Garantir que os playbooks sejam configurados corretamente para utilizar as
variáveis e conexões definidas no inventário e no ansible.cfg.
Caminho para Desenvolvimento:
● Escrita de Playbooks: Criar playbooks específicos que utilizam módulos como
fortios_monitor_fact para interagir com dispositivos Fortinet. Esses playbooks
devem ser capazes de realizar tarefas como backup de configurações e
devem estar configurados para se conectar aos dispositivos usando métodos
seguros (httpapi, SSL, etc.).
● Testes e Validação: Executar os playbooks utilizando o comando
ansible-playbook, especificando o inventário correto. Validar a execução
verificando logs e saídas para garantir que as operações foram realizadas
com sucesso.
Integração com Backend C# e Interface Web
Pontos Específicos:
● Desenvolver uma integração entre um backend em C# e scripts Bash para
automatizar a inserção de hosts no inventário Ansible, facilitada por uma
interface web em HTML.
● Criar uma interface de usuário intuitiva que permita a inserção de novos hosts
através de um formulário HTML, com os dados sendo processados pelo
backend em C#.
Caminho para Desenvolvimento:
● Desenvolvimento do Backend em C#: Criar um backend em C# que utilize a
classe Process para executar scripts Bash. Este backend receberá dados via
HTTP POST de uma interface HTML e passará essas informações para o
script Bash, que fará a inserção no inventário Ansible.
● Criação da Interface HTML: Desenvolver uma página HTML com um
formulário que capture as informações necessárias (nome do host, IP, token
de acesso, etc.) e as envie ao backend C# para processamento. A interface
deve ser simples e permitir feedback ao usuário sobre o sucesso ou falha da
operação.
● Integração e Testes: Testar a integração completa para garantir que a
interface web, o backend C#, e os scripts Bash trabalham juntos sem
problemas, realizando a inserção de hosts no inventário Ansible de forma
automatizada e eficiente.

## Problema

### 2.1 Registro da reunião com o parceiro

![image](https://github.com/user-attachments/assets/2a2cea0c-fb69-492a-be3e-e7abc46a9f59)


### 2.2 Descrição do problema

Descrição do problema:
Ao inserir um host no arquivo de inventário do Ansible, alguns problemas podem
surgir, especialmente se o processo não for automatizado corretamente ou se
houver falhas na configuração. Aqui estão os principais problemas que você pode
enfrentar:
1. Sintaxe do arquivo de inventário
Erro de sintaxe: Se o arquivo de inventário não seguir o formato correto (por
exemplo, falta de colchetes, uso inadequado de espaços ou tabulações), o Ansible
não conseguirá interpretar corretamente os hosts e grupos.
Campos incorretos: Colocar informações no lugar errado ou não formatar
corretamente pode gerar problemas na execução do playbook.
2. Hosts duplicados
Entradas duplicadas: Inserir o mesmo host mais de uma vez no inventário pode
causar comportamento inesperado, como o Ansible tentando configurar o mesmo
host várias vezes ou conflitos de variáveis de grupo.
3. Permissões de arquivo
Permissão inadequada no arquivo hosts.ini: Se o script ou o usuário que adiciona
os hosts não tiver permissões adequadas para editar o arquivo, o processo de
adição falhará.
Permissões de execução SSH: O Ansible precisa se conectar via SSH aos hosts.
Se as permissões de chaves SSH ou configurações de autenticação não forem
configuradas corretamente, o acesso ao host será negado.
4. Falta de validação de entradas
Endereços IP ou nomes de host incorretos: Inserir um endereço IP ou nome de
host incorreto ou que não seja resolvível resultará em falhas ao tentar se conectar
ao host.
Formato incorreto de variáveis: Quando adicionar variáveis associadas ao host, o
formato incorreto pode causar erros durante a execução dos playbooks.
5. Conflito de grupos
Conflitos de grupos: Adicionar um host a múltiplos grupos com diferentes variáveis
pode gerar conflito de configurações. O Ansible segue uma hierarquia para resolver
variáveis conflitantes, mas isso pode causar comportamento inesperado.
6. Conectividade com o host
Problemas de rede ou firewall: Mesmo que o host seja adicionado corretamente,
se houver problemas de conectividade de rede, firewall, ou outras restrições, o
Ansible não conseguirá se conectar ao host.
7. Ordem de execução
Adição fora de ordem: Em inventários dinâmicos ou quando há scripts
automatizando a inserção, a ordem de execução pode ser um problema se alguns
hosts precisarem ser configurados antes de outros.
8. Inventário dinâmico mal configurado
Se estiver utilizando um inventário dinâmico, erros na configuração podem impedir
o Ansible de detectar ou adicionar novos hosts corretamente.
A validação do arquivo e do formato é fundamental, e o uso de scripts que tratem
esses erros automaticamente pode ajudar a mitigar esses problemas.

## Estudo de Mercado

### 3.1 Soluções Existentes
No mercado de TI, existem várias ferramentas e soluções que visam automatizar o
gerenciamento de infraestrutura, semelhantes ao projeto desenvolvido. Essas
ferramentas oferecem funcionalidades para a gestão de dispositivos de rede,
automação de tarefas repetitivas, e integração com diversas tecnologias para
garantir operações eficientes e seguras. Abaixo estão algumas das principais
ferramentas que foram identificadas como semelhantes ao projeto desenvolvido.
Ansible
Descrição:
● Ansible, desenvolvido pela Red Hat, é uma ferramenta de automação de TI
amplamente utilizada. Ela é conhecida pela sua simplicidade e por não exigir
agentes nos sistemas gerenciados. Ansible utiliza arquivos de configuração
YAML para definir "playbooks", que são executados para realizar tarefas
como configuração de sistemas, deploy de aplicações, e orquestração de
processos complexos.
Funcionalidades Principais:
● Automação de Configuração: Permite a configuração automatizada de
servidores, dispositivos de rede e aplicativos.
● Orquestração de Infraestrutura: Coordena o funcionamento de vários
sistemas para realizar tarefas complexas.
● Sem Agentes: Ansible utiliza uma abordagem sem agentes, usando SSH
para comunicação, o que simplifica a administração.
Comparação com o Projeto Desenvolvido:
● O projeto desenvolvido utiliza Ansible como a principal ferramenta de
automação. No entanto, a adição de um backend em C# para interagir com
scripts Bash e uma interface HTML para gerenciamento via web oferece uma
camada de facilidade de uso que pode não estar presente em
implementações típicas de Ansible.
Puppet
Descrição:
● Puppet é outra ferramenta de automação de configuração que, ao contrário
do Ansible, utiliza uma abordagem baseada em agentes. Puppet permite a
definição do estado desejado de uma infraestrutura e garante que os
sistemas gerenciados mantenham esse estado ao longo do tempo.
Funcionalidades Principais:
● Gerenciamento de Configuração: Puppet permite a automação da
configuração e a manutenção do estado desejado em toda a infraestrutura.
● Sistema de Agentes: Requer a instalação de agentes nos sistemas
gerenciados para aplicar e verificar as configurações.
● Escalabilidade: É altamente escalável e utilizado em ambientes corporativos
grandes e complexos.
Comparação com o Projeto Desenvolvido:
● Embora Puppet seja poderoso, o projeto desenvolvido optou por Ansible
devido à sua simplicidade e abordagem sem agentes, facilitando a
implementação em ambientes onde a instalação de agentes pode ser difícil
ou indesejável.
Chef
Descrição:
● Chef é uma ferramenta de automação que utiliza uma abordagem baseada
em código para gerenciar e configurar infraestruturas. Assim como Puppet,
Chef utiliza uma arquitetura baseada em agentes, onde os "recipes" (scripts)
são escritos em Ruby para definir a configuração desejada.
Funcionalidades Principais:
● Infraestrutura como Código (IaC): Chef permite que toda a infraestrutura
seja descrita como código, facilitando a replicação e o versionamento.
● Automação de Configuração: Configura automaticamente servidores e
aplicativos de acordo com as receitas definidas.
● Flexibilidade: Chef é altamente flexível, mas essa flexibilidade vem com a
complexidade de aprender Ruby e a arquitetura do Chef.
Comparação com o Projeto Desenvolvido:
● Chef oferece robustez e flexibilidade, mas sua curva de aprendizado pode ser
uma barreira. O projeto desenvolvido com Ansible oferece uma alternativa
mais acessível, com YAML em vez de Ruby, e integrações personalizadas
para facilitar a operação.
SaltStack
Descrição:
● SaltStack é uma ferramenta de automação que oferece alta velocidade e
escalabilidade. Utiliza um sistema de "minions" (agentes) que se comunicam
com o servidor central (o "master") para executar comandos remotos,
automatizar tarefas e aplicar configurações.
Funcionalidades Principais:
● Execução Rápida de Comandos: Permite a execução quase instantânea de
comandos em múltiplos servidores.
● Arquitetura Mestre-Minion: Utiliza uma arquitetura mestre-minion para
gerenciar a infraestrutura.
● Modularidade: SaltStack é modular e pode ser adaptado para atender a
necessidades específicas.
Comparação com o Projeto Desenvolvido:
● SaltStack é semelhante ao Ansible em termos de funcionalidades, mas o
projeto desenvolvido optou pelo Ansible por sua simplicidade e por não exigir
a instalação de agentes. SaltStack pode ser mais adequado em ambientes
onde a velocidade de execução de comandos é crítica.
Terraform
Descrição:
● Terraform, desenvolvido pela HashiCorp, é uma ferramenta de Infraestrutura
como Código (IaC) que permite o provisionamento e gerenciamento de
infraestruturas complexas através de código declarativo. Embora não seja
focado exclusivamente na automação de configuração, como Ansible, Puppet
ou Chef, Terraform é amplamente utilizado para gerenciar ambientes em
nuvem.
Funcionalidades Principais:
● Provisionamento de Infraestrutura: Terraform permite a criação e
gerenciamento de infraestrutura em várias plataformas de nuvem, como AWS,
Azure e Google Cloud.
● Destruição e Recriação Controladas: Terraform pode destruir e recriar
ambientes de forma controlada, garantindo que a infraestrutura permaneça
consistente com a configuração declarada.
● Multi-Nuvem e Multi-Provedor: Terraform pode gerenciar múltiplos
provedores de nuvem em um único arquivo de configuração.
Comparação com o Projeto Desenvolvido:
● Enquanto Terraform é ideal para o provisionamento inicial e gerenciamento de
infraestrutura, o projeto desenvolvido com Ansible foca mais na configuração
contínua e na automação de tarefas dentro dessa infraestrutura,
complementando ferramentas como Terraform.

Ferramentas como Ansible, Puppet, Chef, SaltStack, e Terraform foram analisadas, comparando suas funcionalidades com o projeto desenvolvido.

### 3.2 Comparação das Soluções

| Critério               | Ansible                | Puppet               | Chef               | SaltStack           | Terraform           |
|------------------------|------------------------|----------------------|--------------------|---------------------|---------------------|
| Abordagem              | Sem agentes            | Baseado em agentes   | Baseado em agentes | Baseado em agentes  | Sem agentes         |
| Configuração           | Simples, sem agentes   | Requer instalação de agentes | Requer instalação de agentes | Requer instalação de agentes | Código declarativo  |
| Linguagem              | YAML                   | Puppet DSL           | Ruby               | YAML, Jinja         | HCL                 |
| Facilidade de Uso      | Muito alta             | Média                | Baixa              | Alta                | Alta                |
| Escalabilidade         | Alta                   | Alta                 | Alta               | Alta                | Alta                |
| Automação              | Configuração contínua  | Manutenção contínua  | Automação de configuração | Automação de configuração | Provisionamento inicial |
| Curva de Aprendizado   | Baixa                  | Média                | Alta               | Média               | Média               |
| Flexibilidade          | Alta                   | Alta                 | Alta               | Alta                | Alta                |

---

4. ANÁLISE DE PERFIL E DEMANDAS DOS USUÁRIOS
   
4.1 Personas
   
Nome: Gabriel Luiz

Faixa etária: 18-30 anos

Cargo ou papel no contexto do sistema: Analista de Cibersegurança Jr

Objetivos e expectativas: Facilitar a inserção de novos hosts nas rotinas de backup, tornando o processo mais prático e acessível para todos os membros da equipe, independentemente do nível de experiência técnica.

Problemas ou desafios enfrentados: Muitos colaboradores não possuem familiaridade com o Ansible e com a interface de linha de comando (CLI) do ambiente, o que dificulta a participação no processo de inclusão de hosts nas rotinas de backup.

Habilidades técnicas e nível de experiência: Conhecimento básico em administração de servidores Linux, noções de automação com Ansible, experiência inicial com scripts Bash, e habilidades básicas de rede e segurança. Familiaridade com ferramentas de backup e infraestrutura, bem como conceitos de automação e orquestração.

Nome: José Marcos

Faixa etária: 18-30 anos

Cargo ou papel no contexto do sistema: Analista de Segurança da Informação Jr

Objetivos e expectativas: Melhorar a adição de novos hosts ao processo de backup, criando uma solução que seja mais intuitiva e fácil de usar por toda a equipe, independente de seu nível de conhecimento técnico.

Problemas ou desafios enfrentados: Parte dos colaboradores não tem experiência suficiente com Ansible ou com o uso da interface de linha de comando, o que torna o processo de inclusão de hosts mais difícil e restritivo.

Habilidades técnicas e nível de experiência: Conhecimento básico em gerenciamento de servidores Linux, noções iniciais de automação com Ansible e criação de scripts Bash, além de conceitos de redes e segurança. Experiência básica com ferramentas de backup e infraestrutura, com familiaridade com práticas de automação e gerenciamento de configuração.

Nome: Pedro Marcelo

Faixa etária: 18-30 anos

Cargo ou papel no contexto do sistema: Analista Jr de Segurança Cibernética

Objetivos e expectativas: Otimizar a inclusão de novos hosts nas rotinas de backup, desenvolvendo um método mais eficiente e acessível para todos os membros da equipe, independente do nível de habilidade técnica.

Problemas ou desafios enfrentados: Muitos colegas de equipe não possuem conhecimento profundo do Ansible ou de como operar a CLI, o que dificulta a participação na adição de hosts ao sistema de backup.
Habilidades técnicas e nível de experiência: Conhecimento fundamental sobre administração de servidores Linux, experiência inicial em Bash scripting, e habilidades de automação com Ansible. Noções gerais de segurança de redes, bem como familiaridade com ferramentas de backup e automação de infraestrutura.

4.2 Histórias de usuários

1. Problema com a Atualização do Backup Manual
Gabriel é um Analista de Cibersegurança Jr que recentemente foi responsável por incluir um novo servidor nas rotinas de backup da empresa. Como ele não estava familiarizado com a ferramenta Ansible e a linha de comando, Gabriel precisou seguir um processo manual extenso, consultando a documentação e solicitando ajuda de colegas mais experientes. Esse processo foi demorado e envolveu erros de configuração, atrasando a inclusão do servidor e afetando a confiabilidade do backup. Essa experiência destacou a necessidade de uma interface mais intuitiva para adicionar hosts, algo que pudesse ser utilizado por todos da equipe, mesmo sem conhecimento técnico profundo.

2. Falta de Acesso à CLI durante uma Emergência
José Marcos estava de plantão quando um novo servidor crítico precisou ser adicionado ao backup devido a uma falha inesperada em outro servidor. No entanto, ele não conseguiu acessar a CLI do ambiente remotamente, pois a VPN apresentava instabilidade. Como José não tinha uma alternativa de fácil acesso para adicionar o host ao inventário do Ansible, ele foi forçado a aguardar até que o problema da VPN fosse resolvido, o que resultou em um risco elevado de perda de dados. Essa situação deixou claro que uma ferramenta acessível e simplificada, disponível fora da CLI, poderia prevenir situações semelhantes no futuro.

3. Complexidade Técnica Impede a Automação
Pedro Marcelo se deparou com uma situação frustrante ao tentar automatizar a inclusão de um conjunto de novos servidores em produção nas rotinas de backup. Apesar de já ter noções de Ansible, ele achou o processo complicado, especialmente devido à falta de prática com a sintaxe da ferramenta e a necessidade de interagir diretamente com o hosts.ini. Isso levou a uma configuração errada que não foi detectada até que uma falha de hardware ocorresse. Como resultado, a empresa acabou não tendo backup de alguns servidores, o que gerou a perda parcial de dados. Esse episódio mostrou a importância de criar uma ferramenta mais fácil, que reduzisse a chance de erros humanos durante a configuração.

4. Dependência de Especialistas para Tarefas Simples
Carla, uma Analista de Cibersegurança, frequentemente precisava adicionar novos servidores ao backup. Contudo, sempre que algum analista Jr da equipe precisava realizar essa tarefa, havia uma dependência constante dos membros mais experientes que conheciam o Ansible e a CLI. Essa dependência atrasava o processo e aumentava a carga de trabalho dos especialistas. A criação de uma ferramenta amigável que automatizasse essa tarefa ajudaria a reduzir a sobrecarga e permitiria que analistas Jr, como Pedro e José, pudessem contribuir sem assistência contínua.

5. PROJETO DE INTERFACES

![image](https://github.com/user-attachments/assets/bc2e215a-d260-42f7-9f5f-24708ee30ee1)

![image](https://github.com/user-attachments/assets/52335b98-c3ed-44a5-9b9c-40d461006d11)


7. ARQUITETURA TECNOLÓGICA DA SOLUÇÃO

1. Infraestrutura Física e Ambiente de Implementação

    Servidor Web: A aplicação é hospedada em um servidor Linux que possui o Apache instalado. Esse servidor é responsável por servir as páginas HTML e processar as requisições PHP.
    Servidor de Automação: O mesmo servidor também executa scripts Bash que manipulam o arquivo de configuração hosts.ini do Ansible, facilitando a inclusão de novos hosts para as rotinas de backup.

2. Infraestrutura de Software

    Front-End:
        As interfaces para o usuário são desenvolvidas em HTML, oferecendo uma interface amigável para interagir com o sistema.
        Arquivos como login.html, index.php e logout.php fazem parte da camada de apresentação, que permite aos usuários acessarem e autenticarem-se na aplicação.

    Back-End:
        PHP: Os arquivos PHP (login.php, process.php, logout.php) são responsáveis pelo processamento das requisições do lado do servidor. Eles tratam a lógica de autenticação e conectam a interface com as funcionalidades de backend.
        Bash Script: O arquivo process.php chama scripts Bash para automatizar a inserção de novos hosts no Ansible. Essa integração permite que um comando seja executado para adicionar entradas no arquivo hosts.ini, onde o Ansible armazena o inventário de hosts.
        Arquivo hosts.ini: Este é o inventário do Ansible que mantém a lista de hosts gerenciados. Ele é atualizado automaticamente pelos scripts Bash chamados pelo PHP.

3. Camada de Segurança

    Autenticação: O arquivo login.php gerencia as credenciais de acesso ao sistema. Ele é responsável pela validação do login e pelo controle de sessão, garantindo que apenas usuários autorizados possam interagir com as funções de administração, como adicionar hosts.
    Senhas no Código: As senhas estão armazenadas em login.php, o que não é a melhor prática. Para uma solução mais segura, recomenda-se utilizar um banco de dados seguro para armazenar essas credenciais e implementar criptografia.

4. Comunicação e Integração entre Componentes

    Fluxo de Operação:
        Autenticação: O usuário acessa a página de login (login.html), onde suas credenciais são verificadas pelo arquivo login.php.
        Inclusão de Hosts: Uma vez autenticado, o usuário pode acessar a página index.php, onde é fornecida uma interface para adicionar novos hosts.
        Execução do Bash: Quando um novo host é adicionado, process.php executa um script Bash que insere o host no arquivo hosts.ini do Ansible, facilitando a automação das rotinas de backup.

5. Camada de Rede

    Serviço Local: Toda a aplicação parece estar rodando em um ambiente local, acessível apenas através do localhost ou rede interna. Isso limita o acesso a usuários autorizados no ambiente físico, aumentando a segurança.

6. Componentes de Armazenamento

    Arquivo hosts.ini: É onde os dados de configuração do Ansible são armazenados. Este arquivo é modificado dinamicamente para incluir novos hosts, permitindo que a rotina de backup seja facilmente atualizada.

7. Segurança e Boas Práticas

    Autenticação Segura: É importante reforçar a segurança da autenticação. Em vez de armazenar credenciais no arquivo PHP, considere usar um banco de dados, além de hashing seguro das senhas.
    Permissões de Arquivo: Certifique-se de que as permissões dos arquivos (como hosts.ini e os scripts Bash) estejam restritas, para evitar que usuários não autorizados modifiquem o conteúdo.






