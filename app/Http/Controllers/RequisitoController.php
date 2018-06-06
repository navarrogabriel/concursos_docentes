<?php

namespace App\Http\Controllers;

use App\DataTables\RequisitoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRequisitoRequest;
use App\Http\Requests\UpdateRequisitoRequest;
use App\Repositories\RequisitoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RequisitoController extends AppBaseController
{
    /** @var  RequisitoRepository */
    private $requisitoRepository;

    public function __construct(RequisitoRepository $requisitoRepo)
    {
        $this->requisitoRepository = $requisitoRepo;
    }

    /**
     * Display a listing of the Requisito.
     *
     * @param RequisitoDataTable $requisitoDataTable
     * @return Response
     */
    public function index(RequisitoDataTable $requisitoDataTable)
    {
        return $requisitoDataTable->render('requisitos.index');
    }

    /**
     * Show the form for creating a new Requisito.
     *
     * @return Response
     */
    public function create()
    {
        return view('requisitos.create');
    }

    /**
     * Store a newly created Requisito in storage.
     *
     * @param CreateRequisitoRequest $request
     *
     * @return Response
     */
    public function store(CreateRequisitoRequest $request)
    {
        $input = $request->all();

        $requisito = $this->requisitoRepository->create($input);

        Flash::success('Requisito saved successfully.');

        return redirect(route('requisitos.index'));
    }

    /**
     * Display the specified Requisito.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requisito = $this->requisitoRepository->findWithoutFail($id);

        if (empty($requisito)) {
            Flash::error('Requisito not found');

            return redirect(route('requisitos.index'));
        }

        return view('requisitos.show')->with('requisito', $requisito);
    }

    /**
     * Show the form for editing the specified Requisito.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $requisito = $this->requisitoRepository->findWithoutFail($id);

        if (empty($requisito)) {
            Flash::error('Requisito not found');

            return redirect(route('requisitos.index'));
        }

        return view('requisitos.edit')->with('requisito', $requisito);
    }

    /**
     * Update the specified Requisito in storage.
     *
     * @param  int              $id
     * @param UpdateRequisitoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequisitoRequest $request)
    {
        $requisito = $this->requisitoRepository->findWithoutFail($id);

        if (empty($requisito)) {
            Flash::error('Requisito not found');

            return redirect(route('requisitos.index'));
        }

        $requisito = $this->requisitoRepository->update($request->all(), $id);

        Flash::success('Requisito updated successfully.');

        return redirect(route('requisitos.index'));
    }

    /**
     * Remove the specified Requisito from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $requisito = $this->requisitoRepository->findWithoutFail($id);

        if (empty($requisito)) {
            Flash::error('Requisito not found');

            return redirect(route('requisitos.index'));
        }

        $this->requisitoRepository->delete($id);

        Flash::success('Requisito deleted successfully.');

        return redirect(route('requisitos.index'));
    }
}
