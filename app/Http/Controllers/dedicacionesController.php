<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatededicacionesRequest;
use App\Http\Requests\UpdatededicacionesRequest;
use App\Repositories\DedicacionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class dedicacionesController extends AppBaseController
{
    /** @var  DedicacionesRepository */
    private $DedicacionesRepository;

    public function __construct(DedicacionesRepository $dedicacionesRepo)
    {
        $this->DedicacionesRepository = $dedicacionesRepo;
    }

    /**
     * Display a listing of the dedicaciones.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->DedicacionesRepository->pushCriteria(new RequestCriteria($request));
        $dedicaciones = $this->DedicacionesRepository->all();

        return view('dedicaciones.index')
            ->with('dedicaciones', $dedicaciones);
    }

    /**
     * Show the form for creating a new dedicaciones.
     *
     * @return Response
     */
    public function create()
    {
        return view('dedicaciones.create');
    }

    /**
     * Store a newly created dedicaciones in storage.
     *
     * @param CreatededicacionesRequest $request
     *
     * @return Response
     */
    public function store(CreatededicacionesRequest $request)
    {
        $input = $request->all();

        $dedicaciones = $this->DedicacionesRepository->create($input);

        Flash::success('Dedicaciones saved successfully.');

        return redirect(route('dedicaciones.index'));
    }

    /**
     * Display the specified dedicaciones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dedicaciones = $this->DedicacionesRepository->findWithoutFail($id);

        if (empty($dedicaciones)) {
            Flash::error('Dedicaciones not found');

            return redirect(route('dedicaciones.index'));
        }

        return view('dedicaciones.show')->with('dedicaciones', $dedicaciones);
    }

    /**
     * Show the form for editing the specified dedicaciones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dedicaciones = $this->DedicacionesRepository->findWithoutFail($id);

        if (empty($dedicaciones)) {
            Flash::error('Dedicaciones not found');

            return redirect(route('dedicaciones.index'));
        }

        return view('dedicaciones.edit')->with('dedicaciones', $dedicaciones);
    }

    /**
     * Update the specified dedicaciones in storage.
     *
     * @param  int              $id
     * @param UpdatededicacionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatededicacionesRequest $request)
    {
        $dedicaciones = $this->DedicacionesRepository->findWithoutFail($id);

        if (empty($dedicaciones)) {
            Flash::error('Dedicaciones not found');

            return redirect(route('dedicaciones.index'));
        }

        $dedicaciones = $this->DedicacionesRepository->update($request->all(), $id);

        Flash::success('Dedicaciones updated successfully.');

        return redirect(route('dedicaciones.index'));
    }

    /**
     * Remove the specified dedicaciones from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dedicaciones = $this->DedicacionesRepository->findWithoutFail($id);

        if (empty($dedicaciones)) {
            Flash::error('Dedicaciones not found');

            return redirect(route('dedicaciones.index'));
        }

        $this->DedicacionesRepository->delete($id);

        Flash::success('Dedicaciones deleted successfully.');

        return redirect(route('dedicaciones.index'));
    }
}
