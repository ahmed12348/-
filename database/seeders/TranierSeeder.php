<?php

namespace Database\Seeders;
use App\Models\Trainer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TranierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trainer::create([
           'name' => 'Ahmed Mahmoud',
           'spec' => 'Web Development',
           'img' => '1.png'
        ]);
        Trainer::create([
            'name' => 'Ali Karem',
            'spec' => 'Web Development',
            'img' => '2.png'
         ]);
         Trainer::create([
            'name' => 'Ahmed Sayed',
            'spec' => 'Dentist',
            'img' => '3.png'
         ]);
         Trainer::create([
             'name' => 'Ali hazem',
             'spec' => 'Doctor',
             'img' => '4.png'
          ]);
          Trainer::create([
            'name' => 'Mahmoud Elbatal',
            'spec' => 'English',
            'img' => '5.png'
         ]);

    }
}
