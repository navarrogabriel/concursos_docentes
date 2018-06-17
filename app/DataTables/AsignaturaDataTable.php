<?php

namespace App\DataTables;

use App\Models\Asignatura;
use Form;
use Yajra\Datatables\Services\DataTable;

class AsignaturaDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'asignaturas.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $asignaturas = Asignatura::query()->join('areas' , 'asignaturas.area_id' , '=' , 'areas.id')
                    ->select('asignaturas.id' , 'asignaturas.nombre as asig_nom' , 'areas.nombre as area_nom');

        return $this->applyScopes($asignaturas);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             //'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'Asignatura' => ['name' => 'asignaturas.nombre', 'data' => 'asig_nom'],
            'Area' => ['name' => 'areas.nombre', 'data' => 'area_nom']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'asignaturas';
    }
}
