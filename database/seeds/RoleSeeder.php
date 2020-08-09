<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'description' => 'Rol de administrador',
                'created_at' => now(),
            ],
            [
                'name' => 'User',
                'description' => 'Rol de usuario',
                'created_at' => now(),
            ],
        ]);
    }
}
