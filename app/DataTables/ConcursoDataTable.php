<?php

namespace App\DataTables;

use App\Models\Concurso;
use Form;
use Yajra\Datatables\Services\DataTable;

class ConcursoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'concursos.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $concursos = Concurso::query();

        return $this->applyScopes($concursos);
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
            'asignatura_id' => ['name' => 'asignatura_id', 'data' => 'asignatura_id'],
            //'perfil_id' => ['name' => 'perfil_id', 'data' => 'perfil_id'],
            'categoria_id' => ['name' => 'categoria_id', 'data' => 'categoria_id'],
            'referenciaGeneral' => ['name' => 'referenciaGeneral', 'data' => 'referenciaGeneral'],
            //'referenciaInstituto' => ['name' => 'referenciaInstituto', 'data' => 'referenciaInstituto'],
            'cargos' => ['name' => 'cargos', 'data' => 'cargos'],
            //'lineaDesarrollo' => ['name' => 'lineaDesarrollo', 'data' => 'lineaDesarrollo'],
            //'requisitos' => ['name' => 'requisitos', 'data' => 'requisitos'],
            'expediente' => ['name' => 'expediente', 'data' => 'expediente'],
            'fechaSustanciacion' => ['name' => 'fechaSustanciacion', 'data' => 'fechaSustanciacion'],
            //'usuarioSustanciacion' => ['name' => 'usuarioSustanciacion', 'data' => 'usuarioSustanciacion'],
            //'usuarioCierre' => ['name' => 'usuarioCierre', 'data' => 'usuarioCierre'],
            //'observaciones' => ['name' => 'observaciones', 'data' => 'observaciones'],
            'fechaInicio' => ['name' => 'fechaInicio', 'data' => 'fechaInicio'],
            'fechaFin' => ['name' => 'fechaFin', 'data' => 'fechaFin'],
            'estado' => ['name' => 'estado', 'data' => 'estado'],
            'dedicacion' => ['name' => 'dedicacion', 'data' => 'dedicacion'],
            'dictamen' => ['name' => 'dictamen', 'data' => 'dictamen']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'concursos';
    }
}
