<?php

namespace App\Services;

use Illuminate\Support\Facades\Config;

class UrlTransformer
{
    public function transformUrl(string $url, bool $isRequired)
    {
        $apiUrl = env('TINYURL_API_URL') . '?url=' . urlencode($url);
        $response = file_get_contents($apiUrl);

        return $response;
    }
}
