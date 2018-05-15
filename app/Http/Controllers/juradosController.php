<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatejuradosRequest;
use App\Http\Requests\UpdatejuradosRequest;
use App\Repositories\JuradosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class juradosController extends AppBaseController
{
    /** @var  JuradosRepository */
    private $JuradosRepository;

    public function __construct(JuradosRepository $juradosRepo)
    {
        $this->JuradosRepository = $juradosRepo;
    }

    /**
     * Display a listing of the jurados.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->JuradosRepository->pushCriteria(new RequestCriteria($request));
        $jurados = $this->JuradosRepository->all();

        return view('jurados.index')
            ->with('jurados', $jurados);
    }

    /**
     * Show the form for creating a new jurados.
     *
     * @return Response
     */
    public function create()
    {
        return view('jurados.create');
    }

    /**
     * Store a newly created jurados in storage.
     *
     * @param CreatejuradosRequest $request
     *
     * @return Response
     */
    public function store(CreatejuradosRequest $request)
    {
        $input = $request->all();

        $jurados = $this->JuradosRepository->create($input);

        Flash::success('Jurados saved successfully.');

        return redirect(route('jurados.index'));
    }

    /**
     * Display the specified jurados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jurados = $this->JuradosRepository->findWithoutFail($id);

        if (empty($jurados)) {
            Flash::error('Jurados not found');

            return redirect(route('jurados.index'));
        }

        return view('jurados.show')->with('jurados', $jurados);
    }

    /**
     * Show the form for editing the specified jurados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jurados = $this->JuradosRepository->findWithoutFail($id);

        if (empty($jurados)) {
            Flash::error('Jurados not found');

            return redirect(route('jurados.index'));
        }

        return view('jurados.edit')->with('jurados', $jurados);
    }

    /**
     * Update the specified jurados in storage.
     *
     * @param  int              $id
     * @param UpdatejuradosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatejuradosRequest $request)
    {
        $jurados = $this->JuradosRepository->findWithoutFail($id);

        if (empty($jurados)) {
            Flash::error('Jurados not found');

            return redirect(route('jurados.index'));
        }

        $jurados = $this->JuradosRepository->update($request->all(), $id);

        Flash::success('Jurados updated successfully.');

        return redirect(route('jurados.index'));
    }

    /**
     * Remove the specified jurados from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jurados = $this->JuradosRepository->findWithoutFail($id);

        if (empty($jurados)) {
            Flash::error('Jurados not found');

            return redirect(route('jurados.index'));
        }

        $this->JuradosRepository->delete($id);

        Flash::success('Jurados deleted successfully.');

        return redirect(route('jurados.index'));
    }
}
