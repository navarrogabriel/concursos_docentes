<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConcursoPostulanteAPIRequest;
use App\Http\Requests\API\UpdateConcursoPostulanteAPIRequest;
use App\Models\ConcursoPostulante;
use App\Repositories\ConcursoPostulanteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ConcursoPostulanteController
 * @package App\Http\Controllers\API
 */

class ConcursoPostulanteAPIController extends AppBaseController
{
    /** @var  ConcursoPostulanteRepository */
    private $concursoPostulanteRepository;

    public function __construct(ConcursoPostulanteRepository $concursoPostulanteRepo)
    {
        $this->concursoPostulanteRepository = $concursoPostulanteRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/concursoPostulantes",
     *      summary="Get a listing of the ConcursoPostulantes.",
     *      tags={"ConcursoPostulante"},
     *      description="Get all ConcursoPostulantes",
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
     *                  @SWG\Items(ref="#/definitions/ConcursoPostulante")
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
        $this->concursoPostulanteRepository->pushCriteria(new RequestCriteria($request));
        $this->concursoPostulanteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $concursoPostulantes = $this->concursoPostulanteRepository->all();

        return $this->sendResponse($concursoPostulantes->toArray(), 'Concurso Postulantes retrieved successfully');
    }

    /**
     * @param CreateConcursoPostulanteAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/concursoPostulantes",
     *      summary="Store a newly created ConcursoPostulante in storage",
     *      tags={"ConcursoPostulante"},
     *      description="Store ConcursoPostulante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ConcursoPostulante that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ConcursoPostulante")
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
     *                  ref="#/definitions/ConcursoPostulante"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateConcursoPostulanteAPIRequest $request)
    {
        $input = $request->all();

        $concursoPostulantes = $this->concursoPostulanteRepository->create($input);

        return $this->sendResponse($concursoPostulantes->toArray(), 'Concurso Postulante saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/concursoPostulantes/{id}",
     *      summary="Display the specified ConcursoPostulante",
     *      tags={"ConcursoPostulante"},
     *      description="Get ConcursoPostulante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ConcursoPostulante",
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
     *                  ref="#/definitions/ConcursoPostulante"
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
        /** @var ConcursoPostulante $concursoPostulante */
        $concursoPostulante = $this->concursoPostulanteRepository->findWithoutFail($id);

        if (empty($concursoPostulante)) {
            return $this->sendError('Concurso Postulante not found');
        }

        return $this->sendResponse($concursoPostulante->toArray(), 'Concurso Postulante retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateConcursoPostulanteAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/concursoPostulantes/{id}",
     *      summary="Update the specified ConcursoPostulante in storage",
     *      tags={"ConcursoPostulante"},
     *      description="Update ConcursoPostulante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ConcursoPostulante",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ConcursoPostulante that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ConcursoPostulante")
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
     *                  ref="#/definitions/ConcursoPostulante"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateConcursoPostulanteAPIRequest $request)
    {
        $input = $request->all();

        /** @var ConcursoPostulante $concursoPostulante */
        $concursoPostulante = $this->concursoPostulanteRepository->findWithoutFail($id);

        if (empty($concursoPostulante)) {
            return $this->sendError('Concurso Postulante not found');
        }

        $concursoPostulante = $this->concursoPostulanteRepository->update($input, $id);

        return $this->sendResponse($concursoPostulante->toArray(), 'ConcursoPostulante updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/concursoPostulantes/{id}",
     *      summary="Remove the specified ConcursoPostulante from storage",
     *      tags={"ConcursoPostulante"},
     *      description="Delete ConcursoPostulante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ConcursoPostulante",
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
        /** @var ConcursoPostulante $concursoPostulante */
        $concursoPostulante = $this->concursoPostulanteRepository->findWithoutFail($id);

        if (empty($concursoPostulante)) {
            return $this->sendError('Concurso Postulante not found');
        }

        $concursoPostulante->delete();

        return $this->sendResponse($id, 'Concurso Postulante deleted successfully');
    }
}
