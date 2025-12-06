@push('title')
<title>S4E Admin - Sliders</title>
@endpush

@include('admin.includes.header')

<div id="layoutSidenav">
    @include('admin.includes.sidebar')

    <div id="layoutSidenav_content">
        <main class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center pt-3 mb-4">
                <h2>All Sliders</h2>
                <button class="btn btn-primary" id="addSliderBtn">
                    <i class="fas fa-plus"></i> Add Slider
                </button>
            </div>

            <!-- Sliders Table -->
            <div class="table-responsive mt-4">
                <table class="table table-striped table-hover table-bordered align-middle" id="slidersTable">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Sr No.</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Sub-title</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="slidersBody">
                        @foreach($sliders as $index => $slider)
                            <tr id="sliderRow{{ $slider->id }}">
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">{{ $slider->category?->name?? '-' }}</td>

                                <td class="text-center">{{ $slider->title }}</td>
                                <td class="text-center">
                                    @if($slider->image)
                                        <img src="{{ asset('storage/' . $slider->image) }}" width="120" class="img-fluid rounded">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $slider->sub_title ?? '-' }}</td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm editBtn" 
                                            data-id="{{ $slider->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm deleteBtn" 
                                            data-id="{{ $slider->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="noSlidersMessage" class="text-center py-4 {{ $sliders->count() ? 'd-none' : '' }}">
                    <h5>No sliders found.</h5>
                    <p>Click "Add Slider" to create your first slider.</p>
                </div>
            </div>

            <!-- Add/Edit Slider Modal -->
            <div class="modal fade" id="sliderModal" tabindex="-1" aria-labelledby="sliderModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form id="sliderForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod" value="POST">
                        <input type="hidden" name="slider_id" id="sliderId">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="sliderModalLabel">Add Slider</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" id="sliderCategory" class="form-select">
                                        <option value="">-- Select Category --</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" id="sliderTitle" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" id="sliderSubTitle" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" id="sliderImage" class="form-control" accept="image/*">
                                    <div id="existingImage" class="mt-2"></div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Button Text</label>
                                    <input type="text" name="button_text" id="sliderButtonText" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" id="sliderDescription" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="modalSubmitBtn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </main>
        @include('admin.includes.footer')
    </div>
</div>

