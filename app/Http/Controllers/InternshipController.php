<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internships = Internship::latest()->paginate(5);
    
        return view('internships.index',compact('internships'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('internships.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    
        Internship::create($request->all());
     
        if(Auth::guard('admin')->user() == true)
        {
            return redirect()->route('admin.internships.index')
            ->with('success','Internship created successfully.');

        }
        elseif(Auth::guard('coordinator')->user() == true)
        {
            return redirect()->route('coordinator.internships.index')
            ->with('success','Internship created successfully.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Internship  $internship
     * @return \Illuminate\Http\Response
     */
    public function show(Internship $internship)
    {
        return view('internships.show',compact('internship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Internship  $internship
     * @return \Illuminate\Http\Response
     */
    public function edit(Internship $internship)
    {       
        return view('internships.edit',compact('internship'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Internship  $internship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Internship $internship)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    
        $internship->update($request->all());
     
        if(Auth::guard('admin')->user() == true)
        {
            return redirect()->route('admin.internships.index')
            ->with('success','Internship updated successfully.');

        }
        elseif(Auth::guard('coordinator')->user() == true)
        {
            return redirect()->route('coordinator.internships.index')
            ->with('success','Internship updated successfully.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Internship  $internship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Internship $internship)
    {
        $internship->delete();
     
        if(Auth::guard('admin')->user() == true)
        {
            return redirect()->route('admin.internships.index')
            ->with('success','Internship deleted successfully.');

        }
        elseif(Auth::guard('coordinator')->user() == true)
        {
            return redirect()->route('coordinator.internships.index')
            ->with('success','Internship deleted successfully.');
        }

    }
}
