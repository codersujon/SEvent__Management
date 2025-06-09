<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\validation\Rule;

class AdminFaqController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        $faqs = Faq::get();
        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Create
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store 
     */
    public function store(Request $request)
    {

        # VALIDATION
        $request->validate([
            'question' => ['required'],
            'answer' => ['required'],
        ]);

        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer =  $request->answer;
        $faq->save();

        return redirect()->route('admin_faq_index')->with('success', 'Faq created successfully!');
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        $faq = Faq::where('id', $id)->first();
        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $faq = Faq::where('id', $id)->first();

        # VALIDATION
        $request->validate([
            'question' => ['required'],
            'answer' => ['required'],
        ]);

        $faq->question = $request->question;
        $faq->answer =  $request->answer;
        $faq->update();

        return redirect()->route('admin_faq_index')->with('success', 'Faq updated successfully!');
    }

    /**
     * Destroy
     */
    public function destroy($id)
    {
        $faq = Faq::where('id', $id)->first();
        $faq->delete();

        return redirect()->route('admin_faq_index')->with('success', 'Faq deleted successfully!');
    }
}
