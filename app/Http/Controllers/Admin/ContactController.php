<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactData;
use Illuminate\Http\Request;
use App\Imports\ContactDataImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
	public function index(Request $request)
	{
		$contactDataImports = ContactData::latest();

		if($request->get('search')) {
			$contactDataImports = $contactDataImports->where('mobile', $request->get('search'));			
		}

		return view('admin.contactImport.index', [
			'contactDataImports' => $contactDataImports->paginate(25)
		]);
	}

	public function add()
	{
		return view('admin.contactImport.add');
	}

	public function upload(Request $request)
	{
		$this->validate($request, [
            'contactImport' => 'required',
		]);

		if(!$request->file('contactImport')) {
			return redirect()->back();
		}

		$import = new ContactDataImport();
		$data = Excel::import($import, $request->file('contactImport'));

        # Check for empty sheet
        if(empty($data)) {
            return back()->withError("It seems, you have uploaded empty sheet!!");
        }

		return redirect()->back()->with(['success' => 'Import Successfully']);
	}

	public function contactImportDownloadExcel()
    {
    	return Excel::download(['9874563210'], 'contactImport.xlsx');
    }
}
