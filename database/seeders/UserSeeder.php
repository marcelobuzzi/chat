<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

  public function run() {

    User::create([
      'name' => 'Marcelo',
      'lastname' => 'BUZZI RIERA',
      'email' => 'marcelobuzziriera@gmail.com',
      'phone' => '3794921914',
      'password' => bcrypt('12345678'),
    ]);

    User::create([
      'name' => 'Carolina',
      'lastname' => 'FERNANDEZ CARRILLO',
      'email' => 'caritofc2003@gmail.com',
      'phone' => '3794757247',
      'password' => bcrypt('12345678'),
    ]);

  }

}
