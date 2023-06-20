<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;


class UserRoleController extends Controller
{





    //




    public function create_user()
    {
        $data['header_title'] = 'Create User';
        $create_user = User::where('Is_deleted', 0)->latest()->paginate(5);
        return view('admin.user_role.create_user', $data, compact('create_user'));
    }
    //
    public function all_store_user()
    {
        $data['header_title'] = 'All Store User';
        $all_role = User::where('Is_deleted', 0)->latest()->paginate(5);
        return view('admin/user_role/all_user_role', $data, compact('all_role'));
    }

    public function store_user(Request $request)
    {
        $data['header_title'] = 'Add Role';
        /*\     $add_role = User::where('Is_deleted', 0)->get();
        return view('admin.user_role.all_user.add_role', $data,   compact('add_role') ); */

        $role = new User();


        if (!empty($request->file('image'))) {

            /*   if (!empty($role->getImage())) {
                unlink('media/' .$role->image);
            } */
            $ext = $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('media/', $filename);
            $role->image = $filename;
        }
        $role->name = $request->input('name');
        $role->last_name = $request->input('last_name');
        $role->email = $request->input('email');
        $role['password'] = Hash::make($request->input('password'));
        $role['confirm_password'] = Hash::make($request->input('confirm_password'));
        $role->dashboard = $request->input('dashboard');
        $role->phone_number = $request->input('phone_number');
        $role->category = $request->input('category');
        $role->tag = $request->input('tag');
        $role->slider = $request->input('slider');
        $role->post = $request->input('post');
        $role->footer = $request->input('footer');
        $role->gallery = $request->input('gallery');
        $role->preview = $request->input('preview');
        $role->setting = $request->input('setting');
        $role->description = $request->input('description');
        $role->is_admin = $request->input('is_admin');

        $role->save();
        return redirect('admin/all/user')->with('success', 'Create Role created successfully!');

        /*  dd( $request->all()); */
    }
    public function edit_user(Request $request, $id)
    {
        $data['header_title'] = 'Category Edit ';
        $role = User::where('Is_deleted', 0)->find($id);
        return view('admin.user_role.edit_user', $data, compact('role'));
        /*    dd( $request->all()); */
    }

    public function update_user(Request $request, $id)
    {
        $data['header_title'] = 'Add Role';
        /*     $add_role = User::where('Is_deleted', 0)->get();
        return view('admin.user_role.all_user.add_role', $data,   compact('add_role') ); */
        $role = User::findOrFail($id);

        if (!empty($request->file('image'))) {
            if (!empty($role->getImage())) {
                unlink('media/' .$role->image);
            }
            $ext = $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('media/', $filename);
            $role->image = $filename;
        }

        $role->name = $request->input('name');
        $role->last_name  = $request->input('last_name');
        $role->email  = $request->input('email');
        $role->phone_number  = $request->input('phone_number');
        $role->dashboard = $request->input('dashboard');
        $role->category = $request->input('category');
        $role->tag = $request->input('tag');
        $role->slider = $request->input('slider');
        $role->post = $request->input('post');
        $role->footer = $request->input('footer');
        $role->gallery = $request->input('gallery');
        $role->preview = $request->input('preview');
        $role->setting = $request->input('setting');
        $role->is_admin = $request->input('is_admin');
        $role->description = $request->input('description');
        $role->save();
        return redirect('admin/all/user')->with('success', 'Create Role created successfully!');
        /*    dd( $request->all()); */
    }
    public function delete_role(Request $request)
    {

        $role = $request->input('role_id');
        $role = User::find($role);
        $role->Is_deleted = 1;
        $role->save();
        return redirect()->back()->with('success', ' Role is delete successfully!');
    }


    public function all_role()
    {
        $data['header_title'] = 'Add Role';
        $add_role = User::where('Is_deleted', 0)->get();
        return view('admin.layout.aside', $data,  compact('add_role'));
    }
}
