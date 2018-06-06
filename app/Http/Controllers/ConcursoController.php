<?php

namespace App\Http\Controllers;

use App\DataTables\ConcursoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateConcursoRequest;
use App\Http\Requests\UpdateConcursoRequest;
use App\Repositories\ConcursoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Asignatura;
use App\Models\Categoria;
use App\Models\Perfiles;
use App\Models\User;

class ConcursoController extends AppBaseController
{
    /** @var  ConcursoRepository */
    private $concursoRepository;

    public function __construct(ConcursoRepository $concursoRepo)
    {
        $this->concursoRepository = $concursoRepo;
    }

    /**
     * Display a listing of the Concurso.
     *
     * @param ConcursoDataTable $concursoDataTable
     * @return Response
     */
    public function index(ConcursoDataTable $concursoDataTable)
    {
        return $concursoDataTable->render('concursos.index');
    }

    /**
     * Show the form for creating a new Concurso.
     *
     * @return Response
     */
    public function create()
    {
      $asignaturas = Asignatura::pluck('nombre', 'id');
      $categorias = Categoria::pluck('nombre', 'id');
      $perfiles = Perfiles::pluck('nombre', 'id');
      $usuarios = User::pluck('name' , 'id');
      $estado = Collect(['Abierto' => 'Abierto' , 'Cerrado' => 'Cerrado' , 'Impugnado' => 'Impugnado' , 'Vacante' => 'Vacante']);
      $dedicaciones = Collect(['Simple' => 'Simple' , 'Exclusiva' => 'Exclusiva' , 'Semiexclusiva' => 'Semiexclusiva']);
        return view('concursos.create',compact( 'asignaturas' , 'categorias' , 'perfiles' , 'usuarios' , 'estado' , 'dedicaciones'));
    }

    /**
     * Store a newly created Concurso in storage.
     *
     * @param CreateConcursoRequest $request
     *
     * @return Response
     */
    public function store(CreateConcursoRequest $request)
    {
        $input = $request->all();

        $concurso = $this->concursoRepository->create($input);

        Flash::success('Concurso saved successfully.');

        return redirect(route('concursos.index'));
    }

    /**
     * Display the specified Concurso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $concurso = $this->concursoRepository->findWithoutFail($id);

        
        if (empty($concurso)) {
            Flash::error('Concurso not found');

            return redirect(route('concursos.index'));
        }

        return view('concursos.show')->with('concurso', $concurso);
    }

    /**
     * Show the form for editing the specified Concurso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asignaturas = Asignatura::pluck('nombre', 'id');
        $categorias = Categoria::pluck('nombre', 'id');
        $perfiles = Perfiles::pluck('nombre', 'id');
        $usuarios = User::pluck('name' , 'id');
        $estado = Collect(['Abierto' => 'Abierto' , 'Cerrado' => 'Cerrado' , 'Impugnado' => 'Impugnado' , 'Vacante' => 'Vacante']);
        $dedicaciones = Collect(['Simple' => 'Simple' , 'Exclusiva' => 'Exclusiva' , 'Semiexclusiva' => 'Semiexclusiva']);
        $concurso = $this->concursoRepository->findWithoutFail($id);


        if (empty($concurso)) {
            Flash::error('Concurso not found');

            return redirect(route('concursos.index'));
        }

        return view('concursos.edit' , compact( 'asignaturas' , 'categorias' , 'perfiles' , 'usuarios' , 'estado' , 'dedicaciones' ))->with('concurso', $concurso);
    }

    /**
     * Update the specified Concurso in storage.
     *
     * @param  int              $id
     * @param UpdateConcursoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConcursoRequest $request)
    {
        $concurso = $this->concursoRepository->findWithoutFail($id);

        if (empty($concurso)) {
            Flash::error('Concurso not found');

            return redirect(route('concursos.index'));
        }

        $concurso = $this->concursoRepository->update($request->all(), $id);

        Flash::success('Concurso updated successfully.');

        return redirect(route('concursos.index'));
    }

    /**
     * Remove the specified Concurso from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $concurso = $this->concursoRepository->findWithoutFail($id);

        if (empty($concurso)) {
            Flash::error('Concurso not found');

            return redirect(route('concursos.index'));
        }

        $this->concursoRepository->delete($id);

        Flash::success('Concurso deleted successfully.');

        return redirect(route('concursos.index'));
    }
}
