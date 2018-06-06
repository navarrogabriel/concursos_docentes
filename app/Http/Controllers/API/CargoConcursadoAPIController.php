<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCargoConcursadoAPIRequest;
use App\Http\Requests\API\UpdateCargoConcursadoAPIRequest;
use App\Models\CargoConcursado;
use App\Repositories\CargoConcursadoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CargoConcursadoController
 * @package App\Http\Controllers\API
 */

class CargoConcursadoAPIController extends AppBaseController
{
    /** @var  CargoConcursadoRepository */
    private $cargoConcursadoRepository;

    public function __construct(CargoConcursadoRepository $cargoConcursadoRepo)
    {
        $this->cargoConcursadoRepository = $cargoConcursadoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cargoConcursados",
     *      summary="Get a listing of the CargoConcursados.",
     *      tags={"CargoConcursado"},
     *      description="Get all CargoConcursados",
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
     *                  @SWG\Items(ref="#/definitions/CargoConcursado")
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
        $this->cargoConcursadoRepository->pushCriteria(new RequestCriteria($request));
        $this->cargoConcursadoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cargoConcursados = $this->cargoConcursadoRepository->all();

        return $this->sendResponse($cargoConcursados->toArray(), 'Cargo Concursados retrieved successfully');
    }

    /**
     * @param CreateCargoConcursadoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cargoConcursados",
     *      summary="Store a newly created CargoConcursado in storage",
     *      tags={"CargoConcursado"},
     *      description="Store CargoConcursado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CargoConcursado that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CargoConcursado")
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
     *                  ref="#/definitions/CargoConcursado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCargoConcursadoAPIRequest $request)
    {
        $input = $request->all();

        $cargoConcursados = $this->cargoConcursadoRepository->create($input);

        return $this->sendResponse($cargoConcursados->toArray(), 'Cargo Concursado saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/cargoConcursados/{id}",
     *      summary="Display the specified CargoConcursado",
     *      tags={"CargoConcursado"},
     *      description="Get CargoConcursado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CargoConcursado",
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
     *                  ref="#/definitions/CargoConcursado"
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
        /** @var CargoConcursado $cargoConcursado */
        $cargoConcursado = $this->cargoConcursadoRepository->findWithoutFail($id);

        if (empty($cargoConcursado)) {
            return $this->sendError('Cargo Concursado not found');
        }

        return $this->sendResponse($cargoConcursado->toArray(), 'Cargo Concursado retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCargoConcursadoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cargoConcursados/{id}",
     *      summary="Update the specified CargoConcursado in storage",
     *      tags={"CargoConcursado"},
     *      description="Update CargoConcursado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CargoConcursado",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CargoConcursado that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CargoConcursado")
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
     *                  ref="#/definitions/CargoConcursado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCargoConcursadoAPIRequest $request)
    {
        $input = $request->all();

        /** @var CargoConcursado $cargoConcursado */
        $cargoConcursado = $this->cargoConcursadoRepository->findWithoutFail($id);

        if (empty($cargoConcursado)) {
            return $this->sendError('Cargo Concursado not found');
        }

        $cargoConcursado = $this->cargoConcursadoRepository->update($input, $id);

        return $this->sendResponse($cargoConcursado->toArray(), 'CargoConcursado updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/cargoConcursados/{id}",
     *      summary="Remove the specified CargoConcursado from storage",
     *      tags={"CargoConcursado"},
     *      description="Delete CargoConcursado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CargoConcursado",
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
        /** @var CargoConcursado $cargoConcursado */
        $cargoConcursado = $this->cargoConcursadoRepository->findWithoutFail($id);

        if (empty($cargoConcursado)) {
            return $this->sendError('Cargo Concursado not found');
        }

        $cargoConcursado->delete();

        return $this->sendResponse($id, 'Cargo Concursado deleted successfully');
    }
}
