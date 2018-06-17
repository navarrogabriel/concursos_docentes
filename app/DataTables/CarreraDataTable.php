<?php

namespace App\DataTables;

use App\Models\Carrera;
use Form;
use Yajra\Datatables\Services\DataTable;
use App\Models\Instituto;

class CarreraDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'carreras.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $carreras = Carrera::query()->join('institutos','carreras.instituto_id','=','institutos.id')
                  ->select('carreras.id' , 'carreras.nombre as carr_nom', 'institutos.nombre as ins_nom');
        return $this->applyScopes($carreras);
    }

    /*$posts = DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')
            ->select(['posts.id', 'posts.title', 'users.name', 'users.email', 'posts.created_at', 'posts.updated_at']);*/

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
            'Carrera' => ['name' => 'carreras.nombre', 'data' => 'carr_nom'],
            'Instituto' => ['name' => 'institutos.nombre', 'data' => 'ins_nom' ]


        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'carreras';
    }
}
