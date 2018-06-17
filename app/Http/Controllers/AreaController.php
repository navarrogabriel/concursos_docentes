<?php

namespace App\Http\Controllers;

use App\DataTables\AreaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Repositories\AreaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Carrera;

class AreaController extends AppBaseController
{
    /** @var  AreaRepository */
    private $areaRepository;

    public function __construct(AreaRepository $areaRepo)
    {
        $this->areaRepository = $areaRepo;

    }

    /**
     * Display a listing of the Area.
     *
     * @param AreaDataTable $areaDataTable
     * @return Response
     */
    public function index(AreaDataTable $areaDataTable)
    {
        return $areaDataTable->render('areas.index');
    }

    /**
     * Show the form for creating a new Area.
     *
     * @return Response
     */
    public function create()
    {
        $carreras = Carrera::pluck('nombre' , 'id');

        return view('areas.create' , compact('carreras'));
    }

    /**
     * Store a newly created Area in storage.
     *
     * @param CreateAreaRequest $request
     *
     * @return Response
     */
    public function store(CreateAreaRequest $request)
    {
        $input = $request->all();

        $area = $this->areaRepository->create($input);

        Flash::success('Area saved successfully.');

        return redirect(route('areas.index'));
    }

    /**
     * Display the specified Area.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {


        $area = $this->areaRepository->findWithoutFail($id);

        if (empty($area)) {
            Flash::error('Area not found');

            return redirect(route('areas.index'));
        }

        return view('areas.show')->with('area', $area);
    }

    /**
     * Show the form for editing the specified Area.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carreras = Carrera::pluck('nombre' , 'id');

        $area = $this->areaRepository->findWithoutFail($id);

        if (empty($area)) {
            Flash::error('Area not found');

            return redirect(route('areas.index' , compact('carreras')));
        }

        return view('areas.edit' , compact('carreras'))->with('area', $area);
    }

    /**
     * Update the specified Area in storage.
     *
     * @param  int              $id
     * @param UpdateAreaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAreaRequest $request)
    {
        $area = $this->areaRepository->findWithoutFail($id);

        if (empty($area)) {
            Flash::error('Area not found');

            return redirect(route('areas.index'));
        }

        $area = $this->areaRepository->update($request->all(), $id);

        Flash::success('Area updated successfully.');

        return redirect(route('areas.index'));
    }

    /**
     * Remove the specified Area from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $area = $this->areaRepository->findWithoutFail($id);

        if (empty($area)) {
            Flash::error('Area not found');

            return redirect(route('areas.index'));
        }

        $this->areaRepository->delete($id);

        Flash::success('Area deleted successfully.');

        return redirect(route('areas.index'));
    }
}
