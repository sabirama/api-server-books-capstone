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
        $this->call(AuthorSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(PaymentOptionsSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(BookDetailsSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(OrderDetailsSeeder::class);
        $this->call(OrderItemSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(BookReviewSeeder::class);
        $this->call(OrderReviewSeeder::class);
        $this->call(CartSeeder::class);
    }
}
