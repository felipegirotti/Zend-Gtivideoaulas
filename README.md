Zend-Gtivideoaulas
==================

Zend-Gtivideoaulas

Inclua a library do Zend-Framework direto no include_path do PHP.ini
Exemplo:
include_path: c:\library
Dentro da pasta library você adiciona a pasta Zend/
Reinicie o apache.

Crie um virtual host no apache.
Exemplo:
NameVirtualHost *:80

<VirtualHost *:80>
	DocumentRoot "D:\gtivideoaulas.com\public"
	ServerName local.gtivideoaulas.com
	<Directory "D:\gtivideoaulas.com\public">
		DirectoryIndex index.php
		AllowOverride All
		Order allow, deny
		Allow from all
	</Directory>
</VirtualHost>

No windows você precisa modificar o arquivos de hosts que fica em Windows/system32/drivers/etc/hosts
Adicione a linha:
127.0.0.1   local.gtivideoaulas.com

Abra o executar e digite cmd
digite na tela ipconfig /flushdns

Acesse no navegar http://local.gtivideoaulas.com
Enjoy!

