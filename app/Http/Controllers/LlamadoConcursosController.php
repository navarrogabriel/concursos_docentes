<?php

namespace App\Http\Controllers;

use App\DataTables\LlamadoConcursosDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLlamadoConcursosRequest;
use App\Http\Requests\UpdateLlamadoConcursosRequest;
use App\Repositories\LlamadoConcursosRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Llamado;
use App\Models\Concurso;



class LlamadoConcursosController extends AppBaseController
{
    /** @var  LlamadoConcursosRepository */
    private $llamadoConcursosRepository;

    public function __construct(LlamadoConcursosRepository $llamadoConcursosRepo)
    {
        $this->llamadoConcursosRepository = $llamadoConcursosRepo;
    }

    /**
     * Display a listing of the LlamadoConcursos.
     *
     * @param LlamadoConcursosDataTable $llamadoConcursosDataTable
     * @return Response
     */
    public function index(LlamadoConcursosDataTable $llamadoConcursosDataTable)
    {
        return $llamadoConcursosDataTable->render('llamado_concursos.index');
    }

    /**
     * Show the form for creating a new LlamadoConcursos.
     *
     * @return Response
     */
    public function create()
    {
        $llamados = Llamado::pluck('codigo' , 'id');
        $concursos = Concurso::pluck('referenciaGeneral' , 'id');
        return view('llamado_concursos.create' , compact ('llamados' , 'concursos'));
    }

    /**
     * Store a newly created LlamadoConcursos in storage.
     *
     * @param CreateLlamadoConcursosRequest $request
     *
     * @return Response
     */
    public function store(CreateLlamadoConcursosRequest $request)
    {
        $input = $request->all();

        $llamadoConcursos = $this->llamadoConcursosRepository->create($input);

        Flash::success('Llamado Concursos saved successfully.');

        return redirect(route('llamadoConcursos.index'));
    }

    /**
     * Display the specified LlamadoConcursos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $llamadoConcursos = $this->llamadoConcursosRepository->findWithoutFail($id);

        if (empty($llamadoConcursos)) {
            Flash::error('Llamado Concursos not found');

            return redirect(route('llamadoConcursos.index'));
        }

        return view('llamado_concursos.show')->with('llamadoConcursos', $llamadoConcursos);
    }

    /**
     * Show the form for editing the specified LlamadoConcursos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
      $llamados = Llamado::pluck('codigo' , 'id');
      $concursos = Concurso::pluck('referenciaGeneral' , 'id');
        $llamadoConcursos = $this->llamadoConcursosRepository->findWithoutFail($id);

        if (empty($llamadoConcursos)) {
            Flash::error('Llamado Concursos not found');

            return redirect(route('llamadoConcursos.index'));
        }

        return view('llamado_concursos.edit' , compact ('llamados' , 'concursos'))->with('llamadoConcursos', $llamadoConcursos);
    }

    /**
     * Update the specified LlamadoConcursos in storage.
     *
     * @param  int              $id
     * @param UpdateLlamadoConcursosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLlamadoConcursosRequest $request)
    {
        $llamadoConcursos = $this->llamadoConcursosRepository->findWithoutFail($id);

        if (empty($llamadoConcursos)) {
            Flash::error('Llamado Concursos not found');

            return redirect(route('llamadoConcursos.index'));
        }

        $llamadoConcursos = $this->llamadoConcursosRepository->update($request->all(), $id);

        Flash::success('Llamado Concursos updated successfully.');

        return redirect(route('llamadoConcursos.index'));
    }

    /**
     * Remove the specified LlamadoConcursos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $llamadoConcursos = $this->llamadoConcursosRepository->findWithoutFail($id);

        if (empty($llamadoConcursos)) {
            Flash::error('Llamado Concursos not found');

            return redirect(route('llamadoConcursos.index'));
        }

        $this->llamadoConcursosRepository->delete($id);

        Flash::success('Llamado Concursos deleted successfully.');

        return redirect(route('llamadoConcursos.index'));
    }
}
