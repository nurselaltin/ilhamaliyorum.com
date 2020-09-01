<?php

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            'fullname'   => 'Nursel Altın',
            'username'   => 'nursel-altin',
            'email'      => 'nurselaltin.na@gmail.com',
            'password'   => Hash::make(123456),
            'userType'   => 1,
            'isActive'   => 1,
        ]);
    }
}
