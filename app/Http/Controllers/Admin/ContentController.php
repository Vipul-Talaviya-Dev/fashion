<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
	public function edit($id)
	{
		if(!$content = Content::find($id)) {
			return redirect()->back()->with(['error' => 'Invalid Id Selected.']);
		}

		return view('admin.content.edit', [
			'content' => $content, 
		]);
	}

	public function update(Request $request, $id)
	{
		if(!$content = Content::find($id)) {
			return redirect()->back()->with(['error' => 'Invalid Id Selected.']);
		}

		$this->validate($request, [
            'content' => 'required',
		]);

        $content->content = $request->get('content');
        $content->save();

        return redirect()->back()->with(['success' => $content->name.' has been Update successfully..']);
	}

}
