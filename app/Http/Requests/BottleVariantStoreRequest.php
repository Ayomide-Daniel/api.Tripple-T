<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\BaseFormRequest;

class BottleVariantStoreRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::authorize('create', BottleVariant::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'bottle_id' => 'required|integer|exists:bottles,id',
            /**
             * There is a unique constraint on the bottle_id & name column of the bottle_variants table.
             */
            'name' => ["required", "string", Rule::unique('bottle_variants')->where(function ($query) {
                return $query->where('bottle_id', $this->bottle_id);
            })],
            'price' => 'required|integer',
            'description' => 'required|string',
        ];
    }   
}
