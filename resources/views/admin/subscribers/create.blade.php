<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">नयाँ सदस्य जोड्नुहोस्</h5>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>त्रुटि!</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('admin.subscribers.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">ईमेल <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" placeholder="सदस्यको ईमेल दिनुहोस्" required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> सदस्य जोड्नुहोस्
                    </button>
                    <a href="{{ route('admin.subscribers.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> फिर्ता जानुहोस्
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
