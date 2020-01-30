<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            ["nome"=>'Free',"mensalidade"=>0.00],
            ["nome"=>'Basic',"mensalidade"=>100.00],
            ["nome"=>'Plus',"mensalidade"=>187.00]
        ];

        DB::table('plans')->insert($plans);
    }
}
