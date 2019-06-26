<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedoresIDs = DB::table('fornecedores')->select('FOR_ID')->get();
            DB::Table('produtos')->insert([
                'PRO_NOME' => 'Baqueta',
                'PRO_VALOR' => 30.00,
                'PRO_QTDE_ESTOQUE' => 300,
                'FOR_ID' => $faker->randomElement($fornecedoresIDs)->id,
                'CAT_ID' => 1
            ]);

            DB::Table('produtos')->insert([
                'PRO_NOME' => 'Bateria',
                'PRO_VALOR' => 2000.00,
                'PRO_QTDE_ESTOQUE' => 5,
                'FOR_ID' => $faker->randomElement($fornecedoresIDs)->id,
                'CAT_ID' => 4
            ]);

            DB::Table('produtos')->insert([
                'PRO_NOME' => 'Trompete',
                'PRO_VALOR' => 600.00,
                'PRO_QTDE_ESTOQUE' => 5,
                'FOR_ID' => $faker->randomElement($fornecedoresIDs)->id,
                'CAT_ID' => 3
            ]);

            DB::Table('produtos')->insert([
                'PRO_NOME' => 'Saxofone',
                'PRO_VALOR' => 2000.00,
                'PRO_QTDE_ESTOQUE' => 8,
                'FOR_ID' => $faker->randomElement($fornecedoresIDs)->id,
                'CAT_ID' => 2
            ]);

            DB::Table('produtos')->insert([
                'PRO_NOME' => 'Violão',
                'PRO_VALOR' => 350.00,
                'PRO_QTDE_ESTOQUE' => 20,
                'FOR_ID' => $faker->randomElement($fornecedoresIDs)->id,
                'CAT_ID' => 5
            ]);

            DB::Table('produtos')->insert([
                'PRO_NOME' => 'Ukulele',
                'PRO_VALOR' => 200.00,
                'PRO_QTDE_ESTOQUE' => 20,
                'FOR_ID' => $faker->randomElement($fornecedoresIDs)->id,
                'CAT_ID' => 5
            ]);

            DB::Table('produtos')->insert([
                'PRO_NOME' => 'Teclado',
                'PRO_VALOR' => 500.00,
                'PRO_QTDE_ESTOQUE' => 8,
                'FOR_ID' => $faker->randomElement($fornecedoresIDs)->id,
                'CAT_ID' => 4
            ]);
        
    }
}
