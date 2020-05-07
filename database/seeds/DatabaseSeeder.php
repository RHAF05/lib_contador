<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AutoresSeeder::class);
        $this->call(TiposProductosSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(LibrosSeeder::class);
        $this->call(paisesSeeder::class);
        $this->call(departamentosSeeder::class);
        $this->call(municipiosSeeder::class);
        $this->call(usersSeeder::class);
    }
}
