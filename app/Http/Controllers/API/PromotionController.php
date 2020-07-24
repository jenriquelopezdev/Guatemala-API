<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PromotionResource;
use App\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PromotionController extends Controller
{
    /**
     * @OA\Get(
     *     path="/promotions",
     *     tags={"Promotions"},
     *     security={
     *        {"passport": {}},
     *     },
     *   @OA\Response(
     *          response="200",
     *          description="Show promotion",
     *
     *    ),
     *    @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *    ),
     *    @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *    )
     * )
     */
    public function index()
    {
        $promotion = Promotion::paginate(10);
        return response()->json($promotion, 200);
    }

    /**
     * @OA\Post(
     *     path="/promotions",
     *     tags={"Promotions"},
     *     security={
     *        {"passport": {}},
     *     },
     *
     *   @OA\Parameter(
     *      name="title",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="price",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="address",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="latitude",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="longitude",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *          response="200",
     *          description="Show promotion",
     *
     *    ),
     *    @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *    ),
     *    @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *    )
     * )
     *
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'price' => 'required',
            'address' => 'required|max:255',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $promotion = Promotion::create($data);

        return response(['promotion' => new PromotionResource($promotion), 'message' => 'Created successfully'], 200);
    }

    /**
     * @OA\Get(
     *     path="/promotions/{id}",
     *     tags={"Promotions"},
     *     security={
     *        {"passport": {}},
     *     },
     *      @OA\Parameter(
     *          name="id",
     *          description="promotion id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *   @OA\Response(
     *          response="200",
     *          description="Show promotion",
     *
     *    ),
     *    @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *    ),
     *    @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *    )
     * )
     */
    /**
     * Display the specified resource.
     *
     * @param \App\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        return response(['promotion' => new PromotionResource($promotion), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * @OA\Put(
     *     path="/promotions/{id}",
     *     tags={"Promotions"},
     *     security={
     *        {"passport": {}},
     *     },
     *      @OA\Parameter(
     *          name="id",
     *          description="promotion id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *
     *   @OA\Parameter(
     *      name="title",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="price",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="address",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="latitude",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="longitude",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *          response="200",
     *          description="Show promotion",
     *
     *    ),
     *    @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *    ),
     *    @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *    )
     * )
     */
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        $promotion->update($request->all());

        return response(['promotion' => new PromotionResource($promotion), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * @OA\Delete(
     *     path="/promotions/{id}",
     *     tags={"Promotions"},
     *     security={
     *        {"passport": {}},
     *     },
     *      @OA\Parameter(
     *          name="id",
     *          description="promotion id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *   @OA\Response(
     *          response="200",
     *          description="Show promotion",
     *
     *    ),
     *    @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *    ),
     *    @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *    )
     * )
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();

        return response(['message' => 'Deleted']);
    }
}
