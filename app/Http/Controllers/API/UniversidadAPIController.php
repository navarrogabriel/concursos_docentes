<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUniversidadAPIRequest;
use App\Http\Requests\API\UpdateUniversidadAPIRequest;
use App\Models\Universidad;
use App\Repositories\UniversidadRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UniversidadController
 * @package App\Http\Controllers\API
 */

class UniversidadAPIController extends AppBaseController
{
    /** @var  UniversidadRepository */
    private $universidadRepository;

    public function __construct(UniversidadRepository $universidadRepo)
    {
        $this->universidadRepository = $universidadRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/universidads",
     *      summary="Get a listing of the Universidads.",
     *      tags={"Universidad"},
     *      description="Get all Universidads",
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
     *                  @SWG\Items(ref="#/definitions/Universidad")
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
        $this->universidadRepository->pushCriteria(new RequestCriteria($request));
        $this->universidadRepository->pushCriteria(new LimitOffsetCriteria($request));
        $universidads = $this->universidadRepository->all();

        return $this->sendResponse($universidads->toArray(), 'Universidads retrieved successfully');
    }

    /**
     * @param CreateUniversidadAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/universidads",
     *      summary="Store a newly created Universidad in storage",
     *      tags={"Universidad"},
     *      description="Store Universidad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Universidad that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Universidad")
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
     *                  ref="#/definitions/Universidad"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateUniversidadAPIRequest $request)
    {
        $input = $request->all();

        $universidads = $this->universidadRepository->create($input);

        return $this->sendResponse($universidads->toArray(), 'Universidad saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/universidads/{id}",
     *      summary="Display the specified Universidad",
     *      tags={"Universidad"},
     *      description="Get Universidad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Universidad",
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
     *                  ref="#/definitions/Universidad"
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
        /** @var Universidad $universidad */
        $universidad = $this->universidadRepository->findWithoutFail($id);

        if (empty($universidad)) {
            return $this->sendError('Universidad not found');
        }

        return $this->sendResponse($universidad->toArray(), 'Universidad retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateUniversidadAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/universidads/{id}",
     *      summary="Update the specified Universidad in storage",
     *      tags={"Universidad"},
     *      description="Update Universidad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Universidad",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Universidad that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Universidad")
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
     *                  ref="#/definitions/Universidad"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateUniversidadAPIRequest $request)
    {
        $input = $request->all();

        /** @var Universidad $universidad */
        $universidad = $this->universidadRepository->findWithoutFail($id);

        if (empty($universidad)) {
            return $this->sendError('Universidad not found');
        }

        $universidad = $this->universidadRepository->update($input, $id);

        return $this->sendResponse($universidad->toArray(), 'Universidad updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/universidads/{id}",
     *      summary="Remove the specified Universidad from storage",
     *      tags={"Universidad"},
     *      description="Delete Universidad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Universidad",
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
        /** @var Universidad $universidad */
        $universidad = $this->universidadRepository->findWithoutFail($id);

        if (empty($universidad)) {
            return $this->sendError('Universidad not found');
        }

        $universidad->delete();

        return $this->sendResponse($id, 'Universidad deleted successfully');
    }
}
