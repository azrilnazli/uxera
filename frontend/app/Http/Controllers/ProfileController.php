<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Profile;
use App\Models\User;
use App\Models\Category;

use App\Http\Requests\ProfileStoreRequest;
use App\Http\Requests\StoreChangePassword;

use Illuminate\Support\Facades\Auth;
use Image;
use View;


class ProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // menu
  
        $categories = $this->getCategories();
        View::share('categories', $categories);
    }


    public function settings()
    {
        $profile = Profile::where( 'user_id', '=', Auth::user()->id )->first();
      
        if(!$profile){
            return redirect( route('profile.create') );
        }
    
        // display the profile for loggedin user
        $profile = User::find( Auth::user()->id )->profile;
        return view('/settings/index')->with(compact('profile'));
    }

    public function show()
    {
        return view('profiles.change_password');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::where( 'user_id', '=', Auth::user()->id )->first();
      
        if(!$profile){
            return redirect( route('profile.create') );
        }
    
        // display the profile for loggedin user
        $profile = User::find( Auth::user()->id )->profile;
        return view('profiles.show')->with(compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $profile = Profile::where('user_id', '=' , Auth::user()->id )->first();
       

        if( $profile )
        {
            return redirect( route('profile.edit') );
        }
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileStoreRequest $request)
    {

        // upload poster
        if($request->hasFile('avatar'))
        {
            $file =  $request->file('avatar');;
            $path = public_path().'/thumbnails/';
            $file->move($path , 'avatar-' . Auth::user()->id);
            Image::make( $path . '/avatar-' . Auth::user()->id )
            ->fit(150, 150)
            ->save($path . '/avatar-' . Auth::user()->id . '.png');
        }


        // validation passed
        Profile::create([
            'address'   => $request->address,
            'user_id'   => Auth::user()->id,
        ]);

        return redirect( route('profile.index') )
               ->with('status', 'Profile updated!');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = User::find( Auth::user()->id )->profile;
        return view('profiles.edit')->with(compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileStoreRequest $request)
    {
        
        // upload poster
        if($request->hasFile('avatar'))
        {

            
            $file =  $request->file('avatar');;
            $path = public_path().'/thumbnails/';

            //$file->delete($path , 'avatar-' . Auth::user()->id);
            $file->move($path , 'avatar-' . Auth::user()->id);
            Image::make( $path . '/avatar-' . Auth::user()->id )
            ->fit(150, 150)
            ->save($path . '/avatar-' . Auth::user()->id . '.png');
        }


        Profile::where('user_id',  Auth::user()->id )
            ->update([
                'address' => $request->address,
            ]);
            return redirect( route('profile.index') )
            ->with('status', 'Profile updated!');
    }



    public function change_password()
    {
        return view('profiles.change_password');
    }

    public function update_password(StoreChangePassword $request)
    {
        //dd($request->password);
        User::where('id','=', Auth::user()->id )
            ->update([
                'password'  => bcrypt($request->password),
            ]);

            return redirect( route('change_password') )
            ->with('status', 'Password updated!');
    }    

    private function getCategories()
    {
        return Category::orderBy('title','ASC')->pluck('title', 'id');
    }   
}
