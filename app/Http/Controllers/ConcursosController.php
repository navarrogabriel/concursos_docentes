<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConcursosRequest;
use App\Http\Requests\UpdateConcursosRequest;
use App\Repositories\ConcursosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Asignatura;
use App\Models\Categorias;
use App\Models\perfiles;
use App\Models\Dedicaciones;



class ConcursosController extends AppBaseController
{
    /** @var  ConcursosRepository */
    private $concursosRepository;

    public function __construct(ConcursosRepository $concursosRepo)
    {
        $this->concursosRepository = $concursosRepo;
    }

    /**
     * Display a listing of the Concursos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->concursosRepository->pushCriteria(new RequestCriteria($request));
        $concursos = $this->concursosRepository->all();

        return view('concursos.index')
            ->with('concursos', $concursos);
    }

    /**
     * Show the form for creating a new Concursos.
     *
     * @return Response
     */
    public function create()
    {
      $asignatura = Asignatura::pluck('descripcion', 'id');
      $categoria = Categorias::pluck('descripcion', 'id');
      $perfil = perfiles::pluck('descripcion', 'id');
      $dedicacion = dedicaciones::pluck('descripcion', 'id');
      return view('concursos.create',compact( 'asignatura' , 'categoria' , 'perfil' , 'dedicacion'));
    }

    /**
     * Store a newly created Concursos in storage.
     *
     * @param CreateConcursosRequest $request
     *
     * @return Response
     */
    public function store(CreateConcursosRequest $request)
    {
        $input = $request->all();

        $concursos = $this->concursosRepository->create($input);

        Flash::success('Concursos saved successfully.');

        return redirect(route('concursos.index'));
    }

    /**
     * Display the specified Concursos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $concursos = $this->concursosRepository->findWithoutFail($id);

        if (empty($concursos)) {
            Flash::error('Concursos not found');

            return redirect(route('concursos.index'));
        }

        return view('concursos.show')->with('concursos', $concursos);
    }

    /**
     * Show the form for editing the specified Concursos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
      $asignatura = Asignatura::pluck('descripcion', 'id');
      $categoria = Categorias::pluck('descripcion', 'id');
      $perfil = perfiles::pluck('descripcion', 'id');
      $dedicacion = dedicaciones::pluck('descripcion', 'id');

        $concursos = $this->concursosRepository->findWithoutFail($id);

        if (empty($concursos)) {
            Flash::error('Concursos not found');

            return redirect(route('concursos.index'));
        }

        return view('concursos.edit',compact( 'asignatura' , 'categoria' , 'perfil' , 'dedicacion'))->with('concursos', $concursos);
    }

    /**
     * Update the specified Concursos in storage.
     *
     * @param  int              $id
     * @param UpdateConcursosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConcursosRequest $request)
    {
        $concursos = $this->concursosRepository->findWithoutFail($id);

        if (empty($concursos)) {
            Flash::error('Concursos not found');

            return redirect(route('concursos.index'));
        }

        $concursos = $this->concursosRepository->update($request->all(), $id);

        Flash::success('Concursos updated successfully.');

        return redirect(route('concursos.index'));
    }

    /**
     * Remove the specified Concursos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $concursos = $this->concursosRepository->findWithoutFail($id);

        if (empty($concursos)) {
            Flash::error('Concursos not found');

            return redirect(route('concursos.index'));
        }

        $this->concursosRepository->delete($id);

        Flash::success('Concursos deleted successfully.');

        return redirect(route('concursos.index'));
    }
}
