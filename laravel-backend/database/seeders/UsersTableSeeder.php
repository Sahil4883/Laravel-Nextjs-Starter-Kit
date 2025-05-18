<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the users table if it doesn't exist
        if (!Schema::hasTable('users')) {
            Schema::create('users', function ($table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('remember_token', 100)->nullable();
                $table->timestamps();
            });
        }

        // Demo data
        $demoData = [
            ["id" => 1, "name" => "John Doe"],
            ["id" => 2, "name" => "Jane Smith"],
            ["id" => 3, "name" => "Mike Johnson"],
            ["id" => 4, "name" => "Emily Davis"],
            ["id" => 5, "name" => "Chris Lee"],
            ["id" => 6, "name" => "Anna Brown"],
            ["id" => 7, "name" => "Tom Wilson"],
            ["id" => 8, "name" => "Lisa Green"],
            ["id" => 9, "name" => "James White"],
            ["id" => 10, "name" => "Sarah Black"],
        ];

        foreach ($demoData as $user) {
            DB::table('users')->updateOrInsert(
                ['id' => $user['id']],
                [
                    'name' => $user['name'],
                    'email' => strtolower(Str::slug($user['name'], '.')) . '@example.com',
                    'password' => Hash::make('password123'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
