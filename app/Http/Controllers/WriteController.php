<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Write;
use Symfony\Component\HttpFoundation\Response;



class WriteController extends Controller
{
    public function index()
    {
        $Writings = Write::all();
        return response()->json([
            "message" => 'All Writings are recived',
            "status" => Response::HTTP_OK,
            "data" => $Writings
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        Write::create([
            "title" => $request->title,
            "content" => $request->content,
            "level" => $request->level,
            "lang_id" => $request->lang_id
        ]);

        return response()->json([
            "message" => "Writeing record has been created",
            "status" => Response::HTTP_CREATED,
        ], Response::HTTP_CREATED);
    }
    public function destroy($id)
    {
        $Write = Write::find($id);
        if (!$Write) {
            return response()->json([
                "message" => "This Write isn't exists",
                "status" => Response::HTTP_BAD_REQUEST,

            ], Response::HTTP_BAD_REQUEST);
        }
        $Write->delete();
        return response()->json([
            "message" => "Write Deleted Sucessfully",
            "status" => Response::HTTP_NO_CONTENT,
        ], Response::HTTP_NO_CONTENT);
    }
}
