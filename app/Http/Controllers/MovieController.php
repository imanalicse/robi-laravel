<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Movie;
use App\Http\Resources\Movie as MovieResource;


class MovieController extends Controller
{
    
    public function frontend() {
        return view( 'admin.movies.index' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all movies
        $movies = Movie::paginate(5);

        // Return collection of movies as resource
        return MovieResource::collection($movies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = $request->isMethod('put') ? Movie::findOrFail($request->movie_id) : new Movie;

        $movie->id = $request->input('movie_id');
        $movie->title = $request->input('title');
        $movie->description = $request->input('description');
        $movie->poster_url = $request->input('poster_url');

        if( $movie->save() ) {
            return new MovieResource($movie);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get Movies
        $movie = Movie::findOrFail($id);

        // Return single move as resource
        return new MovieResource($movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);

        if($movie->delete()) {
            return new MovieResource($movie);
        }
    }
}
