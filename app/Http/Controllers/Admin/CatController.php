<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat;
class CatController extends Controller
{
    public function index()
    {
       $data['cats']=Cat::select('id','name')->get();
       return view('admin.cats.index')->with($data);
    }
    public function create()
    {
        return view('admin.cats.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|string|max:20',
        ]);

        Cat::create($request->all());

        return redirect()->route('cats.index')
                        ->with('success','Category created successfully.');
    }

    public function edit($id)
    {
         $data['cat']=Cat::findorFail($id);
        return view('admin.cats.edit')->with($data);
    }


    public function update(Request $request, Cat $cat)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $cat->update($request->all());
        return redirect()->route('cats.index')
                        ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cat $cat)
    {
        $cat->delete();
        return redirect()->route('cats.index')
                        ->with('success','Category deleted successfully');
    }


}
