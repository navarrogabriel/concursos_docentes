<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateinstitutosRequest;
use App\Http\Requests\UpdateinstitutosRequest;
use App\Repositories\InstitutosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class institutosController extends AppBaseController
{
    /** @var  InstitutosRepository */
    private $InstitutosRepository;

    public function __construct(InstitutosRepository $institutosRepo)
    {
        $this->InstitutosRepository = $institutosRepo;
    }

    /**
     * Display a listing of the institutos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->InstitutosRepository->pushCriteria(new RequestCriteria($request));
        $institutos = $this->InstitutosRepository->all();

        return view('institutos.index')
            ->with('institutos', $institutos);
    }

    /**
     * Show the form for creating a new institutos.
     *
     * @return Response
     */
    public function create()
    {
        return view('institutos.create');
    }

    /**
     * Store a newly created institutos in storage.
     *
     * @param CreateinstitutosRequest $request
     *
     * @return Response
     */
    public function store(CreateinstitutosRequest $request)
    {
        $input = $request->all();

        $institutos = $this->InstitutosRepository->create($input);

        Flash::success('institutos saved successfully.');

        return redirect(route('institutos.index'));
    }

    /**
     * Display the specified institutos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $institutos = $this->InstitutosRepository->findWithoutFail($id);

        if (empty($institutos)) {
            Flash::error('institutos not found');

            return redirect(route('institutos.index'));
        }

        return view('institutos.show')->with('institutos', $institutos);
    }

    /**
     * Show the form for editing the specified institutos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $institutos = $this->InstitutosRepository->findWithoutFail($id);

        if (empty($institutos)) {
            Flash::error('institutos not found');

            return redirect(route('institutos.index'));
        }

        return view('institutos.edit')->with('institutos', $institutos);
    }

    /**
     * Update the specified institutos in storage.
     *
     * @param  int              $id
     * @param UpdateinstitutosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinstitutosRequest $request)
    {
        $institutos = $this->InstitutosRepository->findWithoutFail($id);

        if (empty($institutos)) {
            Flash::error('institutos not found');

            return redirect(route('institutos.index'));
        }

        $institutos = $this->InstitutosRepository->update($request->all(), $id);

        Flash::success('institutos updated successfully.');

        return redirect(route('institutos.index'));
    }

    /**
     * Remove the specified institutos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $institutos = $this->InstitutosRepository->findWithoutFail($id);

        if (empty($institutos)) {
            Flash::error('institutos not found');

            return redirect(route('institutos.index'));
        }

        $this->InstitutosRepository->delete($id);

        Flash::success('institutos deleted successfully.');

        return redirect(route('institutos.index'));
    }
}
