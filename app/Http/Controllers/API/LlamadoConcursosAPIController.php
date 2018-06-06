<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLlamadoConcursosAPIRequest;
use App\Http\Requests\API\UpdateLlamadoConcursosAPIRequest;
use App\Models\LlamadoConcursos;
use App\Repositories\LlamadoConcursosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LlamadoConcursosController
 * @package App\Http\Controllers\API
 */

class LlamadoConcursosAPIController extends AppBaseController
{
    /** @var  LlamadoConcursosRepository */
    private $llamadoConcursosRepository;

    public function __construct(LlamadoConcursosRepository $llamadoConcursosRepo)
    {
        $this->llamadoConcursosRepository = $llamadoConcursosRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/llamadoConcursos",
     *      summary="Get a listing of the LlamadoConcursos.",
     *      tags={"LlamadoConcursos"},
     *      description="Get all LlamadoConcursos",
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
     *                  @SWG\Items(ref="#/definitions/LlamadoConcursos")
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
        $this->llamadoConcursosRepository->pushCriteria(new RequestCriteria($request));
        $this->llamadoConcursosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $llamadoConcursos = $this->llamadoConcursosRepository->all();

        return $this->sendResponse($llamadoConcursos->toArray(), 'Llamado Concursos retrieved successfully');
    }

    /**
     * @param CreateLlamadoConcursosAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/llamadoConcursos",
     *      summary="Store a newly created LlamadoConcursos in storage",
     *      tags={"LlamadoConcursos"},
     *      description="Store LlamadoConcursos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="LlamadoConcursos that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/LlamadoConcursos")
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
     *                  ref="#/definitions/LlamadoConcursos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateLlamadoConcursosAPIRequest $request)
    {
        $input = $request->all();

        $llamadoConcursos = $this->llamadoConcursosRepository->create($input);

        return $this->sendResponse($llamadoConcursos->toArray(), 'Llamado Concursos saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/llamadoConcursos/{id}",
     *      summary="Display the specified LlamadoConcursos",
     *      tags={"LlamadoConcursos"},
     *      description="Get LlamadoConcursos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of LlamadoConcursos",
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
     *                  ref="#/definitions/LlamadoConcursos"
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
        /** @var LlamadoConcursos $llamadoConcursos */
        $llamadoConcursos = $this->llamadoConcursosRepository->findWithoutFail($id);

        if (empty($llamadoConcursos)) {
            return $this->sendError('Llamado Concursos not found');
        }

        return $this->sendResponse($llamadoConcursos->toArray(), 'Llamado Concursos retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateLlamadoConcursosAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/llamadoConcursos/{id}",
     *      summary="Update the specified LlamadoConcursos in storage",
     *      tags={"LlamadoConcursos"},
     *      description="Update LlamadoConcursos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of LlamadoConcursos",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="LlamadoConcursos that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/LlamadoConcursos")
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
     *                  ref="#/definitions/LlamadoConcursos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateLlamadoConcursosAPIRequest $request)
    {
        $input = $request->all();

        /** @var LlamadoConcursos $llamadoConcursos */
        $llamadoConcursos = $this->llamadoConcursosRepository->findWithoutFail($id);

        if (empty($llamadoConcursos)) {
            return $this->sendError('Llamado Concursos not found');
        }

        $llamadoConcursos = $this->llamadoConcursosRepository->update($input, $id);

        return $this->sendResponse($llamadoConcursos->toArray(), 'LlamadoConcursos updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/llamadoConcursos/{id}",
     *      summary="Remove the specified LlamadoConcursos from storage",
     *      tags={"LlamadoConcursos"},
     *      description="Delete LlamadoConcursos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of LlamadoConcursos",
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
        /** @var LlamadoConcursos $llamadoConcursos */
        $llamadoConcursos = $this->llamadoConcursosRepository->findWithoutFail($id);

        if (empty($llamadoConcursos)) {
            return $this->sendError('Llamado Concursos not found');
        }

        $llamadoConcursos->delete();

        return $this->sendResponse($id, 'Llamado Concursos deleted successfully');
    }
}
