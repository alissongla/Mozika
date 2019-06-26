<?php

use Illuminate\Database\Seeder;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pt_BR');

        for($c=1; $c<=10; $c++){
            DB::Table('fornecedores')->insert([
                'FOR_NOME'          => $faker->company(),
                'FOR_TELEFONE'      => $faker->cellphoneNumber(),
                'FOR_EMAIL'         => $faker->email(),
                'FOR_DOCUMENTO'     => $faker->cnpj()
            ]);
        }
    }
}
