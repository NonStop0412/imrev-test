<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        $faker = Faker::create();

        $hashPassword = Hash::make('12345678');
        User::create([
           'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => $hashPassword,
            'role' => 'admin'
        ]);

        $a = 0;

        while ($a <= 10001) {
            Company::create([
                'name' => $faker->unique()->company,
                'email' => $faker->unique()->email,
                'foundation_year' => $faker->date,
                'description' => $faker->text(30)
            ]);

            Client::create([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'email' => $faker->unique()->email,
            ]);
            $a++;
        }

        $i = 0;
        while ($i <= 20000) {
            DB::table('companies_rel_clients')->updateOrInsert(['company_id' => rand(1, 10001), 'client_id' => rand(1, 10001)]);
            $i++;
        }
    }
}
