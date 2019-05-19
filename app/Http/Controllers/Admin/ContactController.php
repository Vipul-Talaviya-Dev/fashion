<?php

namespace App\Http\Controllers\Admin;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\ContactDataImport;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
	public function index()
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
