<?php

namespace App\DataTables;

use App\Models\CargoConcursado;
use Form;
use Yajra\Datatables\Services\DataTable;

class CargoConcursadoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'cargo_concursados.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $cargoConcursados = CargoConcursado::query();

        return $this->applyScopes($cargoConcursados);
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
            'registro_id' => ['name' => 'registro_id', 'data' => 'registro_id'],
            'universidad_id' => ['name' => 'universidad_id', 'data' => 'universidad_id'],
            'categoria_id' => ['name' => 'categoria_id', 'data' => 'categoria_id'],
            'dedicacion' => ['name' => 'dedicacion', 'data' => 'dedicacion'],
            'registroTipo' => ['name' => 'registroTipo', 'data' => 'registroTipo']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'cargoConcursados';
    }
}
