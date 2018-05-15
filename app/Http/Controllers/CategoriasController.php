<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoriasRequest;
use App\Http\Requests\UpdateCategoriasRequest;
use App\Repositories\CategoriasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CategoriasController extends AppBaseController
{
    /** @var  CategoriasRepository */
    private $categoriasRepository;

    public function __construct(CategoriasRepository $categoriasRepo)
    {
        $this->categoriasRepository = $categoriasRepo;
    }

    /**
     * Display a listing of the Categorias.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoriasRepository->pushCriteria(new RequestCriteria($request));
        $categorias = $this->categoriasRepository->all();

        return view('categorias.index')
            ->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new Categorias.
     *
     * @return Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created Categorias in storage.
     *
     * @param CreateCategoriasRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoriasRequest $request)
    {
        $input = $request->all();

        $categorias = $this->categoriasRepository->create($input);

        Flash::success('Categorias saved successfully.');

        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified Categorias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categorias = $this->categoriasRepository->findWithoutFail($id);

        if (empty($categorias)) {
            Flash::error('Categorias not found');

            return redirect(route('categorias.index'));
        }

        return view('categorias.show')->with('categorias', $categorias);
    }

    /**
     * Show the form for editing the specified Categorias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categorias = $this->categoriasRepository->findWithoutFail($id);

        if (empty($categorias)) {
            Flash::error('Categorias not found');

            return redirect(route('categorias.index'));
        }

        return view('categorias.edit')->with('categorias', $categorias);
    }

    /**
     * Update the specified Categorias in storage.
     *
     * @param  int              $id
     * @param UpdateCategoriasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoriasRequest $request)
    {
        $categorias = $this->categoriasRepository->findWithoutFail($id);

        if (empty($categorias)) {
            Flash::error('Categorias not found');

            return redirect(route('categorias.index'));
        }

        $categorias = $this->categoriasRepository->update($request->all(), $id);

        Flash::success('Categorias updated successfully.');

        return redirect(route('categorias.index'));
    }

    /**
     * Remove the specified Categorias from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categorias = $this->categoriasRepository->findWithoutFail($id);

        if (empty($categorias)) {
            Flash::error('Categorias not found');

            return redirect(route('categorias.index'));
        }

        $this->categoriasRepository->delete($id);

        Flash::success('Categorias deleted successfully.');

        return redirect(route('categorias.index'));
    }
}
