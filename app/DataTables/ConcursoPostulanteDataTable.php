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
        $concursoPostulantes = ConcursoPostulante::query()->join('concursos' , 'concursospostulantes.concurso_id' , '=' , 'concursos.id')
                                                    ->join('postulantes' , 'concursospostulantes.postulante_id' , '=' , 'postulantes.id')
                                                    ->select('concursospostulantes.id','concursos.referenciaGeneral as ref_gen' ,
                                                             'postulantes.nombres as pos_nom' ,  'postulantes.apellidos  as pos_ape' ,
                                                              'concursospostulantes.cumpleRequisitos as cum_req' ,
                                                              'concursospostulantes.fechaPresentacion as fec_pre' ,
                                                              'concursospostulantes.tipo as tip_pos',
                                                               'concursospostulantes.ordenMerito as ord_mer' );

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
            'concurso_id' => ['name' => 'concurso_id', 'data' => 'ref_gen'],
            'postulante_nombre' => ['name' => 'postulante_nom', 'data' => 'pos_nom'],
            'postulante_apellido' => ['name' => 'postulante_ape', 'data' => 'pos_ape'],
            'cumpleRequisitos' => ['name' => 'cumpleRequisitos', 'data' => 'cum_req'],
            'fechaPresentacion' => ['name' => 'fechaPresentacion', 'data' => 'fec_pre'],
            'tipo' => ['name' => 'tipo', 'data' => 'tip_pos'],
            'ordenMerito' => ['name' => 'ordenMerito', 'data' => 'ord_mer']
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
