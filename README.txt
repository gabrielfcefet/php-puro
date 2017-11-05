## Passos para configuração do projeto ##

# AUTOR #

- Nome: Gabriel de Figueiredo Corrêa
- Telefone: (12) 98805-2805
- Email: figueiredo.gabriel@gmail.com


# DADOS DO AMBIENTE #

- Sistema operacional: Ubuntu
- Linguagem: PHP 7.0
- Servidor Web: Apache2
- Banco: MySQL
- Criptografia: MD5


# CONFIGURAÇÃO #

1) Copiar o diretório mediapost em /var/www/;

2) Dentro do diretório mediapost/documentation estão os scripts para gerar o
   banco de dados:
   
   2.1) mediapostDataBaseScript.sql: é o arquivo com o script para gerar o banco
        de dados;
        
   2.2) mediaPostDataBaseInserts.sql: é o arquivo com o script para popular as
        tabelas (Dados para teste);
   
   2.3) mediaPostSelects.sql: é o arquivo com as queries para conslutar os dados
        das tabelas, inclusive a query para buscar os contatos com os respectivos
        telefones e e-mails;
        
   2.4) mediapost-model.mwb: é o arquivo Workbench com a modelagem do banco.     

3) Configurar um virtual host com o seguinte conteudo:

<VirtualHost *:80>
    ServerName mediapost
    DocumentRoot "/var/www/mediapost/public
    <Directory "/var/www/mediapost/public">
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost> 


4) Adicionar a seguinte linha ao /etc/hosts

127.0.0.1       mediapost


5) Todas as configurações do sistema ficam no arquivo config/config.ini

6) Credenciais de acesso ao sistema:

- Usuário: admin
- Senha: lalala123