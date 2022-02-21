<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\player;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($page=0; $page <= 5 ; $page++) { 
            $response = Http::get("https://www.easports.com/fifa/ultimate-team/api/fut/item?page={$page}")->json()["items"];

            foreach ($response as $item) {
                //LA API TRAE JUGADORES REPETIDOS, VALIDA QUE NO LOS VUELVA A INSERTAR SI YA ESTÁN EN LA BASE DE DATOS
                if (!player::where('api_id', '=', $item["baseId"])->exists()) {
                    player::factory()->create([
                        'name' => $item["firstName"],
                        'position' => $item["position"],
                        'nation' => $item["nation"]["name"],
                        'team' => $item["club"]["name"],
                        'api_id' => $item["baseId"],
                    ]);
                }
            }

        }
    }
}
