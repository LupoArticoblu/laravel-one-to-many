<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 200; $i++){
            $portfolio = Portfolio::inRandomOrder()->first();

            $tag_id = Tag::inRandomOrder()->first()->id;

            //mettere in relazione 2 tabelle: usare come variabile la variabile usata nella prima tabella e come funzione il nome della seconda tabella e metterle in relazione con il metodo "attach" a cui posso passare un ID o un intero array.
            $portfolio->tags()->attach($tag_id);
        }


    }
}
