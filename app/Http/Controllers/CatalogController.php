<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\movie;
use DB;

class CatalogController extends Controller
{
   
    
	public function getIndex()
	{
		$peliculas	=	movie::all();
		return view ('catalog.index')->with('arrayPeliculas', $peliculas);
	}

	public function getShow($id){
		$pelicula = movie::findOrFail($id);
		return view('catalog.show')->with('pelicula',$pelicula);
	}

	public function getCreate(){

		return view('catalog/create');


	}

	public function getEdit($id){
		$pelicula = movie::findOrFail($id);
		return view('catalog/edit')->with('pelicula',$pelicula);
	}


}

