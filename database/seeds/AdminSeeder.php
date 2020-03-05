<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\User;
        $admin->username = "administrator";
        $admin->roles = json_encode(["ADMIN"]);
        //$admin->name = "Administrator";
        $admin->email = "afrizalyasin423@gmail.com";
        $admin->password = \Hash::make("admin123");
        //$admin->phone = "031031";
        $admin->avatar = "soon.jpg";

        $admin->save();

        $si = new \App\User;
        $si->username = "adminsifo";
        $si->roles = json_encode(["ADMINSI"]);
        //$si->name = "Administrator Sistem Informasi";
        $si->email = "afrizal@gmail.com";
        $si->password = \Hash::make("admin123");
        //$si->phone = "031031";
        $si->avatar = "soon.jpg";

        $si->save();

        $tf = new \App\User;
        $tf->username = "admintf";
        $tf->roles = json_encode(["ADMINTF"]);
        //$tf->name = "Administrator Teknik Informatika";
        $tf->email = "afrizal2499@gmail.com";
        $tf->password = \Hash::make("admin123");
        //$tf->phone = "031031";
        $tf->avatar = "soon.jpg";

        $tf->save();

        $this->command->info("User admin berhasil terdaftar");
    }
}
