Pequeno projeto criado, basta fazer o download, criar uma banco de dados chamado teste, editar o .env e rodar o comando 

php artisan migrate --seed

e as tabelas estarao criadas e populadas.

O sistema conta com 2 niveis de acesso aos produtos, o primeiro para usuarios, devem fazer login e possuem acesso ao index e a visualizar detalhes do produto, o admin tem acesso ao crud de produtos e categorias, o sistema nao possui funcao de cadastro de usuarios pois nao era o foco e ja sao criados usuarios para testar a aplicacao pelas seeds.

Na index os usuarios podem filtrar os itens por categorias.

Produtos criados na factory contam com uma imagem simples contendo fundo colorido e um texto, quando o administrador criar um produto pode fazer upload de imagens, ao editar o produto pode exclui-las, caso um produto nao possua imagem sera exibido um placeholder.

A api concede acesso apenas aos produtos e ao api_token e possui um nivel de acesso publico e outro privado.

Api publica: acessar index listando todos produtos ou acessar produto especifico por id.

Api privada, para ter acesso deve-se informar o token_api, apenas usuarios admin possuem, para acessar o token deve-se fazer uma requisicao post para localhost:8000/api/token e informar email e senha. A api privada concede acesso as funcoes de editar, apagar e atualizar produtos.

Para formatar imagens enviadas foi utilizado image.intervention.io

Para filtrar produtos na Api e necessario acessar products/category/'id da categoria desejada'
