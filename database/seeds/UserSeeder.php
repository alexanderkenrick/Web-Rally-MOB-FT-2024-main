<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            'Carnival Shuffle',
            'Dizzy Dash',
            'Magic Wand',
            'Ball-a-boop',
            'Full Fill Your Duty As A Clown',
            'Foot Volleyball',
            'Throw and Get Me',
            'Rolling Ball',
            'Pingo',
            'Pyramid Jengga',
            'Crack The Code',
            'Magic Color',
            'Match Me',
            'Try Your Luck',
            'Wandering Train'
        ];

        foreach ($posts as $idx => $post) {
            User::query()->create([
                'name' => $post,
                'username' => "penpos" . $idx + 1,
                'password' => Hash::make('Penpos@MOBFT24'),
                'target' => 15
            ]);
        }
    }
}
