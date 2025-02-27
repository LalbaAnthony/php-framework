<?php

namespace App\Controller;

use App\Http\Request;

class ExampleController extends Controller
{
    // Méthode GET pour récupérer des données
    public function read(Request $request)
    {
        $data = [
            'id' => 1,
            'name' => 'Exemple',
            'description' => 'Ceci est un exemple de réponse API'
        ];
        $this->response(200, $data);
    }

    // Méthode POST pour créer une nouvelle entrée
    public function create(Request $request)
    {
        $input = $request->getJson();

        if (!isset($input['name'])) {
            $this->response(400, ['error' => 'Le paramètre "name" est manquant']);
        }

        // Simule la création d'une ressource (l'ID est en dur, à remplacer par la valeur issue de votre base de données)
        $createdData = [
            'id' => 2,
            'name' => $input['name'],
            'description' => $input['description'] ?? 'Aucune description'
        ];
        $this->response(201, $createdData);
    }
}
