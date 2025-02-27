<?php

namespace App\Controller;

class Controller
{
    protected function response($status, $data) 
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
