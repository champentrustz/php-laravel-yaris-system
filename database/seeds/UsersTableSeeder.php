<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'nudpakun.l@om4you.com',
            'password' => bcrypt('Oo29765834'),
            'first_name' => 'Nudpakun',
            'last_name' => 'Leechaikul',
            'nick_name' => '-',
            'role' => 'ADMIN',
            'gender' => 'MALE',
            'telephone' => '-',
            'line_id_type' => 'LINE_ID',
            'line_id' => '-',

        ]);
    }
}
