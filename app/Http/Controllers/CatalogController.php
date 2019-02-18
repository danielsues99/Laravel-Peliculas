<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\movie;
use DB;
use Notification;

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

	public function postCreate(Request $request){
        $movie = new Movie;
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;
        $movie->save();
        $notificacion = new Notification;
        $notificacion::success('La película se ha guardado correctamente');
        return redirect('/catalog');
    }

	public function putEdit($id, Request $request){
        $movie = Movie::find($id);
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;
        $movie->save();
        $notificacion = new Notification;
        $notificacion::success('La película se modificó correctamente');
        return redirect('/catalog/show/'.$id);
    }

    public function putRent($id, Request $request){
        $movie = Movie::find($id);
        $movie->rented = true;
        $movie->save();
        $notificacion = new Notification;
        $notificacion::info('La película se rentó correctamente');
        return redirect('/catalog/show/'.$id);
    }

    public function putReturn($id, Request $request){
        $movie = Movie::find($id);
        $movie->rented = false;
        $movie->save();
        $notificacion = new Notification;
        $notificacion::success('La película se entregó correctamente');
        return redirect('/catalog/show/'.$id);
    } 
    public function deleteMovie($id, Request $request){
        $movie = Movie::find($id);
        $movie->delete();
        $notificacion = new Notification;
        $notificacion::success('La película se elimino correctamente');
        return redirect('/catalog');
    }
}

