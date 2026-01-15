@extends('admin.layout')

@section('title', isset($brand) ? 'Edit Brand' : 'Create Brand')
@section('page-title', isset($brand) ? 'Edit Brand' : 'Create Brand')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="table-card">
                <form action="{{ isset($brand) ? route('admin.brands.update', $brand) : route('admin.brands.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($brand))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label for="name" class="form-label">Brand Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $brand->name ?? '') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">Brand Logo</label>
                        <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
                            name="logo" accept="image/*">
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Recommended: 350x350px, Max: 2MB</small>

                        @if (isset($brand) && $brand->logo)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}"
                                    style="max-width: 200px; border-radius: 10px;">
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="4">{{ old('description', $brand->description ?? '') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                    id="sort_order" name="sort_order"
                                    value="{{ old('sort_order', $brand->sort_order ?? 0) }}">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                        value="1" {{ old('is_active', $brand->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ isset($brand) ? 'Update Brand' : 'Create Brand' }}
                        </button>
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-4">
            <div class="table-card">
                <h5 class="mb-3"><i class="fas fa-info-circle"></i> Tips</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-check text-success"></i>
                        Use clear, recognizable brand names
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success"></i>
                        Upload high-quality logos (PNG recommended)
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success"></i>
                        Sort order determines display sequence
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success"></i>
                        Inactive brands won't show on frontend
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
