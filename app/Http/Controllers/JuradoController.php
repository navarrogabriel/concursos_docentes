<?php

namespace App\Http\Controllers;

use App\DataTables\JuradoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateJuradoRequest;
use App\Http\Requests\UpdateJuradoRequest;
use App\Repositories\JuradoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class JuradoController extends AppBaseController
{
    /** @var  JuradoRepository */
    private $juradoRepository;

    public function __construct(JuradoRepository $juradoRepo)
    {
        $this->juradoRepository = $juradoRepo;
    }

    /**
     * Display a listing of the Jurado.
     *
     * @param JuradoDataTable $juradoDataTable
     * @return Response
     */
    public function index(JuradoDataTable $juradoDataTable)
    {
        return $juradoDataTable->render('jurados.index');
    }

    /**
     * Show the form for creating a new Jurado.
     *
     * @return Response
     */
    public function create()
    {
        return view('jurados.create');
    }

    /**
     * Store a newly created Jurado in storage.
     *
     * @param CreateJuradoRequest $request
     *
     * @return Response
     */
    public function store(CreateJuradoRequest $request)
    {
        $input = $request->all();
        $input['tipo'] = 'Jurado';
        $jurado = $this->juradoRepository->create($input);

        Flash::success('Jurado saved successfully.');

        return redirect(route('jurados.index'));
    }

    /**
     * Display the specified Jurado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jurado = $this->juradoRepository->findWithoutFail($id);

        if (empty($jurado)) {
            Flash::error('Jurado not found');

            return redirect(route('jurados.index'));
        }

        return view('jurados.show')->with('jurado', $jurado);
    }

    /**
     * Show the form for editing the specified Jurado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jurado = $this->juradoRepository->findWithoutFail($id);

        if (empty($jurado)) {
            Flash::error('Jurado not found');

            return redirect(route('jurados.index'));
        }

        return view('jurados.edit')->with('jurado', $jurado);
    }

    /**
     * Update the specified Jurado in storage.
     *
     * @param  int              $id
     * @param UpdateJuradoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJuradoRequest $request)
    {
        $jurado = $this->juradoRepository->findWithoutFail($id);

        if (empty($jurado)) {
            Flash::error('Jurado not found');

            return redirect(route('jurados.index'));
        }

        $jurado = $this->juradoRepository->update($request->all(), $id);

        Flash::success('Jurado updated successfully.');

        return redirect(route('jurados.index'));
    }

    /**
     * Remove the specified Jurado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jurado = $this->juradoRepository->findWithoutFail($id);

        if (empty($jurado)) {
            Flash::error('Jurado not found');

            return redirect(route('jurados.index'));
        }

        $this->juradoRepository->delete($id);

        Flash::success('Jurado deleted successfully.');

        return redirect(route('jurados.index'));
    }
}
