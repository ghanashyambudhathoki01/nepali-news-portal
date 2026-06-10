<x-app-layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">सदस्यहरू व्यवस्थापन</h5>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.subscribers.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> नयाँ सदस्य जोड्नुहोस्
                </a>
                <a href="{{ route('admin.subscribers.export') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-download"></i> CSV निर्यात गर्नुहोस्
                </a>
            </div>
        </div>

        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>सफल!</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Search Form -->
            <div class="mb-3">
                <form action="{{ route('admin.subscribers.index') }}" method="GET" class="d-flex gap-2">
                    <input type="text" name="search" value="{{ $search }}" placeholder="ईमेल खोज्नुहोस्..."
                        class="form-control">
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-search"></i> खोज
                    </button>
                </form>
            </div>

            @if ($subscribers->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ईमेल</th>
                                <th>सदस्यता मिति</th>
                                <th>कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count = ($subscribers->currentPage() - 1) * $subscribers->perPage() + 1; @endphp
                            @foreach ($subscribers as $subscriber)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ $subscriber->email }}</span>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $subscriber->created_at->format('Y-m-d H:i:s') }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('admin.subscribers.show', $subscriber->id) }}"
                                                class="btn btn-info btn-sm" title="हेर्नुहोस्">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.subscribers.edit', $subscriber->id) }}"
                                                class="btn btn-warning btn-sm" title="सम्पादन गर्नुहोस्">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.subscribers.destroy', $subscriber->id) }}"
                                                method="POST" style="display: inline;"
                                                onsubmit="return confirm('के तपाई यो सदस्यलाई हटाउन चाहनुहुन्छ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="हटाउनुहोस्">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $subscribers->links() }}
                </div>
            @else
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> कुनै सदस्य फेला परेन।
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
