<?php

namespace App\Http\Controllers;

use App\DataTables\CargoConcursadoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCargoConcursadoRequest;
use App\Http\Requests\UpdateCargoConcursadoRequest;
use App\Repositories\CargoConcursadoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Universidad;
use App\Models\Categoria;
use App\Models\Jurado;



class CargoConcursadoController extends AppBaseController
{
    /** @var  CargoConcursadoRepository */
    private $cargoConcursadoRepository;

    public function __construct(CargoConcursadoRepository $cargoConcursadoRepo)
    {
        $this->cargoConcursadoRepository = $cargoConcursadoRepo;
    }

    /**
     * Display a listing of the CargoConcursado.
     *
     * @param CargoConcursadoDataTable $cargoConcursadoDataTable
     * @return Response
     */
    public function index(CargoConcursadoDataTable $cargoConcursadoDataTable)
    {
        return $cargoConcursadoDataTable->render('cargo_concursados.index');
    }

    /**
     * Show the form for creating a new CargoConcursado.
     *
     * @return Response
     */
    public function create()
    {
        $personas = Jurado::pluck('apellidos' , 'id');
        $universidades = Universidad::pluck('nombre' , 'id');
        $categorias = Categoria::pluck('nombre' , 'id');
        $dedicaciones = collect(['Simple' => 'Simple' , 'Exclusiva' => 'Exclusiva' , 'SemiExclusiva' => 'SemiExclusiva']);
        $tipoRegistro = collect(['Postulante'=> 'Postulante' , 'Jurado' => 'Jurado']);
        return view('cargo_concursados.create', compact ('personas','universidades' , 'dedicaciones' , 'tipoRegistro' , 'categorias'));
    }

    /**
     * Store a newly created CargoConcursado in storage.
     *
     * @param CreateCargoConcursadoRequest $request
     *
     * @return Response
     */
    public function store(CreateCargoConcursadoRequest $request)
    {
        $input = $request->all();

        $cargoConcursado = $this->cargoConcursadoRepository->create($input);

        Flash::success('Cargo Concursado saved successfully.');

        return redirect(route('cargoConcursados.index'));
    }

    /**
     * Display the specified CargoConcursado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cargoConcursado = $this->cargoConcursadoRepository->findWithoutFail($id);

        if (empty($cargoConcursado)) {
            Flash::error('Cargo Concursado not found');

            return redirect(route('cargoConcursados.index'));
        }

        return view('cargo_concursados.show')->with('cargoConcursado', $cargoConcursado);
    }

    /**
     * Show the form for editing the specified CargoConcursado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cargoConcursado = $this->cargoConcursadoRepository->findWithoutFail($id);
        $personas = Jurado::pluck('apellidos' , 'id');
        $universidades = Universidad::pluck('nombre' , 'id');
        $categorias = Categoria::pluck('nombre' , 'id');
        $dedicaciones = collect(['Simple' => 'Simple' , 'Exclusiva' => 'Exclusiva' , 'SemiExclusiva' => 'SemiExclusiva']);
        $tipoRegistro = collect(['Postulante'=> 'Postulante' , 'Jurado' => 'Jurado']);

        if (empty($cargoConcursado)) {
            Flash::error('Cargo Concursado not found');

            return redirect(route('cargoConcursados.index'));
        }

        return view('cargo_concursados.edit', compact ('personas','universidades' , 'dedicaciones' , 'tipoRegistro' , 'categorias' ))->with('cargoConcursado', $cargoConcursado);
    }

    /**
     * Update the specified CargoConcursado in storage.
     *
     * @param  int              $id
     * @param UpdateCargoConcursadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCargoConcursadoRequest $request)
    {
        $cargoConcursado = $this->cargoConcursadoRepository->findWithoutFail($id);

        if (empty($cargoConcursado)) {
            Flash::error('Cargo Concursado not found');

            return redirect(route('cargoConcursados.index'));
        }

        $cargoConcursado = $this->cargoConcursadoRepository->update($request->all(), $id);

        Flash::success('Cargo Concursado updated successfully.');

        return redirect(route('cargoConcursados.index'));
    }

    /**
     * Remove the specified CargoConcursado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cargoConcursado = $this->cargoConcursadoRepository->findWithoutFail($id);

        if (empty($cargoConcursado)) {
            Flash::error('Cargo Concursado not found');

            return redirect(route('cargoConcursados.index'));
        }

        $this->cargoConcursadoRepository->delete($id);

        Flash::success('Cargo Concursado deleted successfully.');

        return redirect(route('cargoConcursados.index'));
    }
}
