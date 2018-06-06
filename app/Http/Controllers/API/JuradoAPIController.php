<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJuradoAPIRequest;
use App\Http\Requests\API\UpdateJuradoAPIRequest;
use App\Models\Jurado;
use App\Repositories\JuradoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class JuradoController
 * @package App\Http\Controllers\API
 */

class JuradoAPIController extends AppBaseController
{
    /** @var  JuradoRepository */
    private $juradoRepository;

    public function __construct(JuradoRepository $juradoRepo)
    {
        $this->juradoRepository = $juradoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/jurados",
     *      summary="Get a listing of the Jurados.",
     *      tags={"Jurado"},
     *      description="Get all Jurados",
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
     *                  @SWG\Items(ref="#/definitions/Jurado")
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
        $this->juradoRepository->pushCriteria(new RequestCriteria($request));
        $this->juradoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $jurados = $this->juradoRepository->all();

        return $this->sendResponse($jurados->toArray(), 'Jurados retrieved successfully');
    }

    /**
     * @param CreateJuradoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/jurados",
     *      summary="Store a newly created Jurado in storage",
     *      tags={"Jurado"},
     *      description="Store Jurado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Jurado that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Jurado")
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
     *                  ref="#/definitions/Jurado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateJuradoAPIRequest $request)
    {
        $input = $request->all();

        $jurados = $this->juradoRepository->create($input);

        return $this->sendResponse($jurados->toArray(), 'Jurado saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/jurados/{id}",
     *      summary="Display the specified Jurado",
     *      tags={"Jurado"},
     *      description="Get Jurado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Jurado",
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
     *                  ref="#/definitions/Jurado"
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
        /** @var Jurado $jurado */
        $jurado = $this->juradoRepository->findWithoutFail($id);

        if (empty($jurado)) {
            return $this->sendError('Jurado not found');
        }

        return $this->sendResponse($jurado->toArray(), 'Jurado retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateJuradoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/jurados/{id}",
     *      summary="Update the specified Jurado in storage",
     *      tags={"Jurado"},
     *      description="Update Jurado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Jurado",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Jurado that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Jurado")
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
     *                  ref="#/definitions/Jurado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateJuradoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Jurado $jurado */
        $jurado = $this->juradoRepository->findWithoutFail($id);

        if (empty($jurado)) {
            return $this->sendError('Jurado not found');
        }

        $jurado = $this->juradoRepository->update($input, $id);

        return $this->sendResponse($jurado->toArray(), 'Jurado updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/jurados/{id}",
     *      summary="Remove the specified Jurado from storage",
     *      tags={"Jurado"},
     *      description="Delete Jurado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Jurado",
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
        /** @var Jurado $jurado */
        $jurado = $this->juradoRepository->findWithoutFail($id);

        if (empty($jurado)) {
            return $this->sendError('Jurado not found');
        }

        $jurado->delete();

        return $this->sendResponse($id, 'Jurado deleted successfully');
    }
}
