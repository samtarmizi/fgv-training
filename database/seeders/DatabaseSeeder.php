<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Trial::factory(10)->create();
        \App\Models\Progeny::factory(10)->create();


        \App\Models\Palm::factory(10)->create()->each(function ($palm) {
            $palm->trial()->associate(\App\Models\Trial::inRandomOrder()->first());
            $palm->progeny()->associate(\App\Models\Progeny::inRandomOrder()->first());
            $palm->save();
            $palm->records()->saveMany(\App\Models\Record::factory(5)->create());
        });
    }
}
