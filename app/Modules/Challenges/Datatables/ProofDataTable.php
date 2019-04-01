<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.02.19
 *
 */

namespace App\Modules\Challenges\Datatables;

use App\Modules\Challenges\Models\Proof;
use Carbon\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class ProofDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Result from query() method.
     * @return EloquentDataTable
     */
    public function dataTable($query): EloquentDataTable
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable;
//            ->addColumn('action', 'challenge.datatables_actions')
//            ->editColumn('image', function ($query) {
//                return ($query->image ? ("<img height='50' src=" . $query->image) . " />" : (''));
//            })
//            ->editColumn('start_date', function($query) {
//                return Carbon::parse($query->start_date)->toDateString();
//            })
//            ->editColumn('end_date', function($query) {
//                return Carbon::parse($query->start_date)->toDateString();
//            })
//            ->rawColumns(['image', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Proof $model
     * @return Builder
     */
    public function query(Proof $model): Builder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return YajraBuilder
     */
    public function html(): YajraBuilder
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '10%'])
            ->parameters([
                'dom'     => 'frtip',
                'order'   => [[0, 'desc']],
                'responsive' => true,
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            [
                'name' => 'user_id',
                'data' => 'user_id',
                'title' => 'User',
                'width' => '25%',
            ],
            [
                'name' => 'status',
                'data' => 'status',
                'title' => 'Status',
                'width' => '25%',
            ],
            [
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => 'Send at',
                'width' => '25%',
            ],
        ];
    }

}