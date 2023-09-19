<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Data::all();
        // dd($user);
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = new Data;
        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required|email',
        //     'dob' => 'required',
        //     'gender' => 'required',
        //     'image' => 'required',
        //     'phone' => 'required|number'
        // ]);
        $photo = "";
        if ($request->image) {
            $photo = $request->image->getClientOriginalName();
            $photo = str_replace(" ", "", $photo);
            $request->image->move('user_file/', $photo);
        }
        $data->name = $request->name;
        $data->email = $request->email;
        $data->dob = $request->dob;
        $data->image = $photo;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->save();
        return redirect()->route('data.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data, Request $request)
    {
        if ($request->ajax()) {
            $data = Data::find($data->id);
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        
        $e = Data::find($data->id);
        
        $photo = "";
        $old_image = "";
        if (!empty($request->image)) {
            $old_image = $e->image;

            File::delete('user_file/' . $old_image);

            $photo = $request->image->getClientOriginalName();
            $photo = str_replace(" ", "", $photo);
            $request->image->move('userfile/', $photo);
        } else {
            // $old_image = "empdefault/undraw_profile.svg";

            $photo = $e->image;
        }

        $data->update($request->all());
        $data->image = $photo;
        $data->save();
        return redirect()->route('data.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data, Request $request)
    {
        $data = Data::find($data->id);
        $data->delete();
        return response()->json();
    }
}
