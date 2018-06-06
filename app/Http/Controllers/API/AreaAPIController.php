<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAreaAPIRequest;
use App\Http\Requests\API\UpdateAreaAPIRequest;
use App\Models\Area;
use App\Repositories\AreaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AreaController
 * @package App\Http\Controllers\API
 */

class AreaAPIController extends AppBaseController
{
    /** @var  AreaRepository */
    private $areaRepository;

    public function __construct(AreaRepository $areaRepo)
    {
        $this->areaRepository = $areaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/areas",
     *      summary="Get a listing of the Areas.",
     *      tags={"Area"},
     *      description="Get all Areas",
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
     *                  @SWG\Items(ref="#/definitions/Area")
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
        $this->areaRepository->pushCriteria(new RequestCriteria($request));
        $this->areaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $areas = $this->areaRepository->all();

        return $this->sendResponse($areas->toArray(), 'Areas retrieved successfully');
    }

    /**
     * @param CreateAreaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/areas",
     *      summary="Store a newly created Area in storage",
     *      tags={"Area"},
     *      description="Store Area",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Area that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Area")
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
     *                  ref="#/definitions/Area"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAreaAPIRequest $request)
    {
        $input = $request->all();

        $areas = $this->areaRepository->create($input);

        return $this->sendResponse($areas->toArray(), 'Area saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/areas/{id}",
     *      summary="Display the specified Area",
     *      tags={"Area"},
     *      description="Get Area",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Area",
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
     *                  ref="#/definitions/Area"
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
        /** @var Area $area */
        $area = $this->areaRepository->findWithoutFail($id);

        if (empty($area)) {
            return $this->sendError('Area not found');
        }

        return $this->sendResponse($area->toArray(), 'Area retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAreaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/areas/{id}",
     *      summary="Update the specified Area in storage",
     *      tags={"Area"},
     *      description="Update Area",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Area",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Area that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Area")
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
     *                  ref="#/definitions/Area"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAreaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Area $area */
        $area = $this->areaRepository->findWithoutFail($id);

        if (empty($area)) {
            return $this->sendError('Area not found');
        }

        $area = $this->areaRepository->update($input, $id);

        return $this->sendResponse($area->toArray(), 'Area updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/areas/{id}",
     *      summary="Remove the specified Area from storage",
     *      tags={"Area"},
     *      description="Delete Area",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Area",
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
        /** @var Area $area */
        $area = $this->areaRepository->findWithoutFail($id);

        if (empty($area)) {
            return $this->sendError('Area not found');
        }

        $area->delete();

        return $this->sendResponse($id, 'Area deleted successfully');
    }
}
