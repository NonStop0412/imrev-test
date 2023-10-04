<?php

namespace App\Http\Controllers\API;

use App\Models\Company;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Http\Request;

class CompaniesController extends BaseController
{
    /**
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $companies = Company::paginate(20);

        foreach ($companies as $company)
        {
            $company['clients_count'] = count($company->clients);
            $company['clients'] = $company->clients;
        }

        return $this->sendResponse($companies, 'Companies');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getClientsByCompanyId(Request $request): JsonResponse
    {
        $company = Company::find($request['id']);

        return $this->sendResponse($company->clients, $company->name . ' ' . 'clients');
    }
}
