<?php

namespace App\Http\Controllers;

use App\Models\Appreciation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'messages' => 'required|string', // Add more validation rules as needed
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        $data = $validator->validated();

        $messages = Appreciation::create([
            'messages' => $data['messages'],
        ]);

        if ($messages) {
            return response()->json(['success' => true, 'message' => 'Thank you so much, mates!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to send the messages!']);
        }
    }
}
