<?php

namespace App\DataTables;

use App\Models\ConcursoJurado;
use Form;
use Yajra\Datatables\Services\DataTable;

class ConcursoJuradoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'concurso_jurados.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $concursoJurados = ConcursoJurado::query();

        return $this->applyScopes($concursoJurados);
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
            'concurso_id' => ['name' => 'concurso_id', 'data' => 'concurso_id'],
            'jurado_id' => ['name' => 'jurado_id', 'data' => 'jurado_id'],
            'nivel' => ['name' => 'nivel', 'data' => 'nivel'],
            'tipo' => ['name' => 'tipo', 'data' => 'tipo']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'concursoJurados';
    }
}
