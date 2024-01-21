<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\UrlTransformer;

class apiUrlController extends Controller
{

    public function urlTransform(Request $request): JsonResponse
    {
        $url = $request->input('url');
        $require = $request->input('required');

        $urlTransformer = new UrlTransformer();
        $transformedUrl = $urlTransformer->transformUrl($url, $require);

        $response = [
            'url' => $transformedUrl
        ];

       return response()->json($response);

    }

}
