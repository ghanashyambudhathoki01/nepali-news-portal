<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Edit Category</h4>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-primary">go back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update', $category->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="mb-2 col-6">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title') ?? $category->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="position">Position <span class="text-danger">*</span></label>
                                <input type="number" name="position" id="position" class="form-control"
                                    value="{{ old('position') ?? $category->position }}">
                                @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-12">   
                                <label for="meta_keywords">Meta Keywords</label>
                                <textarea name="meta_keywords" id="meta_keywords" class="form-control">{{ $category->meta_keywords }}
                                </textarea>
                            </div>

                            <div class="mb-2 col-12">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" class="form-control">{{ $category->meta_description }}
                                </textarea>
                            </div>

                            <div class="mb-2 col-6">
                                <label for="visible">Change Visibility</label>
                                <select name="visible" id="visible" class="form-control">
                                    <option value="1" {{$category->visible == 1 ? 'selected' : ''}}>Visible</option>
                                    <option value="0" {{$category->visible == 0 ? 'selected' : ''}}>Hidden</option>
                                </select>
                                @error('visible')
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
