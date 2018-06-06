<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Repositories\CategoriaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CategoriaController extends AppBaseController
{
    /** @var  CategoriaRepository */
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepo)
    {
        $this->categoriaRepository = $categoriaRepo;
    }

    /**
     * Display a listing of the Categoria.
     *
     * @param CategoriaDataTable $categoriaDataTable
     * @return Response
     */
    public function index(CategoriaDataTable $categoriaDataTable)
    {
        return $categoriaDataTable->render('categorias.index');
    }

    /**
     * Show the form for creating a new Categoria.
     *
     * @return Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created Categoria in storage.
     *
     * @param CreateCategoriaRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoriaRequest $request)
    {
        $input = $request->all();

        $categoria = $this->categoriaRepository->create($input);

        Flash::success('Categoria saved successfully.');

        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified Categoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoria = $this->categoriaRepository->findWithoutFail($id);

        if (empty($categoria)) {
            Flash::error('Categoria not found');

            return redirect(route('categorias.index'));
        }

        return view('categorias.show')->with('categoria', $categoria);
    }

    /**
     * Show the form for editing the specified Categoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categoria = $this->categoriaRepository->findWithoutFail($id);

        if (empty($categoria)) {
            Flash::error('Categoria not found');

            return redirect(route('categorias.index'));
        }

        return view('categorias.edit')->with('categoria', $categoria);
    }

    /**
     * Update the specified Categoria in storage.
     *
     * @param  int              $id
     * @param UpdateCategoriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoriaRequest $request)
    {
        $categoria = $this->categoriaRepository->findWithoutFail($id);

        if (empty($categoria)) {
            Flash::error('Categoria not found');

            return redirect(route('categorias.index'));
        }

        $categoria = $this->categoriaRepository->update($request->all(), $id);

        Flash::success('Categoria updated successfully.');

        return redirect(route('categorias.index'));
    }

    /**
     * Remove the specified Categoria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categoria = $this->categoriaRepository->findWithoutFail($id);

        if (empty($categoria)) {
            Flash::error('Categoria not found');

            return redirect(route('categorias.index'));
        }

        $this->categoriaRepository->delete($id);

        Flash::success('Categoria deleted successfully.');

        return redirect(route('categorias.index'));
    }
}
