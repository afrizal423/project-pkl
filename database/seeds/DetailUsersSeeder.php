<?php

use Illuminate\Database\Seeder;

class DetailUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = new \App\detail_users;
        $admin->nama = "administrator";
        $admin->nip = "123";
        $admin->jabatan = "Admin Web";
        $admin->nohp = "123";
        $admin->username = "administrator";

        $admin->save();
    }
}
