<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePostulanteAPIRequest;
use App\Http\Requests\API\UpdatePostulanteAPIRequest;
use App\Models\Postulante;
use App\Repositories\PostulanteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PostulanteController
 * @package App\Http\Controllers\API
 */

class PostulanteAPIController extends AppBaseController
{
    /** @var  PostulanteRepository */
    private $postulanteRepository;

    public function __construct(PostulanteRepository $postulanteRepo)
    {
        $this->postulanteRepository = $postulanteRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/postulantes",
     *      summary="Get a listing of the Postulantes.",
     *      tags={"Postulante"},
     *      description="Get all Postulantes",
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
     *                  @SWG\Items(ref="#/definitions/Postulante")
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
        $this->postulanteRepository->pushCriteria(new RequestCriteria($request));
        $this->postulanteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $postulantes = $this->postulanteRepository->all();

        return $this->sendResponse($postulantes->toArray(), 'Postulantes retrieved successfully');
    }

    /**
     * @param CreatePostulanteAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/postulantes",
     *      summary="Store a newly created Postulante in storage",
     *      tags={"Postulante"},
     *      description="Store Postulante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Postulante that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Postulante")
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
     *                  ref="#/definitions/Postulante"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePostulanteAPIRequest $request)
    {
        $input = $request->all();

        $postulantes = $this->postulanteRepository->create($input);

        return $this->sendResponse($postulantes->toArray(), 'Postulante saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/postulantes/{id}",
     *      summary="Display the specified Postulante",
     *      tags={"Postulante"},
     *      description="Get Postulante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Postulante",
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
     *                  ref="#/definitions/Postulante"
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
        /** @var Postulante $postulante */
        $postulante = $this->postulanteRepository->findWithoutFail($id);

        if (empty($postulante)) {
            return $this->sendError('Postulante not found');
        }

        return $this->sendResponse($postulante->toArray(), 'Postulante retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePostulanteAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/postulantes/{id}",
     *      summary="Update the specified Postulante in storage",
     *      tags={"Postulante"},
     *      description="Update Postulante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Postulante",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Postulante that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Postulante")
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
     *                  ref="#/definitions/Postulante"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePostulanteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Postulante $postulante */
        $postulante = $this->postulanteRepository->findWithoutFail($id);

        if (empty($postulante)) {
            return $this->sendError('Postulante not found');
        }

        $postulante = $this->postulanteRepository->update($input, $id);

        return $this->sendResponse($postulante->toArray(), 'Postulante updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/postulantes/{id}",
     *      summary="Remove the specified Postulante from storage",
     *      tags={"Postulante"},
     *      description="Delete Postulante",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Postulante",
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
        /** @var Postulante $postulante */
        $postulante = $this->postulanteRepository->findWithoutFail($id);

        if (empty($postulante)) {
            return $this->sendError('Postulante not found');
        }

        $postulante->delete();

        return $this->sendResponse($id, 'Postulante deleted successfully');
    }
}
