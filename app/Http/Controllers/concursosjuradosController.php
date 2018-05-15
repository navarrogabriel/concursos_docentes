<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateconcursosjuradosRequest;
use App\Http\Requests\UpdateconcursosjuradosRequest;
use App\Repositories\ConcursosJuradosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Concursos;
use App\Models\Jurados;

class concursosjuradosController extends AppBaseController
{
    /** @var  ConcursosJuradosRepository */
    private $ConcursosJuradosRepository;

    public function __construct(ConcursosJuradosRepository $concursosjuradosRepo)
    {
        $this->ConcursosJuradosRepository = $concursosjuradosRepo;
    }

    /**
     * Display a listing of the concursosjurados.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ConcursosJuradosRepository->pushCriteria(new RequestCriteria($request));
        $concursosjurados = $this->ConcursosJuradosRepository->all();

        return view('concursosjurados.index')
            ->with('concursosjurados', $concursosjurados);
    }

    /**
     * Show the form for creating a new concursosjurados.
     *
     * @return Response
     */
    public function create()
    {
        $concurso = Concursos::pluck('referenciaGeneral', 'id');
        $jurado = jurados::pluck('documento' , 'id' );
        $tipoJurado = ['Titular' , 'Suplente'];

        return view('concursosjurados.create', compact('concurso', 'jurado' , 'tipoJurado'));
    }

    /**
     * Store a newly created concursosjurados in storage.
     *
     * @param CreateconcursosjuradosRequest $request
     *
     * @return Response
     */
    public function store(CreateconcursosjuradosRequest $request)
    {
        $input = $request->all();

        $concursosjurados = $this->ConcursosJuradosRepository->create($input);

        Flash::success('Concursosjurados saved successfully.');

        return redirect(route('concursosjurados.index'));
    }

    /**
     * Display the specified concursosjurados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
      $concurso = Concursos::pluck('referenciaGeneral', 'id');
      $jurado = jurados::pluck('documento' , 'id' );
      $tipoJurado = ['titula'=>'Titular' ,'suplente'=> 'Suplente'];
        $concursosjurados = $this->ConcursosJuradosRepository->findWithoutFail($id);

        if (empty($concursosjurados)) {
            Flash::error('Concursosjurados not found');

            return redirect(route('concursosjurados.index',compact('concurso', 'jurado','tipoJurado')));
        }

        return view('concursosjurados.show')->with('concursosjurados', $concursosjurados);
    }

    /**
     * Show the form for editing the specified concursosjurados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
      $concurso = Concursos::pluck('referenciaGeneral', 'id');
      $jurado = jurados::pluck('documento' , 'id' );
      $tipoJurado = ['Titular' , 'Suplente'];
        $concursosjurados = $this->ConcursosJuradosRepository->findWithoutFail($id);

        if (empty($concursosjurados)) {
            Flash::error('Concursosjurados not found');

            return redirect(route('concursosjurados.index'));
        }

        return view('concursosjurados.edit',compact('concurso', 'jurado','tipoJurado'))->with('concursosjurados', $concursosjurados);
    }

    /**
     * Update the specified concursosjurados in storage.
     *
     * @param  int              $id
     * @param UpdateconcursosjuradosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateconcursosjuradosRequest $request)
    {

        $concursosjurados = $this->ConcursosJuradosRepository->findWithoutFail($id);

        if (empty($concursosjurados)) {
            Flash::error('Concursosjurados not found');

            return redirect(route('concursosjurados.index'));
        }

        $concursosjurados = $this->ConcursosJuradosRepository->update($request->all(), $id);

        Flash::success('Concursosjurados updated successfully.');

        return redirect(route('concursosjurados.index'));
    }

    /**
     * Remove the specified concursosjurados from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $concursosjurados = $this->ConcursosJuradosRepository->findWithoutFail($id);

        if (empty($concursosjurados)) {
            Flash::error('Concursosjurados not found');

            return redirect(route('concursosjurados.index'));
        }

        $this->ConcursosJuradosRepository->delete($id);

        Flash::success('Concursosjurados deleted successfully.');

        return redirect(route('concursosjurados.index'));
    }
}
