<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyEditRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompaniesController extends Controller
{
    /**
     * @return View
     */
    public function getAll(): View
    {
        $companies = Company::paginate(50);

        return \view('admin.companies.index', ['companies' => $companies]);
    }

    /**
     * @param int $companyId
     * @return View
     */
    public function info(int $companyId): View
    {
        $company = Company::find($companyId);

        return \view('admin.companies.edit', ['company' => $company]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.companies.create');
    }

    /**
     * @param CompanyCreateRequest $request
     * @return RedirectResponse
     */
    public function save(CompanyCreateRequest $request): RedirectResponse
    {
        $data = $request->all();
        unset($data['_token']);

        $company = Company::create($data);

        return redirect('companies/info/' . $company->id);
    }

    /**
     * @param CompanyEditRequest $request
     * @return RedirectResponse
     */
    public function update(CompanyEditRequest $request): RedirectResponse
    {
        $company = Company::find($request['id']);

        foreach ($request->all() as $key => $value) {
            if (empty($company->$key)) {
                continue;
            }

            $company->$key = $value;
        }

        $company->save();

        return redirect('companies/info/' . $company->id);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        Company::where('id', '=', $request['companyId'])->delete();

        return redirect('companies/');
    }
}
