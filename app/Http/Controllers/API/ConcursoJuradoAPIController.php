<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConcursoJuradoAPIRequest;
use App\Http\Requests\API\UpdateConcursoJuradoAPIRequest;
use App\Models\ConcursoJurado;
use App\Repositories\ConcursoJuradoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ConcursoJuradoController
 * @package App\Http\Controllers\API
 */

class ConcursoJuradoAPIController extends AppBaseController
{
    /** @var  ConcursoJuradoRepository */
    private $concursoJuradoRepository;

    public function __construct(ConcursoJuradoRepository $concursoJuradoRepo)
    {
        $this->concursoJuradoRepository = $concursoJuradoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/concursoJurados",
     *      summary="Get a listing of the ConcursoJurados.",
     *      tags={"ConcursoJurado"},
     *      description="Get all ConcursoJurados",
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
     *                  @SWG\Items(ref="#/definitions/ConcursoJurado")
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
        $this->concursoJuradoRepository->pushCriteria(new RequestCriteria($request));
        $this->concursoJuradoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $concursoJurados = $this->concursoJuradoRepository->all();

        return $this->sendResponse($concursoJurados->toArray(), 'Concurso Jurados retrieved successfully');
    }

    /**
     * @param CreateConcursoJuradoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/concursoJurados",
     *      summary="Store a newly created ConcursoJurado in storage",
     *      tags={"ConcursoJurado"},
     *      description="Store ConcursoJurado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ConcursoJurado that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ConcursoJurado")
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
     *                  ref="#/definitions/ConcursoJurado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateConcursoJuradoAPIRequest $request)
    {
        $input = $request->all();

        $concursoJurados = $this->concursoJuradoRepository->create($input);

        return $this->sendResponse($concursoJurados->toArray(), 'Concurso Jurado saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/concursoJurados/{id}",
     *      summary="Display the specified ConcursoJurado",
     *      tags={"ConcursoJurado"},
     *      description="Get ConcursoJurado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ConcursoJurado",
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
     *                  ref="#/definitions/ConcursoJurado"
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
        /** @var ConcursoJurado $concursoJurado */
        $concursoJurado = $this->concursoJuradoRepository->findWithoutFail($id);

        if (empty($concursoJurado)) {
            return $this->sendError('Concurso Jurado not found');
        }

        return $this->sendResponse($concursoJurado->toArray(), 'Concurso Jurado retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateConcursoJuradoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/concursoJurados/{id}",
     *      summary="Update the specified ConcursoJurado in storage",
     *      tags={"ConcursoJurado"},
     *      description="Update ConcursoJurado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ConcursoJurado",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ConcursoJurado that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ConcursoJurado")
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
     *                  ref="#/definitions/ConcursoJurado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateConcursoJuradoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ConcursoJurado $concursoJurado */
        $concursoJurado = $this->concursoJuradoRepository->findWithoutFail($id);

        if (empty($concursoJurado)) {
            return $this->sendError('Concurso Jurado not found');
        }

        $concursoJurado = $this->concursoJuradoRepository->update($input, $id);

        return $this->sendResponse($concursoJurado->toArray(), 'ConcursoJurado updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/concursoJurados/{id}",
     *      summary="Remove the specified ConcursoJurado from storage",
     *      tags={"ConcursoJurado"},
     *      description="Delete ConcursoJurado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ConcursoJurado",
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
        /** @var ConcursoJurado $concursoJurado */
        $concursoJurado = $this->concursoJuradoRepository->findWithoutFail($id);

        if (empty($concursoJurado)) {
            return $this->sendError('Concurso Jurado not found');
        }

        $concursoJurado->delete();

        return $this->sendResponse($id, 'Concurso Jurado deleted successfully');
    }
}
