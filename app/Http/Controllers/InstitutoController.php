<?php

namespace App\Http\Controllers;

use App\DataTables\InstitutoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInstitutoRequest;
use App\Http\Requests\UpdateInstitutoRequest;
use App\Repositories\InstitutoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InstitutoController extends AppBaseController
{
    /** @var  InstitutoRepository */
    private $institutoRepository;

    public function __construct(InstitutoRepository $institutoRepo)
    {
        $this->institutoRepository = $institutoRepo;
    }

    /**
     * Display a listing of the Instituto.
     *
     * @param InstitutoDataTable $institutoDataTable
     * @return Response
     */
    public function index(InstitutoDataTable $institutoDataTable)
    {
        return $institutoDataTable->render('institutos.index');
    }

    /**
     * Show the form for creating a new Instituto.
     *
     * @return Response
     */
    public function create()
    {
        return view('institutos.create');
    }

    /**
     * Store a newly created Instituto in storage.
     *
     * @param CreateInstitutoRequest $request
     *
     * @return Response
     */
    public function store(CreateInstitutoRequest $request)
    {
        $input = $request->all();

        $instituto = $this->institutoRepository->create($input);

        Flash::success('Instituto saved successfully.');

        return redirect(route('institutos.index'));
    }

    /**
     * Display the specified Instituto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $instituto = $this->institutoRepository->findWithoutFail($id);

        if (empty($instituto)) {
            Flash::error('Instituto not found');

            return redirect(route('institutos.index'));
        }

        return view('institutos.show')->with('instituto', $instituto);
    }

    /**
     * Show the form for editing the specified Instituto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $instituto = $this->institutoRepository->findWithoutFail($id);

        if (empty($instituto)) {
            Flash::error('Instituto not found');

            return redirect(route('institutos.index'));
        }

        return view('institutos.edit')->with('instituto', $instituto);
    }

    /**
     * Update the specified Instituto in storage.
     *
     * @param  int              $id
     * @param UpdateInstitutoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInstitutoRequest $request)
    {
        $instituto = $this->institutoRepository->findWithoutFail($id);

        if (empty($instituto)) {
            Flash::error('Instituto not found');

            return redirect(route('institutos.index'));
        }

        $instituto = $this->institutoRepository->update($request->all(), $id);

        Flash::success('Instituto updated successfully.');

        return redirect(route('institutos.index'));
    }

    /**
     * Remove the specified Instituto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $instituto = $this->institutoRepository->findWithoutFail($id);

        if (empty($instituto)) {
            Flash::error('Instituto not found');

            return redirect(route('institutos.index'));
        }

        $this->institutoRepository->delete($id);

        Flash::success('Instituto deleted successfully.');

        return redirect(route('institutos.index'));
    }
}
