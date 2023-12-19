<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $operator = Operator::where('user_id', $user->id)->first();
        return view('operator.dashboardOperator',compact('operator'));
    }

    public function showProfile()
    {
        $user = Auth::user();
        $operator = Operator::where('user_id', $user->id)->first();
        return view('operator.profile.profileOperator', compact('operator'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        $operator = Operator::where('user_id', $user->id)->first();
        return view('operator.profile.editProfile', compact('operator'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $operator = Operator::where('user_id', $user->id)->first();

        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'email' => 'required|email',
            'handphone' => 'required',
        ]);

        $operator->nama = $request->nama;
        $operator->nip = $request->nip;
        $operator->email = $request->email;
        $operator->handphone = $request->handphone;
        $operator->save();

        return redirect()->route('operator.profile')->with('success', 'Perubahan berhasil disimpan');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Operator $operator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operator $operator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operator $operator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operator $operator)
    {
        //
    }
}
