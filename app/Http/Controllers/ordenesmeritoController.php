<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateordenesmeritoRequest;
use App\Http\Requests\UpdateordenesmeritoRequest;
use App\Repositories\OrdenesmeritoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Concursos;
use App\Models\Postulante;

class ordenesmeritoController extends AppBaseController
{
    /** @var  OrdenesmeritoRepository */
    private $OrdenesmeritoRepository;

    public function __construct(OrdenesmeritoRepository $ordenesmeritoRepo)
    {
        $this->OrdenesmeritoRepository = $ordenesmeritoRepo;
    }

    /**
     * Display a listing of the ordenesmerito.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->OrdenesmeritoRepository->pushCriteria(new RequestCriteria($request));
        $ordenesmeritos = $this->OrdenesmeritoRepository->all();

        return view('ordenesmeritos.index')
            ->with('ordenesmeritos', $ordenesmeritos);
    }

    /**
     * Show the form for creating a new ordenesmerito.
     *
     * @return Response
     */
    public function create()
    {
        $concurso = Concursos::pluck('referenciaGeneral' , 'id');
        $postulante = Postulante::pluck('documento' , 'id');
        return view('ordenesmeritos.create' , compact('concurso' , 'postulante'));
    }

    /**
     * Store a newly created ordenesmerito in storage.
     *
     * @param CreateordenesmeritoRequest $request
     *
     * @return Response
     */
    public function store(CreateordenesmeritoRequest $request)
    {
        $input = $request->all();

        $ordenesmerito = $this->OrdenesmeritoRepository->create($input);

        Flash::success('Ordenesmerito saved successfully.');

        return redirect(route('ordenesmeritos.index'));
    }

    /**
     * Display the specified ordenesmerito.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
      $concurso = Concursos::pluck('referenciaGeneral' , 'id');
      $postulante = Postulante::pluck('documento' , 'id');
        $ordenesmerito = $this->OrdenesmeritoRepository->findWithoutFail($id);

        if (empty($ordenesmerito)) {
            Flash::error('Ordenesmerito not found');

            return redirect(route('ordenesmeritos.index'));
        }

        return view('ordenesmeritos.show',compact('concurso' , 'postulante'))->with('ordenesmerito', $ordenesmerito);
    }

    /**
     * Show the form for editing the specified ordenesmerito.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
      $concurso = Concursos::pluck('referenciaGeneral' , 'id');
      $postulante = Postulante::pluck('documento' , 'id');
        $ordenesmerito = $this->OrdenesmeritoRepository->findWithoutFail($id);

        if (empty($ordenesmerito)) {
            Flash::error('Ordenesmerito not found');

            return redirect(route('ordenesmeritos.index'));
        }

        return view('ordenesmeritos.edit' , compact('concurso' , 'postulante'))->with('ordenesmerito', $ordenesmerito);
    }

    /**
     * Update the specified ordenesmerito in storage.
     *
     * @param  int              $id
     * @param UpdateordenesmeritoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateordenesmeritoRequest $request)
    {
        $ordenesmerito = $this->OrdenesmeritoRepository->findWithoutFail($id);

        if (empty($ordenesmerito)) {
            Flash::error('Ordenesmerito not found');

            return redirect(route('ordenesmeritos.index'));
        }

        $ordenesmerito = $this->OrdenesmeritoRepository->update($request->all(), $id);

        Flash::success('Ordenesmerito updated successfully.');

        return redirect(route('ordenesmeritos.index'));
    }

    /**
     * Remove the specified ordenesmerito from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ordenesmerito = $this->OrdenesmeritoRepository->findWithoutFail($id);

        if (empty($ordenesmerito)) {
            Flash::error('Ordenesmerito not found');

            return redirect(route('ordenesmeritos.index'));
        }

        $this->OrdenesmeritoRepository->delete($id);

        Flash::success('Ordenesmerito deleted successfully.');

        return redirect(route('ordenesmeritos.index'));
    }
}
