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
        $concursos = Concurso::query()->join('asignaturas' , 'concursos.asignatura_id' , '=' , 'asignaturas.id')
                                      ->join('categorias' , 'concursos.categoria_id' , '=' , 'categorias.id')
                                      ->select('asignaturas.nombre as asig_nom' ,
                                               'categorias.nombre  as cat_nom' ,
                                               'concursos.id','concursos.referenciaGeneral as ref_gen' ,
                                               'concursos.id','concursos.cargos as con_car' ,
                                               'concursos.id','concursos.expediente as con_exp' ,
                                               'concursos.id','concursos.fechaSustanciacion as con_fs' ,
                                               'concursos.id','concursos.fechaInicio as con_fi' ,
                                               'concursos.id','concursos.fechaFin as con_ff' ,
                                               'concursos.id','concursos.estado as con_est',
                                               'concursos.id','concursos.dedicacion as con_ded' ,
                                               'concursos.id','concursos.dictamen as con_dic'  );

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
            'Asignatura' => ['name' => 'asignatura_id', 'data' => 'asig_nom'],
            //'perfil_id' => ['name' => 'perfil_id', 'data' => 'perfil_id'],
            'Categoria' => ['name' => 'categoria_id', 'data' => 'cat_nom'],
            'Referencia General' => ['name' => 'referenciaGeneral', 'data' => 'ref_gen'],
            //'referenciaInstituto' => ['name' => 'referenciaInstituto', 'data' => 'referenciaInstituto'],
            'Cargos' => ['name' => 'cargos', 'data' => 'con_car'],
            //'lineaDesarrollo' => ['name' => 'lineaDesarrollo', 'data' => 'lineaDesarrollo'],
            //'requisitos' => ['name' => 'requisitos', 'data' => 'requisitos'],
            'Expediente' => ['name' => 'expediente', 'data' => 'con_exp'],
            'Fecha Sustanciacion' => ['name' => 'fechaSustanciacion', 'data' => 'con_fs'],
            //'usuarioSustanciacion' => ['name' => 'usuarioSustanciacion', 'data' => 'usuarioSustanciacion'],
            //'usuarioCierre' => ['name' => 'usuarioCierre', 'data' => 'usuarioCierre'],
            //'observaciones' => ['name' => 'observaciones', 'data' => 'observaciones'],
            'Fecha Inicio' => ['name' => 'fechaInicio', 'data' => 'con_fi'],
            'Fecha Fin' => ['name' => 'fechaFin', 'data' => 'con_ff'],
            'Estado' => ['name' => 'estado', 'data' => 'con_est'],
            'Dedicacion' => ['name' => 'dedicacion', 'data' => 'con_ded'],
            'Dictamen' => ['name' => 'dictamen', 'data' => 'con_dic']
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
