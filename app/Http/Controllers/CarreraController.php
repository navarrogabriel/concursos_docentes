<?php

namespace App\Http\Controllers;

use App\DataTables\CarreraDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCarreraRequest;
use App\Http\Requests\UpdateCarreraRequest;
use App\Repositories\CarreraRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Instituto;

class CarreraController extends AppBaseController
{
    /** @var  CarreraRepository */
    private $carreraRepository;

    public function __construct(CarreraRepository $carreraRepo)
    {
        $this->carreraRepository = $carreraRepo;
    }

    /**
     * Display a listing of the Carrera.
     *
     * @param CarreraDataTable $carreraDataTable
     * @return Response
     */
    public function index(CarreraDataTable $carreraDataTable)
    {
        $institutos = Instituto::pluck('nombre' , 'id') ;
        return $carreraDataTable->render('carreras.index' , compact('institutos'));
        
    }

    /**
     * Show the form for creating a new Carrera.
     *
     * @return Response
     */
    public function create()
    {
        $institutos = Instituto::pluck('nombre' , 'id') ;

        return view('carreras.create' , compact ('institutos'));
    }

    /**
     * Store a newly created Carrera in storage.
     *
     * @param CreateCarreraRequest $request
     *
     * @return Response
     */
    public function store(CreateCarreraRequest $request)
    {
        $input = $request->all();

        $carrera = $this->carreraRepository->create($input);

        Flash::success('Carrera saved successfully.');

        return redirect(route('carreras.index'));
    }

    /**
     * Display the specified Carrera.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carrera = $this->carreraRepository->findWithoutFail($id);

        if (empty($carrera)) {
            Flash::error('Carrera not found');

            return redirect(route('carreras.index'));
        }

        return view('carreras.show')->with('carrera', $carrera);
    }

    /**
     * Show the form for editing the specified Carrera.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $institutos = Instituto::pluck('nombre' , 'id') ;

        $carrera = $this->carreraRepository->findWithoutFail($id);

        if (empty($carrera)) {
            Flash::error('Carrera not found');

            return redirect(route('carreras.index', compact('institutos')));
        }

        return view('carreras.edit' , compact('institutos'))->with('carrera', $carrera);
    }

    /**
     * Update the specified Carrera in storage.
     *
     * @param  int              $id
     * @param UpdateCarreraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarreraRequest $request)
    {
        $carrera = $this->carreraRepository->findWithoutFail($id);

        if (empty($carrera)) {
            Flash::error('Carrera not found');

            return redirect(route('carreras.index'));
        }

        $carrera = $this->carreraRepository->update($request->all(), $id);

        Flash::success('Carrera updated successfully.');

        return redirect(route('carreras.index'));
    }

    /**
     * Remove the specified Carrera from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carrera = $this->carreraRepository->findWithoutFail($id);

        if (empty($carrera)) {
            Flash::error('Carrera not found');

            return redirect(route('carreras.index'));
        }

        $this->carreraRepository->delete($id);

        Flash::success('Carrera deleted successfully.');

        return redirect(route('carreras.index'));
    }
}
