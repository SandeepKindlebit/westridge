<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactlist;


class ContactListController extends Controller
{
    public function index()
    {
        $contactlist = Contactlist::get();
        return view('backend.contact.contact_list')->with(compact('contactlist'));
    }
}
