<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateconcursospostulantesRequest;
use App\Http\Requests\UpdateconcursospostulantesRequest;
use App\Repositories\ConcursospostulantesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Concursos;
use App\Models\Postulante;

class concursospostulantesController extends AppBaseController
{
    /** @var  ConcursospostulantesRepository */
    private $ConcursospostulantesRepository;

    public function __construct(ConcursospostulantesRepository $concursospostulantesRepo)
    {
        $this->ConcursospostulantesRepository = $concursospostulantesRepo;
    }

    /**
     * Display a listing of the concursospostulantes.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ConcursospostulantesRepository->pushCriteria(new RequestCriteria($request));
        $concursospostulantes = $this->ConcursospostulantesRepository->all();

        return view('concursospostulantes.index')
            ->with('concursospostulantes', $concursospostulantes);
    }

    /**
     * Show the form for creating a new concursospostulantes.
     *
     * @return Response
     */
    public function create()
    {
        $concurso = Concursos::pluck('referenciaGeneral', 'id');
        $postulante = Postulante::pluck('documento' , 'id' );
        $cumpleRequisitos = ['SI' , 'NO'];
        return view('concursospostulantes.create' , compact('concurso', 'postulante' , 'cumpleRequisitos'));
    }

    /**
     * Store a newly created concursospostulantes in storage.
     *
     * @param CreateconcursospostulantesRequest $request
     *
     * @return Response
     */
    public function store(CreateconcursospostulantesRequest $request)
    {
        $input = $request->all();

        $concursospostulantes = $this->ConcursospostulantesRepository->create($input);

        Flash::success('Concursospostulantes saved successfully.');

        return redirect(route('concursospostulantes.index'));
    }

    /**
     * Display the specified concursospostulantes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
      $concurso = Concursos::pluck('referenciaGeneral', 'id');
      $postulante = Postulante::pluck('documento' , 'id' );
      $cumpleRequisitos = ['SI' , 'NO'];
        $concursospostulantes = $this->ConcursospostulantesRepository->findWithoutFail($id);

        if (empty($concursospostulantes)) {
            Flash::error('Concursospostulantes not found');

            return redirect(route('concursospostulantes.index'));
        }

        return view('concursospostulantes.show', compact('concurso', 'postulante' , 'cumpleRequisitos'))->with('concursospostulantes', $concursospostulantes);
    }

    /**
     * Show the form for editing the specified concursospostulantes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
      $concurso = Concursos::pluck('referenciaGeneral', 'id');
      $postulante = Postulante::pluck('documento' , 'id' );
      $cumpleRequisitos = ['SI' , 'NO'];
        $concursospostulantes = $this->ConcursospostulantesRepository->findWithoutFail($id);

        if (empty($concursospostulantes)) {
            Flash::error('Concursospostulantes not found');

            return redirect(route('concursospostulantes.index'));
        }

        return view('concursospostulantes.edit' , compact('concurso' , 'postulante' , 'cumpleRequisitos'))->with('concursospostulantes', $concursospostulantes);
    }

    /**
     * Update the specified concursospostulantes in storage.
     *
     * @param  int              $id
     * @param UpdateconcursospostulantesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateconcursospostulantesRequest $request)
    {
        $concursospostulantes = $this->ConcursospostulantesRepository->findWithoutFail($id);

        if (empty($concursospostulantes)) {
            Flash::error('Concursospostulantes not found');

            return redirect(route('concursospostulantes.index'));
        }

        $concursospostulantes = $this->ConcursospostulantesRepository->update($request->all(), $id);

        Flash::success('Concursospostulantes updated successfully.');

        return redirect(route('concursospostulantes.index'));
    }

    /**
     * Remove the specified concursospostulantes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $concursospostulantes = $this->ConcursospostulantesRepository->findWithoutFail($id);

        if (empty($concursospostulantes)) {
            Flash::error('Concursospostulantes not found');

            return redirect(route('concursospostulantes.index'));
        }

        $this->ConcursospostulantesRepository->delete($id);

        Flash::success('Concursospostulantes deleted successfully.');

        return redirect(route('concursospostulantes.index'));
    }
}
