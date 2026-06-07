<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Categories</h4>
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">add new</a>
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
                                    <th>Slug</th>
                                    <th>Visible</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                    <tr>
                                        <td>
                                            {{ $category->position }}
                                        </td>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            @if ($category->visible == true)
                                                <span class="badge bg-success">Visible</span>
                                            @else
                                                <span class="badge bg-danger">Hidden</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-pen"></i>
                                                Edit
                                            </a>
                                            <form action="{{route('admin.category.destroy', $category->id)}}" method="post">
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
