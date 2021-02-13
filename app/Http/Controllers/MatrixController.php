<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MatrixService;

class MatrixController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->matrix = new MatrixService();
    }

    public function index(Request $request)
    {        
        return response()->json([
            'main' => $this->matrix->diagonal_main($request->data),
            'second' => $this->matrix->diagonal_second($request->data),
            'size' => sizeof($request->data)
        ]);
    }
}
