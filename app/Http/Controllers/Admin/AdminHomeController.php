<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    //genero el método llamado index
    public function index(){
        //hacemos que retorne la vista de index
        return view('admin.index');

    }
}
