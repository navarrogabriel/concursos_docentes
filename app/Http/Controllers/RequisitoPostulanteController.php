<?php

namespace App\Http\Controllers;

use App\DataTables\RequisitoPostulanteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRequisitoPostulanteRequest;
use App\Http\Requests\UpdateRequisitoPostulanteRequest;
use App\Repositories\RequisitoPostulanteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Postulante;
use App\Models\Concurso;
use App\Models\RequisitoItem;
use Response;

class RequisitoPostulanteController extends AppBaseController
{
    /** @var  RequisitoPostulanteRepository */
    private $requisitoPostulanteRepository;

    public function __construct(RequisitoPostulanteRepository $requisitoPostulanteRepo)
    {
        $this->requisitoPostulanteRepository = $requisitoPostulanteRepo;
    }

    /**
     * Display a listing of the RequisitoPostulante.
     *
     * @param RequisitoPostulanteDataTable $requisitoPostulanteDataTable
     * @return Response
     */
    public function index(RequisitoPostulanteDataTable $requisitoPostulanteDataTable)
    {
        return $requisitoPostulanteDataTable->render('requisito_postulantes.index');
    }

    /**
     * Show the form for creating a new RequisitoPostulante.
     *
     * @return Response
     */
    public function create()
    {
        $requisitosItems = Requisitoitem::pluck('descripcion' , 'id');
        $concursos = Concurso::pluck('referenciaGeneral' , 'id');
        $postulantes = Postulante::where('tipo','Postulante')->pluck('nombres' , 'id');
        $entregoRequisito = collect(['Si' => 'Si' , 'No' => 'No']);
        $cumpleRequisito = collect(['Sin validar' => 'Sin validar' , 'Si' => 'Si', 'No' => 'No']);
        return view('requisito_postulantes.create', compact ('requisitosItems','entregoRequisito','cumpleRequisito','concursos','postulantes'));
    }

    /**
     * Store a newly created RequisitoPostulante in storage.
     *
     * @param CreateRequisitoPostulanteRequest $request
     *
     * @return Response
     */
    public function store(CreateRequisitoPostulanteRequest $request)
    {
        $input = $request->all();

        $requisitoPostulante = $this->requisitoPostulanteRepository->create($input);

        Flash::success('Requisito Postulante saved successfully.');

        return redirect(route('requisitoPostulantes.index'));
    }

    /**
     * Display the specified RequisitoPostulante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requisitoPostulante = $this->requisitoPostulanteRepository->findWithoutFail($id);

        if (empty($requisitoPostulante)) {
            Flash::error('Requisito Postulante not found');

            return redirect(route('requisitoPostulantes.index'));
        }

        return view('requisito_postulantes.show')->with('requisitoPostulante', $requisitoPostulante);
    }

    /**
     * Show the form for editing the specified RequisitoPostulante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $requisitoPostulante = $this->requisitoPostulanteRepository->findWithoutFail($id);

        if (empty($requisitoPostulante)) {
            Flash::error('Requisito Postulante not found');

            return redirect(route('requisitoPostulantes.index'));
        }

        return view('requisito_postulantes.edit')->with('requisitoPostulante', $requisitoPostulante);
    }

    /**
     * Update the specified RequisitoPostulante in storage.
     *
     * @param  int              $id
     * @param UpdateRequisitoPostulanteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequisitoPostulanteRequest $request)
    {
        $requisitoPostulante = $this->requisitoPostulanteRepository->findWithoutFail($id);

        if (empty($requisitoPostulante)) {
            Flash::error('Requisito Postulante not found');

            return redirect(route('requisitoPostulantes.index'));
        }

        $requisitoPostulante = $this->requisitoPostulanteRepository->update($request->all(), $id);

        Flash::success('Requisito Postulante updated successfully.');

        return redirect(route('requisitoPostulantes.index'));
    }

    /**
     * Remove the specified RequisitoPostulante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $requisitoPostulante = $this->requisitoPostulanteRepository->findWithoutFail($id);

        if (empty($requisitoPostulante)) {
            Flash::error('Requisito Postulante not found');

            return redirect(route('requisitoPostulantes.index'));
        }

        $this->requisitoPostulanteRepository->delete($id);

        Flash::success('Requisito Postulante deleted successfully.');

        return redirect(route('requisitoPostulantes.index'));
    }
}
