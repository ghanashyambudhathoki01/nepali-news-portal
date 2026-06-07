<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertises = Advertise::all();
        //ctrl p
        return view('admin.advertise.table', compact('advertises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.advertise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
            // 'title' => 'required|max:255|unique:articles',
        // ]);
        $advertise = new Advertise();
        $advertise->company_name = $request->company_name;
        $advertise->redirect_link = $request->redirect_link;
        $advertise->expire_date = $request->expire_date;
        $advertise->contact = $request->contact;
        $advertise->ad_position = $request->ad_position;
        $image = $request->image;
        if ($image) {
            $file_name = time() . "." . $image->getClientOriginalExtension();
            $image->move('images', $file_name);
            $advertise->image = "images/$file_name";
        }
        $advertise->save();

        toast('Advertise Created Successfully', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $advertise = Advertise::find($id);
        return view('admin.advertise.edit', compact('advertise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'title' => 'required|max:255|unique:articles,title,' . $id,
        ]);
        $advertise = Advertise::find($id);
        $advertise->company_name = $request->company_name;
        $advertise->redirect_link = $request->redirect_link;
        $advertise->expire_date = $request->expire_date;
        $advertise->contact = $request->contact;
        $advertise->ad_position = $request->ad_position;
        $image = $request->image;
        if ($image) {
            $file_name = time() . "." . $image->getClientOriginalExtension();
            $image->move('images', $file_name);
            $advertise->image = "images/$file_name";
        }
        $advertise->save();

        toast('Advertise Updated Successfully', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $advertise = Advertise::find($id);
        $advertise->delete();
        toast('Advertise Deleted Successfully', 'success');
        return redirect()->back();
    }
}
