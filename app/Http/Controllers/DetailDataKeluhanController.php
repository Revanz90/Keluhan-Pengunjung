<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Visitor;

class DetailDataKeluhanController extends Controller
{
    public function index($id)
    {
        $visitor = Visitor::find($id);
        $complaint = Complaint::find($id);
        return view('layouts.detail_datakeluhan', ['visitor' => $visitor, 'complaint' => $complaint]);
    }
}
