<?php

use Illuminate\Database\Seeder;

class ClienteSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pt_BR');

        for($c=0; $c<10; $c++){
            DB::Table('clientes')->insert([
                'CLI_NOME'          => $faker->name(),
                'CLI_TELEFONE'      => $faker->cellphoneNumber(),
                'CLI_EMAIL'         => $faker->email(),
                'CLI_DOCUMENTO'     => $faker->cpf()
            ]);
        }
    }
}
