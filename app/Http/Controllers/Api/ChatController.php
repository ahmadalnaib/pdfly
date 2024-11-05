<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    //

    public function sendMessageFromReactNative(Request $request)
    {
        // Validate incoming request (message)
        $request->validate([
            'message' => 'required|string',
        ]);

        // Retrieve message from request
        $message = $request->input('message');

        // Process the message using GPT model
        $response = $this->processMessageUsingGPT($message);

        // Return response to React Native app
        return response()->json(['response' => $response]);
    }

    private function processMessageUsingGPT($message)
    {
        // Process the message using GPT model
        // Example: You can use OpenAI to process the message
        $response = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'user', 'content' => $message],
            ],
        ]);

        // Assuming the response contains the generated response
        $generatedResponse = $response['choices'][0]['message']['content'];

        return $generatedResponse;
    }
}
