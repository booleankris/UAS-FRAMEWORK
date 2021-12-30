<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 
use App\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('home',compact('data'));
    }
    public function FormCreate()
    {
        return view('create-category');
    }
    public function Create(Request $request)
    {
        $thmb = Str::random(5) . '-' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('img/uploads/'), $thmb);
        $data[] = array(
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
            'image' => $thmb
        );
        $insert = Category::insert($data);
        return redirect('/');
    }

    public function FormEdit($id)
    {
        $data = Category::where('id',$id)->first();
        return view('edit',compact('data'));
    }
    public function Update(Request $request, $id)
    {
        $data = Category::where('id',$id)->first();
        $category = Category::findOrFail($id);
        if($request->file('image') ){
            File::delete(public_path('img/uploads/'.$data->image));
            $thmb = Str::random(5) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/uploads/'), $thmb);
            $category->image = $thmb;
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->save();
        }else{
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->save();
        }
        return redirect('/');
    }
    public function DeleteAnggota(Request $request, $id)
    {
        $query = Member::find($id);
        $query->delete();
        return redirect()->route('anggota');
    }
    public function Delete(Request $request, $id)
    {
        $delimage = Category::where('id',$id)->first();
        $data = Category::find($id);
        File::delete(public_path('img/uploads/'.$delimage->image));
        $data->delete();
        return redirect('/');
    }

}
