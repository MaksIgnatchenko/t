<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.02.19
 *
 */

namespace App\Modules\Companies\Datatables;

use App\Modules\Challenges\Models\Company;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Builder as YajraBuilder;
use App\Modules\Companies\Helpers\CompanyViewHelper;

class CompanyDataTable extends DataTable
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
            ->addColumn('action', 'company.datatables_actions')
            ->editColumn('type', function ($query) {
                $badgeClass = CompanyViewHelper::getTypeContainerClass($query->type);
                return "<span class='badge " . $badgeClass . "'>$query->type</span>";
            })
            ->editColumn('logo', function ($query) {
                return ($query->logo ? ("<img height='50' src=" . $query->logo) . " />" : (''));
            })
            ->rawColumns(['logo', 'type', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Company $model
     * @return Company
     */
    public function query(Company $model): Builder
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
                'name' => 'name',
                'data' => 'name',
                'title' => 'Name',
                'width' => '20%',
            ],
            [
                'name' => 'type',
                'data' => 'type',
                'title' => 'Type',
                'width' => '20%',
            ],
            [
                'name' => 'logo',
                'data' => 'logo',
                'title' => 'Logo',
                'width' => '20%',
                'searchable' => false,
                'orderable' => false,
            ],
            [
                'name' => 'info',
                'data' => 'info',
                'title' => 'Info',
                'width' => '50%',
                'orderable' => false,
                'searchable' => false,
            ],
        ];
    }
}