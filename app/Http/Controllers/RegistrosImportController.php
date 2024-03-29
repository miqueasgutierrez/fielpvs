<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\RegistrosImport;
use Maatwebsite\Excel\Facades\Excel;

class RegistrosImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new RegistrosImport, $file);

        return redirect()->back()->with('success', 'Los registros han sido importados correctamente.');
    }
}
