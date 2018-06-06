<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLogAPIRequest;
use App\Http\Requests\API\UpdateLogAPIRequest;
use App\Models\Log;
use App\Repositories\LogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LogController
 * @package App\Http\Controllers\API
 */

class LogAPIController extends AppBaseController
{
    /** @var  LogRepository */
    private $logRepository;

    public function __construct(LogRepository $logRepo)
    {
        $this->logRepository = $logRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/logs",
     *      summary="Get a listing of the Logs.",
     *      tags={"Log"},
     *      description="Get all Logs",
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
     *                  @SWG\Items(ref="#/definitions/Log")
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
        $this->logRepository->pushCriteria(new RequestCriteria($request));
        $this->logRepository->pushCriteria(new LimitOffsetCriteria($request));
        $logs = $this->logRepository->all();

        return $this->sendResponse($logs->toArray(), 'Logs retrieved successfully');
    }

    /**
     * @param CreateLogAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/logs",
     *      summary="Store a newly created Log in storage",
     *      tags={"Log"},
     *      description="Store Log",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Log that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Log")
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
     *                  ref="#/definitions/Log"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateLogAPIRequest $request)
    {
        $input = $request->all();

        $logs = $this->logRepository->create($input);

        return $this->sendResponse($logs->toArray(), 'Log saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/logs/{id}",
     *      summary="Display the specified Log",
     *      tags={"Log"},
     *      description="Get Log",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Log",
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
     *                  ref="#/definitions/Log"
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
        /** @var Log $log */
        $log = $this->logRepository->findWithoutFail($id);

        if (empty($log)) {
            return $this->sendError('Log not found');
        }

        return $this->sendResponse($log->toArray(), 'Log retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateLogAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/logs/{id}",
     *      summary="Update the specified Log in storage",
     *      tags={"Log"},
     *      description="Update Log",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Log",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Log that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Log")
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
     *                  ref="#/definitions/Log"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateLogAPIRequest $request)
    {
        $input = $request->all();

        /** @var Log $log */
        $log = $this->logRepository->findWithoutFail($id);

        if (empty($log)) {
            return $this->sendError('Log not found');
        }

        $log = $this->logRepository->update($input, $id);

        return $this->sendResponse($log->toArray(), 'Log updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/logs/{id}",
     *      summary="Remove the specified Log from storage",
     *      tags={"Log"},
     *      description="Delete Log",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Log",
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
        /** @var Log $log */
        $log = $this->logRepository->findWithoutFail($id);

        if (empty($log)) {
            return $this->sendError('Log not found');
        }

        $log->delete();

        return $this->sendResponse($id, 'Log deleted successfully');
    }
}
