<?php
/**
 * Created by Andrei Podgornyi, Appus Studio LP on 08.10.2018
 */

namespace App\Modules\Users\User\DataTables;

use App\Modules\Users\User\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as DataTablesBuilder;

class UserDataTable extends DataTable
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

        $dataTable->editColumn('country', function ($user) {
            return $user->country ?? "<span class='text-danger'>Empty</span>";
        });
        $dataTable->editColumn('email', function ($user) {
            return $user->email ?? "<span class='text-danger'>Empty</span>";
        });
        $dataTable->editColumn('full_name', function ($user) {
            return $user->full_name ?? "<span class='text-danger'>Empty</span>";
        });
        $dataTable->editColumn('phone_number', function ($user) {
            return $user->country_code . $user->phone_number;
        });


        return $dataTable->addColumn('action', 'datatables_actions')
            ->rawColumns(['country', 'email', 'full_name', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param User $model
     * @return Builder
     */
    public function query(User $model): Builder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return DataTablesBuilder
     */
    public function html(): DataTablesBuilder
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '80px'])
            ->parameters([
                'dom' => 'frtip',
                'order' => [[0, 'desc']],
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
                'name' => 'full_name',
                'data' => 'full_name',
                'title' => 'Full name'
            ],
            [
                'name' => 'email',
                'data' => 'email',
                'title' => 'Email'
            ],
            [
                'name' => 'phone_number',
                'data' => 'phone_number',
                'title' => 'Phone number'
            ],
            [
                'name' => 'country',
                'data' => 'country',
                'title' => 'Country'
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'userdatatable_' . time();
    }
}
