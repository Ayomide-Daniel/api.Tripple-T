<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResponse extends JsonResource
{
    /**
     * @var string
     * The message to be returned with the response
     */
    private $message;

    /**
     * ApiResponse constructor.
     * @param $resource
     * @param string $message
     */
    public function __construct($resource, string $message = "")
    {
        parent::__construct($resource);
        $this->message = $message;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function with($request)
    {
        return [
            "status" => true,
            "message" => $this->message
        ];
    }
}
