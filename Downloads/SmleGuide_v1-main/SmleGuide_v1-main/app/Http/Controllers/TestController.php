<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests=Test::get();
        return view('tests.index',compact('tests'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        $test=new Test();
        $test->name=$request->name;
        $test->save();
        return to_route('tests.index')->with('success','Test  added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
         return view('tests.edit',compact('test'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Test $test)
    {
        $request->validate(['name'=>'required']);
        
        $test->name=$request->name;
        $test->save();
        return to_route('tests.index')->with('success','Test  updated.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        $test->delete();
        return to_route('tests.index')->with('success','Test  deleted.');
    }
}
