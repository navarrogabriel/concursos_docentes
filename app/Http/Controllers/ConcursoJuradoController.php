<?php

namespace App\Http\Controllers;

use App\DataTables\ConcursoJuradoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateConcursoJuradoRequest;
use App\Http\Requests\UpdateConcursoJuradoRequest;
use App\Repositories\ConcursoJuradoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Jurado;
use App\Models\Concurso;
use App\Models\Categoria;


class ConcursoJuradoController extends AppBaseController
{
    /** @var  ConcursoJuradoRepository */
    private $concursoJuradoRepository;

    public function __construct(ConcursoJuradoRepository $concursoJuradoRepo)
    {
        $this->concursoJuradoRepository = $concursoJuradoRepo;
    }

    /**
     * Display a listing of the ConcursoJurado.
     *
     * @param ConcursoJuradoDataTable $concursoJuradoDataTable
     * @return Response
     */
    public function index(ConcursoJuradoDataTable $concursoJuradoDataTable)
    {
        return $concursoJuradoDataTable->render('concurso_jurados.index');
    }

    /**
     * Show the form for creating a new ConcursoJurado.
     *
     * @return Response
     */
    public function create()
    {
        $concursos = Concurso::pluck('referenciaGeneral' ,'id' );
        $jurados = Jurado::where('tipo','Jurado')->pluck('apellidos' , 'id');
        $categorias = Categoria::pluck('nombre' , 'id');
        $niveles = collect(['Interno'=>'Interno' , 'Externo' => 'Externo']);
        $tipoJurados = collect(['Titular' => 'Titular' , 'Suplente' => 'Suplente']);
        return view('concurso_jurados.create' , compact('jurados','niveles','tipoJurados' , 'concursos', 'categorias'));
    }

    /**
     * Store a newly created ConcursoJurado in storage.
     *
     * @param CreateConcursoJuradoRequest $request
     *
     * @return Response
     */
    public function store(CreateConcursoJuradoRequest $request)
    {
        $input = $request->all();

        $concursoJurado = $this->concursoJuradoRepository->create($input);

        Flash::success('Concurso Jurado saved successfully.');

        return redirect(route('concursoJurados.index'));
    }

    /**
     * Display the specified ConcursoJurado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $concursoJurado = $this->concursoJuradoRepository->findWithoutFail($id);

        if (empty($concursoJurado)) {
            Flash::error('Concurso Jurado not found');

            return redirect(route('concursoJurados.index'));
        }

        return view('concurso_jurados.show')->with('concursoJurado', $concursoJurado);
    }

    /**
     * Show the form for editing the specified ConcursoJurado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
      $concursoJurado = $this->concursoJuradoRepository->findWithoutFail($id);
        $concursos = Concurso::pluck('referenciaGeneral' , 'id' );
        $jurados = Jurado::where('tipo','Jurado')->pluck('nombres' , 'id');
        $categorias = Categoria::pluck('nombre' , 'id');
        $niveles = collect(['Interno'=>'Interno' , 'Externo' => 'Externo']);
        $tipoJurados = collect(['Titular' => 'Titular' , 'Suplente' => 'Suplente']);
        if (empty($concursoJurado)) {
            Flash::error('Concurso Jurado not found');

            return redirect(route('concursoJurados.index'));
        }

        return view('concurso_jurados.edit', compact('jurados','niveles','tipoJurados' , 'concursos', 'categorias'))->with('concursoJurado', $concursoJurado);
    }

    /**
     * Update the specified ConcursoJurado in storage.
     *
     * @param  int              $id
     * @param UpdateConcursoJuradoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConcursoJuradoRequest $request)
    {
        $concursoJurado = $this->concursoJuradoRepository->findWithoutFail($id);

        if (empty($concursoJurado)) {
            Flash::error('Concurso Jurado not found');

            return redirect(route('concursoJurados.index'));
        }

        $concursoJurado = $this->concursoJuradoRepository->update($request->all(), $id);

        Flash::success('Concurso Jurado updated successfully.');

        return redirect(route('concursoJurados.index'));
    }

    /**
     * Remove the specified ConcursoJurado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $concursoJurado = $this->concursoJuradoRepository->findWithoutFail($id);

        if (empty($concursoJurado)) {
            Flash::error('Concurso Jurado not found');

            return redirect(route('concursoJurados.index'));
        }

        $this->concursoJuradoRepository->delete($id);

        Flash::success('Concurso Jurado deleted successfully.');

        return redirect(route('concursoJurados.index'));
    }
}
