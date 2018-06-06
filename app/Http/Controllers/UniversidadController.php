<?php

namespace App\Http\Controllers;

use App\DataTables\UniversidadDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUniversidadRequest;
use App\Http\Requests\UpdateUniversidadRequest;
use App\Repositories\UniversidadRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UniversidadController extends AppBaseController
{
    /** @var  UniversidadRepository */
    private $universidadRepository;

    public function __construct(UniversidadRepository $universidadRepo)
    {
        $this->universidadRepository = $universidadRepo;
    }

    /**
     * Display a listing of the Universidad.
     *
     * @param UniversidadDataTable $universidadDataTable
     * @return Response
     */
    public function index(UniversidadDataTable $universidadDataTable)
    {
        return $universidadDataTable->render('universidads.index');
    }

    /**
     * Show the form for creating a new Universidad.
     *
     * @return Response
     */
    public function create()
    {
        return view('universidads.create');
    }

    /**
     * Store a newly created Universidad in storage.
     *
     * @param CreateUniversidadRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversidadRequest $request)
    {
        $input = $request->all();

        $universidad = $this->universidadRepository->create($input);

        Flash::success('Universidad saved successfully.');

        return redirect(route('universidads.index'));
    }

    /**
     * Display the specified Universidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $universidad = $this->universidadRepository->findWithoutFail($id);

        if (empty($universidad)) {
            Flash::error('Universidad not found');

            return redirect(route('universidads.index'));
        }

        return view('universidads.show')->with('universidad', $universidad);
    }

    /**
     * Show the form for editing the specified Universidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $universidad = $this->universidadRepository->findWithoutFail($id);

        if (empty($universidad)) {
            Flash::error('Universidad not found');

            return redirect(route('universidads.index'));
        }

        return view('universidads.edit')->with('universidad', $universidad);
    }

    /**
     * Update the specified Universidad in storage.
     *
     * @param  int              $id
     * @param UpdateUniversidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversidadRequest $request)
    {
        $universidad = $this->universidadRepository->findWithoutFail($id);

        if (empty($universidad)) {
            Flash::error('Universidad not found');

            return redirect(route('universidads.index'));
        }

        $universidad = $this->universidadRepository->update($request->all(), $id);

        Flash::success('Universidad updated successfully.');

        return redirect(route('universidads.index'));
    }

    /**
     * Remove the specified Universidad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $universidad = $this->universidadRepository->findWithoutFail($id);

        if (empty($universidad)) {
            Flash::error('Universidad not found');

            return redirect(route('universidads.index'));
        }

        $this->universidadRepository->delete($id);

        Flash::success('Universidad deleted successfully.');

        return redirect(route('universidads.index'));
    }
}
