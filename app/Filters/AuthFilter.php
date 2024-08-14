<?php

// app/Filters/AuthFilter.php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Config\Services;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $key = getenv('JWT_SECRET'); // Replace with your actual secret key

        $header = $request->getHeaderLine('Authorization');
        if (!$header || !preg_match('/Bearer\s(\S+)/', $header, $matches)) {
            $response = service('response');
            $response->setJSON([
                'status' => 'error',
                'message' => 'Authorization header is missing or invalid'
            ]);
            return $response->setStatusCode(401);
        }

        $token = $matches[1];

        try {
            JWT::decode($token, new key($key, 'HS256'));
            return true; // Token is valid, proceed to the controller
        } catch (\Exception $e) {
            $response = service('response');
            $response->setJSON([
                'status' => 'error',
                'message' => 'Invalid / Expired token'
            ]);
            return $response->setStatusCode(401);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
