<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            "Antipasti",
            "Primi",
            "Secondi",
            "Contorni",
            "Dolci"
        ];

        foreach ($data as $elem) {
            $newcategory= new Category();
            $newcategory->name=$elem;
            $newcategory->save();

        }
}
}
