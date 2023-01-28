<?php

namespace App\Http\Controllers;

use App\Models\Preform;
use App\Http\Resources\ApiResponse;

class AdminPreformController extends Controller
{
    public const RESOURCE_NAME = "Preform";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preform = Preform::all();

        return new ApiResponse($preform, SELF::RESOURCE_NAME . " created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  Preform  $preform
     * @return \Illuminate\Http\Response
     */
    public function show(Preform $preform)
    {
        return new ApiResponse($preform, SELF::RESOURCE_NAME . " created successfully");
    }
}