<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    protected $lecture;
    public function __construct(Lecture $lecture)
    {
        $this->lecture = $lecture;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->lecture->Show();
        return view('admin.lecture.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->lecture->Store([
            'nip'=>$request->nip,
            'name'=>$request->name,
            'front_degree'=>$request->front_degree,
            'back_degree'=>$request->back_degree,
            'place_of_birth'=>$request->place_of_birth,
            'date_of_birth'=>$request->date_of_birth,
            'gender'=>$request->gender,
            'number_handphone'=>$request->number_handphone,
            'address'=>$request->address,
            'rt'=>$request->rt,
            'rw'=>$request->rw,
            'village'=>$request->village,
            'subdistrict'=>$request->subdistrict,
            'city'=>$request->city,
            'province'=>$request->province,
            'postal_code'=>$request->postal_code
        ]);
        return back()->with('create','Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecture $lecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecture $lecture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->lecture->Edit($id,[
            'nip'=>$request->nip,
            'name'=>$request->name,
            'front_degree'=>$request->front_degree,
            'back_degree'=>$request->back_degree,
            'place_of_birth'=>$request->place_of_birth,
            'date_of_birth'=>$request->date_of_birth,
            'gender'=>$request->gender,
            'number_handphone'=>$request->number_handphone,
            'address'=>$request->address,
            'rt'=>$request->rt,
            'rw'=>$request->rw,
            'village'=>$request->village,
            'subdistrict'=>$request->subdistrict,
            'city'=>$request->city,
            'province'=>$request->province,
            'postal_code'=>$request->postal_code
        ]);
        return back()->with('update','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
