<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    /**
     * Migracion para crear la tabla de users.
       Recuerda que en las variables de entorno de laravel debes de cambiar 
       DB_HOST= "nombre o ip del host"
       DB_PORT= "puerto de la base de datos"
       DB_DATABASE= "nombre de la base de datos" (puedes crearla si usas xamp desde el phpmyadmin)
       DB_USERNAME= "nombre del usuario creado para administrar la base datos"
       DB_PASSWORD= "contrasena del usuario creado para administrar la base datos o dejar vacia en caso de que el usuario sea creado sin contrasena"
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); // clave primaria, autoincrement
            $table->string('names'); // nombre
            $table->string('lastnames'); // apellido
            $table->string('email')->unique(); // email
            $table->string('phone_number'); // numero de teléfono
            $table->string('password'); // contrasena
            $table->string('active'); // columna donde definimos el borrado logico de un usuario (0:inactivo,1:activo)
            $table->timestamps(); // timestamps para created_at y updated_at, para realizar seguimientos posteriores de fechas de creacion y actualizacion de usuarios
        });
        DB::table('users')->insert([
            [
                'names' => 'user1',
                'lastnames' => 'Doe',
                'email' => 'user1@example.com',
                'phone_number' => '1234567890',
                'password' => bcrypt('password1'),
                'active' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'names' => 'user2',
                'lastnames' => 'Doe',
                'email' => 'user2@example.com',
                'phone_number' => '987654321',
                'password' => bcrypt('password2'),
                'active' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'names' => 'user3',
                'lastnames' => 'Smith',
                'email' => 'user3@example.com',
                'phone_number' => '1234567890',
                'password' => bcrypt('password3'),
                'active' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'names' => 'user4',
                'lastnames' => 'Johnson',
                'email' => 'user4@example.com',
                'phone_number' => '987654321',
                'password' => bcrypt('password4'),
                'active' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
