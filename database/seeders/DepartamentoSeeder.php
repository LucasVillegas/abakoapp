<?php

namespace Database\Seeders;

use App\Models\Departamentos;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamentos::create(['nombre' => 'Antioquia', 'codigo' => 5]);
        Departamentos::create(['nombre' => 'Atlantico', 'codigo' => 8]);
        Departamentos::create(['nombre' => 'D. C. Santa Fe de Bogotá', 'codigo' => 11]);
        Departamentos::create(['nombre' => 'Bolivar', 'codigo' => 13]);
        Departamentos::create(['nombre' => 'Boyaca', 'codigo' => 15]);
        Departamentos::create(['nombre' => 'Caldas', 'codigo' => 17]);
        Departamentos::create(['nombre' => 'Caqueta', 'codigo' => 18]);
        Departamentos::create(['nombre' => 'Cauca', 'codigo' => 19]);
        Departamentos::create(['nombre' => 'Cesar', 'codigo' => 20]);
        Departamentos::create(['nombre' => 'Cordova', 'codigo' => 23]);
        Departamentos::create(['nombre' => 'Cundinamarca', 'codigo' => 25]);
        Departamentos::create(['nombre' => 'Choco', 'codigo' => 27]);
        Departamentos::create(['nombre' => 'Huila', 'codigo' => 41]);
        Departamentos::create(['nombre' => 'La Guajira', 'codigo' => 44]);
        Departamentos::create(['nombre' => 'Magdalena', 'codigo' => 47]);
        Departamentos::create(['nombre' => 'Meta', 'codigo' => 50]);
        Departamentos::create(['nombre' => 'Nariño', 'codigo' => 52]);
        Departamentos::create(['nombre' => 'Norte de Santander', 'codigo' => 54]);
        Departamentos::create(['nombre' => 'Quindio', 'codigo' => 63]);
        Departamentos::create(['nombre' => 'Risaralda', 'codigo' => 66]);
        Departamentos::create(['nombre' => 'Santander', 'codigo' => 68]);
        Departamentos::create(['nombre' => 'Sucre', 'codigo' => 70]);
        Departamentos::create(['nombre' => 'Tolima', 'codigo' => 73]);
        Departamentos::create(['nombre' => 'Valle', 'codigo' => 76]);
        Departamentos::create(['nombre' => 'Arauca', 'codigo' => 81]);
        Departamentos::create(['nombre' => 'Casanare', 'codigo' => 85]);
        Departamentos::create(['nombre' => 'Putumayo', 'codigo' => 86]);
        Departamentos::create(['nombre' => 'San Andres', 'codigo' => 88]);
        Departamentos::create(['nombre' => 'Amazonas', 'codigo' => 91]);
        Departamentos::create(['nombre' => 'Guainia', 'codigo' => 94]);
        Departamentos::create(['nombre' => 'Guaviare', 'codigo' => 95]);
        Departamentos::create(['nombre' => 'Vaupes', 'codigo' => 97]);
        Departamentos::create(['nombre' => 'Vichada', 'codigo' => 99]);
    }
}