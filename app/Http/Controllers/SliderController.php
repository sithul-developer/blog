<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Spatie\Backtrace\File;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    //
    public function list()
    {
        $data['header_title'] = 'Slider';
        $slides = Slider::where('Is_deleted', 0)->latest()->paginate(5);
        return view('slider.list', $data, compact('slides'));
    }
    public function add()
    {
        $data['header_title'] = 'Add Slider';
        $slides = Slider::where('Is_deleted', 0)->latest()->paginate(5);
        return view('slider.add', $data, compact('slides'));
    }
    public function edit($id)
    {
        $data['header_title'] = 'Slider Edit ';
        $sliders = Slider::where('Is_deleted', 0)->find($id);
        return view('slider.edit', $data, compact('sliders'));
    }
    public function insert(Request $request)
    {
       /*  $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048 ||dimensions:min_width=1906,min_height=715,max_width=1906,max_height=715',
        ]); */

        $sliders = new Slider;
        $sliders->title = $request->input('title');
        $sliders->sub_title = $request->input('sub_title');
        $sliders->description = $request->input('description');

        if (!empty($request->file('image'))) {

            /*    if(!empty($sliders->getImage())){
            unlink('./assets/admin/uploads/image/'.$sliders->image);
        } */

            $ext = $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('./assets/admin/uploads/image/', $filename);
            $sliders->image = $filename;
        }


        $sliders->save();
        return redirect('sliders')->with('success', 'Slider created successfully!');
        /*  dd($request->all()); */
    }

    public function update(Request $request, $id)
    {
        $sliders =  Slider::findOrFail($id);
        $sliders->title = trim($request->title);
        $sliders->sub_title = trim($request->sub_title);
        $sliders->description = trim($request->description);
        $sliders->status = trim($request->status);
        if (!empty($request->file('image'))) {
            if (!empty($sliders->getImage())) {
              /*   $request->validate([
                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048 ||dimensions:min_width=1906,min_height=715,max_width=1906,max_height=715',
                ]); */
                unlink('./assets/admin/uploads/image/' . $sliders->image);
            }
            $ext = $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('./assets/admin/uploads/image/', $filename);
            $sliders->image = $filename;
        }
        $sliders->save();
        return redirect('sliders')->with('success', 'Slider created successfully!');
    }
    public function delete(Request $request)
    {
        $sliders = $request->input('slider_id');
        $sliders = Slider::find($sliders);
        $sliders->Is_deleted = 1;
        $sliders->save();
        return redirect()->back()->with('success', 'Slider is delete successfully!');
    }
}
