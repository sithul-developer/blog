<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    //
    public function list()
    {
        $data['header_title'] = 'Footer';
        $footers = Footer::where('Is_deleted', 0)->latest()->paginate(5);
        return view('admin.footer.list', $data, compact('footers'));
    }
    public function add()
    {
        $data['header_title'] = 'add';
        $footer = Footer::where('Is_deleted', 0)->latest()->paginate(5);
        return view('admin.footer.add', $data,compact('footer'));
    }
    public function edit($id)
    {
        $data['header_title'] = 'Slider Edit ';
        $footer = Footer::where('Is_deleted', 0)->find($id);
        return view('admin.footer.edit', $data, compact('footer'));
    }
    public function insert(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048 ||dimensions:min_width=1906,min_height=715,max_width=1906,max_height=715',
        ]);
        $sliders = new Footer();
        $sliders->title = $request->input('title');
        if (!empty($request->file('image'))) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('./assets/admin/uploads/image/', $filename);
            $sliders->image = $filename;
        }
        $sliders->save();
        return redirect('footer')->with('success', 'Footer created successfully!');
    }
    public function update(Request $request, $id)
    {
        $sliders = Footer::findOrFail($id);
        $sliders->title = trim($request->title);
        $sliders->status = trim($request->status);
        if (!empty($request->file('image'))) {
            if (!empty($sliders->getImage())) {
                $request->validate([
                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048 ||dimensions:min_width=1906,min_height=715,max_width=1906,max_height=715',
                ]);
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
        return redirect('footer')->with('success', 'Footer created successfully!');
    }
    public function delete(Request $request)
    {


        $footers = $request->input('footer_id');
        $footers = Footer::find($footers);
        $footers->Is_deleted = 1;
        $footers->save();
        return redirect()->back()->with('success', 'Slider is delete successfully!');
    }
}
