# Simple E-commerce Project

Projeto de um simples e-commerce usando HTML 5, PHP com a estrutura MVC, Bootstrap 4, Font Awesome 5 e Javascript.

Requisitos necessários para rodar o projeto:
  - Servidor Web Apache
  - PHP 7.1 ou maior
  - MySQL 5.7 ou maior

### Configuração do servidor Apache

É necessário que se tenha um servidor apache instalado e funcional para rodar este projeto, podendo ser a Stack, XAMPP (Universal), LAMPP (Linux), WAMPP (Windows) e MAMPP (MacOS).
#ATENÇẪO!!!! É necessário que o servidor esteja com a extensão mod_rewrite habilitada para que as rotas funcionem!!!#
No projeto foram criados 3 arquivos ".htaccess", um para impedir acesso a pasta app, um para uso de url amigáveis e outro para redirecionamento das rotas.

### Servidor de Banco de Dados MySQL

É necessário também que se tenha instalado e funcional um servidor de banco de dados MySQL. Este projeto possui um arquivo SQL que é necessário ser usado para criação do banco de dados e das tabelas do sistema.

### Testando o projeto

Por padrão o Apache usa a pasta '/var/www/html' para os projetos web. Coloque a pasta simple-ecommerce neste diretório e configure um vhost. Para configurar o vhost no Apache, siga os seguintes passos:

    - Faça uma cópia do arquivo padrão 000-defualt.conf na pasta "sites-avaliable" do apache e renomeie. De preferência para o nome do seu projeto (simple-ecommerce.conf)
    - Abra o arquivo e edite as opções padrão para o seguinte:
    
    ```sh
    
    <VirtualHost *:80>
        ServerName simple-ecommerce.com
        ServerAlias www.simple-ecommerce.com
        ServerAdmin admin@simple-ecommerce
        DocumentRoot /var/www/html/simple-ecommerce/public
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>
    
    ```
    
    - No linux, habilite o site com o comando: 
    
    ```sh
    
    sudo a2ensite simple-eceommerce.conf
    
    ```
    
    - E reinicie o serviço do Apache
    
    ```sh
    
    sudo systemctl restart apache2
    
    ```
    
    - No Windows, caso esteja usando o XAMPP basta dar Stop e Start no servidor Apache
    
### Configurando o arquivo hosts

O arquivo hosts é localizado em diferentes locais dependendo do SO. No Linux, ele fica no caminho /etc/hosts. No Windows ele fica no caminho C:\Windows\System32\drivers\etc\hosts.
Ao abri-lo, basta você colocar o seguinte texto no final do arquivo:

    SEU IP simple-ecommerce.com
    
Isso possibilitará você a acessar o site localmente e digitar na URL o endereço simple-ecommerce.com

### O sistema

Antes de rodar o sistema é necessário alterar os paraâmetros dos arquivos "app.php" e "database.php". O primeiro cuida dos caminhos absolutos do sistema, enquanto o segundo são os parâmetros de conexão com o banco.
Ao fazer o "seed" das tabelas pelo arquivo SQL já haverão produtos e categorias cadastradas. A coluna Lateral das categorias é carregada de acordo com as categorias cadastradas no banco, e o filtro é feito ao clicar em uma delas.
