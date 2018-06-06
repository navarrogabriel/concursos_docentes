<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRequisitoAPIRequest;
use App\Http\Requests\API\UpdateRequisitoAPIRequest;
use App\Models\Requisito;
use App\Repositories\RequisitoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RequisitoController
 * @package App\Http\Controllers\API
 */

class RequisitoAPIController extends AppBaseController
{
    /** @var  RequisitoRepository */
    private $requisitoRepository;

    public function __construct(RequisitoRepository $requisitoRepo)
    {
        $this->requisitoRepository = $requisitoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/requisitos",
     *      summary="Get a listing of the Requisitos.",
     *      tags={"Requisito"},
     *      description="Get all Requisitos",
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
     *                  @SWG\Items(ref="#/definitions/Requisito")
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
        $this->requisitoRepository->pushCriteria(new RequestCriteria($request));
        $this->requisitoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $requisitos = $this->requisitoRepository->all();

        return $this->sendResponse($requisitos->toArray(), 'Requisitos retrieved successfully');
    }

    /**
     * @param CreateRequisitoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/requisitos",
     *      summary="Store a newly created Requisito in storage",
     *      tags={"Requisito"},
     *      description="Store Requisito",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Requisito that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Requisito")
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
     *                  ref="#/definitions/Requisito"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateRequisitoAPIRequest $request)
    {
        $input = $request->all();

        $requisitos = $this->requisitoRepository->create($input);

        return $this->sendResponse($requisitos->toArray(), 'Requisito saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/requisitos/{id}",
     *      summary="Display the specified Requisito",
     *      tags={"Requisito"},
     *      description="Get Requisito",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Requisito",
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
     *                  ref="#/definitions/Requisito"
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
        /** @var Requisito $requisito */
        $requisito = $this->requisitoRepository->findWithoutFail($id);

        if (empty($requisito)) {
            return $this->sendError('Requisito not found');
        }

        return $this->sendResponse($requisito->toArray(), 'Requisito retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateRequisitoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/requisitos/{id}",
     *      summary="Update the specified Requisito in storage",
     *      tags={"Requisito"},
     *      description="Update Requisito",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Requisito",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Requisito that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Requisito")
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
     *                  ref="#/definitions/Requisito"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateRequisitoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Requisito $requisito */
        $requisito = $this->requisitoRepository->findWithoutFail($id);

        if (empty($requisito)) {
            return $this->sendError('Requisito not found');
        }

        $requisito = $this->requisitoRepository->update($input, $id);

        return $this->sendResponse($requisito->toArray(), 'Requisito updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/requisitos/{id}",
     *      summary="Remove the specified Requisito from storage",
     *      tags={"Requisito"},
     *      description="Delete Requisito",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Requisito",
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
        /** @var Requisito $requisito */
        $requisito = $this->requisitoRepository->findWithoutFail($id);

        if (empty($requisito)) {
            return $this->sendError('Requisito not found');
        }

        $requisito->delete();

        return $this->sendResponse($id, 'Requisito deleted successfully');
    }
}
