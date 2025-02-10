<?php

namespace App\Http\Controllers;
use App\Models\Speak;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class SpeakController extends Controller
{
    public function index()
    {
        $Speakings = Speak::all();
        return response()->json([
            "message" => 'All Speakings are recived',
            "status" => Response::HTTP_OK,
            "data" => $Speakings
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        Speak::create([
            "title" => $request->title,
            "content" => $request->content,
            "level" => $request->level,
            "lang_id" => $request->lang_id
        ]);

        return response()->json([
            "message" => "Speaking record has been created",
            "status" => Response::HTTP_CREATED,
        ], Response::HTTP_CREATED);
    }
    public function destroy($id)
    {
        $Speak = Speak::find($id);
        if (!$Speak) {
            return response()->json([
                "message" => "This Speak isn't exists",
                "status" => Response::HTTP_BAD_REQUEST,

            ], Response::HTTP_BAD_REQUEST);
        }
        $Speak->delete();
        return response()->json([
            "message" => "Speak Deleted Sucessfully",
            "status" => Response::HTTP_NO_CONTENT,
        ], Response::HTTP_NO_CONTENT);
    }
}
