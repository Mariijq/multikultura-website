<?php

namespace App\DataTables;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class NewsDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $locale = app()->getLocale();

        return datatables()
            ->eloquent($query)

            ->addColumn('title', function ($news) use ($locale) {
                return $news->title[$locale] ?? '';
            })

            ->addColumn('subtitle', function ($news) use ($locale) {
                return $news->subtitle[$locale] ?? '';
            })

            ->addColumn('short_description', function ($news) use ($locale) {
                return Str::limit(
                    $news->short_description[$locale] ?? '',
                    50
                );
            })

            ->addColumn('date', function ($news) {
                return $news->date
                    ? Carbon::parse($news->date)->format('d M Y')
                    : '';
            })

            ->addColumn('image', function ($news) {
                if ($news->image) {
                    return '<img src="' . asset('storage/' . $news->image) . '"
                        style="width:60px;height:60px;object-fit:cover;border-radius:6px;">';
                }

                return '<span class="text-muted">No Image</span>';
            })

            ->addColumn('action', function ($news) {

                return '
                    <div class="d-flex justify-content-center gap-1">

                        <a href="' . route('admin.news.show', $news->id) . '"
                        class="btn btn-info btn-sm"
                        title="View">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="' . route('admin.news.edit', $news->id) . '"
                        class="btn btn-primary btn-sm"
                        title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>

                    <form method="POST"
                        action="' . route('admin.news.destroy', $news->id) . '"
                        class="delete-form"
                        data-title="' . e($news->title[app()->getLocale()] ?? '') . '">

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



    public function query(News $model): QueryBuilder
    {        
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('news-table')
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

        Column::make('subtitle')
            ->title('Subtitle'),

        Column::make('short_description')
            ->title('Short Description'),

        Column::make('date')
            ->title('Date'),

        Column::make('image')
            ->title('Image')
            ->exportable(false)
            ->printable(false),

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
        return 'News_' . date('YmdHis');
    }
}