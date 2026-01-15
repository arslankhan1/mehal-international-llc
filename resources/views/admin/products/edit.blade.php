@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Edit Product</h1>
            <div>
                <a href="{{ route('product.detail', $product->slug) }}" class="btn btn-outline-info me-2" target="_blank">
                    <i class="fas fa-eye"></i> View Product
                </a>
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <!-- Product Information -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Product Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Product Name *</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $product->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Features (one per line)</label>
                                    <textarea name="features" class="form-control @error('features') is-invalid @enderror" rows="4">{{ old('features', $product->features) }}</textarea>
                                    @error('features')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Images Management -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5 class="mb-0">Product Images</h5>
                        </div>
                        <div class="card-body">
                            @if ($product->images->count() > 0)
                                <div class="row g-3 mb-3">
                                    @foreach ($product->images as $image)
                                        <div class="col-md-3">
                                            <div class="position-relative">
                                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                                    class="img-fluid rounded" alt="{{ $product->name }}">

                                                @if ($image->image_type === 'main')
                                                    <span
                                                        class="badge bg-primary position-absolute bottom-0 start-0 m-2">Main</span>
                                                @endif

                                                <div class="position-absolute top-0 end-0 m-2">
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="deleteImage({{ $image->id }}, '{{ $product->id }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted">No images uploaded yet.</p>
                            @endif

                            <!-- Upload New Images - Now inside main form -->
                            <div class="mt-3">
                                <label class="form-label">Upload New Images</label>
                                <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                                <small class="text-muted">You can select multiple images at once</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Pricing -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Pricing</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Price *</label>
                                <input type="number" step="0.01" name="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                    value="{{ old('price', $product->price) }}" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-0">
                                <label class="form-label">Original Price</label>
                                <input type="number" step="0.01" name="original_price"
                                    class="form-control @error('original_price') is-invalid @enderror"
                                    value="{{ old('original_price', $product->original_price) }}">
                                @error('original_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Inventory -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5 class="mb-0">Inventory</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">SKU</label>
                                <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror"
                                    value="{{ old('sku', $product->sku) }}">
                                @error('sku')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-0">
                                <label class="form-label">Stock *</label>
                                <input type="number" name="stock"
                                    class="form-control @error('stock') is-invalid @enderror"
                                    value="{{ old('stock', $product->stock) }}" required>
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Organization -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5 class="mb-0">Organization</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Brand *</label>
                                <select name="brand_id" class="form-select @error('brand_id') is-invalid @enderror"
                                    required>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status *</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="active"
                                        {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive"
                                        {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                    <option value="sold_out"
                                        {{ old('status', $product->status) == 'sold_out' ? 'selected' : '' }}>Sold Out
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control"
                                    value="{{ old('sort_order', $product->sort_order) }}">
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured"
                                    {{ old('is_featured', $product->is_featured) ? 'checked' : '' }} value="1">
                                <label class="form-check-label" for="is_featured">
                                    Featured Product
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">
                        <i class="fas fa-save"></i> Update Product
                    </button>
                </div>
            </div>
        </form>

        <!-- Hidden forms for image deletion (outside main form) -->
        @foreach ($product->images as $image)
            <form id="delete-image-{{ $image->id }}" action="{{ route('admin.products.images.delete', $image) }}"
                method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        @endforeach
    </div>

    @push('scripts')
        <script>
            function deleteImage(imageId, productId) {
                if (confirm('Are you sure you want to delete this image?')) {
                    document.getElementById('delete-image-' + imageId).submit();
                }
            }
        </script>
    @endpush
@endsection
