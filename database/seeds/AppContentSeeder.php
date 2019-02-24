<?php

use App\Models\AppContent;
use Illuminate\Database\Seeder;

class AppContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppContent::create([
        	'support_email' => 'support@shroud.in',
			'support_mobile' => '8758965327',
			'address' => '1234k Avenue, 4th block,
New York City',
			'offer_text' => '20% off in your first Shopping'
        ]);
    }
}
