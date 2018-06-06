<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCarreraAPIRequest;
use App\Http\Requests\API\UpdateCarreraAPIRequest;
use App\Models\Carrera;
use App\Repositories\CarreraRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CarreraController
 * @package App\Http\Controllers\API
 */

class CarreraAPIController extends AppBaseController
{
    /** @var  CarreraRepository */
    private $carreraRepository;

    public function __construct(CarreraRepository $carreraRepo)
    {
        $this->carreraRepository = $carreraRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/carreras",
     *      summary="Get a listing of the Carreras.",
     *      tags={"Carrera"},
     *      description="Get all Carreras",
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
     *                  @SWG\Items(ref="#/definitions/Carrera")
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
        $this->carreraRepository->pushCriteria(new RequestCriteria($request));
        $this->carreraRepository->pushCriteria(new LimitOffsetCriteria($request));
        $carreras = $this->carreraRepository->all();

        return $this->sendResponse($carreras->toArray(), 'Carreras retrieved successfully');
    }

    /**
     * @param CreateCarreraAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/carreras",
     *      summary="Store a newly created Carrera in storage",
     *      tags={"Carrera"},
     *      description="Store Carrera",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Carrera that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Carrera")
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
     *                  ref="#/definitions/Carrera"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCarreraAPIRequest $request)
    {
        $input = $request->all();

        $carreras = $this->carreraRepository->create($input);

        return $this->sendResponse($carreras->toArray(), 'Carrera saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/carreras/{id}",
     *      summary="Display the specified Carrera",
     *      tags={"Carrera"},
     *      description="Get Carrera",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Carrera",
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
     *                  ref="#/definitions/Carrera"
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
        /** @var Carrera $carrera */
        $carrera = $this->carreraRepository->findWithoutFail($id);

        if (empty($carrera)) {
            return $this->sendError('Carrera not found');
        }

        return $this->sendResponse($carrera->toArray(), 'Carrera retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCarreraAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/carreras/{id}",
     *      summary="Update the specified Carrera in storage",
     *      tags={"Carrera"},
     *      description="Update Carrera",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Carrera",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Carrera that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Carrera")
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
     *                  ref="#/definitions/Carrera"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCarreraAPIRequest $request)
    {
        $input = $request->all();

        /** @var Carrera $carrera */
        $carrera = $this->carreraRepository->findWithoutFail($id);

        if (empty($carrera)) {
            return $this->sendError('Carrera not found');
        }

        $carrera = $this->carreraRepository->update($input, $id);

        return $this->sendResponse($carrera->toArray(), 'Carrera updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/carreras/{id}",
     *      summary="Remove the specified Carrera from storage",
     *      tags={"Carrera"},
     *      description="Delete Carrera",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Carrera",
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
        /** @var Carrera $carrera */
        $carrera = $this->carreraRepository->findWithoutFail($id);

        if (empty($carrera)) {
            return $this->sendError('Carrera not found');
        }

        $carrera->delete();

        return $this->sendResponse($id, 'Carrera deleted successfully');
    }
}
