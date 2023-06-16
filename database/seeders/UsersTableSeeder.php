<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("users")->insert([
            [
                "nom"=>"Super",
                "prenom"=>"Admin",
                "email"=>"root@gmail.com",
                "password"=>bcrypt("agendapro"),
                "phone"=>"224627928920",
                "avatar"=>"avatar.png",
                "role"=>"Administrateur",
            ],
        ]);
    }
}
