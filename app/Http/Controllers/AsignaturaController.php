<?php

namespace App\Http\Controllers;

use App\DataTables\AsignaturaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAsignaturaRequest;
use App\Http\Requests\UpdateAsignaturaRequest;
use App\Repositories\AsignaturaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Area;

class AsignaturaController extends AppBaseController
{
    /** @var  AsignaturaRepository */
    private $asignaturaRepository;

    public function __construct(AsignaturaRepository $asignaturaRepo)
    {
        $this->asignaturaRepository = $asignaturaRepo;
    }

    /**
     * Display a listing of the Asignatura.
     *
     * @param AsignaturaDataTable $asignaturaDataTable
     * @return Response
     */
    public function index(AsignaturaDataTable $asignaturaDataTable)
    {
        return $asignaturaDataTable->render('asignaturas.index');
    }

    /**
     * Show the form for creating a new Asignatura.
     *
     * @return Response
     */
    public function create()
    {
        $areas = Area::pluck('nombre' , 'id');

        return view('asignaturas.create' , compact('areas'));
    }

    /**
     * Store a newly created Asignatura in storage.
     *
     * @param CreateAsignaturaRequest $request
     *
     * @return Response
     */
    public function store(CreateAsignaturaRequest $request)
    {
        $input = $request->all();

        $asignatura = $this->asignaturaRepository->create($input);

        Flash::success('Asignatura saved successfully.');

        return redirect(route('asignaturas.index'));
    }

    /**
     * Display the specified Asignatura.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asignatura = $this->asignaturaRepository->findWithoutFail($id);

        if (empty($asignatura)) {
            Flash::error('Asignatura not found');

            return redirect(route('asignaturas.index'));
        }

        return view('asignaturas.show')->with('asignatura', $asignatura);
    }

    /**
     * Show the form for editing the specified Asignatura.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $areas = Area::pluck('nombre' , 'id');

        $asignatura = $this->asignaturaRepository->findWithoutFail($id);

        if (empty($asignatura)) {
            Flash::error('Asignatura not found');

            return redirect(route('asignaturas.index' , compact('areas')));
        }

        return view('asignaturas.edit' , compact('areas'))->with('asignatura', $asignatura);
    }

    /**
     * Update the specified Asignatura in storage.
     *
     * @param  int              $id
     * @param UpdateAsignaturaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsignaturaRequest $request)
    {
        $asignatura = $this->asignaturaRepository->findWithoutFail($id);

        if (empty($asignatura)) {
            Flash::error('Asignatura not found');

            return redirect(route('asignaturas.index'));
        }

        $asignatura = $this->asignaturaRepository->update($request->all(), $id);

        Flash::success('Asignatura updated successfully.');

        return redirect(route('asignaturas.index'));
    }

    /**
     * Remove the specified Asignatura from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asignatura = $this->asignaturaRepository->findWithoutFail($id);

        if (empty($asignatura)) {
            Flash::error('Asignatura not found');

            return redirect(route('asignaturas.index'));
        }

        $this->asignaturaRepository->delete($id);

        Flash::success('Asignatura deleted successfully.');

        return redirect(route('asignaturas.index'));
    }
}
