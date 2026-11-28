## Requisitos gerais das Requests:
No Header:
```
Authorization: Bearer {seu_access_token}
Accept: application/json
Content-Type: application/json
```
- O `Authorization` só é necessário em rotas autenticadas

## Rotas não Autenticadas
- `POST` `/api/login` -> Autenticação de funcionário
    Body:
    ```
        "email": {required, email},
        "senha": {required, string}
    ```
    Responses:
    - `200`: 
        ```
        "access_token": {string}, // Deve ser incluso no Authorization: Bearer [...]
        "token_type": {Bearer},
        "funcionario": {
            // Info sobre o funcionário logado
            "funcionario_id": {id},
            "nome": {string},
            "email": {email}
        }
        ```
    - `400`:
        ```
        "success": false,
        "message": {string} // info sobre o erro
        ```

## Rotas Autenticadas

### Doadores:
- `POST` `/api/doadores` -> Criação de doadores
    Body:
        ```
            "pessoa": {required, array} {
            "nome_pessoa": {required, string},
            "cpf": {required, string},
            "email": {required, string}
        },
        "doador": {required, array} {
            "telefone": {required, string}
        }
        ```
    Responses:
    - `200`:
        ```
        "success": true,
        "doador_criado": {
            "doador_id": {integer},
            "telefone": {string},
            "funcionario_id": {integer},
            "pessoa_id": {integer}
        }
        ```
    - `400`:
        ```
        "success": false,
        "message": {string} // info sobre o erro
        ```
    - `422`:
        ```
        "message": {string}, // Erro de validação
        "errors": {
            "campo": [
                {string}
            ]
        }
        ```

### Fichas de Doação
- `POST` `/api/fichas` -> Criação das fichas
    Supõe que o doador já foi registrado usando `POST` `/api/doadores`
    Body:
    ```
        "doador_id": {required, string}, // Enviado como CPF
        "nome_acervo": {required, string},
        "categoria_acervo": {required, (pintura, escultura, gravura, fotografia, artefato, arqueologico, minerais, astrologia)}, // Enum Categoria
        "estado_conservacao": {optional, (muito bom, bom, mediano, ruim, muito ruim)}, // Enum EstadoConservacao
        "qnt_itens": {optional, integer},
        "dt_incorporacao": {optional, nullable, date},
        "dt_recebimento": {optional, nullable, date},
        "confirmado_em": {optional, nullable, date},
        "cor": {optional, nullable, string},
        "largura": {optional, nullable, decimal:1,2},
        "altura": {optional, nullable, decimal:1,2},
        "descricao": {optional, nullable, string, max:50000}
    ```
    Responses:
    - `200`:
        ```
        "success": true, // ou false quando falha
        "criado": "Ficha atualizada com sucesso!"
        ```
    - `422`:
        ```
        "message": {string}, // Erro de validação
        "errors": {
            "campo": [
                {string}
            ]
        }
        ```
