<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Institution;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class InstitutionSeeder extends Seeder
{
    /**
     * Quantas instituições deseja criar por padrão.
     * Você pode sobrescrever com a env SEED_INSTITUTIONS.
     */
    private int $defaultCount = 10;

    public function run(): void
    {
        $faker = Faker::create('pt_BR');
        $faker->unique(true);

        $total = (int) (env('SEED_INSTITUTIONS', $this->defaultCount));

        for ($i = 0; $i < $total; $i++) {

            // Cria o endereço (addresses)
            $address = Address::create([
                'city'         => $faker->city,
                'state'        => $faker->state,           // ex.: "São Paulo"
                'zip'          => $faker->postcode,        // ex.: "12345-678"
                'road'         => $faker->streetName,
                'neighborhood' => $faker->citySuffix,      // se preferir, troque por outro faker
                'complement'   => $faker->optional()->secondaryAddress,
                'number'       => (string) $faker->buildingNumber,
            ]);

            // Cria a instituição (institutions)
            Institution::create([
                'fantasy_name' => $faker->company,
                'cnpj'         => $this->fakeCnpj(true),       // string formatada
                'phone'        => $this->brPhone($faker),      // telefone "plausível"
                'email'        => $faker->unique()->safeEmail(),
                'is_active'    => $faker->boolean(80),         // 80% ativas
                'address_id'   => $address->id,
                'description'  => $faker->optional()->sentence(12),
                'photo_path'   => null,                        // ou: 'institutions/placeholder.jpg'
            ]);
        }
    }

    /**
     * Gera um CNPJ fictício (não garante dígitos verificadores reais).
     */
    private function fakeCnpj(bool $formatted = true): string
    {
        $digits = '';
        for ($i = 0; $i < 14; $i++) {
            $digits .= mt_rand(0, 9);
        }

        if (!$formatted) {
            return $digits;
        }

        // 00.000.000/0000-00
        return substr($digits, 0, 2) . '.' .
               substr($digits, 2, 3) . '.' .
               substr($digits, 5, 3) . '/' .
               substr($digits, 8, 4) . '-' .
               substr($digits, 12, 2);
    }

    /**
     * Telefone brasileiro "plausível".
     */
    private function brPhone($faker): string
    {
        // Formatos simples: (11) 9####-####  | (11) ####-####
        $ddd   = str_pad((string) mt_rand(11, 99), 2, '0', STR_PAD_LEFT);
        $mobile = mt_rand(0, 1) === 1;

        if ($mobile) {
            return sprintf('(%s) 9%04d-%04d', $ddd, mt_rand(0, 9999), mt_rand(0, 9999));
        }
        return sprintf('(%s) %04d-%04d', $ddd, mt_rand(0, 9999), mt_rand(0, 9999));
    }
}
