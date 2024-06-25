<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('no_telepon')->unique();
            $table->string('alamat');
            $table->string('kode');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

// class AddUsernameAndPasswordToUsersTable extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up()
//     {
//         Schema::table('users', function (Blueprint $table) {
//             // Menambah kolom username setelah kolom 'name'
//             $table->string('username')->unique()->after('name');
//             // Menambah kolom password setelah kolom 'username'
//             $table->string('password')->after('username');
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down()
//     {
//         Schema::table('users', function (Blueprint $table) {
//             // Menghapus kolom username dan password jika rollback migration
//             $table->dropColumn('username');
//             $table->dropColumn('password');
//         });
//     }
// }