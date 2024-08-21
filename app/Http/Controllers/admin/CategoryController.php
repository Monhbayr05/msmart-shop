<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->orderBy('created_at','desc')->get();

        return view('admin.category.index',compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|string|max:255',
            'slug' =>'required|unique:categories|string|max:255',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=>'nullable',
        ]);


        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/categories/', $filename);

            $validatedData['image']='uploads/categories/'. $filename;
        }
        else
        {
            $validatedData['image']=null;
        }
        Category::query()->create([
            'name'=>$validatedData['name'],
            'slug'=>$validatedData['slug'],
            'image'=>$validatedData['image'],
            'status'=> $request->status == true ? 1 : 0,
        ]);

        return redirect(route('admin.categories.index'))->with('message','Post Created Successfully');
    }
    public function edit($id)
    {
        $category = Category::query()->find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request , $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' =>'required|string|max:255',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=>'nullable',
        ]);

        $category = Category::query()->find($id);
        if($request->hasfile('image'))
        {
            $destination=$category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/categories/', $filename);
            $validatedData['image']='uploads/categories/'. $filename;
        }
        category::query()->find($id)->update([
            'name'=>$validatedData['name'],
            'slug'=>$validatedData['slug'],
            'image'=>$validatedData['image'] ?? $category->image,
            'status'=> $request->status == true ? 1 : 0,
        ]);
        return redirect(route('admin.categories.index'))->with('message','Post Updated Successfully');
    }
    public function destroy($id)
    {
        $category = Category::query()->find($id);
        $destination=$category->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $category->delete();
        return redirect(route('admin.categories.index'))->with('message','Post Deleted Successfully');
    }
}
