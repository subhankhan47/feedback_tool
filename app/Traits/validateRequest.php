<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


trait validateRequest
{
    /**
     * workout validation requirements
     *
     * @param request $request
     * @param $type
     * @return object
     */
    public function feedbackRequest($request, $type)
    {
        switch ($type) {

            case 'store-feedback':

                $validator = [
                    'title' => 'required',
                    'description' => 'required',
                    'category' => 'required'
                ];

                break;

            default:

                $validator = [];
        };

        return Validator::make($request->all(), $validator);
    }

    public function commentRequest($request, $type)
    {
        switch ($type) {

            case 'store-comment':

                $validator = [
                    'content' => 'required'
                ];

                break;

            default:
                $validator = [];
        };

        return Validator::make($request->all(), $validator);
    }

}
