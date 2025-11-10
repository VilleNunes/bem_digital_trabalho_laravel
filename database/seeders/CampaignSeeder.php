<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Institution;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CampaignSeeder extends Seeder
{
    public function run(): void
    {
        $institutions = Institution::all();
        $categories = Category::all();

        if ($institutions->isEmpty() || $categories->isEmpty()) {
            $this->command->info('Não há instituições ou categorias para criar campanhas!');
            return;
        }

        $campanhasExemplo = [
            [
                'name' => 'Campanha do Agasalho 2024',
                'description' => 'Arrecadação de roupas de frio, cobertores e aquecedores para o inverno',
                'phone' => '(44) 99999-9999',
                'legend_phone' => 'WhatsApp para agendar entrega',
                'beginning' => Carbon::now()->subDays(15),
                'termination' => Carbon::now()->addDays(45),
                'mark' => 65,
                'unit'=>"kg"
            ],
            [
                'name' => 'Material Escolar Solidário',
                'description' => 'Doação de cadernos, lápis, mochilas e materiais escolares',
                'phone' => '(44) 88888-8888',
                'legend_phone' => 'Telefone fixo',
                'beginning' => Carbon::now()->subDays(30),
                'termination' => Carbon::now()->addDays(60),
                'mark' => 42,
                'unit'=>"kg"
            ],
            [
                'name' => 'Alimentos Não Perecíveis',
                'description' => 'Arrecadação de alimentos para cestas básicas',
                'phone' => '(44) 77777-7777',
                'legend_phone' => 'Celular da coordenação',
                'beginning' => Carbon::now()->subDays(10),
                'termination' => Carbon::now()->addDays(50),
                'mark' => 78,
                'unit'=>"kg"
            ],
            [
                'name' => 'Brinquedos para o Natal',
                'description' => 'Campanha de brinquedos novos ou em bom estado para o natal solidário',
                'phone' => '(44) 66666-6666',
                'legend_phone' => 'WhatsApp',
                'beginning' => Carbon::now()->subDays(5),
                'termination' => Carbon::now()->addDays(25),
                'mark' => 23,
                'unit'=>"kg"
            ],
        ];

        foreach ($institutions as $institution) {
            foreach ($campanhasExemplo as $campanhaData) {
                Campaign::create(array_merge($campanhaData, [
                    'is_active' => true,
                    'institution_id' => $institution->id,
                    'category_id' => $categories->random()->id,
                ]));
            }
        }
    }
}
