<?php 

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('can:isAdmin');
    }    

    public function index()
    {

        $data = User::orderBy('id','desc')->paginate(10)->setPath('users');
        return view('admin.users.index',compact(['data']));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        // Starts with 'foo', ends with anything
        //$results = Post::where('title', 'like', "{$keyword}%")->get()
        
        $data = User::where([['name', 'like', "{$query}%"]])
                ->orWhere([['email', 'like', "{$query}%"]])
                ->paginate(10)->setPath('users');
        
        return view('admin.users.index',compact(['data']));
    }

    private function getRoles()
    {
        $result = DB::select("SHOW COLUMNS FROM `users` LIKE 'role';");
        $regex = "/'(.*?)'/";
        preg_match_all( $regex , $result[0]->Type, $enum_array );
        return $enum_fields = $enum_array[1];
    }

    public function create()
    {

        return view('admin.users.create')->with('roles', $this->getRoles() );
    }

    public function store(Request $request)
    {
        //dd($request['role']);
        $request->validate([
            'role' => ['in:admin,manager,user,editor'], 
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
           ]);

        //User::create($request->all());

        User::create([
            'role' => $request['role'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('users')->with('success','Create Successfully');
    }

    public function show($id)
    {
       $data =  User::find($id);
       return view('admin.users.show',compact(['data']));
    }

    public function edit($id)
    {
       $data = User::find($id);
       $roles = $this->getRoles();
       return view('admin.users.edit',compact(['data','roles']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
         'role' => ['in:admin,manager,user,editor'], 
         'name'     => 'required',
         'email'    => 'required|email',
        ]);

        if( !empty( $request->input('password') ))
        {
            $data['password'] = Hash::make($request->input('password'));
        }
        
        $data['role'] = $request->input('role');
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');

        User::where('id',$id)->update( $data);
        return redirect('users')->with('success','Update Successfully');
        
    }

    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }

}