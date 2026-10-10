<?php

namespace App\DataTables;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PartnersDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $locale = app()->getLocale();

        return datatables()
            ->eloquent($query)

            ->addColumn('name', function ($partner) use ($locale) {
                return $partner->name[$locale]
                    ?? $partner->name['mk']
                    ?? '';
            })

            ->addColumn('image', function ($partner) {
                if ($partner->image) {
                    return '<img src="' . asset('storage/' . $partner->image) . '"
                        alt="Partner logo"
                        style="width:80px;height:60px;object-fit:contain;border-radius:6px;background:#fff;padding:4px;">';
                }

                return '<span class="text-muted">No Image</span>';
            })

            ->addColumn('action', function ($partner) use ($locale) {
                $name = e($partner->name[$locale] ?? $partner->name['mk'] ?? '');

                return '
                    <div class="d-flex justify-content-center gap-1">
                        <a href="' . route('admin.partners.show', $partner->id) . '"
                        class="btn btn-info btn-sm"
                        title="Show">
                            <i class="bi bi-eye"></i>
                        </a>
                        
                        <a href="' . route('admin.partners.edit', $partner->id) . '"
                           class="btn btn-primary btn-sm"
                           title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form method="POST"
                              action="' . route('admin.partners.destroy', $partner->id) . '"
                              class="delete-form"
                              data-title="' . $name . '">

                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>

                        </form>
                    </div>
                ';
            })

            ->rawColumns(['image', 'action'])
            ->setRowId('id');
    }

    public function query(Partner $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('partners-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->autoWidth(false)
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
            ])
            ->orderBy(0, 'desc')
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('id')
                ->title('ID')
                ->width(60),

            Column::make('name')
                ->title('Name'),

            Column::make('image')
                ->title('Logo')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->orderable(false),

            Column::make('created_at')
                ->title('Created At'),

            Column::make('updated_at')
                ->title('Updated At'),

            Column::computed('action')
                ->title('Actions')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->orderable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Partners_' . date('YmdHis');
    }
}
