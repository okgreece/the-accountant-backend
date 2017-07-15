<?php

use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://raw.githubusercontent.com/okgreece/the-accountant/master/src/components/game/game.json');

        $game = json_decode($res->getBody(), true);
        $years =  $game["years"];

        $year_index = 0;
        $step_index = 0;

        foreach ($years as $year=>$content) {
            DB::table('years')->insert([
                'year' => $year,
                'title' => $content["title@en"],
                'year_index'=>$year_index
            ]);
            $year_index++;
        }

        $steps =  $game["steps"];

        foreach ($steps as $step) {
            $year_id = DB::table("years")->where("year", $step["year"])->value("id");
            $last_text = end($step["texts"]);
            $step_id = DB::table('steps')->insertGetId([
                'year_id' => $year_id,
                'last_text' => $last_text["text@en"],
                'step_index' => $step_index,
            ]);
            $choice_index = 0;
            foreach ($step["choices"] as $choice) {
                Db::table("choices")->insert([
                    'step_id' => $step_id,
                    'choice_index' => $choice_index,
                    'txt' => $choice["text@en"],
                ]);
                $choice_index++;

            }
            $step_index++;

        }




    }
}
