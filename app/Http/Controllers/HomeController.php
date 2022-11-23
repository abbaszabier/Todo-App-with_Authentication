<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Carbon\Carbon as time;
use Illuminate\Http\Request;
use App\Models\Home;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $home =Home::where('id', $id)->where('user_id', Auth::user()->id)->first;
    //     $home -> delete();
    //     return back();
    // }
}
