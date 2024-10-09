#!/bin/bash

# Caminho para o arquivo de inventário
INVENTORY_FILE="/opt/ansible/hosts.ini"

# Receber informações dos argumentos
HOST_NAME=$1
ANSIBLE_HOST=$2
ACCESS_TOKEN=$3
HOST_ALIAS=$4

# Formatar a linha a ser adicionada
HOST_LINE="$HOST_NAME ansible_host=$ANSIBLE_HOST fortios_access_token=$ACCESS_TOKEN host_name=$HOST_ALIAS"

# Verificar se o grupo [fw-fgt] existe no inventário
if grep -q "\[fw-fgt\]" "$INVENTORY_FILE"; then
    # Adicionar o host ao grupo [fw-fgt]
    echo "$HOST_LINE" >> "$INVENTORY_FILE"
    echo "Host adicionado ao grupo [fw-fgt] no inventário."
else
    # Se o grupo [fw-fgt] não existir, criar o grupo e adicionar o host
    echo -e "\n[fw-fgt]" >> "$INVENTORY_FILE"
    echo "$HOST_LINE" >> "$INVENTORY_FILE"
    echo "Grupo [fw-fgt] criado e host adicionado ao inventário."
fi

