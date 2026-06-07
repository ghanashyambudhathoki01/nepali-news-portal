<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Articles</h4>
                    <a href="{{ route('admin.article.create') }}" class="btn btn-primary">add new</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Title</th>
                                    <th>Writer Name</th>
                                    <th>Views</th>
                                    <th>Visible</th>
                                    <th>Is Trending</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $index => $article)
                                    <tr>
                                        <td>
                                            {{ ++$index }}
                                        </td>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ $article->writer_name }}</td>
                                        <td>{{ $article->views }}</td>
                                        <td>
                                            @if ($article->visible == true)
                                                <span class="badge bg-success">Visible</span>
                                            @else
                                                <span class="badge bg-danger">Hidden</span>
                                            @endif
                                        </td>
                                         <td>
                                            @if ($article->trending == true)
                                                <span class="badge bg-success">Yes</span>
                                            @else
                                                <span class="badge bg-danger">No</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.article.edit', $article->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-pen"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.article.destroy', $article->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')

                                                <button class="btn btn-sm btn-danger ml-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
