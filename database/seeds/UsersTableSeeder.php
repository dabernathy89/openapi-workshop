<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\User::class)->create(
            [
                'name' => 'User',
                'email' => 'user@example.com'
            ]
        );

        $user->contests()->save(
            factory(\App\Contest::class)->make()
        );

        factory(\App\Prize::class, 5)->create(
            ['contest_id' => $user->contests()->first()->id]
        );

        factory(\App\Prize::class, 2)->states('hasWinner')->create(
            ['contest_id' => $user->contests()->first()->id]
        );

        $user->contests()->first()->contestants()->saveMany(
            factory(\App\Contestant::class, 20)->make()
        );
    }
}
