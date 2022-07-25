<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $data = Message::all();
        return \response(view('admin.message.index', [
            'data' => $data
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(int $id): Response
    {
        $data = Message::find($id);
        $data->status = 'read';
        $data->save();
        return \response(view('admin.message.show', [
            'data' => $data
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        $data = Message::find($id);
        $data->note = $request->input('note');
        $data->save();
        return \response(view('admin.message.show', [
            'data'=>$data
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        $data = Message::find($id);

        $data->delete();
        return \response(redirect(route('admin.message.index')));
    }
}
