<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Complaint;
use App\Models\Question;
use App\Models\Visitor;
use Illuminate\Http\Request;

class KeluhanPengunjungController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('layouts.Keluhan_pengunjung')->with('questions', $questions);
    }

    public function store(Request $request)
    {
        try {
            $answer = new Answer();
            $complaint = new Complaint();
            $visitor = new Visitor();

            //validasi yang wajib diinputkan pada request payloads
            $validate = $request->validate([
                'nama' => 'required',
                'umur' => 'required',
                'no_handphone' => 'required',
                'alamat' => 'required',
                'keluhan' => 'required',
            ]);

            $visitor->nama = $request->input('nama');
            $visitor->umur = $request->input('umur');
            $visitor->no_handphone = $request->input('no_handphone');
            $visitor->alamat = $request->input('alamat');
            $visitor->save();

            $complaint->keluhan = $request->input('keluhan');
            $complaint->visitor_id = $visitor->id;
            $complaint->save();

            // Simpan jawaban
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'jawaban') !== false && $value) {
                    $questionId = str_replace('jawaban', '', $key);
                    $answer = new Answer();
                    $answer->jawaban = $value;
                    $answer->pertanyaan_id = $request->input('question_id' . $questionId);
                    $answer->visitor_id = $visitor->id;
                    $answer->save();
                }
            }

            return redirect()->back()->with('success', 'Berhasil menambahkan Keluhan');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error', 'Gagal menambahkan Keluhan');
        }

    }
}
