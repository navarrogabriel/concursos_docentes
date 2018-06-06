<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAsignaturaAPIRequest;
use App\Http\Requests\API\UpdateAsignaturaAPIRequest;
use App\Models\Asignatura;
use App\Repositories\AsignaturaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AsignaturaController
 * @package App\Http\Controllers\API
 */

class AsignaturaAPIController extends AppBaseController
{
    /** @var  AsignaturaRepository */
    private $asignaturaRepository;

    public function __construct(AsignaturaRepository $asignaturaRepo)
    {
        $this->asignaturaRepository = $asignaturaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/asignaturas",
     *      summary="Get a listing of the Asignaturas.",
     *      tags={"Asignatura"},
     *      description="Get all Asignaturas",
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
     *                  @SWG\Items(ref="#/definitions/Asignatura")
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
        $this->asignaturaRepository->pushCriteria(new RequestCriteria($request));
        $this->asignaturaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $asignaturas = $this->asignaturaRepository->all();

        return $this->sendResponse($asignaturas->toArray(), 'Asignaturas retrieved successfully');
    }

    /**
     * @param CreateAsignaturaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/asignaturas",
     *      summary="Store a newly created Asignatura in storage",
     *      tags={"Asignatura"},
     *      description="Store Asignatura",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Asignatura that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Asignatura")
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
     *                  ref="#/definitions/Asignatura"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAsignaturaAPIRequest $request)
    {
        $input = $request->all();

        $asignaturas = $this->asignaturaRepository->create($input);

        return $this->sendResponse($asignaturas->toArray(), 'Asignatura saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/asignaturas/{id}",
     *      summary="Display the specified Asignatura",
     *      tags={"Asignatura"},
     *      description="Get Asignatura",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Asignatura",
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
     *                  ref="#/definitions/Asignatura"
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
        /** @var Asignatura $asignatura */
        $asignatura = $this->asignaturaRepository->findWithoutFail($id);

        if (empty($asignatura)) {
            return $this->sendError('Asignatura not found');
        }

        return $this->sendResponse($asignatura->toArray(), 'Asignatura retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAsignaturaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/asignaturas/{id}",
     *      summary="Update the specified Asignatura in storage",
     *      tags={"Asignatura"},
     *      description="Update Asignatura",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Asignatura",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Asignatura that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Asignatura")
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
     *                  ref="#/definitions/Asignatura"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAsignaturaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Asignatura $asignatura */
        $asignatura = $this->asignaturaRepository->findWithoutFail($id);

        if (empty($asignatura)) {
            return $this->sendError('Asignatura not found');
        }

        $asignatura = $this->asignaturaRepository->update($input, $id);

        return $this->sendResponse($asignatura->toArray(), 'Asignatura updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/asignaturas/{id}",
     *      summary="Remove the specified Asignatura from storage",
     *      tags={"Asignatura"},
     *      description="Delete Asignatura",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Asignatura",
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
        /** @var Asignatura $asignatura */
        $asignatura = $this->asignaturaRepository->findWithoutFail($id);

        if (empty($asignatura)) {
            return $this->sendError('Asignatura not found');
        }

        $asignatura->delete();

        return $this->sendResponse($id, 'Asignatura deleted successfully');
    }
}
