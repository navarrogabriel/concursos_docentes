<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRequisitoItemAPIRequest;
use App\Http\Requests\API\UpdateRequisitoItemAPIRequest;
use App\Models\RequisitoItem;
use App\Repositories\RequisitoItemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RequisitoItemController
 * @package App\Http\Controllers\API
 */

class RequisitoItemAPIController extends AppBaseController
{
    /** @var  RequisitoItemRepository */
    private $requisitoItemRepository;

    public function __construct(RequisitoItemRepository $requisitoItemRepo)
    {
        $this->requisitoItemRepository = $requisitoItemRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/requisitoItems",
     *      summary="Get a listing of the RequisitoItems.",
     *      tags={"RequisitoItem"},
     *      description="Get all RequisitoItems",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/RequisitoItem")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->requisitoItemRepository->pushCriteria(new RequestCriteria($request));
        $this->requisitoItemRepository->pushCriteria(new LimitOffsetCriteria($request));
        $requisitoItems = $this->requisitoItemRepository->all();

        return $this->sendResponse($requisitoItems->toArray(), 'Requisito Items retrieved successfully');
    }

    /**
     * @param CreateRequisitoItemAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/requisitoItems",
     *      summary="Store a newly created RequisitoItem in storage",
     *      tags={"RequisitoItem"},
     *      description="Store RequisitoItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="RequisitoItem that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/RequisitoItem")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/RequisitoItem"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateRequisitoItemAPIRequest $request)
    {
        $input = $request->all();

        $requisitoItems = $this->requisitoItemRepository->create($input);

        return $this->sendResponse($requisitoItems->toArray(), 'Requisito Item saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/requisitoItems/{id}",
     *      summary="Display the specified RequisitoItem",
     *      tags={"RequisitoItem"},
     *      description="Get RequisitoItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RequisitoItem",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/RequisitoItem"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var RequisitoItem $requisitoItem */
        $requisitoItem = $this->requisitoItemRepository->findWithoutFail($id);

        if (empty($requisitoItem)) {
            return $this->sendError('Requisito Item not found');
        }

        return $this->sendResponse($requisitoItem->toArray(), 'Requisito Item retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateRequisitoItemAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/requisitoItems/{id}",
     *      summary="Update the specified RequisitoItem in storage",
     *      tags={"RequisitoItem"},
     *      description="Update RequisitoItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RequisitoItem",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="RequisitoItem that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/RequisitoItem")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/RequisitoItem"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateRequisitoItemAPIRequest $request)
    {
        $input = $request->all();

        /** @var RequisitoItem $requisitoItem */
        $requisitoItem = $this->requisitoItemRepository->findWithoutFail($id);

        if (empty($requisitoItem)) {
            return $this->sendError('Requisito Item not found');
        }

        $requisitoItem = $this->requisitoItemRepository->update($input, $id);

        return $this->sendResponse($requisitoItem->toArray(), 'RequisitoItem updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/requisitoItems/{id}",
     *      summary="Remove the specified RequisitoItem from storage",
     *      tags={"RequisitoItem"},
     *      description="Delete RequisitoItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RequisitoItem",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var RequisitoItem $requisitoItem */
        $requisitoItem = $this->requisitoItemRepository->findWithoutFail($id);

        if (empty($requisitoItem)) {
            return $this->sendError('Requisito Item not found');
        }

        $requisitoItem->delete();

        return $this->sendResponse($id, 'Requisito Item deleted successfully');
    }
}
