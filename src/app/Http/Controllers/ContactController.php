<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function contact() {
        session()->forget('contact_input');
        $categories = Category::all();
        return view('contact', compact('categories'));
    }

    public function confirm(ContactRequest $request) {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'category_id', 'detail']);
        $category = Category::find($contact['category_id']);
        $contact['category_name'] = $category->content;
        session()->put('contact_input', $contact);
        return view('confirm', compact('contact'));
    }

    public function store(Request $request) {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'category_id', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }

    public function admin() {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();
        $genders = Contact::select('gender')->distinct()->pluck('gender');
        return view('index', compact('contacts', 'categories', 'genders'));
    }

    public function search(Request $request) {
        $contacts = Contact::with('category')->KeywordSearch($request->keyword)->GendersSearch($request->gender)->CategorySearch($request->category)->DateSearch($request->date)->paginate(7);
        $categories = Category::all();
        $genders = Contact::select('gender')->distinct()->pluck('gender');
        return view('index', compact('contacts', 'categories', 'genders'));
    }

    public function delete(Request $request) {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }
}
