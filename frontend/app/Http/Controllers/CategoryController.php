<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Auth;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
      
    }    

    public function index()
    {
        $data = Category::orderBy('id','desc')->paginate(10)->setPath('categories');
        return view('admin.categories.index',compact(['data']));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');        
        $data = Category::where([['title', 'like', "{$query}%"]])
        ->paginate(10)->setPath('categories');
        
        return view('admin.categories.index',compact(['data']));
    }

    public function create()
    {
        return view('admin.categories.create')->with('roles');
    }

    public function store(Request $request)
    {
        //dd($request['role']);
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:categories'],
            'description' => ['required', 'string', 'max:2000'],
           ]);

        //Category::create($request->all());

        Category::create([
            'user_id' => Auth::user()->id,
            'title' => $request['title'],
            'description' => $request['description'],
  
        ]);
        return redirect('categories')->with('success','Category created successfully');
    }

    public function show($id)
    {
       $data =  Category::find($id);
       return view('admin.categories.show',compact(['data']));
    }

    public function edit($id)
    {
       $data = Category::find($id);
       return view('admin.categories.edit',compact(['data']));
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
           ]);


        Category::where('id',$id)->update($input);
        return redirect()->route('categories.edit', $id)->with('success','Category updated.');
        
    }

    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return redirect()->back()->with('success','Category deleted.');
    }
}
