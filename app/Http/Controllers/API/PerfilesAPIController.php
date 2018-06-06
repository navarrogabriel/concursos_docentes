<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePerfilesAPIRequest;
use App\Http\Requests\API\UpdatePerfilesAPIRequest;
use App\Models\Perfiles;
use App\Repositories\PerfilesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PerfilesController
 * @package App\Http\Controllers\API
 */

class PerfilesAPIController extends AppBaseController
{
    /** @var  PerfilesRepository */
    private $perfilesRepository;

    public function __construct(PerfilesRepository $perfilesRepo)
    {
        $this->perfilesRepository = $perfilesRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/perfiles",
     *      summary="Get a listing of the Perfiles.",
     *      tags={"Perfiles"},
     *      description="Get all Perfiles",
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
     *                  @SWG\Items(ref="#/definitions/Perfiles")
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
        $this->perfilesRepository->pushCriteria(new RequestCriteria($request));
        $this->perfilesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $perfiles = $this->perfilesRepository->all();

        return $this->sendResponse($perfiles->toArray(), 'Perfiles retrieved successfully');
    }

    /**
     * @param CreatePerfilesAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/perfiles",
     *      summary="Store a newly created Perfiles in storage",
     *      tags={"Perfiles"},
     *      description="Store Perfiles",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Perfiles that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Perfiles")
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
     *                  ref="#/definitions/Perfiles"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePerfilesAPIRequest $request)
    {
        $input = $request->all();

        $perfiles = $this->perfilesRepository->create($input);

        return $this->sendResponse($perfiles->toArray(), 'Perfiles saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/perfiles/{id}",
     *      summary="Display the specified Perfiles",
     *      tags={"Perfiles"},
     *      description="Get Perfiles",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Perfiles",
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
     *                  ref="#/definitions/Perfiles"
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
        /** @var Perfiles $perfiles */
        $perfiles = $this->perfilesRepository->findWithoutFail($id);

        if (empty($perfiles)) {
            return $this->sendError('Perfiles not found');
        }

        return $this->sendResponse($perfiles->toArray(), 'Perfiles retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePerfilesAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/perfiles/{id}",
     *      summary="Update the specified Perfiles in storage",
     *      tags={"Perfiles"},
     *      description="Update Perfiles",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Perfiles",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Perfiles that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Perfiles")
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
     *                  ref="#/definitions/Perfiles"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePerfilesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Perfiles $perfiles */
        $perfiles = $this->perfilesRepository->findWithoutFail($id);

        if (empty($perfiles)) {
            return $this->sendError('Perfiles not found');
        }

        $perfiles = $this->perfilesRepository->update($input, $id);

        return $this->sendResponse($perfiles->toArray(), 'Perfiles updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/perfiles/{id}",
     *      summary="Remove the specified Perfiles from storage",
     *      tags={"Perfiles"},
     *      description="Delete Perfiles",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Perfiles",
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
        /** @var Perfiles $perfiles */
        $perfiles = $this->perfilesRepository->findWithoutFail($id);

        if (empty($perfiles)) {
            return $this->sendError('Perfiles not found');
        }

        $perfiles->delete();

        return $this->sendResponse($id, 'Perfiles deleted successfully');
    }
}
