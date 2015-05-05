<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('UserTableSeeder');
    }
}

class UserTableSeeder extends DatabaseSeeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'firstname'     => 'John',
            'lastname'      => 'Doe',
            'email'         => 'admin@admin.com',
            'password'      => Hash::make('Testing123'),
            'remember_token'=> Hash::make('Testing123455'),
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ));
    }
}