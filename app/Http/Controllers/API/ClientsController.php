<?php

namespace App\Http\Controllers\API;

use App\Models\Client;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Http\Request;

class ClientsController extends BaseController
{
    /**
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $clients = Client::paginate(20);
        foreach ($clients as $client)
        {
            $client['companies_count'] = count($client->companies);
            $client['companies'] = $client->companies;
        }

        return $this->sendResponse($clients, 'Clients');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getCompaniesByClientId(Request $request): JsonResponse
    {
        $client = Client::find($request['id']);

        return $this->sendResponse($client->companies, $client->name . ' ' . $client->surname .  ' ' . 'companies');
    }
}
