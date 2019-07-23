<?php

namespace App\Imports;

use App\Models\ContactData;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactDataImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
    	foreach ($rows as $key => $row) {
    		if(is_numeric($row[0]) && (strlen($row[0]) == 10) && ($key > 0) && isset($row[1])) {
	    		if(!ContactData::where('mobile', (int)$row[0])->exists()) {
	    			ContactData::create([
	    				'mobile' => (int)$row[0],
                        'name' => $row[1],
	    			]);
	    		}
    		}
        }
    }

    // headingRow function is use for specific row heading in your xls file
	public function headingRow(): int
	{
	    return 3;
	}
}
