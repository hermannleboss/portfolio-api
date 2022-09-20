<?php

use App\Kernel;
use Symfony\Component\HttpFoundation\Request;
require_once dirname(__DIR__).'/vendor/autoload_runtime.php';
Request::setTrustedProxies(
// the IP address (or range) of your proxy
    ['192.0.0.1', '10.0.0.0/8'],

    // trust *all* "X-Forwarded-*" headers
    Request::HEADER_FORWARDED

// or, if your proxy instead uses the "Forwarded" header
// Request::HEADER_FORWARDED

// or, if you're using AWS ELB
// Request::HEADER_X_FORWARDED_AWS_ELB
);
return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
