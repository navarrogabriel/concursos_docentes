<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConcursoAPIRequest;
use App\Http\Requests\API\UpdateConcursoAPIRequest;
use App\Models\Concurso;
use App\Repositories\ConcursoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ConcursoController
 * @package App\Http\Controllers\API
 */

class ConcursoAPIController extends AppBaseController
{
    /** @var  ConcursoRepository */
    private $concursoRepository;

    public function __construct(ConcursoRepository $concursoRepo)
    {
        $this->concursoRepository = $concursoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/concursos",
     *      summary="Get a listing of the Concursos.",
     *      tags={"Concurso"},
     *      description="Get all Concursos",
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
     *                  @SWG\Items(ref="#/definitions/Concurso")
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
        $this->concursoRepository->pushCriteria(new RequestCriteria($request));
        $this->concursoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $concursos = $this->concursoRepository->all();

        return $this->sendResponse($concursos->toArray(), 'Concursos retrieved successfully');
    }

    /**
     * @param CreateConcursoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/concursos",
     *      summary="Store a newly created Concurso in storage",
     *      tags={"Concurso"},
     *      description="Store Concurso",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Concurso that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Concurso")
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
     *                  ref="#/definitions/Concurso"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateConcursoAPIRequest $request)
    {
        $input = $request->all();

        $concursos = $this->concursoRepository->create($input);

        return $this->sendResponse($concursos->toArray(), 'Concurso saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/concursos/{id}",
     *      summary="Display the specified Concurso",
     *      tags={"Concurso"},
     *      description="Get Concurso",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Concurso",
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
     *                  ref="#/definitions/Concurso"
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
        /** @var Concurso $concurso */
        $concurso = $this->concursoRepository->findWithoutFail($id);

        if (empty($concurso)) {
            return $this->sendError('Concurso not found');
        }

        return $this->sendResponse($concurso->toArray(), 'Concurso retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateConcursoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/concursos/{id}",
     *      summary="Update the specified Concurso in storage",
     *      tags={"Concurso"},
     *      description="Update Concurso",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Concurso",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Concurso that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Concurso")
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
     *                  ref="#/definitions/Concurso"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateConcursoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Concurso $concurso */
        $concurso = $this->concursoRepository->findWithoutFail($id);

        if (empty($concurso)) {
            return $this->sendError('Concurso not found');
        }

        $concurso = $this->concursoRepository->update($input, $id);

        return $this->sendResponse($concurso->toArray(), 'Concurso updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/concursos/{id}",
     *      summary="Remove the specified Concurso from storage",
     *      tags={"Concurso"},
     *      description="Delete Concurso",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Concurso",
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
        /** @var Concurso $concurso */
        $concurso = $this->concursoRepository->findWithoutFail($id);

        if (empty($concurso)) {
            return $this->sendError('Concurso not found');
        }

        $concurso->delete();

        return $this->sendResponse($id, 'Concurso deleted successfully');
    }
}
