<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\TeachersImport;

class TeachersController extends Controller
{
    public function import_teachers(Request $request)
    {
        if ($request->isMethod('post')) 
        {
            $request->validate([
                'filename' => 'required'
            ]);
           // dd($request['filename']);
            
            $data = new TeachersImport();
            $data->import($request->filename);

            $failedErrors = $existEmails = [];
            foreach ($data->failures() as $key => $failure) {
                $failedRow = $failure->values();
                $failedErrors[] = 'Row #'.($failure->row()-1).' - '.implode('', $failure->errors());
                // $existEmails[] = $failedRow['email'];
            }
            if (count($failedErrors)) {
                // $with['error'] = 'Email Ids ('.implode(', ', $existEmails).') already exists !!';
                $with['error'] = '<ul class="mb-0"><li>'.implode('</li><li>', $failedErrors).'</li></ul>';
            }
            $uploadedCount = $data->getRowCount();
            if ($uploadedCount) {
                $with['success'] = $uploadedCount.' Rows has been uploaded successfully!';
            }
            return redirect(route('teachers.import_teachers'))->with($with);
        }
        else 
        {
            return view('teachers.import');
        }
    }
    
}
