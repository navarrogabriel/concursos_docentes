<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLlamadoAPIRequest;
use App\Http\Requests\API\UpdateLlamadoAPIRequest;
use App\Models\Llamado;
use App\Repositories\LlamadoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LlamadoController
 * @package App\Http\Controllers\API
 */

class LlamadoAPIController extends AppBaseController
{
    /** @var  LlamadoRepository */
    private $llamadoRepository;

    public function __construct(LlamadoRepository $llamadoRepo)
    {
        $this->llamadoRepository = $llamadoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/llamados",
     *      summary="Get a listing of the Llamados.",
     *      tags={"Llamado"},
     *      description="Get all Llamados",
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
     *                  @SWG\Items(ref="#/definitions/Llamado")
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
        $this->llamadoRepository->pushCriteria(new RequestCriteria($request));
        $this->llamadoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $llamados = $this->llamadoRepository->all();

        return $this->sendResponse($llamados->toArray(), 'Llamados retrieved successfully');
    }

    /**
     * @param CreateLlamadoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/llamados",
     *      summary="Store a newly created Llamado in storage",
     *      tags={"Llamado"},
     *      description="Store Llamado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Llamado that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Llamado")
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
     *                  ref="#/definitions/Llamado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateLlamadoAPIRequest $request)
    {
        $input = $request->all();

        $llamados = $this->llamadoRepository->create($input);

        return $this->sendResponse($llamados->toArray(), 'Llamado saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/llamados/{id}",
     *      summary="Display the specified Llamado",
     *      tags={"Llamado"},
     *      description="Get Llamado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Llamado",
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
     *                  ref="#/definitions/Llamado"
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
        /** @var Llamado $llamado */
        $llamado = $this->llamadoRepository->findWithoutFail($id);

        if (empty($llamado)) {
            return $this->sendError('Llamado not found');
        }

        return $this->sendResponse($llamado->toArray(), 'Llamado retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateLlamadoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/llamados/{id}",
     *      summary="Update the specified Llamado in storage",
     *      tags={"Llamado"},
     *      description="Update Llamado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Llamado",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Llamado that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Llamado")
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
     *                  ref="#/definitions/Llamado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateLlamadoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Llamado $llamado */
        $llamado = $this->llamadoRepository->findWithoutFail($id);

        if (empty($llamado)) {
            return $this->sendError('Llamado not found');
        }

        $llamado = $this->llamadoRepository->update($input, $id);

        return $this->sendResponse($llamado->toArray(), 'Llamado updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/llamados/{id}",
     *      summary="Remove the specified Llamado from storage",
     *      tags={"Llamado"},
     *      description="Delete Llamado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Llamado",
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
        /** @var Llamado $llamado */
        $llamado = $this->llamadoRepository->findWithoutFail($id);

        if (empty($llamado)) {
            return $this->sendError('Llamado not found');
        }

        $llamado->delete();

        return $this->sendResponse($id, 'Llamado deleted successfully');
    }
}
