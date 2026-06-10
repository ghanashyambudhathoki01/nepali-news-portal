<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Edit Article</h4>
                    <a href="{{ route('admin.article.index') }}" class="btn btn-primary">go back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.article.update', $article->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="mb-2 col-6">
                                <label for="categories">Select Categories <span class="text-danger">*</span></label>
                                <select name="categories[]" id="categories" class="form-control select2" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $article->categories->contains($category->id) ? 'selected' : '' }}>
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('categories')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title') ?? $article->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="writer_name">Writer Name <span class="text-danger">*</span></label>
                                <input type="text" name="writer_name" id="writer_name" class="form-control"
                                    value="{{ old('writer_name') ?? $article->writer_name }}">
                                @error('writer_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="province">Select Province (Optional)</label>
                                <select name="province" id="province" class="form-control select2">
                                    <option value="" {{ (old('province') ?? $article->province) == '' ? 'selected' : '' }}>None (National/International)</option>
                                    <option value="koshi" {{ (old('province') ?? $article->province) == 'koshi' ? 'selected' : '' }}>कोशी प्रदेश (Koshi Province)</option>
                                    <option value="madhesh" {{ (old('province') ?? $article->province) == 'madhesh' ? 'selected' : '' }}>मधेश प्रदेश (Madhesh Province)</option>
                                    <option value="bagmati" {{ (old('province') ?? $article->province) == 'bagmati' ? 'selected' : '' }}>बागमती प्रदेश (Bagmati Province)</option>
                                    <option value="gandaki" {{ (old('province') ?? $article->province) == 'gandaki' ? 'selected' : '' }}>गण्डकी प्रदेश (Gandaki Province)</option>
                                    <option value="lumbini" {{ (old('province') ?? $article->province) == 'lumbini' ? 'selected' : '' }}>लुम्बिनी प्रदेश (Lumbini Province)</option>
                                    <option value="karnali" {{ (old('province') ?? $article->province) == 'karnali' ? 'selected' : '' }}>कर्णाली प्रदेश (Karnali Province)</option>
                                    <option value="sudurpashchim" {{ (old('province') ?? $article->province) == 'sudurpashchim' ? 'selected' : '' }}>सुदूरपश्चिम प्रदेश (Sudurpashchim Province)</option>
                                </select>
                                @error('province')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-12">
                                <label for="description">Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="form-control summernote">{{ old('description') ?? $article->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="image">Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" id="image" class="form-control">
                                <img src="{{ asset($article->image) }}" height="120" alt="">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-12">
                                <label for="meta_keywords">Meta Keywords </label>
                                <textarea name="meta_keywords" id="meta_keywords" class="form-control">{{ old('meta_keywords') ?? $article->meta_keywords }}</textarea>
                                @error('meta_keywords')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-12">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" class="form-control">{{ old('meta_description') ?? $article->meta_description }}</textarea>
                                @error('meta_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2 col-6">
                                <label for="visible">Change Visibility</label>
                                <select name="visible" id="visible" class="form-control">
                                    <option value="1" {{ $article->visible == 1 ? 'selected' : '' }}>Visible
                                    </option>
                                    <option value="0" {{ $article->visible == 0 ? 'selected' : '' }}>Hidden
                                    </option>
                                </select>
                                @error('visible')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2 col-6">
                                <label for="trending">Is Trending?</label>
                                <select name="trending" id="trending" class="form-control">
                                    <option value="1" {{ $article->trending == 1 ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="0" {{ $article->trending == 0 ? 'selected' : '' }}>No</option>
                                </select>
                                @error('trending')
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
