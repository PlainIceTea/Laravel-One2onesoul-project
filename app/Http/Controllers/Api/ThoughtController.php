<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Thought;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ThoughtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Thought::inRandomOrder()->get();
        return response()->json([
            'status' => true,
            'message' => 'data ditemukan',
            'data' => $data
        ], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataThought = new Thought;

        $rules = [
            'title' => 'required',
            'user_id' => 'required',
            'content' => 'required',
            'is_anonymous' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukan data',
                'data' => $validator->errors()
            ]);
        }

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
    
        $duplicateCheck = Thought::where('slug', $slug)->first();
    
        $counter = 1;
        while ($duplicateCheck) {
            $slug = $originalSlug . '-' . $counter;
            $duplicateCheck = Thought::where('slug', $slug)->first();
            $counter++;
        }

        $dataThought->user_id = $request->user_id;
        $dataThought->title = $request->title;
        $dataThought->content = $request->content;
        $dataThought->is_anonymous = $request->is_anonymous;
        $dataThought->slug = $slug;
        
        $post = $dataThought->save();


        return response()->json([
            'status' => true,
            'message' => 'Sukses memasukan data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $data = Thought::where('slug', $slug)->first();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'data ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'data tidak ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataThought = Thought::find($id);
        if(empty($dataThought)){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ],404);
        }

        $rules = [
            'title' => 'required',
            'user_id' => 'required',
            'content' => 'required',
            'is_anonymous' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Gagal melakukan perubahan data',
                'data' => $validator->errors()
            ]);
        }

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
    
        $duplicateCheck = Thought::where('slug', $slug)->first();
    
        $counter = 1;
        while ($duplicateCheck) {
            $slug = $originalSlug . '-' . $counter;
            $duplicateCheck = Thought::where('slug', $slug)->first();
            $counter++;
        }

        $dataThought->user_id = $request->user_id;
        $dataThought->title = $request->title;
        $dataThought->content = $request->content;
        $dataThought->is_anonymous = $request->is_anonymous;
        $dataThought->slug = $slug;
        
        $post = $dataThought->save();


        return response()->json([
            'status' => true,
            'message' => 'Sukses melakukan perubahan data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataThought = Thought::find($id);
        if(empty($dataThought)){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ],404);
        }

        $post = $dataThought->delete();


        return response()->json([
            'status' => true,
            'message' => 'Sukses melakukan penghapusan data'
        ]);
    }
}
