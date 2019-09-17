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

        $admintf = new \App\detail_users;
        $admintf->nama = "Administrator Teknik Informatika";
        $admintf->nip = "123";
        $admintf->jabatan = "Admin Web TF";
        $admintf->nohp = "123";
        $admintf->username = "admintf";

        $admintf->save();

        $adminsi = new \App\detail_users;
        $adminsi->nama = "Administrator Sistem Informasi";
        $adminsi->nip = "123";
        $adminsi->jabatan = "Admin Web SI";
        $adminsi->nohp = "123";
        $adminsi->username = "adminsi";

        $adminsi->save();
    }
}
