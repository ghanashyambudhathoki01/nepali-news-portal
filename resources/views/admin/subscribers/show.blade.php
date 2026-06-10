<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">सदस्यको विवरण</h5>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label class="form-label"><strong>ईमेल:</strong></label>
                <p class="form-control-plaintext">
                    <span class="badge bg-info">{{ $subscriber->email }}</span>
                </p>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>सदस्यता मिति:</strong></label>
                <p class="form-control-plaintext">
                    {{ $subscriber->created_at->format('Y-m-d H:i:s') }}
                </p>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>अपडेट मिति:</strong></label>
                <p class="form-control-plaintext">
                    {{ $subscriber->updated_at->format('Y-m-d H:i:s') }}
                </p>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('admin.subscribers.edit', $subscriber->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> सम्पादन गर्नुहोस्
                </a>
                <a href="{{ route('admin.subscribers.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> फिर्ता जानुहोस्
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
