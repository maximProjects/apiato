<?php

namespace App\Containers\Expense\UI\API\Controllers;

use App\Containers\Comment\UI\API\Requests\CreateCommentRequest;
use App\Containers\Comment\UI\API\Transformers\CommentTransformer;
use App\Containers\Expense\Data\Transporters\ExpenseArrayTransporter;
use App\Containers\Expense\Data\Transporters\ExpenseTransporter;
use App\Containers\Expense\UI\API\Requests\CreateExpenseAttachmentsRequest;
use App\Containers\Expense\UI\API\Requests\CreateExpenseRequest;
use App\Containers\Expense\UI\API\Requests\DeleteExpenseRequest;
use App\Containers\Expense\UI\API\Requests\GetAllExpensesRequest;
use App\Containers\Expense\UI\API\Requests\FindExpenseByIdRequest;
use App\Containers\Expense\UI\API\Requests\GetExpensesByProjectIdRequest;
use App\Containers\Expense\UI\API\Requests\UpdateExpenseRequest;
use App\Containers\Expense\UI\API\Transformers\ExpenseTransformer;
use App\Containers\Media\UI\API\Transformers\MediaTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Requests\Request;
use App\Ship\Transporters\DataTransporter;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Expense\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateExpenseRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createExpense(CreateExpenseRequest $request)
    {
        try{
            $dataArr = new ExpenseTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new ExpenseArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];


        $expenses =[];
        foreach ($dataArr as $key => $values) {
            $expenses[] = Apiato::transactionalCall('Expense@CreateExpenseAction', [$values]);

        }
        $result = new Collection($expenses);


        return $this->created($this->transform($result, ExpenseTransformer::class));
    }

    /**
     * @param FindExpenseByIdRequest $request
     * @return array
     */
    public function findExpenseById(FindExpenseByIdRequest $request)
    {
        $expense = Apiato::call('Expense@FindExpenseByIdAction', [$request]);

        return $this->transform($expense, ExpenseTransformer::class);
    }

    public function getExpensesByProjectId(GetExpensesByProjectIdRequest $request)
    {
        $expense = Apiato::call('Expense@GetExpensesByProjectIdAction', [$request]);

        return $this->transform($expense, ExpenseTransformer::class);
    }

    /**
     * @param GetAllExpensesRequest $request
     * @return array
     */
    public function getAllExpenses(GetAllExpensesRequest $request)
    {
        $expenses = Apiato::call('Expense@GetAllExpensesAction', [$request]);

        return $this->transform($expenses, ExpenseTransformer::class);
    }

    /**
     * @param UpdateExpenseRequest $request
     * @return array
     */
    public function updateExpense(UpdateExpenseRequest $request)
    {
        $dataTransporter = new ExpenseTransporter(
            array_merge($request->all(), [])
        );

        $expense = Apiato::transactionalCall('Expense@UpdateExpenseAction', [$dataTransporter]);

        return $this->transform($expense, ExpenseTransformer::class);
    }

    /**
     * @param DeleteExpenseRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteExpense(DeleteExpenseRequest $request)
    {
        Apiato::transactionalCall('Expense@DeleteExpenseAction', [$request]);

        return $this->noContent();
    }

    public function createExpenseAttachments(CreateExpenseAttachmentsRequest $request)
    {
        $media = Apiato::call('Expense@CreateExpenseAttachmentAction', [$request->id, $request->file()]);

        return $media;
    }

    public function createExpenseComments(CreateCommentRequest $request)
    {
        $comments = Apiato::call('Comment@PrepareCommentsAction', [$request, 'Expense@CreateExpenseCommentAction']);

        $comments = new Collection($comments);

        return $this->transform($comments, CommentTransformer::class);
    }

    public  function getExpenseAttachments(FindExpenseByIdRequest $request)
    {
        $media = Apiato::transactionalCall('Expense@GetExpenseAttachmentsAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }

    public function getExpenseComments(FindExpenseByIdRequest $request)
    {
        $comments = Apiato::transactionalCall('Expense@GetExpenseCommentsAction', [$request]);

        return $this->transform($comments, CommentTransformer::class);
    }
}
