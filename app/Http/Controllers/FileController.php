<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as Files;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function home()
    {
        $file = File::all();
        return view('home', compact('file'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = File::all();
        return view('dashboard', compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = public_path('uploads/');

        $validate = $request->validate([
            'file.*'  => 'file',
        ]);

        $extension = $request->file->getClientOriginalExtension();
        $fileName  = time() . '.' . $extension;

        $request->file->move($url, $fileName);

        File::create([
            'title' => $request->title,
            'user_id'  => Auth::user()->id,
            'file'  => $fileName,
        ]);

        return redirect('/dashboard');
    }

    function destroy(File $id)
    {
        Files::delete(public_path('uploads/' . $id->file));
        $id->delete();
        return back();
    }

    function download(File $id)
    {
        $url = public_path('uploads/' . $id->file);
        return response()->download($url);
    }
}
