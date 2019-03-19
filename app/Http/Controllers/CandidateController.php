<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CandidateCollection;
use App\Http\Resources\CandidateResource;
use App\Candidate;

class CandidateController extends Controller
{
    public function index()
    {
        return new CandidateCollection(CandidateResource::collection(Candidate::all()));
    }

    public function show($id)
    {
        $candidate = Candidate::find($id);
        if (!$candidate) {
            return response()->json([
                'error' => 404,
                'message' => 'Not found'
            ], 404);
        } else {
            return new CandidateResource($candidate);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required',
            'party_id'     => 'required|integer'
        ]);
        $candidate = Candidate::create($request->all());
        return response()->json([
            'id'         => $candidate->id,
            'created_at' => $candidate->created_at
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required',
            'party_id'     => 'required'
        ]);
        $candidate = Candidate::find($id);
        if (!$candidate || $candidate->id != $id) {
            return response()->json([
                'error' => 404,
                'message' => 'not found'
            ]);
        } else {
            $candidate->update($request->all());
            return response()->json(null, 204);
        }
    }
}
