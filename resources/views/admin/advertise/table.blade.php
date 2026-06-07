<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Advertise</h4>
                    <a href="{{ route('admin.advertise.create') }}" class="btn btn-primary">add new</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Company Name</th>
                                    <th>Contact</th>
                                    <th>Expire Date</th>
                                    <th>Status</th>
                                    <th>Ads Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($advertises as $index => $advertise)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $advertise->company_name }}</td>
                                        <td>{{ $advertise->contact }}</td>
                                        <td>{{ $advertise->expire_date }}</td>
                                        <td>
                                            @if($advertise->expire_date >= date('Y-m-d'))
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Expired</span>
                                            @endif
                                        </td>
                                        <td>{{ $advertise->ad_position }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.advertise.edit', $advertise->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-pen"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.advertise.destroy', $advertise->id) }}"
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
