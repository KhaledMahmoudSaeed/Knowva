<?php

namespace App\Http\Controllers;

use App\Models\Read;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReadController extends Controller
{
    public function index()
    {
        $Readings = Read::all();
        return response()->json([
            "message" => 'All Readings are recived',
            "status" => Response::HTTP_OK,
            "data" => $Readings
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        Read::create([
            "title" => $request->title,
            "content" => $request->content,
            "level" => $request->level,
            "lang_id" => $request->lang_id
        ]);

        return response()->json([
            "message" => "Reading record has been created",
            "status" => Response::HTTP_CREATED,
        ], Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        $read = Read::find($id);
        if (!$read) {
            return response()->json([
                "message" => "This Read isn't exists",
                "status" => Response::HTTP_BAD_REQUEST,

            ], Response::HTTP_BAD_REQUEST);
        }
        $read->delete();
        return response()->json([
            "message" => "Read Deleted Sucessfully",
            "status" => Response::HTTP_NO_CONTENT,
        ], Response::HTTP_NO_CONTENT);
    }
}
