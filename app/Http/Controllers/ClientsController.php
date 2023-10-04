<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientCreateRequest;
use App\Http\Requests\ClientEditRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Client;

class ClientsController extends Controller
{
    /**
     * @return View
     */
    public function getAll(): View
    {
        $clients = Client::paginate(50);

        return \view('admin.clients.index', ['clients' => $clients]);
    }

    /**
     * @param int $clientId
     * @return View
     */
    public function info(int $clientId): View
    {
        $client = Client::find($clientId);
        $companies = Company::all();

        return \view('admin.clients.edit', ['client' => $client, 'companies' => $companies]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.clients.create');
    }

    /**
     * @param ClientCreateRequest $request
     * @return RedirectResponse
     */
    public function save(ClientCreateRequest $request): RedirectResponse
    {
        $data = $request->all();
        unset($data['_token']);

        $client = Client::create($data);

        return redirect('clients/info/' . $client->id);
    }

    /**
     * @param ClientEditRequest $request
     * @return RedirectResponse
     */
    public function update(ClientEditRequest $request): RedirectResponse
    {
        $client = Client::find($request['id']);

        foreach ($request->all() as $key => $value) {
            if (empty($client->$key)) {
                continue;
            }

            $client->$key = $value;
        }

        $client->save();

        return redirect('clients/info/' . $client->id);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        Client::where('id', '=', $request['clientId'])->delete();

        return redirect('clients/');
    }

    /**
     * @param Request $request
     * @param int $clientId
     * @return RedirectResponse
     */
    public function addCompany(Request $request, int $clientId): RedirectResponse
    {
        DB::table('companies_rel_clients')->updateOrInsert(['company_id' => $request['company_id'], 'client_id' => $clientId]);

        return redirect('clients/info/' . $clientId);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function deleteCompany(Request $request): RedirectResponse
    {
        DB::table('companies_rel_clients')->where([
            ['company_id', '=' , $request['companyId']],
            ['client_id', '=',  $request['clientId']]
            ])->delete();

        return redirect('clients/info/' . $request['clientId']);
    }
}
