<?php

namespace App\DataTables;

use App\Models\Publications;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PublicationsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Publication> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $locale = app()->getLocale();

        return datatables()
            ->eloquent($query)

            ->addColumn('title', function ($publication) use ($locale) {
                return $publication->title[$locale] ?? '';
            })

            ->addColumn('short_description', function ($publication) use ($locale) {
                return Str::limit(
                    $publication->short_description[$locale] ?? '',
                    50
                );
            })

            ->addColumn('date', function ($publication) {
                return $publication->date
                    ? Carbon::parse($publication->date)->format('d M Y')
                    : '';
            })

            ->addColumn('image', function ($publication) {
                if ($publication->image) {
                    return '
                        <img
                            src="' . asset('storage/' . $publication->image) . '"
                            style="
                                width:60px;
                                height:60px;
                                object-fit:cover;
                                border-radius:6px;
                            "
                        >
                    ';
                }

                return '<span class="text-muted">No Image</span>';
            })

            ->addColumn('file', function ($publication) {
                if ($publication->file) {
                    return '
                        <a href="' . asset('storage/' . $publication->file) . '" target="_blank" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-download"></i> Download
                        </a>
                    ';
                }

                return '<span class="text-muted">No File</span>';
            })

            ->addColumn('action', function ($publication) use ($locale) {

                $title = e($publication->title[$locale] ?? '');

                return '
                    <div class="d-flex justify-content-center gap-1">

                        <a
                            href="' . route('admin.publications.show', $publication->id) . '"
                            class="btn btn-info btn-sm"
                            title="View"
                        >
                            <i class="bi bi-eye"></i>
                        </a>

                        <a
                            href="' . route('admin.publications.edit', $publication->id) . '"
                            class="btn btn-primary btn-sm"
                            title="Edit"
                        >
                            <i class="bi bi-pencil"></i>
                        </a>

                    <form method="POST"
                        action="' . route('admin.publications.destroy', $publication->id) . '"
                        class="delete-form"
                        data-title="' . $title . '">

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

            ->rawColumns([
                'image',
                'file',
                'action',
            ])

            ->setRowId('id');
    }

    /**
     * Get the dataTable query.
     *
     * @return QueryBuilder<Publications>
     */
    public function query(Publications $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('publications-table')

            ->columns($this->getColumns())

            ->minifiedAjax()

            ->responsive(true)

            ->autoWidth(false)

            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
            ])

            ->orderBy(1)

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

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id')
                ->title('ID')
                ->width(60),

            Column::make('title')
                ->title('Title'),

            Column::make('short_description')
                ->title('Short Description'),

            Column::make('date')
                ->title('Date'),

            Column::make('image')
                ->title('Image')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->searchable(false),

            Column::make('file')
                ->title('File')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->searchable(false),

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
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Publications_' . date('YmdHis');
    }
}
