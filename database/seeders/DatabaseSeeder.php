<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Institution;
use App\Models\Module;
use App\Models\Rule;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Institution::create([
            'fantasy_name' => 'Instituto Esperança',
            'cnpj' => '12.345.678/0001-90',
            'phone' => '(11) 98765-4321',
            'email' => 'contato@institutoesperanca.org',
            'is_active' => true,
        ]);

        Rule::create(['name' => 'admin']);
        Rule::create(['name' => 'donor']);
        Rule::create(['name' => 'user']);

        Module::create(['title' => 'Usuários']);
        Module::create(['title' => 'Doações']);
        Module::create(['title' => 'Instituições']);
        Module::create(['title' => 'Relatórios']);
        Module::create(['title' => 'Campanhas']);
        Module::create(['title' => 'Doadores']);


        $rule = Rule::query()->where('name', 'admin')->first();
        $instituion = Institution::query()->first();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'rule_id' => $rule->id,
            'institution_id' => $instituion->id,
            'is_active'=>true

        ]);

        User::factory(50)->create([
            'rule_id' => 3,
            'institution_id' => $instituion->id
        ]);

        $this->call([CategorySeeder::class]);
    }
}
