<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\CategoryMovies;
use Illuminate\Http\Request;


class MovieController extends Controller
{
    public function index(Request $request )
    {
        if ($request->has('popular')) {
            $movies= Movie::orderby('popularity',$request->get('popular'))->get();

        }
        elseif ($request->has('rated')) {
            $movies= Movie::orderby('vote_count',$request->get('rated'))->get();

        }elseif ($request->has('category_id')) {
            $movies = Movie
            ::join('movies_categories', 'movies_categories.movie_id', '=', 'movies.id')
            ->where('movies_categories.category_id',$request->get('category_id'))
            ->get();
        }
        else{
            $movies= Movie::get();
        }
        
        
        $page_title='Recently Movies';
        $categories=CategoryMovies::groupBy('category_id')->get();
        return view('movies.index', compact('movies','categories','page_title'));

    }
 
    public function show($id)
    {
        return Movie::find($id);
    }

    public function store()
    {
            $result = json_decode(file_get_contents("https://api.themoviedb.org/3/movie/latest?language=en-US&api_key=2deddcc2ca83fd5516502b77840bf7ca"));
            $movieExisted= Movie::where('movie_id',$result->id)->first();
            
            if(!$movieExisted){
                $movie = new Movie();
                $movie->movie_id=$result->id;
                $movie->title= $result->title;
                $movie->popularity= $result->popularity;
                $movie->status= $result->status;
                $movie->vote_count= $result->vote_count;
                $id= $movie->save();
                if(is_array($result->genres)){
                    foreach($result->genres as $cat){
                        $movieCategory = new CategoryMovies();
                        $movieCategory->movie_id=$id;
                        $movieCategory->category_id=$cat->id;
                        $movieCategory->category_name=$cat->name;
                        $movieCategory->save();
                    }
                   

                }
                

                return 'success '.$id;
            }else{
                return 'exist';
            }
            
                
            
     
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());

        return $movie;
    }

    public function delete(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

       
    }
    public function getMovies()
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.themoviedb.org/3/movie/latest?language=en-US&api_key=2deddcc2ca83fd5516502b77840bf7ca",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

       
    }


}
