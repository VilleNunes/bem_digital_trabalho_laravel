<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categories = [
            'Doação de Roupas',
            'Doação de Calçados',
            'Doação de Alimentos',
            'Doação de Fraldas',
            'Doação de Cobertores',
            'Doação de Produtos de Higiene',
            'Doação de Brinquedos',
            'Doação de Material Escolar',
            'Doação de Livros',
            'Doação de Móveis e Eletrodomésticos',
            'Doação de Medicamentos',
            'Doação de Equipamentos Médicos',
            'Doação de Sangue',
            'Doação de Cabelos',
            'Apoio a Tratamentos Médicos',
            'Doação de Ração',
            'Doação para Abrigos de Animais',
            'Doação de Enxovais de Bebê',
            'Doação para Orfanatos',
            'Doação de Materiais de Construção',
            'Doação para Reflorestamento',
            'Doação de Bolsas de Estudo',
            'Doação de Computadores e Tablets',
            'Doações para Vítimas de Enchentes',
            'Doações em Situações de Calamidade',
        ];


       foreach($categories as $category){
            return[
                'name'=>$category,
                'is_active'=>fake()->boolean(),
            ];
        }
    }
}
