<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;


class ServiceController extends Controller
{
    public function showData()
    {
        $services = Service::all();
        return view('smleguide.services', compact('services'));
    }


    public function addService()
    {
        return view('smleguide.addserives');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'service_name' => 'required|string|max:255',
            'service_amount' => 'required|numeric',
            'discounted_amount' => 'nullable|numeric',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!isset($validateData['discounted_amount']))
        {
            $validateData['discounted_amount'] = 0;
        }


        if ($request->hasFile('image'))
        {
            // Create directory if it doesn't exist
            $uploadPath = public_path('uploads/services');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move($uploadPath, $imageName);
            $validateData['image'] = 'uploads/services/' . $imageName;
        }

        Service::create($validateData);

        return redirect()->route('service')
       ->with('success', 'Services Added Successfully');

    }

    public function editService($id)
    {
       $service = Service::findOrFail($id);
       return view('smleguide.editservice', compact('service'));

    }

    public function updateService(Request $request, $id)
    {
        $service = Service::FindOrFail($id);
        $validateData = $request->validate([
            'service_name'=>'required|string|max:255',
            'service_amount'=>'required|numeric',
            'discounted_amount'=>'nullable|numeric',
            'status'=>'required|in:Active,Inactive',
            'image'=>'nullable',
        ]);

        // dd($validateData->all());

        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/services'), $imageName);
            $validateData['image'] = 'uploads/services/' .$imageName;
        }

        $service->update($validateData);

        return redirect()->route('service')->with('success', 'Service updated successfully');
    }

    public function deleteService($id)
    {
        $service = Service::FindOrFail($id);
        if ($service->image && file_exists(public_path($service->image)))
        {
            unlink(public_path($service->image));
        }

        $service->delete();

        return redirect()->route('service')->with('success', 'Service Deleted Successfully');
    }


    public function getService()
    {
        $service = Service::all();
        return view('smleguide.add_dataflow', compact('service'));
    }

}
