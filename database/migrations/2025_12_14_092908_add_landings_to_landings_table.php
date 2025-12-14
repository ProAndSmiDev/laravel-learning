<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('landings')->insert([
            [
                'name' => 'Landing 1',
                'price' => 299.99,
                'preview' => 'https://test.ru/preview.jpg',
                'description' => 'Description 1',
                'private_comment' => 'Private Comment 1',
            ],
            [
                'name' => 'Landing 2',
                'price' => 199.99,
                'preview' => 'https://test.ru/preview.jpg',
                'description' => 'Description 2',
                'private_comment' => 'Private Comment 2',
            ],
            [
                'name' => 'Landing 3',
                'price' => 999.99,
                'preview' => 'https://test.ru/preview.jpg',
                'description' => 'Description 3',
                'private_comment' => 'Private Comment 3',
            ],
        ]);
    }
};
