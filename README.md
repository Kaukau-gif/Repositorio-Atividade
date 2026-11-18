# 🛒 NexCode: e-commerce em PHP

E-commerce simples com **listagem de produtos** e **carrinho de compras**, desenvolvido em equipe na atividade de extensão *Dev+Git* da Unicesumar. O foco foi praticar desenvolvimento web com PHP e trabalho colaborativo com Git e GitHub.

## Funcionalidades

- **Listagem de produtos** carregada do banco de dados, com nome, preço e botão para adicionar ao carrinho
- **Carrinho na sessão:** o usuário navega pelo site sem perder os itens
- Ao adicionar um produto que já está no carrinho, a **quantidade aumenta**; se é novo, entra com quantidade inicial
- **Cálculo automático do total** com base nos itens e quantidades
- Tela de **login**

## Tecnologias

- PHP
- HTML e CSS
- MySQL (mysqli)
- Git, GitHub Desktop e GitHub Actions (workflow de CI)
- Render (configuração de deploy em `render.yaml`)

## Estrutura

```
frontend/   páginas: listagem (index), carrinho e login
backend/    conexão com o banco, busca de produtos e cálculo do carrinho
css/        estilos
render.yaml configuração de deploy no Render
```

## Como executar localmente

Requer PHP 8 ou mais recente.

```bash
php -S localhost:8000
```

Depois, abra `http://localhost:8000/frontend/` no navegador. Crie um banco MySQL e ajuste os dados de conexão em `backend/db.php`.

## Equipe

| Integrante | Papel |
|---|---|
| **Kauany Paula da Silva** | Líder da equipe |
| Pedro Rocha Reis | Desenvolvimento |
| Aline Rodrigues Lorkievicz | Desenvolvimento |
| Gustavo Lins | Desenvolvimento |
| Henrique Gustavo da Costa Lopes | Desenvolvimento |

## O que aprendi

- Organizar o trabalho de uma equipe com branches, commits e Git
- Separar frontend e backend em PHP
- Usar sessão para manter o estado do usuário

## Licença

Uso livre.
