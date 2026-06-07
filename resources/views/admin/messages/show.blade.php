<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Message Details</h4>
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">Go Back</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Name:</strong>
                            <p class="form-control-plaintext text-muted">{{ $message->name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Email:</strong>
                            <p class="form-control-plaintext text-muted">
                                <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Phone:</strong>
                            <p class="form-control-plaintext text-muted">{{ $message->phone ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Subject:</strong>
                            <p class="form-control-plaintext text-muted">{{ $message->subject ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <strong>Message:</strong>
                            <div class="border rounded p-3 bg-light" style="white-space: pre-wrap;">{{ $message->message }}</div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this message?')">
                                    <i class="fas fa-trash-alt"></i> Delete Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
