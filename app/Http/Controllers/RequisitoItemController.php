<?php

namespace App\Http\Controllers;

use App\DataTables\RequisitoItemDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRequisitoItemRequest;
use App\Http\Requests\UpdateRequisitoItemRequest;
use App\Repositories\RequisitoItemRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RequisitoItemController extends AppBaseController
{
    /** @var  RequisitoItemRepository */
    private $requisitoItemRepository;

    public function __construct(RequisitoItemRepository $requisitoItemRepo)
    {
        $this->requisitoItemRepository = $requisitoItemRepo;
    }

    /**
     * Display a listing of the RequisitoItem.
     *
     * @param RequisitoItemDataTable $requisitoItemDataTable
     * @return Response
     */
    public function index(RequisitoItemDataTable $requisitoItemDataTable)
    {
        return $requisitoItemDataTable->render('requisito_items.index');
    }

    /**
     * Show the form for creating a new RequisitoItem.
     *
     * @return Response
     */
    public function create()
    {
        return view('requisito_items.create');
    }

    /**
     * Store a newly created RequisitoItem in storage.
     *
     * @param CreateRequisitoItemRequest $request
     *
     * @return Response
     */
    public function store(CreateRequisitoItemRequest $request)
    {
        $input = $request->all();

        $requisitoItem = $this->requisitoItemRepository->create($input);

        Flash::success('Requisito Item saved successfully.');

        return redirect(route('requisitoItems.index'));
    }

    /**
     * Display the specified RequisitoItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requisitoItem = $this->requisitoItemRepository->findWithoutFail($id);

        if (empty($requisitoItem)) {
            Flash::error('Requisito Item not found');

            return redirect(route('requisitoItems.index'));
        }

        return view('requisito_items.show')->with('requisitoItem', $requisitoItem);
    }

    /**
     * Show the form for editing the specified RequisitoItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $requisitoItem = $this->requisitoItemRepository->findWithoutFail($id);

        if (empty($requisitoItem)) {
            Flash::error('Requisito Item not found');

            return redirect(route('requisitoItems.index'));
        }

        return view('requisito_items.edit')->with('requisitoItem', $requisitoItem);
    }

    /**
     * Update the specified RequisitoItem in storage.
     *
     * @param  int              $id
     * @param UpdateRequisitoItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequisitoItemRequest $request)
    {
        $requisitoItem = $this->requisitoItemRepository->findWithoutFail($id);

        if (empty($requisitoItem)) {
            Flash::error('Requisito Item not found');

            return redirect(route('requisitoItems.index'));
        }

        $requisitoItem = $this->requisitoItemRepository->update($request->all(), $id);

        Flash::success('Requisito Item updated successfully.');

        return redirect(route('requisitoItems.index'));
    }

    /**
     * Remove the specified RequisitoItem from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $requisitoItem = $this->requisitoItemRepository->findWithoutFail($id);

        if (empty($requisitoItem)) {
            Flash::error('Requisito Item not found');

            return redirect(route('requisitoItems.index'));
        }

        $this->requisitoItemRepository->delete($id);

        Flash::success('Requisito Item deleted successfully.');

        return redirect(route('requisitoItems.index'));
    }
}
