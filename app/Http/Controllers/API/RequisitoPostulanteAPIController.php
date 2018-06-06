<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRequisitoPostulanteAPIRequest;
use App\Http\Requests\API\UpdateRequisitoPostulanteAPIRequest;
use App\Models\RequisitoPostulante;
use App\Repositories\RequisitoPostulanteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RequisitoPostulanteController
 * @package App\Http\Controllers\API
 */

class RequisitoPostulanteAPIController extends AppBaseController
{
    /** @var  RequisitoPostulanteRepository */
    private $requisitoPostulanteRepository;

    public function __construct(RequisitoPostulanteRepository $requisitoPostulanteRepo)
    {
        $this->requisitoPostulanteRepository = $requisitoPostulanteRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/requisitoPostulantes",
     *      summary="Get a listing of the RequisitoPostulantes.",
     *      tags={"RequisitoPostulante"},
     *      description="Get all RequisitoPostulantes",
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
     *                  @SWG\Items(ref="#/definitions/RequisitoPostulante")
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
        $this->requisitoPostulanteRepository->pushCriteria(new RequestCriteria($request));
        $this->requisitoPostulanteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $requisitoPostulantes = $this->requisitoPostulanteRepository->all();

        return $this->sendResponse($requisitoPostulantes->toArray(), 'Requisito Postulantes retrieved successfully');
    }

    /**
     * @param CreateRequisitoPostulanteAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/requisitoPostulantes",
     *      summary="Store a newly created RequisitoPostulante in storage",
     *      tags={"RequisitoPostulante"},
     *      description="Store RequisitoPostulante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="RequisitoPostulante that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/RequisitoPostulante")
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
     *                  ref="#/definitions/RequisitoPostulante"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateRequisitoPostulanteAPIRequest $request)
    {
        $input = $request->all();

        $requisitoPostulantes = $this->requisitoPostulanteRepository->create($input);

        return $this->sendResponse($requisitoPostulantes->toArray(), 'Requisito Postulante saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/requisitoPostulantes/{id}",
     *      summary="Display the specified RequisitoPostulante",
     *      tags={"RequisitoPostulante"},
     *      description="Get RequisitoPostulante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RequisitoPostulante",
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
     *                  ref="#/definitions/RequisitoPostulante"
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
        /** @var RequisitoPostulante $requisitoPostulante */
        $requisitoPostulante = $this->requisitoPostulanteRepository->findWithoutFail($id);

        if (empty($requisitoPostulante)) {
            return $this->sendError('Requisito Postulante not found');
        }

        return $this->sendResponse($requisitoPostulante->toArray(), 'Requisito Postulante retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateRequisitoPostulanteAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/requisitoPostulantes/{id}",
     *      summary="Update the specified RequisitoPostulante in storage",
     *      tags={"RequisitoPostulante"},
     *      description="Update RequisitoPostulante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RequisitoPostulante",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="RequisitoPostulante that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/RequisitoPostulante")
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
     *                  ref="#/definitions/RequisitoPostulante"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateRequisitoPostulanteAPIRequest $request)
    {
        $input = $request->all();

        /** @var RequisitoPostulante $requisitoPostulante */
        $requisitoPostulante = $this->requisitoPostulanteRepository->findWithoutFail($id);

        if (empty($requisitoPostulante)) {
            return $this->sendError('Requisito Postulante not found');
        }

        $requisitoPostulante = $this->requisitoPostulanteRepository->update($input, $id);

        return $this->sendResponse($requisitoPostulante->toArray(), 'RequisitoPostulante updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/requisitoPostulantes/{id}",
     *      summary="Remove the specified RequisitoPostulante from storage",
     *      tags={"RequisitoPostulante"},
     *      description="Delete RequisitoPostulante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RequisitoPostulante",
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
        /** @var RequisitoPostulante $requisitoPostulante */
        $requisitoPostulante = $this->requisitoPostulanteRepository->findWithoutFail($id);

        if (empty($requisitoPostulante)) {
            return $this->sendError('Requisito Postulante not found');
        }

        $requisitoPostulante->delete();

        return $this->sendResponse($id, 'Requisito Postulante deleted successfully');
    }
}
