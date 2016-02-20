<?php
namespace Teto\HTTP;

/**
 * HTTP StatusCode repository
 *
 * @package   Teto\HTTP
 * @author    USAMI Kenta <tadsan@zonu.me>
 * @copyright 2016 USAMI Kenta
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
final class StatusCode
{
    const OK                    = 200;
    const Created               = 201;
    const Accepted              = 202;
    const No_Content            = 204;
    const Reset_Content         = 205;
    const Moved_Permanently     = 301;
    const Found                 = 302;
    const See_Other             = 303;
    const Not_Modified          = 304;
    const Temporary_Redirect    = 307;
    const Permanent_Redirect    = 308;
    const Bad_Request           = 400;
    const Unauthorized          = 401;
    const Payment_Required      = 402;
    const Forbidden             = 403;
    const Not_Found             = 404;
    const Method_Not_Allowed    = 405;
    const Not_Acceptable        = 406;
    const Im_a_teapot           = 418;
    const Unavailable_For_Legal_Reasons = 451;
    const Internal_Server_Error = 500;
    const Service_Unavailable   = 503;

    public static $REASON_PHRASE = [
        self::OK                    => 'OK',
        self::Created               => 'Created',
        self::Accepted              => 'Accepted',
        self::No_Content            => 'No Content',
        self::Reset_Content         => 'Reset Content',
        self::Moved_Permanently     => 'Moved Permanently',
        self::Found                 => 'Found',
        self::See_Other             => 'See Other',
        self::Not_Modified          => 'Not Modified',
        self::Temporary_Redirect    => 'Temporary Redirect',
        self::Permanent_Redirect    => 'Permanent Redirect',
        self::Bad_Request           => 'Bad Request',
        self::Unauthorized          => 'Unauthorized',
        self::Payment_Required      => 'Payment Required',
        self::Forbidden             => 'Forbidden',
        self::Not_Found             => 'Not Found',
        self::Method_Not_Allowed    => 'Method Not Allowed',
        self::Not_Acceptable        => 'Not Acceptable',
        self::Im_a_teapot           => 'Im a teapot',
        self::Unavailable_For_Legal_Reasons => 'Unavailable For Legal Reasons',
        self::Internal_Server_Error => 'Internal Server Error',
        self::Service_Unavailable   => 'Service Unavailable',
    ];

    private function __construct() {}

    /**
     * @param  string|int $status
     * @param  string     HTTP-Version "HTTP/1.1"
     * @return string     HTTP Status-Line for header() "HTTP/1.1 404 Not Found"
     */
    public static function getStatusLine($status, $protocol = null)
    {
        $protocol = $protocol ?: (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : null);

        if (!isset($protocol)) {
            throw new \LogicException('');
        }

        if (isset(self::$REASON_PHRASE[$status])) {
            $phrase = sprintf('%d %s', $status, self::$REASON_PHRASE[$status]);
        } else {
            $phrase = (string)$status;
        }

        return sprintf('%s %s', $protocol, $phrase);
    }
}
