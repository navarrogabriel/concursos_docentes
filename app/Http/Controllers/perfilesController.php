<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateperfilesRequest;
use App\Http\Requests\UpdateperfilesRequest;
use App\Repositories\PerfilesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class perfilesController extends AppBaseController
{
    /** @var  PerfilesRepository */
    private $PerfilesRepository;

    public function __construct(PerfilesRepository $perfilesRepo)
    {
        $this->PerfilesRepository = $perfilesRepo;
    }

    /**
     * Display a listing of the perfiles.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->PerfilesRepository->pushCriteria(new RequestCriteria($request));
        $perfiles = $this->PerfilesRepository->all();

        return view('perfiles.index')
            ->with('perfiles', $perfiles);
    }

    /**
     * Show the form for creating a new perfiles.
     *
     * @return Response
     */
    public function create()
    {
        return view('perfiles.create');
    }

    /**
     * Store a newly created perfiles in storage.
     *
     * @param CreateperfilesRequest $request
     *
     * @return Response
     */
    public function store(CreateperfilesRequest $request)
    {
        $input = $request->all();

        $perfiles = $this->PerfilesRepository->create($input);

        Flash::success('Perfiles saved successfully.');

        return redirect(route('perfiles.index'));
    }

    /**
     * Display the specified perfiles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $perfiles = $this->PerfilesRepository->findWithoutFail($id);

        if (empty($perfiles)) {
            Flash::error('Perfiles not found');

            return redirect(route('perfiles.index'));
        }

        return view('perfiles.show')->with('perfiles', $perfiles);
    }

    /**
     * Show the form for editing the specified perfiles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $perfiles = $this->PerfilesRepository->findWithoutFail($id);

        if (empty($perfiles)) {
            Flash::error('Perfiles not found');

            return redirect(route('perfiles.index'));
        }

        return view('perfiles.edit')->with('perfiles', $perfiles);
    }

    /**
     * Update the specified perfiles in storage.
     *
     * @param  int              $id
     * @param UpdateperfilesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateperfilesRequest $request)
    {
        $perfiles = $this->PerfilesRepository->findWithoutFail($id);

        if (empty($perfiles)) {
            Flash::error('Perfiles not found');

            return redirect(route('perfiles.index'));
        }

        $perfiles = $this->PerfilesRepository->update($request->all(), $id);

        Flash::success('Perfiles updated successfully.');

        return redirect(route('perfiles.index'));
    }

    /**
     * Remove the specified perfiles from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $perfiles = $this->PerfilesRepository->findWithoutFail($id);

        if (empty($perfiles)) {
            Flash::error('Perfiles not found');

            return redirect(route('perfiles.index'));
        }

        $this->PerfilesRepository->delete($id);

        Flash::success('Perfiles deleted successfully.');

        return redirect(route('perfiles.index'));
    }
}
