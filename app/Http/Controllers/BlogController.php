<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;


use App\Blog;

use App\Category;

use App\Photo;

use Image;

class BlogController extends Controller
{
    //

      public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }


    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blog.index', compact('blogs'));
    }

    public function create()
    {
         $categories = Category::pluck('name', 'id');
        return view('blog.create', compact('categories'));

    }

      public function store(Request $request)
    {

        // $formInput=$request->except('image');
        // $input = $request->all();
        // $blog = Blog::create($input);
        // if ($categoryIds = $request->category_id) {
        //     $blog->category()->sync($categoryIds);
        // }
        // return redirect('blog');



        // $input = $request->all();

        // if ($photo = $request->image('photo_id')) {
        //     $name = $photo->getClientOriginalName();
        //     $photo->move('images', $name);
        //     $photo = Photo::create(['photo' => $name]);
        //     $input['photo_id'] = $photo->id;
        // }


        // $image=$request->photo_id;


        //Original Code -->

        $formInput=$request->except('image');
        $input = $request->all();
        

        // $image=$request->image;
        // if($image){
        //     $imageName=$image->getClientOriginalName();
        //     $image->move('images',$imageName);
            // $image->resize(238, 238)->move('images',$imageName);
        //     $formInput['image']=$imageName;
        // }

        //End of Original Code -->

        if ($file = $request->file('photo_id')) {
            $imageName = $file->getClientOriginalName();
            $file->move('images', $imageName);
            $photo = Photo::create(['photo' => $imageName, 'title' => $imageName]);
            $formInput['photo_id'] = $photo->id;
        }


        //  if ($image = $request->file('photo_id')) {
        //     $imageName = $file->getClientOriginalName();
        //     $image->move('images', $imageName);
        //     $photo = Photo::create(['photo' => $imageName, 'title' => $name]);
        //     $formInput['photo_id'] = $photo->id;
        // }

        // if ($file = $request->file('photo_id')) {
        //     $name = Carbon::now(). '.' .$file->getClientOriginalName();
        //     $file->move('images', $name);
        //     $photo = Photo::create(['photo' => $name, 'title' => $name]);
        //     $input['photo_id'] = $photo->id;
        // }


        // $image = $request->file('image');
        // $imageName = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
        // Image::make($image->getRealPath())->resize(468, 249)->save('public/images'.$imageName);
        // $blog->image = 'img/products/'.$imageName;
        // $blog->save();





        $blog = Blog::create($formInput);

        // $blog = Blog::create($input);
        if ($categoryIds = $request->category_id) {
            $blog->category()->sync($categoryIds);
        }
        return redirect('blog');
    }


    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.show', compact('blog'));
    }

    public function edit($id)
    {
        $categories = Category::pluck('name', 'id');
        $blog = Blog::findOrFail($id);
        return view('blog.edit', compact('blog', 'categories'));
    }

     public function update(Request $request, $id)
    {
         // $formInput=$request->except('image');
        // $input = $request->all();
         $formInput=$request->all();
         $blog = Blog::findOrFail($id);


        // if($image = $request->file('image')){

        if($image = $request->image){
            $imageName = time() . $image->getClientOriginalName();


            $image->move('images', $imageName);

            $photo = Photo::create(['file'=>$name]);


            $formInput['image']=$imageName;


        }

     // Blogs()->whereId($id)->first()->update($formInput);

        
        $blog->update($formInput);
         if ($categoryIds = $request->category_id) {
            $blog->category()->sync($categoryIds);
        }
        return redirect('blog');
    }

     public function destroy(Request $request, $id)

    {

        $blog = Blog::findOrFail($id);
        $categoryIds = $request->category_id;
        $blog->category()->detach($categoryIds);
        $blog->delete($request->all());
        return redirect('/blog/bin');
    }


     public function bin()
    {
        $deletedBlogs = Blog::onlyTrashed()->get();
        return view('blog.bin', compact('deletedBlogs'));
    }


     public function restore($id)
    {
        $restoredBlogs = Blog::onlyTrashed()->findOrFail($id);
        $restoredBlogs->restore($restoredBlogs);
        return redirect('/blog');
    }

      public function destroyBlog($id)
    {
        $destroyBlog = Blog::onlyTrashed()->findOrFail($id);
        $destroyBlog->forceDelete($destroyBlog);
        return back();  
    }


}
