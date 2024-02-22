<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // Role::truncate();
        // Schema::enableForeignKeyConstraints();

        // $data = [
        //     'waitress',
        //     'chef',
        //     'cashier',
        //     'manager'
        // ];

        // foreach( $data as $value){
        //     Role::insert([
        //         'name' => $value,
        //         'created_at' => now(),
        //         'updated_at'=> now()
        //     ]);
        // }
    }
}
