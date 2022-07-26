<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\faq;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $faqs = faq::all();
        return \response(view('admin.faq.index', [
            'data' => $faqs,
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return \response(view('admin.faq.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $faq = new faq();
        $faq->setAttribute('question', $request->input('question'));
        $faq->setAttribute('answer', $request->input('answer'));
        $faq->setAttribute('status', $request->input('status'));

        $faq->save();
        return \response(redirect('admin/faq'));
    }

    /**
     * Display the specified resource.
     *
     * @param faq $faq
     * @return Response
     */
    public function show(faq $faq): Response
    {
        return \response(view('admin.faq.show', [
            'data' => $faq,
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param faq $faq
     * @return Response
     */
    public function edit(faq $faq): Response
    {
        return \response(view('admin.faq.edit', [
            'data' => $faq,
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param faq $faq
     * @return Response
     */
    public function update(Request $request, faq $faq): Response
    {
        $faq->setAttribute('question', $request->input('question'));
        $faq->setAttribute('answer', $request->input('answer'));
        $faq->setAttribute('status', $request->input('status'));

        $faq->save();
        return \response(redirect('admin/faq'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param faq $faq
     * @return Response
     */
    public function destroy(faq $faq): Response
    {
        $faq->delete();
        return \response(redirect('/admin/faq'));
    }
}
