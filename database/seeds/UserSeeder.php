<?php
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $names = ['Elia', 'Gigi', 'Meni'];
        $counter = 1;

        foreach($names as $name){
            $user = new User;
            $user->name = $name;
            $user->email = strtolower($name) . '@' . $faker->freeEmailDomain();
            $user->password = Hash::make('pippo' . $counter);
            $counter++;

            $user->save();
        }

        // User::create([
        // 'name' => 'Elia',
        // 'email' => 'elia.vanon@yahoo.com',
        // 'password' => Hash::make('pippo123'),
        // ]);
    }
}
