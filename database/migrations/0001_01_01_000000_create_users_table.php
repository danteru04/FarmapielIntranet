<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password') -> nullable();
            $table->bigInteger('no_empleado') -> nullable();
            $table->string('firma_interna');
            #$table->unsignedBigInteger('id_area') -> nullable();
            $table->string('puesto') -> nullable();
            $table->bigInteger('celular') -> nullable();
            $table->string('locacion');
            $table->string('url_avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();

            /* $table->foreign('id_area') 
            -> references('id') -> on('areas'); */
        });

        DB::table('users')->insert([
            ['name' => 'Dante Isaac',
            'apellidos'=> 'Reyes Ugalde',
            'email' => 'dante.isaac.ru@hotmail.com',
            'password' => Hash::make('2733920'),
            'firma_interna' => 'dreyes',
            'puesto' => 'Becario Sistemas',
            'celular' => '5651181483',
            'locacion' => 'SJR']
        ]);

        User::insert([
            
        ]);

        /* $user = User::create([
            'nombres' => 'Dante Isaac',
            'apellidos' => 'Reyes Ugalde',
            'email' => 'dante.isaa.ru@hotmail.com',
            'password' => Hash::make('2733920'),
        ]); */

       /*  Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        }); */

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        /* Schema::dropIfExists('password_reset_tokens'); */
        Schema::dropIfExists('sessions');
    }
};
