<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Visitor;
use Illuminate\Http\Request;

class DataKeluhanController extends Controller
{
    public function index()
    {
        $visitor = Visitor::all()->sortByDesc('created_at');
        return view('layouts.data_keluhan', ['datas' => $visitor]);
    }

    public function store(Request $request)
    {
        try {
            //validasi yang wajib diinputkan pada request payloads
            $validate = $request->validate([
                'username' => 'required',
                'umur' => 'required',
                'no_handphone' => 'required',
                'alamat' => 'required',
                'keluhan' => 'required',
                'jawaban' => 'required|in:YA,TIDAK',
            ]);

            $answer = new Answer();
            $answer->username = $request->input('username');
            $answer->umur = $request->input('umur');
            $answer->no_handphone = $request->input('no_handphone');
            $answer->alamat = $request->input('alamat');
            $answer->keluhan = $request->input('keluhan');
            $answer->jawaban = $request->jawaban;
            $answer->save();

            return redirect()->back()->with('success', 'Berhasil Menyimpan Jawaban Anda!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal Menyimpan Jawaban Anda!');
        }
    }
}
