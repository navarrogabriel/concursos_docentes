<?php

namespace App\Http\Controllers;

use App\DataTables\LlamadoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLlamadoRequest;
use App\Http\Requests\UpdateLlamadoRequest;
use App\Repositories\LlamadoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LlamadoController extends AppBaseController
{
    /** @var  LlamadoRepository */
    private $llamadoRepository;

    public function __construct(LlamadoRepository $llamadoRepo)
    {
        $this->llamadoRepository = $llamadoRepo;
    }

    /**
     * Display a listing of the Llamado.
     *
     * @param LlamadoDataTable $llamadoDataTable
     * @return Response
     */
    public function index(LlamadoDataTable $llamadoDataTable)
    {
        return $llamadoDataTable->render('llamados.index');
    }

    /**
     * Show the form for creating a new Llamado.
     *
     * @return Response
     */
    public function create()
    {
        return view('llamados.create');
    }

    /**
     * Store a newly created Llamado in storage.
     *
     * @param CreateLlamadoRequest $request
     *
     * @return Response
     */
    public function store(CreateLlamadoRequest $request)
    {
        $input = $request->all();

        $llamado = $this->llamadoRepository->create($input);

        Flash::success('Llamado saved successfully.');

        return redirect(route('llamados.index'));
    }

    /**
     * Display the specified Llamado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $llamado = $this->llamadoRepository->findWithoutFail($id);

        if (empty($llamado)) {
            Flash::error('Llamado not found');

            return redirect(route('llamados.index'));
        }

        return view('llamados.show')->with('llamado', $llamado);
    }

    /**
     * Show the form for editing the specified Llamado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $llamado = $this->llamadoRepository->findWithoutFail($id);

        if (empty($llamado)) {
            Flash::error('Llamado not found');

            return redirect(route('llamados.index'));
        }

        return view('llamados.edit')->with('llamado', $llamado);
    }

    /**
     * Update the specified Llamado in storage.
     *
     * @param  int              $id
     * @param UpdateLlamadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLlamadoRequest $request)
    {
        $llamado = $this->llamadoRepository->findWithoutFail($id);

        if (empty($llamado)) {
            Flash::error('Llamado not found');

            return redirect(route('llamados.index'));
        }

        $llamado = $this->llamadoRepository->update($request->all(), $id);

        Flash::success('Llamado updated successfully.');

        return redirect(route('llamados.index'));
    }

    /**
     * Remove the specified Llamado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $llamado = $this->llamadoRepository->findWithoutFail($id);

        if (empty($llamado)) {
            Flash::error('Llamado not found');

            return redirect(route('llamados.index'));
        }

        $this->llamadoRepository->delete($id);

        Flash::success('Llamado deleted successfully.');

        return redirect(route('llamados.index'));
    }
}
