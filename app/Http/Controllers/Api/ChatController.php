<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;

/**
 * Class ApiChatController
 * @package App\Http\Controllers
 */
class ChatController extends Controller
{
    /**
     * Get all chat contacts
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getContacts(Request $request)
    {
        $contacts = User::where('id', '!=', auth()->id())->get();

        return response()->json($contacts);
    }

    /**
     * Get all messages for given user
     *
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMessages(User $user, Request $request)
    {
        $messages = Message::whereFrom($user->id)->orWhere('to', $user->id)->get();

        return response()->json($messages);
    }

    /**
     * Save message from authenticated user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'from' => auth()->id(),
            'to' => $request->to,
            'text' => $request->text
        ]);

        return response()->json($message);
    }
}
