<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Validator;

class PagesController extends Controller
{
    public  function index()
    {
        $pages = Page::get();
        return view('backend.static_pages.index' , compact('pages'));
    }
    public function add(Request $request)
    {
       if (! $request->isMethod('post')) {
        return view('backend.static_pages.add');
        } elseif ($request->isMethod('post')) {
        // $data = $request->all();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
       $rules = array(
               'name'           => 'required|max:100',
               'url'            => 'required|unique:pages|max:100',
               'content'        => 'required',
               );

       $fieldNames = array(
                   'name'              => 'Name',
                   'url'               => 'Url',
                   'content'           => 'Content',
                   );

       $validator = Validator::make($request->all(), $rules);
       $validator->setAttributeNames($fieldNames);

       if ($validator->fails()) {
           return back()->withErrors($validator)->withInput();
       } else {
        if ($request->hasFile('about_image')) {

        $image     =   $request->file('about_image');
        $extension =   $image->getClientOriginalExtension();
       $filename  =   'about_image_'.time() . '.' . $extension;

        $success   = $image->move('public/backend/images/pages_images', $filename);

        if (!isset($success)) {
            // return back()->withError('Could not upload Image');
            return  back()->with('error' , 'Could not upload Image');
        }
    }

           $page = new Page;
           $page->name             = $request->name;
           $page->url              = $request->url;
           $page->about_image             = $filename;
           $page->content          = $request->content;
           $page->status           = $request->status;

           $page->save();
           return redirect('admin/pages')->with('success' , 'Page added successfully');
       }
   }

    }
    public function update(Request $request)
    {
        if (!$request->isMethod('post')) {
            $data['result'] = Page::find($request->id);

            return view('backend.static_pages.edit', $data);
        } else if ($request->isMethod('post')) {
        //     $data = $request->all();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
            $rules = array(
                    'name'           => 'required|max:100',
                    'url'            => 'required|max:100',
                    'content'        => 'required',
                    );

            $fieldNames = array(
                        'name'          => 'Name',
                        'url'           => 'Url',
                        'content'       => 'Content',
                        );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $page = Page::find($request->id);

                $page->name            = $request->name;
                $page->url             = $request->url;
                $page->content         = $request->content;
                $page->status          = $request->status;

                $image     =   $request->file('about_image');

                if ($image) {
                    $extension =   $image->getClientOriginalExtension();
                    $filename  =   'about_image_'.time() . '.' . $extension;
                    $success = $image->move('public/backend/images/pages_images', $filename);
                    if (! isset($success)) {
                       return  back()->with('error' , 'Could not upload Image');
                    }
                    $page->about_image  = $filename;
                }
                $page->save();
                return redirect('admin/pages')->with('success' ,'Page Updated Successfully' );
            }
        }
    }

    public function delete(Request $request)
    {

        Page::find($request->id)->delete();
        return redirect('admin/pages')->with('success', 'Page Deleted Successfully');
    }

}
