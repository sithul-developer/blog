<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    //
    public function list(){
        $data[ 'header_title'] = 'Gallery ';
         $galleries = Gallery::where('Is_delete', 0)->latest()->paginate(5);
        return view('admin.gallery.list',$data,  compact('galleries') );
    }
    public function add(){
        $data[ 'header_title'] = ' Add Gallery ';
        /* $tags = Tag::where('Is_deleted', 0)->latest()->paginate(5); */
        return view('admin.gallery.add', $data, /* compact('tags') */ );
    }
    public function edit($id){
        $data['header_title'] = 'Edit Gallery ';
        $galleries = Gallery::where('Is_delete', 0)->find($id);
        return view('admin.gallery.edit', $data, compact('galleries'));
    }
    public function insert(Request $request)
    {
      /*   $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048 ||dimensions:min_width=1906,min_height=715,max_width=1906,max_height=715',
        ]); */

        $galleries = new Gallery();
        $galleries->title = $request->input('title');
        $galleries->description = $request->input('description');
        $galleries->orders = $request->input('orders');
        if (!empty($request->file('image'))) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('media/', $filename);
            $galleries->image = $filename;
        }
        $galleries->save();
        return redirect('gallery')->with('success', 'Gallery created successfully!');
    }

public function update(Request $request, $id)
    {
        $galleries = Gallery::findOrFail($id);
        $galleries->title = trim($request->title);
        $galleries->description = trim($request->description);
        $galleries->orders = trim($request->orders);
        $galleries->status = trim($request->status);
        if (!empty($request->file('image'))) {
            if (!empty($galleries->getImage())) {
            /*     $request->validate([
                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048 ||dimensions:min_width=1906,min_height=715,max_width=1906,max_height=715',
                ]); */
                unlink('media/' . $galleries->image);
            }
            $ext = $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('media/', $filename);
            $galleries->image = $filename;
        }
        $galleries->save();
        return redirect('gallery')->with('success', 'Galleries created successfully!');
    }


    public function delete(Request $request)
    {
        $galleries = $request->input('galleries_id');
        $galleries = Gallery::find($galleries);
        $galleries->Is_delete = 1;
        $galleries->save();
        return redirect()->back()->with('success', 'Galleries is delete successfully!');
    }
}
