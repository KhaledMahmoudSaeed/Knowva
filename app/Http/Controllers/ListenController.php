<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Listen;

class ListenController extends Controller
{
    public function index()
    {
        $Listening = Listen::all();
        return response()->json([
            "message" => 'All Listenings are recived',
            "status" => Response::HTTP_OK,
            "data" => $Listening
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        Listen::create([
            "title" => $request->title,
            "content" => $request->content,
            "level" => $request->level,
            "lang_id" => $request->lang_id
        ]);

        return response()->json([
            "message" => "Listening record has been created",
            "status" => Response::HTTP_CREATED,
        ], Response::HTTP_CREATED);
    }
    public function destroy($id)
    {
        $Listen = Listen::find($id);
        if (!$Listen) {
            return response()->json([
                "message" => "This Listen isn't exists",
                "status" => Response::HTTP_BAD_REQUEST,

            ], Response::HTTP_BAD_REQUEST);
        }
        $Listen->delete();
        return response()->json([
            "message" => "Listen Deleted Sucessfully",
            "status" => Response::HTTP_NO_CONTENT,
        ], Response::HTTP_NO_CONTENT);
    }
}
