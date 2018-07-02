<?php

namespace App\DataTables;

use App\Models\Jurado;
use Form;
use Yajra\Datatables\Services\DataTable;

class JuradoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'jurados.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $jurados = Jurado::query()->where('tipo', 'Jurado');

        return $this->applyScopes($jurados);
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
            'nombres' => ['name' => 'nombres', 'data' => 'nombres'],
            'apellidos' => ['name' => 'apellidos', 'data' => 'apellidos'],
            'documento' => ['name' => 'documento', 'data' => 'documento'],
            'telefono' => ['name' => 'telefono', 'data' => 'telefono'],
            'celular' => ['name' => 'celular', 'data' => 'celular'],
            'email' => ['name' => 'email', 'data' => 'email'],
            'direccion' => ['name' => 'direccion', 'data' => 'direccion']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'jurados';
    }
}
