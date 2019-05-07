<?php

namespace App\Modules\Challenges\Datatables;

use App\Modules\Challenges\Models\Proof;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as YajraBuilder;
use Yajra\DataTables\Services\DataTable;

class ResultDataTable extends DataTable
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
            ->editColumn('user.full_name', function ($query) {
                return "<a height='50' href='" . route('users.show', $query->user->id) . "'>" . $query->user->full_name . "</a>";
            })
            ->editColumn('updated_at', function($query) {
                return Carbon::parse($query->created_at)->format('Y-m-d H:i:s');
            })
            ->rawColumns(['user.full_name']);
    }

    /**
     * @param Proof $model
     * @return Builder
     */
    public function query(Proof $model): Builder
    {
        return $model->with(['user'])->select('proofs.*')->newQuery();
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
                'order'   => [[0, 'asc']],
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
                'name' => 'position',
                'data' => 'position',
                'title' => 'Position',
                'width' => '20%',
            ],
            [
                'name' => 'reward',
                'data' => 'reward',
                'title' => 'Reward',
                'width' => '20%',
            ],
            [
                'name' => 'user.full_name',
                'data' => 'user.full_name',
                'title' => 'User',
                'width' => '30%',
            ],
            [
                'name' => 'updated_at',
                'data' => 'updated_at',
                'title' => 'Approved at',
                'width' => '50%',
                'searchable' => false,
            ],
        ];
    }
}