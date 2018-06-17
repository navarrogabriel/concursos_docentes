<?php

namespace App\DataTables;

use App\Models\LlamadoConcursos;
use Form;
use Yajra\Datatables\Services\DataTable;



class LlamadoConcursosDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'llamado_concursos.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
            $llamadoConcursos = LlamadoConcursos::query()->join('llamados' , 'llamadosconcursos.llamado_id' , '=' , 'llamados.id')
                                                         ->join('concursos' , 'llamadosconcursos.concurso_id' , '=' , 'concursos.id')
                                                         ->select('llamadosconcursos.id' ,'llamados.codigo as lla_cod' , 'concursos.referenciaGeneral as con_rf');
        //var_dump($llamadoConcursos);
        return $this->applyScopes($llamadoConcursos);
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
            //'LlamadoConcurso'=> ['name' => 'llamadosconcursos.id', 'data' => 'llacon_nom'],
            'Llamado' => ['name' => 'llamados.codigo', 'data' => 'lla_cod'],
            'Concurso' => ['name' => 'concursos.referenciaGeneral', 'data' => 'con_rf']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'llamadoConcursos';
    }
}
