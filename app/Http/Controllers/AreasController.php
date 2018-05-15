<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAreasRequest;
use App\Http\Requests\UpdateAreasRequest;
use App\Repositories\AreasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Institutos;//agrego la clase de la que tengo relacion

class AreasController extends AppBaseController
{
    /** @var  AreasRepository */
    private $areasRepository;

    public function __construct(AreasRepository $areasRepo)
    {
        $this->areasRepository = $areasRepo;
    }

    /**
     * Display a listing of the Areas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->areasRepository->pushCriteria(new RequestCriteria($request));
        $areas = $this->areasRepository->all();

        return view('areas.index')
            ->with('areas', $areas);
    }

    /**
     * Show the form for creating a new Areas.
     *
     * @return Response
     */
    public function create()
    {
        $institutos = institutos::pluck('descripcion', 'id');//creo variable a enviar a la vista

        return view('areas.create', compact('institutos'));//envio variable instituto a la tabla repito en edit
    }

    /**
     * Store a newly created Areas in storage.
     *
     * @param CreateAreasRequest $request
     *
     * @return Response
     */
    public function store(CreateAreasRequest $request)
    {
        $input = $request->all();

        $areas = $this->areasRepository->create($input);

        Flash::success('Areas saved successfully.');

        return redirect(route('areas.index'));
    }

    /**
     * Display the specified Areas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $areas = $this->areasRepository->findWithoutFail($id);

        if (empty($areas)) {
            Flash::error('Areas not found');

            return redirect(route('areas.index'));
        }

        return view('areas.show')->with('areas', $areas);
    }

    /**
     * Show the form for editing the specified Areas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $institutos = institutos::plucK('descripcion', 'id');

        $areas = $this->areasRepository->findWithoutFail($id);

        if (empty($areas)) {
            Flash::error('Areas not found');

            return redirect(route('areas.index'));
        }

        return view('areas.edit', compact('institutos'))->with('areas', $areas);
    }

    /**
     * Update the specified Areas in storage.
     *
     * @param  int              $id
     * @param UpdateAreasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAreasRequest $request)
    {
        $areas = $this->areasRepository->findWithoutFail($id);

        if (empty($areas)) {
            Flash::error('Areas not found');

            return redirect(route('areas.index'));
        }

        $areas = $this->areasRepository->update($request->all(), $id);

        Flash::success('Areas updated successfully.');

        return redirect(route('areas.index'));
    }

    /**
     * Remove the specified Areas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $areas = $this->areasRepository->findWithoutFail($id);

        if (empty($areas)) {
            Flash::error('Areas not found');

            return redirect(route('areas.index'));
        }

        $this->areasRepository->delete($id);

        Flash::success('Areas deleted successfully.');

        return redirect(route('areas.index'));
    }
}
