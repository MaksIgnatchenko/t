<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.02.19
 *
 */

namespace App\Modules\Challenges\Datatables;

use App\Helpers\PrettyNameHelper;
use App\Modules\Challenges\Enums\ProofStatusEnum;
use App\Modules\Challenges\Helpers\ChallengeStatusClassHelper;
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
            ->addColumn('action', 'challenge.datatables_actions')
            ->editColumn('image', function ($query) {
                return ($query->image ? ("<img height='50' src=" . $query->image) . " />" : (''));
            })
            ->editColumn('status', function($query) {
                $className = ChallengeStatusClassHelper::getClassName($query->status);
                $name = PrettyNameHelper::transform($query->status);
                return "<span class='" . $className . "'>$name</span>";
            })
            ->editColumn('start_date', function($query) {
                return Carbon::parse($query->start_date)->format('Y-m-d H:i');
            })
            ->editColumn('end_date', function($query) {
                return Carbon::parse($query->end_date)->format('Y-m-d H:i');
            })
            ->rawColumns(['image', 'action', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Challenge $model
     * @return Builder
     */
    public function query(Challenge $model): Builder
    {
        return $model->withCount(['proofs as pending_proofs' => function ($query) {
            $query->where('status', ProofStatusEnum::PENDING);
        }]);
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
                'name' => 'name',
                'data' => 'name',
                'title' => 'Name',
                'width' => '15%',
            ],
            [
                'data' => 'pending_proofs',
                'title' => 'Pending proofs',
                'width' => '15%',
                'searchable' => false,
            ],
            [
                'name' => 'image',
                'data' => 'image',
                'title' => 'Image',
                'width' => '15%',
                'searchable' => false,
                'orderable' => false,
            ],
            [
                'name' => 'status',
                'data' => 'status',
                'title' => 'Status',
                'width' => '15%',
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
                'title' => 'Participants limit',
                'width' => '10%',
            ],
            [
                'name' => 'start_date',
                'data' => 'start_date',
                'title' => 'Start date',
                'width' => '10%',
            ],
            [
                'name' => 'end_date',
                'data' => 'end_date',
                'title' => 'End date',
                'width' => '10%',
            ],
        ];
    }

}