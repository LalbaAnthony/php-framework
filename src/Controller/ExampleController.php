<?php

namespace App\Controller;

use App\Http\Request;

class ExampleController
{

    // Méthode GET pour récupérer des données
    public function read(Request $request)
    {
        $data = [
            'id' => 1,
            'name' => 'Exemple',
            'description' => 'Ceci est un exemple de réponse API'
        ];
        $this->sendResponse(200, $data);
    }

    // Méthode POST pour créer une nouvelle entrée
    public function create(Request $request)
    {
        $input = $request->getJson();

        if (!isset($input['name'])) {
            $this->sendResponse(400, ['error' => 'Le paramètre "name" est manquant']);
        }

        // Simule la création d'une ressource (l'ID est en dur, à remplacer par la valeur issue de votre base de données)
        $createdData = [
            'id' => 2,
            'name' => $input['name'],
            'description' => $input['description'] ?? 'Aucune description'
        ];
        $this->sendResponse(201, $createdData);
    }

    private function sendResponse($status, $data)
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
