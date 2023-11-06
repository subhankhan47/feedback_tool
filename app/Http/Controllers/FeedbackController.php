<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Traits\validateRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeedbackController extends Controller
{
    use validateRequest;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * This will store the user's feedback on a product
     * @param Request $request
     * @return Application|ResponseFactory|\Illuminate\Foundation\Application|Response
     */
    public function store(Request $request)
    {
        $validator = $this->feedbackRequest($request, 'store-feedback');
        if ($validator->fails()) {
            return response(['message' => 'Validation errors', 'errors' => $validator->errors(), 'success' => false], 200);
        }

        $input = $request->except('_token');
        Feedback::create($input);
        return response(['message' =>'Thanks, Feedback Submitted Successfully', 'success' => true], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }


    /**
     * This method uses product Id and get feedback of that product
     * @param $pid
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function showProductFeedback($pid){
        $feedback = Feedback::getByProductId($pid)->paginate(2);
        return view('feedback.show', compact('feedback'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
