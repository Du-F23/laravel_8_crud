<?php

namespace App\Http\Controllers;


use App\Models\Images;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /* metodo stores for images */
    public function store(Request $requets){

        $images = Images::create([
            'name'=>$requets->name,
        ]);

        return ('la imagen fue dada de alta con exito');
    }
}
