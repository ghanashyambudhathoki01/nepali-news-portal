<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Create Advertise</h4>
                    <a href="{{ route('admin.advertise.index') }}" class="btn btn-primary">go back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.advertise.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-2 col-6">
                                <label for="ad_position">Select Ads Position <span class="text-danger">*</span></label>
                                <select name="ad_position" id="ad_position" class="form-control">
                                    <option value="header">Header</option>
                                    <option value="pages">Pages</option>
                                    <option value="popup">Pop Up</option>
                                    <option value="footer">Footer</option>
                                </select>
                                @error('ad_position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="company_name">Company Name <span class="text-danger">*</span></label>
                                <input type="text" name="company_name" id="company_name" class="form-control"
                                    value="{{ old('company_name') }}">
                                @error('company_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="contact">Contact <span class="text-danger">*</span></label>
                                <input type="text" name="contact" id="contact" class="form-control"
                                    value="{{ old('contact') }}">
                                @error('contact')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="expire_date">Expire Date <span class="text-danger">*</span></label>
                                <input type="date" name="expire_date" id="expire_date" class="form-control"
                                    value="{{ old('expire_date') }}">
                                @error('expire_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="redirect_link">Redirect Link <span class="text-danger">*</span></label>
                                <input type="text" name="redirect_link" id="redirect_link" class="form-control"
                                    value="{{ old('redirect_link') }}">
                                @error('redirect_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="image">Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Save Record</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
