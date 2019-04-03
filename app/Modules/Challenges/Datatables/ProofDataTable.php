<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.02.19
 *
 */

namespace App\Modules\Challenges\Datatables;

use App\Modules\Challenges\Helpers\ProofStatusClassHelper;
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
        return $dataTable
            ->addColumn('action', 'proof.datatables_actions')
            ->editColumn('user.full_name', function ($query) {
                return "<a height='50' href='" . route('users.show', $query->user->id) . "'>" . $query->user->full_name . "</a>";
            })
            ->editColumn('status', function($query) {
                $className = ProofStatusClassHelper::getClassName($query->status);
                return "<span class='" . $className . "'>$query->status</span>";
            })
            ->editColumn('created_at', function($query) {
                return Carbon::parse($query->created_at)->toDateString();
            })
            ->rawColumns(['action', 'status', 'user.full_name']);
    }

    /**
     * Get query source of dataTable.
     *
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
            ->addAction(['width' => '25%'])
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
                'name' => 'user.full_name',
                'data' => 'user.full_name',
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