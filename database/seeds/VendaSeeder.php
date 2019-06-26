<?php

use Illuminate\Database\Seeder;

class VendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtosIDs = DB::table('produtos')->select('PRO_ID')->get();
        $fornecedoresIDs = DB::table('fornecedores')->select('FOR_ID')->get();
        $usuariosIDs = DB::table('users')->select('id')->get();

        $faker = Faker\Factory::create();

        for($c=0; $c<20; $c++){
            DB::Table('vendas')->insert([
                'VEN_VALOR'         => $faker->randomFloat(2, 100, 3500),
                'VEN_DATA_VENDA'    => $faker->date($format = 'Y-m-d', $max = 'now'), 
                'VEN_HORA_VENDA'    => $faker->time($format = 'H:i:s', $max = 'now'),
                'VEN_QTDE_VENDIDA'  => $faker->numberBetween($min = 1, $max = 2),
                'PRO_ID'            => $faker->randomElement($produtosIDs)->id,
                'CLI_ID'            => $faker->randomElement($fornecedoresIDs)->id,
                'USU_ID'            => $faker->randomElement($usuariosIDs)->id
            ]);
        }
    }
}
