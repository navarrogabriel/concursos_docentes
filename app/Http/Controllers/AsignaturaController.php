<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsignaturaRequest;
use App\Http\Requests\UpdateAsignaturaRequest;
use App\Repositories\AsignaturaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Areas;

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
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asignaturaRepository->pushCriteria(new RequestCriteria($request));
        $asignaturas = $this->asignaturaRepository->all();

        return view('asignaturas.index')
            ->with('asignaturas', $asignaturas);
    }

    /**
     * Show the form for creating a new Asignatura.
     *
     * @return Response
     */
    public function create()
    {
        $areas = Areas::pluck('descripcion' , 'id');

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
        $areas = Areas::pluck('descripcion' , 'id');//muestro la descripcion del area de la tabla realacionada

        $asignatura = $this->asignaturaRepository->findWithoutFail($id);

        if (empty($asignatura)) {
            Flash::error('Asignatura not found');

            return redirect(route('asignaturas.index'));
        }

        return view('asignaturas.edit', compact('areas'))->with('asignatura', $asignatura);//envia la variable a la otra vista con compact aca esta sin $ en la vista tambien
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
