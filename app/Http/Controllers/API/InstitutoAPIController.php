<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInstitutoAPIRequest;
use App\Http\Requests\API\UpdateInstitutoAPIRequest;
use App\Models\Instituto;
use App\Repositories\InstitutoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InstitutoController
 * @package App\Http\Controllers\API
 */

class InstitutoAPIController extends AppBaseController
{
    /** @var  InstitutoRepository */
    private $institutoRepository;

    public function __construct(InstitutoRepository $institutoRepo)
    {
        $this->institutoRepository = $institutoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/institutos",
     *      summary="Get a listing of the Institutos.",
     *      tags={"Instituto"},
     *      description="Get all Institutos",
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
     *                  @SWG\Items(ref="#/definitions/Instituto")
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
        $this->institutoRepository->pushCriteria(new RequestCriteria($request));
        $this->institutoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $institutos = $this->institutoRepository->all();

        return $this->sendResponse($institutos->toArray(), 'Institutos retrieved successfully');
    }

    /**
     * @param CreateInstitutoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/institutos",
     *      summary="Store a newly created Instituto in storage",
     *      tags={"Instituto"},
     *      description="Store Instituto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Instituto that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Instituto")
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
     *                  ref="#/definitions/Instituto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInstitutoAPIRequest $request)
    {
        $input = $request->all();

        $institutos = $this->institutoRepository->create($input);

        return $this->sendResponse($institutos->toArray(), 'Instituto saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/institutos/{id}",
     *      summary="Display the specified Instituto",
     *      tags={"Instituto"},
     *      description="Get Instituto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Instituto",
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
     *                  ref="#/definitions/Instituto"
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
        /** @var Instituto $instituto */
        $instituto = $this->institutoRepository->findWithoutFail($id);

        if (empty($instituto)) {
            return $this->sendError('Instituto not found');
        }

        return $this->sendResponse($instituto->toArray(), 'Instituto retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateInstitutoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/institutos/{id}",
     *      summary="Update the specified Instituto in storage",
     *      tags={"Instituto"},
     *      description="Update Instituto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Instituto",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Instituto that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Instituto")
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
     *                  ref="#/definitions/Instituto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInstitutoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Instituto $instituto */
        $instituto = $this->institutoRepository->findWithoutFail($id);

        if (empty($instituto)) {
            return $this->sendError('Instituto not found');
        }

        $instituto = $this->institutoRepository->update($input, $id);

        return $this->sendResponse($instituto->toArray(), 'Instituto updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/institutos/{id}",
     *      summary="Remove the specified Instituto from storage",
     *      tags={"Instituto"},
     *      description="Delete Instituto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Instituto",
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
        /** @var Instituto $instituto */
        $instituto = $this->institutoRepository->findWithoutFail($id);

        if (empty($instituto)) {
            return $this->sendError('Instituto not found');
        }

        $instituto->delete();

        return $this->sendResponse($id, 'Instituto deleted successfully');
    }
}
