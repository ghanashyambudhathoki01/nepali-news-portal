<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Edit Advertise</h4>
                    <a href="{{ route('admin.advertise.index') }}" class="btn btn-primary">go back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.advertise.update', $advertise->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="mb-2 col-6">
                                <label for="ad_position">Select Ads Position <span class="text-danger">*</span></label>
                                <select name="ad_position" id="ad_position" class="form-control">
                                    <option value="header" {{ $advertise->ad_position == 'header' ? 'selected' : '' }}>Header</option>
                                    <option value="pages" {{ $advertise->ad_position == 'pages' ? 'selected' : '' }}>Pages</option>
                                    <option value="popup" {{ $advertise->ad_position == 'popup' ? 'selected' : '' }}>Pop Up</option>
                                    <option value="footer" {{ $advertise->ad_position == 'footer' ? 'selected' : '' }}>Footer</option>
                                </select>
                                @error('ad_position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="company_name">Company Name <span class="text-danger">*</span></label>
                                <input type="text" name="company_name" id="company_name" class="form-control"
                                    value="{{ old('company_name') ?? $advertise->company_name }}">
                                @error('company_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="contact">Contact <span class="text-danger">*</span></label>
                                <input type="text" name="contact" id="contact" class="form-control"
                                    value="{{ old('contact') ?? $advertise->contact }}">
                                @error('contact')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="expire_date">Expire Date <span class="text-danger">*</span></label>
                                <input type="date" name="expire_date" id="expire_date" class="form-control"
                                    value="{{ old('expire_date') ?? $advertise->expire_date }}">
                                @error('expire_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="redirect_link">Redirect Link <span class="text-danger">*</span></label>
                                <input type="text" name="redirect_link" id="redirect_link" class="form-control"
                                    value="{{ old('redirect_link') ?? $advertise->redirect_link }}">
                                @error('redirect_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="image">Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" id="image" class="form-control">
                                <img src="{{asset($advertise->image)}}" alt="" height="80">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Update Record</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
