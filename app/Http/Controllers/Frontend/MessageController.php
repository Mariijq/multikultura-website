<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'field_of_study' => ['required', 'string', 'max:255'],
            'year_of_study' => [
                'required',
                'in:first_year,second_year,third_year,fourth_year,master,other',
            ],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:100'],
            'zipcode' => ['required', 'string', 'max:20'],
            'period' => [
                'required',
                'in:fall_semester,spring_semester,summer',
            ],
            'message' => ['nullable', 'string', 'max:5000'],
        ]);

        Message::create($validated);

        return back()->with(
            'success',
            __('frontend.message_sent_successfully')
        );
    }
}
