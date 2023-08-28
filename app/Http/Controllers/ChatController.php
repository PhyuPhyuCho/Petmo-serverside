<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\SendMessageRequest;
use App\Http\Services\ChatService;
use App\Models\Chat;

class ChatController extends Controller
{
    private $chatService;

    public function __construct(
        ChatService $chatService
    ) {
        $this->chatService = $chatService;
    }
    
    // Display the chat view
    public function index()
    {
        return view('chat');
    }

    
    // Fetch chat messages
    public function fetchMessagesFromMe(Request $request)
    {
        $senderUserId = $request->sender_user_id;
        $placeId = $request->place_id;
        
        // Fetch messages from the database, you can modify the query as needed
        $messages = $this->chatService->getMessagesByUserPlaceId($senderUserId, $placeId);
        return response()->json($messages);

        //return view('chat', ['formattedMessages' => $messages]);
    }
    


    // Send chat message
    /*public function sendMessage(Request $request)
    {
        //dd($request->all());

        Log::info('sendMessage method called');

        $this->chatService->sendMessages($request);
        
        $messages = $this->fetchMessages($request->sender_user_id, $request->place_id);
        
        return view('chat', ['formattedMessages' => $messages]);

        
        //return response()->json([
        //    'result' => true,
        //    'message' => $messages,
            
        //]);

        //return response()->json(['message' => 'Message sent successfully'], 201);
    }*/
    
    // Send chat message
    // Send chat message
    public function sendMessage(Request $request)
    {
        Log::info('sendMessage method called');

        $this->chatService->sendMessages($request);

        $senderUserId = $request->input('sender_user_id');
        $receiverUserId = $request->input('receiver_user_id');
        $placeId = $request->input('place_id');

        Log::info($senderUserId);
        Log::info($placeId);

        // The rest of your logic...
        return response()->json(['result' => true]);


        //return redirect("/chat/{$senderUserId}/{$receiverUserId}/{$placeId}");
    }



    
}
