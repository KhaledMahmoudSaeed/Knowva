<?php

namespace App\Http\Controllers;

use App\Models\Lang;
// use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LangController extends Controller
{
    public function index()
    {
        $langs = Lang::all();
        return response()->json([
            "message" => 'Languages are recived ',
            "status" => Response::HTTP_OK,
            "data" => $langs
        ], Response::HTTP_OK);
    }

    public function show($id)
    {

        $lang = Lang::findOrFail($id);
        $readings = $lang->reading;
        $speaking = $lang->speaking;
        $writing = $lang->writing;
        $listing = $lang->listing;

        return response()->json([
            "message" => "This $lang data is reterived successfully",
            "status" => Response::HTTP_OK,
            "reading" => $readings,
            "speaking" => $speaking,
            "writing" => $writing,
            "listing" => $listing,
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        if (Lang::where('name', $request->name)->exists()) {
            return response()->json([
                "Message" => "This lang is exist",
                "status" => Response::HTTP_CONFLICT,
            ], Response::HTTP_CONFLICT);
        }
        Lang::create([
            "name" => $request->name,
        ]);
        return response()->json([
            "message" => "Lang created sucessfully",
            "status" => Response::HTTP_CREATED,
        ], Response::HTTP_CREATED);
    }
    public function destroy($id)
    {
        $lang = Lang::find($id);
        if ($lang) {
            $lang->delete();
            return response()->json([
                "message" => "The lang is deleted successfully",
                "status" => Response::HTTP_OK,
            ], Response::HTTP_OK);
        }

        return response()->json([
            "message" => "Language not found",
            "status" => Response::HTTP_NOT_FOUND,
        ], Response::HTTP_NOT_FOUND);
    }
}
