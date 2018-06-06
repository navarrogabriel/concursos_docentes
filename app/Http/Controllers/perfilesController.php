<?php

namespace App\Http\Controllers;

use App\DataTables\PerfilesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePerfilesRequest;
use App\Http\Requests\UpdatePerfilesRequest;
use App\Repositories\PerfilesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PerfilesController extends AppBaseController
{
    /** @var  PerfilesRepository */
    private $perfilesRepository;

    public function __construct(PerfilesRepository $perfilesRepo)
    {
        $this->perfilesRepository = $perfilesRepo;
    }

    /**
     * Display a listing of the Perfiles.
     *
     * @param PerfilesDataTable $perfilesDataTable
     * @return Response
     */
    public function index(PerfilesDataTable $perfilesDataTable)
    {
        return $perfilesDataTable->render('perfiles.index');
    }

    /**
     * Show the form for creating a new Perfiles.
     *
     * @return Response
     */
    public function create()
    {
        return view('perfiles.create');
    }

    /**
     * Store a newly created Perfiles in storage.
     *
     * @param CreatePerfilesRequest $request
     *
     * @return Response
     */
    public function store(CreatePerfilesRequest $request)
    {
        $input = $request->all();

        $perfiles = $this->perfilesRepository->create($input);

        Flash::success('Perfiles saved successfully.');

        return redirect(route('perfiles.index'));
    }

    /**
     * Display the specified Perfiles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $perfiles = $this->perfilesRepository->findWithoutFail($id);

        if (empty($perfiles)) {
            Flash::error('Perfiles not found');

            return redirect(route('perfiles.index'));
        }

        return view('perfiles.show')->with('perfiles', $perfiles);
    }

    /**
     * Show the form for editing the specified Perfiles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $perfiles = $this->perfilesRepository->findWithoutFail($id);

        if (empty($perfiles)) {
            Flash::error('Perfiles not found');

            return redirect(route('perfiles.index'));
        }

        return view('perfiles.edit')->with('perfiles', $perfiles);
    }

    /**
     * Update the specified Perfiles in storage.
     *
     * @param  int              $id
     * @param UpdatePerfilesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePerfilesRequest $request)
    {
        $perfiles = $this->perfilesRepository->findWithoutFail($id);

        if (empty($perfiles)) {
            Flash::error('Perfiles not found');

            return redirect(route('perfiles.index'));
        }

        $perfiles = $this->perfilesRepository->update($request->all(), $id);

        Flash::success('Perfiles updated successfully.');

        return redirect(route('perfiles.index'));
    }

    /**
     * Remove the specified Perfiles from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $perfiles = $this->perfilesRepository->findWithoutFail($id);

        if (empty($perfiles)) {
            Flash::error('Perfiles not found');

            return redirect(route('perfiles.index'));
        }

        $this->perfilesRepository->delete($id);

        Flash::success('Perfiles deleted successfully.');

        return redirect(route('perfiles.index'));
    }
}
