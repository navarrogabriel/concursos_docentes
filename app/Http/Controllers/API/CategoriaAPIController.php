<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCategoriaAPIRequest;
use App\Http\Requests\API\UpdateCategoriaAPIRequest;
use App\Models\Categoria;
use App\Repositories\CategoriaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CategoriaController
 * @package App\Http\Controllers\API
 */

class CategoriaAPIController extends AppBaseController
{
    /** @var  CategoriaRepository */
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepo)
    {
        $this->categoriaRepository = $categoriaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/categorias",
     *      summary="Get a listing of the Categorias.",
     *      tags={"Categoria"},
     *      description="Get all Categorias",
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
     *                  @SWG\Items(ref="#/definitions/Categoria")
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
        $this->categoriaRepository->pushCriteria(new RequestCriteria($request));
        $this->categoriaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $categorias = $this->categoriaRepository->all();

        return $this->sendResponse($categorias->toArray(), 'Categorias retrieved successfully');
    }

    /**
     * @param CreateCategoriaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/categorias",
     *      summary="Store a newly created Categoria in storage",
     *      tags={"Categoria"},
     *      description="Store Categoria",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Categoria that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Categoria")
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
     *                  ref="#/definitions/Categoria"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCategoriaAPIRequest $request)
    {
        $input = $request->all();

        $categorias = $this->categoriaRepository->create($input);

        return $this->sendResponse($categorias->toArray(), 'Categoria saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/categorias/{id}",
     *      summary="Display the specified Categoria",
     *      tags={"Categoria"},
     *      description="Get Categoria",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Categoria",
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
     *                  ref="#/definitions/Categoria"
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
        /** @var Categoria $categoria */
        $categoria = $this->categoriaRepository->findWithoutFail($id);

        if (empty($categoria)) {
            return $this->sendError('Categoria not found');
        }

        return $this->sendResponse($categoria->toArray(), 'Categoria retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCategoriaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/categorias/{id}",
     *      summary="Update the specified Categoria in storage",
     *      tags={"Categoria"},
     *      description="Update Categoria",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Categoria",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Categoria that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Categoria")
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
     *                  ref="#/definitions/Categoria"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCategoriaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Categoria $categoria */
        $categoria = $this->categoriaRepository->findWithoutFail($id);

        if (empty($categoria)) {
            return $this->sendError('Categoria not found');
        }

        $categoria = $this->categoriaRepository->update($input, $id);

        return $this->sendResponse($categoria->toArray(), 'Categoria updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/categorias/{id}",
     *      summary="Remove the specified Categoria from storage",
     *      tags={"Categoria"},
     *      description="Delete Categoria",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Categoria",
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
        /** @var Categoria $categoria */
        $categoria = $this->categoriaRepository->findWithoutFail($id);

        if (empty($categoria)) {
            return $this->sendError('Categoria not found');
        }

        $categoria->delete();

        return $this->sendResponse($id, 'Categoria deleted successfully');
    }
}
