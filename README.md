## Instrucciones
1.Debes de cambiar las variables de entorno: 
DB_HOST=<La ip del servidor donde esta corriendo la base de datos>
DB_PORT=<El puerto en el que esta corriendo la base de datos>
DB_USERNAME=<El usuario de la base de datos>
DB_PASSWORD=<La contrasena de la base de datos>
2. Debes de crear en mysql una base de datos llamada unbc_prueba o en la migracion cambiar el nombre de la base de datos
3. La migracion crea por defecto cuatro usuarios con las siguientes credenciales de acceso:
#email:user1@example.com
#password: password1
#email:user2@example.com
#password: password2
#email:user3@example.com
#password: password3
#email:user3@example.com
#password: password3
Esto con la finalidad de que ya existan usuarios para realizar pruebas.
4. para levantar todo de manera local requieres primero entrar a la carpeta donde clones el repositorio, abrir la consola/terminal/terminal de vscode e iniciar con los comando #npm run dev en la consola y luego #php artisan serve, te recomiendo tener dos consolas/terminal abiertas en donde cada una se utilizaria para cada comando
