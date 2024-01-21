<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\UrlTransformer;

class UrlTransformerTest extends TestCase
{
    /**
     * A basic test for apiUrlTransform.
     *
     */
    public function testTransformUrl()
    {
        $urlTransformer = new UrlTransformer();
        $transformedUrl = $urlTransformer->transformUrl('http://www.example.com', true);

        $this->assertEquals('http://tinyurl.com/ylx5uce', $transformedUrl);
    }
}
