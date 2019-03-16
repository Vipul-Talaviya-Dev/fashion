<?php

use Illuminate\Database\Seeder;

use App\Models\Module;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = ['Dashboard', 'App Content', 'Color', 'Size', 'Category', 'Product', 'Order', 'Assign Order', 'Banner', 'Home Images', 'User', 'Offers', 'Contacts', 'About', 'FAQ', 'Term & Condition'];

        foreach ($menus as $menu) {
	        Module::create([
	        	'name' => $menu
	        ]);
        }
    }
}
