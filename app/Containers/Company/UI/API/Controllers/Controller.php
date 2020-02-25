<?php

namespace App\Containers\Company\UI\API\Controllers;

use App\Containers\Company\UI\API\Requests\CreateCompanyArrayRequest;
use App\Containers\Company\UI\API\Requests\CreateCompanyRequest;
use App\Containers\Company\UI\API\Requests\DeleteCompanyRequest;
use App\Containers\Company\UI\API\Requests\GetAllCompaniesRequest;
use App\Containers\Company\UI\API\Requests\FindCompanyByIdRequest;
use App\Containers\Company\UI\API\Requests\UpdateCompanyRequest;
use App\Containers\Company\UI\API\Transformers\CompanyTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Company\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCompany(CreateCompanyRequest $request)
    {
        try{
            $dataArr = new CreateCompanyRequest(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new CreateCompanyArrayRequest(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $companies  = [];
        foreach ($dataArr as $key => $values) {
            $companies[] = Apiato::call('Company@CreateCompanyAction', [$values]);
        }

        $result = new Collection($companies);

        return $this->created($this->transform($result, CompanyTransformer::class));
    }

    /**
     * @param FindCompanyByIdRequest $request
     * @return array
     */
    public function findCompanyById(FindCompanyByIdRequest $request)
    {
        $company = Apiato::call('Company@FindCompanyByIdAction', [$request]);

        return $this->transform($company, CompanyTransformer::class);
    }

    /**
     * @param GetAllCompaniesRequest $request
     * @return array
     */
    public function getAllCompanies(GetAllCompaniesRequest $request)
    {
        $companies = Apiato::call('Company@GetAllCompaniesAction', [$request]);

        return $this->transform($companies, CompanyTransformer::class);
    }

    /**
     * @param UpdateCompanyRequest $request
     * @return array
     */
    public function updateCompany(UpdateCompanyRequest $request)
    {
        $company = Apiato::call('Company@UpdateCompanyAction', [$request]);

        return $this->transform($company, CompanyTransformer::class);
    }

    /**
     * @param DeleteCompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCompany(DeleteCompanyRequest $request)
    {
        Apiato::call('Company@DeleteCompanyAction', [$request]);

        return $this->noContent();
    }
}
