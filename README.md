# sistema-apostas
Sistema de Apostas desenvolvido na turma de PHP em 2021 (nos embalos de sabado a noite)

## Instalação
`php composer.phar install`

## Crie um banco de dados

## Configuração do Banco
Alterar o arquivo `/config/database.php`

## Gerar tabelas do Banco de Dados
`php vendor/doctrine/orm/bin/doctrine.php orm:schema-tool:update --force`

## Criar usuário admin
`php config/generate-user.php`

## Executar / Subir o servidor
`php -S localhost:8000 -t public`

