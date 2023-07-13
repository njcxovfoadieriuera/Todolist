<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Folder;
use Database\Factories\FolderFactory;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $titles = ['プライベート', '仕事', '旅行'];

        // foreach ($titles as $title) {
        //     DB::table('folders')->insert([
        //         'title' => $title,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]);
        // }
        Folder::factory()->count(20)->create();
    }
}
