<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    private $contact;
    public function __construct()
    {
        $this->contact = new Contact();
    }
    public function index()
    {
        $title = "Contact us";
        return view('clients.contact', compact('title'));
    }
    public function getForm(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'phone' => 'required|numeric',
            'email' => 'required',
            'message' => 'required'
        ], [
            'name.required' => 'Bạn phải nhập thông tin trường này',
            'name.min' => 'Phải nhập nhiều hơn 5 kí tự',
            'phone.required' => 'Bạn phải nhập thông tin trường này',
            'phone.numeric' => 'Trường này phải là số',
            'email.required' => 'Không được bỏ qua trường này',
            'message.required' => 'Trường này không được bỏ trống'
        ]);

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'message' => $request->message,
            'email' => $request->email,
            'status_id' => 1
        ];

        $this->contact->postForm($data);
        return redirect()->route('client.contact')->with('msg', 'Đã gửi dữ liệu');
    }
    public function adminContact()
    {
        $contactAd = Contact::all();
        $value = null;
        return view('admin.adminContact', compact('contactAd', 'value'));
    }
    public function getContactId(Request $request, $id = 0)
    {
        $contactDetails = $this->contact->getContactId($id);
        return view('admin.editContact', compact('contactDetails'));
    }
    public function postUpdate(Request $request)
    {
        $data = [
            'status_id' => $request->status,
            'id' => $request->id,
        ];
        $contact = DB::table('contact')
            ->where('id', $data['id'])
            ->update($data);
        return redirect()->route('contact-admin');
    }
    public function test(){
        return view('clients.test');
    }
}
