<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.02.19
 *
 */

namespace App\Modules\Challenges\Datatables;

use App\Modules\Challenges\Models\Challenge;
use Carbon\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class ChallengeDataTable extends DataTable
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
        return $dataTable
            ->editColumn('image', function ($query) {
                return ($query->image ? ("<img height='50' src=" . $query->image) . " />" : (''));
            })
            ->editColumn('start_date', function($query) {
                return Carbon::parse($query->start_date)->toDateString();
            })
            ->editColumn('end_date', function($query) {
                return Carbon::parse($query->start_date)->toDateString();
            })
            ->rawColumns(['image']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Challenge $model
     * @return Builder
     */
    public function query(Challenge $model): Builder
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
                'name' => 'name',
                'data' => 'name',
                'title' => 'Name',
                'width' => '20%',
            ],
            [
                'name' => 'image',
                'data' => 'image',
                'title' => 'Image',
                'width' => '20%',
                'searchable' => false,
                'orderable' => false,
            ],
            [
                'name' => 'country',
                'data' => 'country',
                'title' => 'Country',
                'width' => '15%',
            ],
            [
                'name' => 'participants_limit',
                'data' => 'participants_limit',
                'title' => 'participants_limit',
                'width' => '15%',
            ],
            [
                'name' => 'start_date',
                'data' => 'start_date',
                'title' => 'Start date',
                'width' => '15%',
            ],
            [
                'name' => 'end_date',
                'data' => 'end_date',
                'title' => 'End date',
                'width' => '15%',
            ],
        ];
    }

}