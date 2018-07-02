<?php

namespace App\Http\Controllers;

use App\DataTables\ConcursoPostulanteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateConcursoPostulanteRequest;
use App\Http\Requests\UpdateConcursoPostulanteRequest;
use App\Repositories\ConcursoPostulanteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Postulante;
use App\Models\Concurso;

class ConcursoPostulanteController extends AppBaseController
{
    /** @var  ConcursoPostulanteRepository */
    private $concursoPostulanteRepository;

    public function __construct(ConcursoPostulanteRepository $concursoPostulanteRepo)
    {
        $this->concursoPostulanteRepository = $concursoPostulanteRepo;
    }

    /**
     * Display a listing of the ConcursoPostulante.
     *
     * @param ConcursoPostulanteDataTable $concursoPostulanteDataTable
     * @return Response
     */
    public function index(ConcursoPostulanteDataTable $concursoPostulanteDataTable)
    {
        return $concursoPostulanteDataTable->render('concurso_postulantes.index');
    }

    /**
     * Show the form for creating a new ConcursoPostulante.
     *
     * @return Response
     */
    public function create()
    {
        $concursos = Concurso::pluck('referenciaGeneral' , 'id');
        $postulantes = Postulante::where('tipo','Postulante')->pluck('nombres' , 'id');
        $tipoPostulantes = collect(['Postulante' => 'Postulante' , 'Aspirante' => 'Aspirante']);
        return view('concurso_postulantes.create' , compact('concursos' , 'postulantes' , 'tipoPostulantes'));
    }

    /**
     * Store a newly created ConcursoPostulante in storage.
     *
     * @param CreateConcursoPostulanteRequest $request
     *
     * @return Response
     */
    public function store(CreateConcursoPostulanteRequest $request)
    {
        $input = $request->all();

        $concursoPostulante = $this->concursoPostulanteRepository->create($input);

        Flash::success('Concurso Postulante saved successfully.');

        return redirect(route('concursoPostulantes.index'));
    }

    /**
     * Display the specified ConcursoPostulante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $concursoPostulante = $this->concursoPostulanteRepository->findWithoutFail($id);

        if (empty($concursoPostulante)) {
            Flash::error('Concurso Postulante not found');

            return redirect(route('concursoPostulantes.index'));
        }

        return view('concurso_postulantes.show')->with('concursoPostulante', $concursoPostulante);
    }

    /**
     * Show the form for editing the specified ConcursoPostulante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $concursoPostulante = $this->concursoPostulanteRepository->findWithoutFail($id);
        $concursos = Concurso::pluck('referenciaGeneral' , 'id');
        $postulantes = Postulante::where('tipo','Postulante')->pluck('nombres' , 'id');
        $tipoPostulantes = collect(['Postulante' => 'Postulante' , 'Aspirante' => 'Aspirante']);

        if (empty($concursoPostulante)) {
            Flash::error('Concurso Postulante not found');

            return redirect(route('concursoPostulantes.index'));
        }

        return view('concurso_postulantes.edit' , compact('concursos' , 'postulantes' , 'tipoPostulantes'))->with('concursoPostulante', $concursoPostulante);
    }

    /**
     * Update the specified ConcursoPostulante in storage.
     *
     * @param  int              $id
     * @param UpdateConcursoPostulanteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConcursoPostulanteRequest $request)
    {
        $concursoPostulante = $this->concursoPostulanteRepository->findWithoutFail($id);

        if (empty($concursoPostulante)) {
            Flash::error('Concurso Postulante not found');

            return redirect(route('concursoPostulantes.index'));
        }

        $concursoPostulante = $this->concursoPostulanteRepository->update($request->all(), $id);

        Flash::success('Concurso Postulante updated successfully.');

        return redirect(route('concursoPostulantes.index'));
    }

    /**
     * Remove the specified ConcursoPostulante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $concursoPostulante = $this->concursoPostulanteRepository->findWithoutFail($id);

        if (empty($concursoPostulante)) {
            Flash::error('Concurso Postulante not found');

            return redirect(route('concursoPostulantes.index'));
        }

        $this->concursoPostulanteRepository->delete($id);

        Flash::success('Concurso Postulante deleted successfully.');

        return redirect(route('concursoPostulantes.index'));
    }
}
