<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri;

class DataDiriController extends Controller
{
    // Create Data Diri Form
    public function createForm(Request $request)
    {
        return view('datadiri');
    }

    // Store Data Diri Form Data
    public function DataDiriForm(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required'

        ]);
        //  Store data in database
        DataDiri::create($request->all());
        // 
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
}
