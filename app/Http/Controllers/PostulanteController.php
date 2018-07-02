<?php

namespace App\Http\Controllers;

use App\DataTables\PostulanteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePostulanteRequest;
use App\Http\Requests\UpdatePostulanteRequest;
use App\Repositories\PostulanteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PostulanteController extends AppBaseController
{
    /** @var  PostulanteRepository */
    private $postulanteRepository;

    public function __construct(PostulanteRepository $postulanteRepo)
    {
        $this->postulanteRepository = $postulanteRepo;
    }

    /**
     * Display a listing of the Postulante.
     *
     * @param PostulanteDataTable $postulanteDataTable
     * @return Response
     */
    public function index(PostulanteDataTable $postulanteDataTable)
    {
        return $postulanteDataTable->render('postulantes.index');
    }

    /**
     * Show the form for creating a new Postulante.
     *
     * @return Response
     */
    public function create()
    {
        return view('postulantes.create');
    }

    /**
     * Store a newly created Postulante in storage.
     *
     * @param CreatePostulanteRequest $request
     *
     * @return Response
     */
    public function store(CreatePostulanteRequest $request)
    {
        $input = $request->all();
        $input['tipo'] = '1';
        $postulante = $this->postulanteRepository->create($input);

        Flash::success('Postulante saved successfully.');

        return redirect(route('postulantes.index'));
    }

    /**
     * Display the specified Postulante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $postulante = $this->postulanteRepository->findWithoutFail($id);

        if (empty($postulante)) {
            Flash::error('Postulante not found');

            return redirect(route('postulantes.index'));
        }

        return view('postulantes.show')->with('postulante', $postulante);
    }

    /**
     * Show the form for editing the specified Postulante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $postulante = $this->postulanteRepository->findWithoutFail($id);

        if (empty($postulante)) {
            Flash::error('Postulante not found');

            return redirect(route('postulantes.index'));
        }

        return view('postulantes.edit')->with('postulante', $postulante);
    }

    /**
     * Update the specified Postulante in storage.
     *
     * @param  int              $id
     * @param UpdatePostulanteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostulanteRequest $request)
    {
        $postulante = $this->postulanteRepository->findWithoutFail($id);

        if (empty($postulante)) {
            Flash::error('Postulante not found');

            return redirect(route('postulantes.index'));
        }

        $postulante = $this->postulanteRepository->update($request->all(), $id);

        Flash::success('Postulante updated successfully.');

        return redirect(route('postulantes.index'));
    }

    /**
     * Remove the specified Postulante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $postulante = $this->postulanteRepository->findWithoutFail($id);

        if (empty($postulante)) {
            Flash::error('Postulante not found');

            return redirect(route('postulantes.index'));
        }

        $this->postulanteRepository->delete($id);

        Flash::success('Postulante deleted successfully.');

        return redirect(route('postulantes.index'));
    }
}
