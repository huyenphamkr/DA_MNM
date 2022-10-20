<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Database\Seeders\DB;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $data_role = [
            [
                'name' => 'Supper Admin',
                'description' => 'Admin',                
            ],
            [
                'name' => 'Admin',
                'description' => 'Employee',                
            ],            
            [
                'name' => 'Member',
                'description' => 'Employee',                
            ],
        ];
        $data_user = [
            [
                'name' => 'Admin',
                'email' => 'admin@localhost.com',
                'role_id' => 1,
                'password' => bcrypt('123'),
                'address' => 'HCM',
                'phone_number' => '0366135030',
                'gender' => 'female',
                'active' => 1,       

            ],
            [
                'name' => 'Employee',
                'email' => 'employee@gmail.com',
                'role_id' => 2,
                'password' => bcrypt('123'),
                'address' => 'HCM',
                'phone_number' => '0366135030',
                'gender' => 'male', 
                'active' => 1,        
            ],
        ];
        DB::table('roles')->insert($data_role);
        DB::table('users')->insert($data_user);
    }
}
