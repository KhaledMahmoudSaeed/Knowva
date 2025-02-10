<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as status;

class LangController extends Controller
{
    public function index()
    {
        $langs = Lang::all();
        return response()->json([
            "message" => 'Languages are recived ',
            "status" => status::HTTP_OK,
            "data" => $langs
        ], status::HTTP_OK);
    }

    public function store(Request $request)
    {
        if (Lang::where('name', $request->name)->exists()) {
            return response()->json([
                "Message" => "This lang is exist",
                "status" => status::HTTP_CONFLICT,
            ], status::HTTP_CONFLICT);
        }
        Lang::create([
            "name" => $request->name,
        ]);
        return response()->json([
            "message" => "Lang created sucessfully",
            "status" => status::HTTP_CREATED,
        ], status::HTTP_CREATED);
    }
    public function destroy($id)
    {
        $lang = Lang::find($id);
        if ($lang) {
            $lang->delete();
            return response()->json([
                "message" => "The lang is deleted successfully",
                "status" => status::HTTP_OK,
            ], status::HTTP_OK);
        }

        return response()->json([
            "message" => "Language not found",
            "status" => status::HTTP_NOT_FOUND,
        ], status::HTTP_NOT_FOUND);
    }
}
