<?php

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['About', 'FAQ', 'Term & Condition', 'Privacy Policy', 'Return Policy', 'MemberShip Policy', 'Shipping Policy'] as $content) {
	        Content::create([
	        	'name' => $content,
	        	'content' => $content,
	        ]);
        }
    }
}
