<?php

namespace App\Http\Requests\events;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $todayDate = date('m/d/Y');

        return [
            'event_title' => ['required', 'max:255'],
            'start_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:'.$todayDate],
            'end_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:'.$todayDate ,'after_or_equal:start_date'],
            'week_number' => ['required', Rule::in(['first', 'second', 'third', 'fourth'])],
            'week_day' => ['required', Rule::in(['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'])],
            'month_duration' => ['required', Rule::in([3, 4, 6, 12 ])]
        ];
    }
}
