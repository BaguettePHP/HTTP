<?php
namespace Teto\HTTP;

final class StatusCodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProviderFor_getStatusLine
     */
    public function test_getStatusLine($expected, $input)
    {
        $actual = StatusCode::getStatusLine($input, 'HTTP/1.1');
        $this->assertEquals($expected, $actual);
    }

    public function dataProviderFor_getStatusLine()
    {
        return [
            ['HTTP/1.1 404 Not Found',  404],
            ['HTTP/1.1 404 Not Found',  '404'],
            ['HTTP/1.1 404 Not Found',  '404 Not Found'],
            ['HTTP/1.1 404 Not Phound', '404 Not Phound'],
            ['HTTP/1.1 200 OK',         200],
        ];
    }
}
