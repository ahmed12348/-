<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainer;
use Image;
class TrainerController extends Controller
{
    public function index()
    {
       $data['trainers']=Trainer::select('id','name','phone','spec','img')->get();
       return view('admin.trainers.index')->with($data);
    }
    public function create()
    {
        return view('admin.trainers.create');
    }

    public function store(Request $request)
    {
       request()->validate([
            'name' => 'required|string|max:50',
            'spec' => 'required|string|max:50',
            'phone' => 'nullable|string|max:20',
            'img' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $input = $request->all();


        if ($image = $request->file('img')) {
            $destinationPath = 'uploads/trainers/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }


        Trainer::create($input);
        return redirect()->route('trainers.index')
        ->with('success','trainer created successfully.');

    }

    public function edit(Trainer $trainer)
    {
        //  $data['trainer']=Trainer::findorFail($id);
        return view('admin.trainers.edit',compact('trainer'));
    }


    public function update(Request $request, Trainer $trainer)
    {
       $request->validate([
            'name' => 'required|string|max:50',
            'spec' => 'required|string|max:50',
            'phone' => 'nullable|string|max:20',

        ]);

        $input = $request->all();



        if ($image = $request->file('img')) {
            $destinationPath = 'uploads/trainers/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }else{
            unset($input['img']);
        }

        $trainer->update($input);

        return redirect()->route('trainers.index')
                        ->with('success','trainer updated successfully');

    //      $old_name=Trainer::findOrFail($request->id)->img;
    //      dd( $data);
    //    if($request->hasFile('img'))
    //      {

    //      }
    //      else{
    //         $data['img']=$old_name;
    //      }

    //      $trainer->update($request->all());
    //     return redirect()->route('trainers.index');

    }

    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        return redirect()->route('trainers.index')
                        ->with('success','trainer deleted successfully');
    }
}
