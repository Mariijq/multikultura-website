<?php

namespace App\DataTables;

use App\Models\Projects;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProjectsDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $locale = app()->getLocale();

        return datatables()
            ->eloquent($query)

            ->addColumn('title', function ($project) use ($locale) {
                return $project->title[$locale] ?? '';
            })

            ->addColumn('short_description', function ($project) use ($locale) {
                return Str::limit(
                    $project->short_description[$locale] ?? '',
                    50
                );
            })

            ->editColumn('status', function ($project) {
                return $project->status ?? '';
            })

            ->addColumn('date', function ($project) {
                return $project->date
                    ? Carbon::parse($project->date)->format('d M Y')
                    : '';
            })

            ->addColumn('image', function ($project) {
                if ($project->image) {
                    return '
                        <img
                            src="' . asset('storage/' . $project->image) . '"
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

            ->addColumn('action', function ($project) use ($locale) {

                $title = e($project->title[$locale] ?? '');

                return '
                    <div class="d-flex justify-content-center gap-1">

                        <a
                            href="' . route('admin.projects.show', $project->id) . '"
                            class="btn btn-info btn-sm"
                            title="View"
                        >
                            <i class="bi bi-eye"></i>
                        </a>

                        <a
                            href="' . route('admin.projects.edit', $project->id) . '"
                            class="btn btn-primary btn-sm"
                            title="Edit"
                        >
                            <i class="bi bi-pencil"></i>
                        </a>

                    <form method="POST"
                        action="' . route('admin.projects.destroy', $project->id) . '"
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
                'action',
            ])

            ->setRowId('id');
    }

    public function query(Projects $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('projects-table')

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

            Column::make('status')
                ->title('Status'),

            Column::make('date')
                ->title('Date'),

            Column::make('image')
                ->title('Image')
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

    protected function filename(): string
    {
        return 'Projects_' . date('YmdHis');
    }
}