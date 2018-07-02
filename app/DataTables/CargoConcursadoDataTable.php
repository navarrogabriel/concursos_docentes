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
        $cargoConcursados = CargoConcursado::query()->join('universidades' , 'cargosconcursados.universidad_id' , '=' , 'universidades.id')
                                                    ->join('categorias' , 'cargosconcursados.categoria_id' , '=' , 'categorias.id')
                                                    ->join('personas' , 'cargosconcursados.persona_id' , '=' , 'personas.id')
                                                    ->select('cargosconcursados.id' ,  'universidades.nombre as uni_nom' , 'categorias.nombre as cat_nom' ,'cargosconcursados.dedicacion as dedicacion','personas.apellidos as per_ape' );






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
            'Persona' => ['name' => 'personas.apellidos', 'data' => 'per_ape'],
            'Universidad' => ['name' => 'universidades.nombre', 'data' => 'uni_nom'],
            'Categorias' => ['name' => 'categorias.nombre', 'data' => 'cat_nom'],
            'dedicacion' => ['name' => 'dedicacion', 'data' => 'dedicacion']
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
