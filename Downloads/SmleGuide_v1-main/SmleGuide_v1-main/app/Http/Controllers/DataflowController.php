<?php

namespace App\Http\Controllers;

use App\Models\Dataflow;
use Illuminate\Http\Request;
use App\Models\Service;

class DataflowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dataflow()
   {
    $dataflow_cases = Dataflow::orderBy('created_at', 'desc')->get();
    return view('smleguide.dataflow', compact('dataflow_cases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dataflow_add()
    {
        $services = Service::all();
        return view('smleguide.add_dataflow', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
   {
    try {
        $validateData = $request->validate([
            'title' => 'required|in:Dr,Mr,Miss',
            'name' => 'required|string',
            'passport_no' => 'required|string',
            'dataflow_email' => 'required|email|unique:dataflow_cases,dataflow_email',
            'dataflow_password' => 'required|string',
            'service_id' => 'required|exists:services,id',
            'service_name' => 'nullable|string',
            'status' => 'required',
            'file.*' => 'nullable|file|max:5120',
        ]);

        // dd($validateData);

        $filePaths = [];

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/files'), $fileName);
                $filePaths[] = 'uploads/files/'.$fileName;
            }
        }

        $validateData['file'] = !empty($filePaths) ? json_encode($filePaths) : null;

        $service = Service::findOrFail($validateData['service_id']);
        $validateData['service_name'] = $service->service_name;

        $dataflow = Dataflow::create($validateData);

        if (!$dataflow) {
            throw new \Exception('Failed to create record');
        }

        return redirect()->route('dataflow')->with('success', 'Dataflow Case added successfully');

    } catch (\Exception $e) {
        // Delete any uploaded files if record creation failed
        if (!empty($filePaths)) {
            foreach ($filePaths as $path) {
                if (file_exists(public_path($path))) {
                    unlink(public_path($path));
                }
            }
        }

        return back()->withInput()->with('error', 'Error: ' . $e->getMessage());
    }
}



    /**
     * Display the specified resource.
     */
    public function show(Dataflow $dataflow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function dataflow_edit($id)
    {
        $dataflow = Dataflow::findOrFail($id);
        $services = Service::all();
        return view('smleguide.edit_dataflow', compact('dataflow','services'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dataflow $dataflow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dataflow $dataflow)
    {
        //
    }

//    public function getDataflow()
//     {
//     $dataflow_cases = Dataflow::orderBy('created_at', 'desc')->get();
//     return view('smleguide.dataflow', compact('dataflow_cases'));
//     }

    // public function getService()
    // {
    //     $service = Service::all();
    //     return view('smleguide.add_dataflow', compact('service'));
    // }
}
