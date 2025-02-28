<?php

namespace App\Controller;

class Controller
{
    protected function response(int $status, mixed $data): never 
    {
        // TODO: MERGE REPONSE FUNCTIONS 
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
