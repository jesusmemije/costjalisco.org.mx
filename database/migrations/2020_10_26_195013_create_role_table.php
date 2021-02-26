<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->string('key', 50);
            $table->string('title', 50);
            $table->enum('status', ['active', 'inactive', 'deleted']);
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });

        // Seed table role
        $roles = [];

        $roles[] = ["id" => "1", "key" => "admin", "title" => "Administrador", "status" => "active"];
        $roles[] = ["id" => "2", "key" => "master", "title" => "Master", "status" => "active"];
        $roles[] = ["id" => "3", "key" => "agente_sectorial", "title" => "Agente sectorial", "status" => "active"];
        $roles[] = ["id" => "4", "key" => "visitante", "title" => "Visitante", "status" => "active"];

        DB::table('role')->delete();

        $date = Carbon::now();

        // Create rows
        foreach($roles as $rol)
        {
            DB::table('role')->insert([
                'id'         => $rol['id'],
                'key'        => $rol['key'],
                'title'      => $rol['title'],
                'status'     => $rol['status'],
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }

        // Update user table

        Schema::table('users', function(Blueprint $table)
        {
            $table->foreign('role_id')->references('id')->on('role');
        });

        // Seed admin user
        if(is_null(User::find(1)))
        {
            User::create([
                'role_id'   => 1,
                'name'      => 'Super',
                'last_name' => 'Admin',
                'address'   => 'Guadalajara, Jalisco, Mx.',
                'phone'     => 'XXXXXXXXXX',
                'status'    => 'Activo',
                'email'     => 'admin@costjalisco.com',
                'password'  => Hash::make('admin'),
            ]);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropForeign('users_role_id_foreign');
        });

        Schema::dropIfExists('role');
    }
}
