<?php

namespace App\DataTables;

use App\Models\ConcursoPostulante;
use Form;
use Yajra\Datatables\Services\DataTable;

class ConcursoPostulanteDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'concurso_postulantes.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $concursoPostulantes = ConcursoPostulante::query();

        return $this->applyScopes($concursoPostulantes);
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
            'postulante_id' => ['name' => 'postulante_id', 'data' => 'postulante_id'],
            'cumpleRequisitos' => ['name' => 'cumpleRequisitos', 'data' => 'cumpleRequisitos'],
            'fechaPresentacion' => ['name' => 'fechaPresentacion', 'data' => 'fechaPresentacion'],
            'tipo' => ['name' => 'tipo', 'data' => 'tipo'],
            'ordenMerito' => ['name' => 'ordenMerito', 'data' => 'ordenMerito']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'concursoPostulantes';
    }
}
