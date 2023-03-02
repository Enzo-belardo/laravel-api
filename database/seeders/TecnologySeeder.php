<?php

namespace Database\Seeders;
use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecnologies = ['Html5','Css3','Bootstrap','Javascript','Vue3','Vite','NodeJs','PHP','MySql','Laravel'];

        foreach ($tecnologies as $tecnology ) {
            $newTecnology = new Tecnology();
            $newTecnology->tecnology = $tecnology;
            $newTecnology->save();
        }
    }
}
