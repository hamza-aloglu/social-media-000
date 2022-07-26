<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Message;
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
        $messages = Message::all();
        return \response(view('admin.message.index', [
            'data' => $messages,
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param Message $message
     * @return Response
     */
    public function show(Message $message): Response
    {
        $message->setAttribute('status', 'read');
        $message->save();
        return \response(view('admin.message.show', [
            'data' => $message,
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Message $message
     * @return Response
     */
    public function destroy(Message $message): Response
    {
        $message->delete();
        return \response(redirect(route('admin.message.index')));
    }
}
