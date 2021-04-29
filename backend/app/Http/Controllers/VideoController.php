<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\Category;
use App\Jobs\ProcessVideo;
use App\Jobs\ProcessTrailer;
use Illuminate\Http\Request;
use Auth;
use File;
use Image;
use Validator;

class VideoController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('can:isEditor');
    }  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Video Listing
        $data = Video::orderBy('id','desc')->with('category')->paginate(10)->setPath('videos');
        //$data = Video::all()->paginate('10');
        return view('admin.videos.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // display create form
        $categories = $this->getCategories();
        //dd($categories);
        return view('admin.videos.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'category_id' => ['required', 'integer'],
            //'file' => ['required', 'mimes:mp4,mov,MP4,MOV'], 
        ];
    
        $customMessages = [
            'file.required' => 'The video :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //User::create($request->all());

        $video = Video::create([
            'user_id' => Auth::user()->id, 
            'title' => $request['title'],
            'category_id' => $request['category_id'],
            'description' => $request['description'],
        ]);

        //return redirect('videos')->with('success','Video Created Successfully');
        return redirect()->route('videos.trailer', ['id' => $video->id])->with('success','Metadata saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        $data =  Video::find($video->id);
        return view('admin.videos.show',compact(['data']));
    }

    public function edit($id)
    {
       $data = Video::find($id);
       $categories = $this->getCategories();
       return view('admin.videos.edit',compact(['data','categories']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'category_id' => ['required', 'integer'],
            'is_published' => ['integer' ],
        ]);
      
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');
        $data['category_id'] = $request->input('category_id');
        

        $data['is_published'] = 0;
        if ( $request->input('is_published') == 1 )
        {
            $data['is_published'] = 1;
        } else {
            $data['is_published'] = 0;
        }

        //dd($data);

        Video::where('id',$id)->update( $data);
        return redirect()->route('videos.edit', $id)->with('success','Metadata saved.');
        
    }

    public function destroy($id)
    {
        Video::where('id',$id)->delete();
        File::deleteDirectory(public_path('uploads/'. $id));
        return redirect()->back()->with('success','Delete Successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        // Starts with 'foo', ends with anything
        //$results = Post::where('title', 'like', "{$keyword}%")->get()
        
        $data = Video::where([['title', 'like', "{$query}%"]])
                ->orWhere([['description', 'like', "{$query}%"]])
                ->paginate(10)->setPath('videos');
        
        return view('admin.videos.index',compact(['data']));
    }

    public function poster($id)
    {
        $data = Video::find($id);
        return view('admin.videos.poster',compact(['data']));
    }


    public function store_poster(Request $request, $id)
    {
        $request->validate([
            'file-1' => ['mimes:png,jpg,jpeg'],
            'file-2' => ['mimes:png,jpg,jpeg'],
        ]);
      
        // upload poster 
        if($request->hasFile('file-1'))
        {
            $file =  $request['file-1'];
            $path = public_path().'/uploads/' . $id;
            $file->move($path . '/images/', 'file-1');
           # $file->delete($path . '/images/file-1.png');
           # $file->delete($path . '/images/file-1-small.png');
            Image::make( $path . '/images/file-1')->fit(400, 600)->save( $path . '/images/file-1.png');
            Image::make( $path . '/images/file-1')->fit(200, 300)->save( $path . '/images/file-1-small.png');

        }

        if($request->hasFile('file-2'))
        {
            $file =  $request['file-2'];
            $path = public_path().'/uploads/' . $id;
            $file->move($path . '/images/', 'file-2');
           # $file->delete($path . '/images/file-2.png');
           # $file->delete($path . '/images/file-2-small.png');
            Image::make( $path . '/images/file-2')->fit(1920, 1080)->save( $path . '/images/file-2.png');
            Image::make( $path . '/images/file-2')->fit(640, 360)->save( $path . '/images/file-2-small.png');
        }

        return redirect()->route('videos.poster', ['id' => $id])->with('success','Image upload success');
    }

    public function trailer($id)
    {
        //$data = Video::find($id);
        //return view('admin.videos.trailer',compact(['data']));
        $data = Video::find($id);
        return view('admin.videos.trailer',compact(['data']));
    }


    //public function upload($id)
    //{
    //    $data = Video::find($id);
    //    return view('admin.videos.upload',compact(['data']));
    //}


    public function store_trailer_video(Request $request, $id)
    {

        // upload poster
        if($request->hasFile('file'))
        {

            $validator = Validator::make($request->all(), [
                'file' => ['mimes:mov,mp4,m4v'],
            ]);
            
            if ($validator->fails()) 
            {
                $data = [
                    'status' => 'error',
                    //'message' => $validator->getMessageBag()->toArray(),
                    'message' => array_map(
                                            function($fieldErrors) 
                                            { 
                                                return $fieldErrors[0];
                                            }, 
                                            $validator->getMessageBag()->toArray()
                                        ),
                ];

                //return response()->json($data); // Return OK to user's browser
            } else {

                $data = [
                    'status' => 'success',
                    'message' => 'success ',
                ];

                //return response()->json($data); // Return OK to user's browser
            }

            $file =  $request['file'];
            $mime = $file->getMimeType();
            if ($mime == "video/x-flv" || $mime == "video/mp4" || $mime == "application/x-mpegURL" || $mime == "video/MP2T" || $mime == "video/3gpp" || $mime == "video/quicktime" || $mime == "video/x-msvideo" || $mime == "video/x-ms-wmv") 
            {
           
                $path = public_path().'/uploads/' . $id;
                File::deleteDirectory(public_path('uploads/'. $id . '/trailer'));
                $file->move($path . '/trailer/', 'original.mp4');

                # dispatch job here
                ProcessTrailer::dispatch($id);
            }


            return response()->json($data); // Return OK to user's browser
           
        }
    }

    public function store_trailer_poster(Request $request, $id)
    {
 
        $request->validate([
            'file-2' => ['mimes:png,jpg,jpeg'],
        ]);
        
        // upload poster
        if($request->hasFile('file-2'))
        {
            $file =  $request['file-2'];
            $path = public_path().'/uploads/' . $id;
            $file->move($path . '/images/', 'file-2');
            Image::make( $path . '/images/file-2')->resize(640, 360)->save( $path . '/images/trailer-poster.png');
        }


        return redirect()->route('videos.trailer', ['id' => $id])->with('success','Trailer poster upload success');
    }

    public function video($id)
    {
        $data = Video::find($id);
        return view('admin.videos.video',compact(['data']));
    }

    public function store_video(Request $request, $id)
    {

        // upload poster
        if($request->hasFile('file'))
        {

            $validator = Validator::make($request->all(), [
                'file' => ['mimes:mov,mp4,m4v'],
            ]);
            
            if ($validator->fails()) 
            {
                $data = [
                    'status' => 'error',
                    //'message' => $validator->getMessageBag()->toArray(),
                    'message' => array_map(
                                            function($fieldErrors) 
                                            { 
                                                return $fieldErrors[0];
                                            }, 
                                            $validator->getMessageBag()->toArray()
                                        ),
                ];

                //return response()->json($data); // Return OK to user's browser
            } else {

                $data = [
                    'status' => 'success',
                    'message' => 'success ',
                ];

                //return response()->json($data); // Return OK to user's browser
            }

            $file =  $request['file'];
            $mime = $file->getMimeType();
            if ($mime == "video/x-flv" || $mime == "video/mp4" || $mime == "application/x-mpegURL" || $mime == "video/MP2T" || $mime == "video/3gpp" || $mime == "video/quicktime" || $mime == "video/x-msvideo" || $mime == "video/x-ms-wmv") 
            {
           
                $path = public_path().'/uploads/' . $id;
                # delete existing folder
                File::deleteDirectory(public_path('uploads/'. $id . '/videos'));
                
                $file->move($path . '/videos/', 'original.mp4');

                


                # dispatch job here
                ProcessVideo::dispatch($id);
            }
            return response()->json($data); // Return OK to user's browser
           
        }
    }


    public function store_video_poster(Request $request, $id)
    {
 
        $request->validate([
            'file-2' => ['mimes:png,jpg,jpeg'],
        ]);
        

        // upload poster
        if($request->hasFile('file-2'))
        {
            $file =  $request['file-2'];
            $path = public_path().'/uploads/' . $id;
            $file->move($path . '/images/', 'file-2');
            Image::make( $path . '/images/file-2')->resize(640, 360)->save( $path . '/images/video-poster.png');
        }
        return redirect()->route('videos.video', ['id' => $id])->with('success','Video upload success');
    }




    private function getCategories()
    {
        return Category::orderBy('title','ASC')->pluck('title', 'id');
    }    
}
