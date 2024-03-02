<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateCreateRequest;
use App\Http\Resources\CandidateResource;
use App\Models\Candidate;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CandidateController extends Controller
{
    //
    // API
    public function create(CandidateCreateRequest $request): JsonResponse
    {
        $data = $request->validated();
        // var_dump($request);
        if (Candidate::where('email', $data['email'])->count() == 1) {
            throw new HttpResponseException(response([
                "errors" => [
                    "email" => [
                        "email already registered"
                    ]
                ]
            ], 400));
        }
        if (Candidate::where('phone', $data['phone'])->count() == 1) {
            throw new HttpResponseException(response([
                "errors" => [
                    "phone" => [
                        "phone already registered"
                    ]
                ]
            ], 400));
        }

        $candidate = new Candidate($data);
        // // $user->password = Hash::make($data['password']);

        try {
            $candidate->save();
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([

                'error' =>  $th,
                'data' =>  $request->all(),
                'candidate' => $candidate
                // 'candidate' => $candidate
            ])->setStatusCode(401);
        }
        try {
            $candidate->skills()->attach($data["skill"]);
        } catch (\Throwable $th) {
            //throw $th;
            echo "$th";
            return response()->json([

                'error' =>  $th,
                'data' =>  $request->all(),
                'skill' => $data["skill"],
                'candidate' => $candidate
                // 'candidate' => $candidate
            ])->setStatusCode(401);
        }
        // $post->categories()->attach($categories);

        // return (new CandidateResource($user))->response()->setStatusCode(201);
        return response()->json([
            'status' => "ok",
            'data' =>  $request->all(),

            'candidate' => $candidate
        ])->setStatusCode(200);
    }


    // WEB
    public function register()
    {
        return response()
            ->view("candidate.register");
    }
}
