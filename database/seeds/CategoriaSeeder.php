<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'CAT_DESCRICAO' => 'Acessórios',
        ]);
        DB::table('categorias')->insert([
            'CAT_DESCRICAO' => 'Sopro - Madeiras',
        ]);

        DB::table('categorias')->insert([
            'CAT_DESCRICAO' => 'Sopro - Metais',
        ]);

        DB::table('categorias')->insert([
            'CAT_DESCRICAO' => 'Percussão',
        ]);

        DB::table('categorias')->insert([
            'CAT_DESCRICAO' => 'Cordas',
        ]);

        DB::table('categorias')->insert([
            'CAT_DESCRICAO' => 'Livros e Manuais',
        ]);

        DB::table('categorias')->insert([
            'CAT_DESCRICAO' => 'Teclas',
        ]);

        DB::table('categorias')->insert([
            'CAT_DESCRICAO' => 'Equipamentos de aúdio',
        ]);
    }
}
