<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Landing;
use Illuminate\Console\Command;

class DemoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //$categories = Category::all();

        //foreach ($categories as $category) {
        //    $landing = new Landing();
        //
        //    $landing->name = 'Лендинг «' . $category->name . '»' . random_int(1, 100);
        //    $landing->category_id = $category->id;
        //
        //    $landing->save();
        //}

        //$cybersportCategory = Category::query()->where('name', 'like', '%Киберспорт%')->first();
        //
        //echo (json_encode($cybersportCategory));

        $categories = Category::query()->with('landings')->get();

        foreach ($categories as $category) {
            $landings = $category->landings;

            foreach ($landings as $landing) {
                echo ($landing->name) . ": именование лендинга\n";
            }
        }
    }
}
