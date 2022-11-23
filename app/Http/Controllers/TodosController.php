<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\Carbon as time;
use App\Models\Home;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $homes = Home::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        $mytime=time::now();
        $date=$mytime->toRfc850String();
        $today= substr($date, 0, strrpos($date, ","));
        
        $date = Carbon::now()->format('d-m-Y');

        return view('home', compact('homes'), [
            'title'=>'Home',
            'date' => $date,
            'today' => $today
        ]);        
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
        $this->validate($request,[
            'title' => 'required|string|max:25',
            'finished' => 'nullabel'
        ]);

        $home = new Home;
        $home->title = $request->input('title');

        if($request->has('finished')){
            $home->finished = true;
        }

        $home->user_id = Auth::user()->id;

        $home->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homes = Home::findOrFail($id);
        $homes -> delete();
        return back()->with('success', 'Berhasil dihapus');;
    }
}