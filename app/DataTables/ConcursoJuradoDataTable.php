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
        $concursoJurados = ConcursoJurado::query()->join('concursos' , 'concursosjurados.concurso_id' , '=' , 'concursos.id')
                                                  ->join('personas' , 'concursosjurados.jurado_id' , '=' , 'personas.id')->where('personas.tipo' , '=', 'Jurado')
                                                  ->join('categorias' , 'concursosjurados.categoria_id' , '=' , 'categorias.id')
                                                  ->select('concursosjurados.id',
                                                           'concursos.referenciaGeneral as ref_gen' ,
                                                           'personas.nombres as jur_nom' ,
                                                           'personas.apellidos  as jur_ape' ,
                                                           'categorias.nombre as jur_cat' ,
                                                           'concursosjurados.nivel as con_niv' ,
                                                           'concursosjurados.tipo as tip_jur');

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
            'concurso_id' => ['name' => 'concurso_id', 'data' => 'ref_gen'],
            'jurado Nombre' => ['name' => 'jurado_id', 'data' => 'jur_nom'],
            'jurado Apellido' => ['name' => 'jurado_id', 'data' => 'jur_ape'],
            'jurado categoria' => ['name' => 'categoria_id', 'data' => 'jur_cat'],
            'nivel' => ['name' => 'nivel', 'data' => 'con_niv'],
            'tipo' => ['name' => 'tipo', 'data' => 'tip_jur']
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
