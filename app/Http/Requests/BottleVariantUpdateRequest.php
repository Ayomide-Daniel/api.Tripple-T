<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\BaseFormRequest;

class BottleVariantUpdateRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::authorize('update', $this->bottle_variant);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'bottle_id' => 'nullable|integer|exists:bottles,id',
            /**
             * There is a unique constraint on the bottle_id & name column of the bottle_variants table.
             */
            'name' => ["nullable", "string", Rule::unique('bottle_variants')->where(function ($query) {
                // Select the id from the route params not request body.
                return $query->where('bottle_id', $this->bottle_id)->where('id', '!=', $this->route('bottle_variant'));
            })],
            'price' => 'nullable|integer',
            'description' => 'nullable|string',
        ];
    }
}
