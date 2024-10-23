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

Facilitar o uso dos usuários na automação de ativos de segurança, desenvolvendo uma interface gráfica intuitiva e acessível. Essa interface foi projetada para simplificar o processo de adição e gestão de ativos de segurança, permitindo que usuários com diferentes níveis de habilidade técnica possam interagir com as ferramentas de forma eficiente e prática.

Por meio dessa interface, conseguimos "esconder" a complexidade técnica envolvida na configuração e manutenção dos sistemas de segurança. Em vez de precisar mergulhar em detalhes complicados, o usuário pode realizar as tarefas necessárias de maneira mais simples e direta.

### 1.4 Objetivos Específicos

- **Configuração Inicial do Ambiente Ansible**:
   - Instalar e configurar o Ansible em um ambiente Linux, com a versão necessária.
   - Garantir que todos os componentes necessários estejam configurados corretamente.

- **Criação e Gerenciamento do Inventário Ansible**:
   - Desenvolver uma solução para adicionar e gerenciar hosts no inventário Ansible.
   - Garantir que o inventário seja bem organizado e que as informações críticas sejam armazenadas de forma segura.

- **Desenvolvimento e Execução de Playbooks Ansible**:
   - Escrever e executar playbooks Ansible para realizar tarefas automatizadas.
   - Garantir que os playbooks utilizem as variáveis e conexões definidas no inventário.

- **Integração com Backend C# e Interface Web**:
   - Desenvolver uma integração entre um backend em C# e scripts Bash.
   - Criar uma interface web para facilitar a inserção de novos hosts.

---

## Problema

### 2.1 Registro da reunião com o parceiro

(*Conteúdo sobre a reunião*)

### 2.2 Descrição do problema

Ao inserir um host no arquivo de inventário do Ansible, alguns problemas podem surgir, especialmente se o processo não for automatizado corretamente. Exemplos incluem erros de sintaxe no arquivo de inventário, hosts duplicados, permissões inadequadas, e problemas de conectividade com o host.

---

## Estudo de Mercado

### 3.1 Soluções Existentes

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
