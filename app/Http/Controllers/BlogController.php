<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Blog;
class BlogController extends Controller
{
    public function index(){
       
        return view('blogs.addblog' , ['product'=>Blog::get()]);
    }
    public function store(Request $req){
        
        $imageName = time().'.'.$req->image->extension();
        $req->image->move(public_path('blogsimg'),$imageName);
        
        $blog = new Blog;
        $blog->image = $imageName;
        $blog->title = $req->name;
        $blog->description = $req->discription;
        $blog->save();
        return back()->withSuccess('the blog is created');
        }
    public function create(){
        return view('blogs.create');
    }

    public function edit($id){
        $blogs = Blog::find($id);
        return view('blogs.edit',['edit'=>$blogs]);

    }

    public function update(Request $req , $id){
        $blogs = Blog::find($id);
        if(isset($req->image)){
        $imageName = time().'.'.$req->image->extension();
        $req->image->move(public_path('blogsimg'),$imageName);
        $oldimage =  $blogs->image;
        File::delete(public_path('blogsimg') . '/' . $oldimage);
        $blogs->image = $imageName;
    }
        $blogs->title = $req->title1;
        $blogs->description = $req->discription;
         $redirect =  $blogs->save();
         if($redirect){
            
            return redirect()->route('blogs.addblog')->withSuccess('the blog is updated');
        }


       
    }

    public function destroy($id){
        $delete = Blog::find($id);
        $oldimage = $delete->image;
        File::delete(public_path('blogsimg') . '/' . $oldimage);

        $delete->delete();
        return back();
    }
}
