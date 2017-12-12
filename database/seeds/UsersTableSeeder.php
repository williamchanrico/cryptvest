<?php

use App\Models\Coin;
use App\Models\Profile;
use App\Models\User;
use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;


class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        $profile = new Profile;
        $portfolio = new Portfolio;

        $adminRole = Role::whereName('Admin')->first();
        $userRole = Role::whereName('User')->first();

//         Seed test admin
//        $seededAdminEmail = 'admin@admin.com';
//        $user = User::where('email', '=', $seededAdminEmail)->first();
//        if ($user === null) {
//            $user = User::create(array(
//                'name'              => $faker->userName,
//                'first_name'        => $faker->firstName,
//                'last_name'         => $faker->lastName,
//                'email'             => $seededAdminEmail,
//                'password'          => Hash::make('password'),
//                'token'             => str_random(64),
//                'activated'         => true,
//                'signup_confirmation_ip_address' => $faker->ipv4,
//                'admin_ip_address'  => $faker->ipv4
//            ));
//
//            $user->profile()->save($profile);
//            $user->portfolio()->save($portfolio);
//            $user->attachRole($adminRole);
//            $user->save();
//
//        }

//         Seed test user
//        $user = User::where('email', '=', 'user@user.com')->first();
//        if ($user === null) {
//            $user = User::create(array(
//                'name'              => $faker->userName,
//                'first_name'        => $faker->firstName,
//                'last_name'         => $faker->lastName,
//                'email'             => 'user@user.com',
//                'password'          => Hash::make('password'),
//                'token'             => str_random(64),
//                'activated'         => true,
//                'signup_ip_address' => $faker->ipv4,
//                'signup_confirmation_ip_address' => $faker->ipv4
//            ));
//
//            $user->profile()->save(new Profile);
//            $user->portfolio()->save(new Portfolio);
//            $user->attachRole($userRole);
//            $user->save();
//        }

//        Seed CryptVest demo user
        $user = User::where('email', '=', 'demo@cryptvest.tk')->first();
        if ($user === null) {
            $user = User::create(array(
                'name'              => 'William Chanrico',
                'first_name'        => 'William',
                'last_name'         => 'Chanrico',
                'email'             => 'demo@cryptvest.tk',
                'password'          => Hash::make('demo@cryptvest.tk'),
                'token'             => str_random(64),
                'activated'         => true,
                'signup_ip_address' => $faker->ipv4,
                'signup_confirmation_ip_address' => $faker->ipv4
            ));

            $user->profile()->save(new Profile);
            $user->portfolio()->save(new Portfolio);
            $user->portfolio->save(Coin::create([
                'portfolio_id'      => $user->portfolio->id,
                'name'              => 'Bitcoin',
                'amount'            => 0.08,
                'cost'              => 800,
                'note'              => 'stored on binance'
            ])->toArray());
            $user->portfolio->save(Coin::create([
                'portfolio_id'      => $user->portfolio->id,
                'name'              => 'Litecoin',
                'amount'            => 5,
                'cost'              => 1000,
                'note'              => 'stored on bitfinex'
            ])->toArray());
            $user->portfolio->save(Coin::create([
                'portfolio_id'      => $user->portfolio->id,
                'name'              => 'IOTA',
                'amount'            => 130,
                'cost'              => 250,
                'note'              => 'stored on bitcoin indonesia'
            ])->toArray());
            $user->portfolio->save(Coin::create([
                'portfolio_id'      => $user->portfolio->id,
                'name'              => 'Dash',
                'amount'            => 0.5,
                'cost'              => 600,
                'note'              => 'stored on bitcoin indonesia'
            ])->toArray());
            $user->portfolio->save(Coin::create([
                'portfolio_id'      => $user->portfolio->id,
                'name'              => 'Cardano',
                'amount'            => 2300,
                'cost'              => 360,
                'note'              => 'stored on binance'
            ])->toArray());
            $user->portfolio->save(Coin::create([
                'portfolio_id'      => $user->portfolio->id,
                'name'              => 'Stellar Lumens',
                'amount'            => 1800,
                'cost'              => 200,
                'note'              => 'stored on binance'
            ])->toArray());
            $user->attachRole($userRole);
            $user->save();
        }

//         Seed test users
//         $user = factory(App\Models\Profile::class, 5)->create();
//         $users = User::All();
//         foreach ($users as $user) {
//             if (!($user->isAdmin()) && !($user->isUnverified())) {
//                 $user->attachRole($userRole);
//             }
//         }

    }
}
