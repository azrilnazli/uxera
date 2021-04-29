<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Video;
use App\Models\Category;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth','check-subscription']);
        $this->middleware('auth');
        // menu
  
        $categories = $this->getCategories();
        View::share('categories', $categories);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // list all latest videos limit by 24
          //$video_per_row = 9;
          //$row[1] =  Video::where('is_published', 1)->orderBy('id','DESC')->skip(0)->take( $video_per_row)->get();
          //$row[2] =  Video::where('is_published', 1)->orderBy('id','DESC')->skip( $video_per_row)->take( $video_per_row)->get();
          //return view('home.index')->with(compact('row'));
          
          $trailers = Video::where('is_published', 1)->orderBy('id','DESC')->skip(0)->take(6)->get();
          $latest   =  Video::where('is_published', 1)->orderBy('id','DESC')->skip(0)->take(50)->get();
          return view('home.index')->with(compact('latest','trailers'));
          
    }

    public function by_category($id)
    {
        // list all latest videos limit by 24
        $data =  Video::where('category_id', $id)->orderBy('id','DESC')->get();

        View::share('category_id', $id);
        return view('by_category')->with(compact('data'));
    }

    public function mobile()
    {
        $data = Video::where('is_published', '=', 1)
        ->orderBy('created_at','desc')
        ->paginate(1);

        return view('mobile', compact('data'));
    }

    public function show_details($id)
    {
        $video =  Video::find($id);
        $latest =  Video::where('is_published', 1)->orderBy('id','DESC')->skip(0)->take(50)->get();
        return view('/play/index',compact('video','latest'));
    }

    public function play($id)
    {
        $video =  Video::find($id);
        return view('play',compact('video'));
    }    

    private function getCategories()
    {
        return Category::orderBy('title','ASC')->pluck('title', 'id');
    }   

    public function settings()
    {
        return view('/settings/index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        // Starts with 'foo', ends with anything
        //$results = Post::where('title', 'like', "{$keyword}%")->get()

        $latest = Video::where([['title', 'like', "{$query}%"]])
                ->orWhere([['description', 'like', "{$query}%"]])
                ->paginate(10)->setPath('videos');
        
        return view('/search/index',compact('latest'));
    }


    
}
