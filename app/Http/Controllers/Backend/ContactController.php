<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Validator;

class ContactController extends Controller
{
    // public function store(Request $request)
    // {
    //     $contact   = Contact::first();
    //      return view('backend.contact.add')->with(compact('contact'));
    // }

    public function update(Request $request)
    {
        if (!$request->isMethod('post')) {
            $contact   = Contact::first();

            return view('backend.contact.update')->with(compact('contact'));
        } else if ($request->isMethod('post')) {
            $data = $request->all();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
            $rules = array(
                    'email'        => 'required',
                    'phone'        => 'required',
                    'other_phone'        => 'required',
                    'address'        => 'required',
                    'city'        => 'required',
                    'state'        => 'required',
                    'country'        => 'required',
                    'pincode'        => 'required',
                    'working_days'        => 'required',
                    'working_time'        => 'required',
                    );

            $fieldNames = array(
                        'email'       => 'Email',
                        'phone'       => 'Phone number',
                        'other_phone'       => 'Other phone number',
                        'address'       => 'Address',
                        'city'       => 'City',
                        'state'       => 'State',
                        'country'       => 'Country',
                        'pincode'       => 'Pincode',
                        'working_days'       => 'Working days',
                        'working_time'       => 'Working time',

                        );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $contact   = Contact::first();
                $contact->email                = $request->email;
                $contact->contact_number       = $request->phone;
                $contact->other_contact_number = $request->other_phone;
                $contact->address              = $request->address;
                $contact->city                 = $request->city;
                $contact->state                = $request->state;
                $contact->country              = $request->country;
                $contact->pincode              = $request->pincode;
                $contact->working_days         = $request->working_days;
                $contact->working_time         = $request->working_time;
                $contact->languages            = $request->languages;
                $contact->save();
                return redirect('admin/contact')->with('success' ,'Contact Details Updated Successfully' );
            }
        }
    }
}
