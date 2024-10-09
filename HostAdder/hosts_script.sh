#!/bin/bash

# Caminho para o arquivo de inventário
INVENTORY_FILE="/opt/ansible/hosts.ini"

# Verificar se o arquivo de inventário existe e é gravável
if [ ! -w "$INVENTORY_FILE" ]; then
    echo "Erro: Arquivo de inventário não existe ou não tem permissão de escrita."
    exit 1
fi

# Receber informações dos argumentos
HOST_NAME=$(echo "$1" | sed 's/[^a-zA-Z0-9_-]//g')
ANSIBLE_HOST=$(echo "$2" | sed 's/[^0-9.]//g')
ACCESS_TOKEN=$(echo "$3" | sed 's/[^a-zA-Z0-9_-]//g')
HOST_ALIAS=$(echo "$4" | sed 's/[^a-zA-Z0-9_-]//g')

# Validar endereço IP
if ! [[ "$ANSIBLE_HOST" =~ ^([0-9]{1,3}\.){3}[0-9]{1,3}$ ]]; then
    echo "Erro: Endereço IP inválido."
    exit 1
fi

# Formatar a linha a ser adicionada
HOST_LINE="$HOST_NAME ansible_host=$ANSIBLE_HOST fortios_access_token=$ACCESS_TOKEN host_name=$HOST_ALIAS"

# Usar um arquivo temporário para gravar as mudanças
TEMP_FILE=$(mktemp)

# Verificar se o grupo [fw-fgt] existe no inventário
if grep -q "\[fw-fgt\]" "$INVENTORY_FILE"; then
    cat "$INVENTORY_FILE" > "$TEMP_FILE"
    echo "$HOST_LINE" >> "$TEMP_FILE"
    echo "Host adicionado ao grupo [fw-fgt] no inventário."
else
    cat "$INVENTORY_FILE" > "$TEMP_FILE"
    echo -e "\n[fw-fgt]" >> "$TEMP_FILE"
    echo "$HOST_LINE" >> "$TEMP_FILE"
    echo "Grupo [fw-fgt] criado e host adicionado ao inventário."
fi

# Substituir o arquivo de inventário com o arquivo temporário
mv "$TEMP_FILE" "$INVENTORY_FILE"

