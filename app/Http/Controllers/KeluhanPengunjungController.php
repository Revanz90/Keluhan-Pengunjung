<?php

namespace App\Http\Controllers;

use App\Models\Question;
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
            $questions = new Question();

            //validasi yang wajib diinputkan pada request payloads
            $validate = $request->validate([
                'pertanyaan' => 'required',
            ]);

            $questions->pertanyaan = $request->input('pertanyaan');
            $questions->save();
            // dd($question);

            return redirect()->back()->with('success', 'Berhasil menambahkan Pertanyaan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menambahkan Pertanyaan');
        }
    }

    public function delete($id)
    {
        try {
            $question = Question::findOrFail($id); // Mengambil pertanyaan dengan ID yang diberikan
            $question->delete(); // Menghapus pertanyaan dari database

            return redirect()->back()->with('success', 'Pertanyaan berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus Pertanyaan');
        }
    }
}
