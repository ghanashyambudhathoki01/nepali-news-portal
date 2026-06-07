<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>User Messages</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Sender Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Received At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $index => $msg)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $msg->name }}</td>
                                        <td>{{ $msg->email }}</td>
                                        <td>{{ $msg->phone ?? 'N/A' }}</td>
                                        <td>{{ $msg->subject ?? 'N/A' }}</td>
                                        <td>{{ toNepaliDate($msg->created_at) }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger ml-2" onclick="return confirm('Are you sure you want to delete this message?')">
                                                    <i class="fas fa-trash-alt"></i> Delete
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
