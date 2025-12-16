   <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;2025</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> --}}
                 <script src="{{ asset(config('constants.ASSETS_PATH') . 'assets/admin/js/scripts.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
                 <script src="{{ asset(config('constants.ASSETS_PATH') . 'assets/admin/assets/demo/chart-area-demo.js') }}"></script>
                 <script src="{{ asset(config('constants.ASSETS_PATH') . 'assets/admin/assets/js/schart-bar-demo.js') }}"></script>


        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    
                 <script src="{{ asset(config('constants.ASSETS_PATH') . 'assets/admin/js/datatables-simple-demo.js') }}"></script>
                 <!-- jQuery (required for DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Initialize DataTable -->
<script>
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
if (sidebarToggle) {
    sidebarToggle.addEventListener('click', event => {
        event.preventDefault();
        document.body.classList.toggle('sb-sidenav-toggled');
    });
}

    $(document).ready(function () {
        $('#datatable').DataTable({
            paging: true,
            searching: true,
            info: true
        });
    });
$(document).ready(function(){

    const sliderModal = new bootstrap.Modal($('#sliderModal')[0]);
    const assetBaseUrl = "{{ config('constants.IMAGE_PATH') }}";

    // Open Add Modal
    $('#addSliderBtn').click(function(){
        $('#sliderForm')[0].reset();
        $('#sliderId').val('');
        $('#formMethod').val('POST');
        $('#sliderModalLabel').text('Add Slider');
        $('#existingImage').html('');

        // Make image and title required for Add
        $('#sliderImage').prop('required', true);
        $('#sliderTitle').prop('required', true);

        sliderModal.show();
    });

    // Edit Button
    $(document).on('click', '.editBtn', function(){
        const id = $(this).data('id');
        $.get("/admin/sliders/" + id, function(slider){
            $('#sliderId').val(slider.id);
            $('#formMethod').val('PUT');
            $('#sliderCategory').val(slider.category_id ?? '');
            $('#sliderTitle').val(slider.title);
            $('#sliderSubTitle').val(slider.sub_title ?? '');
            $('#sliderButtonText').val(slider.button_text ?? '');
            $('#sliderDescription').val(slider.description ?? '');
            $('#sliderModalLabel').text('Edit Slider');

            let imageHtml = slider.image 
                ? `<img src="/${assetBaseUrl}${slider.image}" width="120" class="img-fluid rounded">` 
                : '<span class="text-muted">No Image</span>';
            $('#existingImage').html(imageHtml);

            // Make image NOT required for Edit, but title remains required
            $('#sliderImage').prop('required', false);
            $('#sliderTitle').prop('required', true);

            sliderModal.show();
        });
    });

    // Live Image Preview
    $('#sliderImage').change(function(){
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(e){
                $('#existingImage').html(`<img src="${e.target.result}" width="120" class="img-fluid rounded">`);
            }
            reader.readAsDataURL(file);
        }
    });

    // Submit Add/Edit Form
   $('#sliderForm').submit(function(e){
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);
    const imageInput = document.getElementById('sliderImage');
        if (imageInput.files.length === 0) {
            formData.delete('image'); 
        }
    const sliderId = $('#sliderId').val();
    const method = $('#formMethod').val();
    const url = sliderId 
        ? "{{ url('admin/sliders') }}/" + sliderId 
        : "{{ route('sliders.store') }}";

    // If editing, always use POST with _method=PUT
    if(method === 'PUT') {
        formData.set('_method', 'PUT'); // ensure Laravel treats as PUT
    }

    $.ajax({
        url: url,
        type: 'POST', // always POST for FormData
        data: formData,
        processData: false,
        contentType: false,
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        success: function(slider){
            // Ensure category object exists
            slider.category = slider.category ?? { name: $('#sliderCategory option:selected').text() };

            if(method === 'POST'){
                addSliderRow(slider);
                Swal.fire({
                    icon: 'success',
                    title: 'Slider Created!',
                    text: 'Your slider has been added successfully.',
                    timer: 2000,
                    showConfirmButton: false
                });
            } else {
                updateSliderRow(slider);
                Swal.fire({
                    icon: 'success',
                    title: 'Slider Updated!',
                    text: 'Your slider has been updated successfully.',
                    timer: 2000,
                    showConfirmButton: false
                });
            }

            sliderModal.hide();
        },
        error: function(err){
            console.log(err);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong. Please check the form.'
            });
        }
    });
});

    // Delete Button
    $(document).on('click', '.deleteBtn', function(){
        const id = $(this).data('id');
        const url = "{{ url('admin/sliders') }}/" + id;

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function(){
                        $(`#sliderRow${id}`).remove();
                        toggleNoSliderMessage();
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Your slider has been deleted.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    },
                    error: function(){
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: 'Failed to delete the slider.'
                        });
                    }
                });
            }
        });
    });

    // Escape HTML
    function escapeHtml(text) {
        if (text === null || text === undefined) return '';
        return $('<div>').text(String(text)).html();
    }

    // Add row
    function addSliderRow(slider) {
        const rowCount = $('#slidersBody tr').length + 1;
        const categoryName = slider.category.name ?? 'Uncategorized';
        const subTitle = slider.sub_title ?? '-';
        const title = slider.title ?? '-';

        const imageHtml = slider.image
            ? `<img src="${assetBaseUrl}/${slider.image}" width="120" class="img-fluid rounded">`
            : '<span class="text-muted">No Image</span>';

        const row = `<tr id="sliderRow${slider.id}">
            <td class="text-center">${rowCount}</td>
            <td class="text-center">${escapeHtml(categoryName)}</td>
            <td class="text-center">${escapeHtml(title)}</td>
            <td class="text-center">${imageHtml}</td>
            <td class="text-center">${escapeHtml(subTitle)}</td>
            <td class="text-center">
                <button class="btn btn-warning btn-sm editBtn" data-id="${slider.id}"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm deleteBtn" data-id="${slider.id}"><i class="fas fa-trash"></i></button>
            </td>
        </tr>`;

        $('#slidersBody').append(row);
        toggleNoSliderMessage();
    }

    // Update row
    function updateSliderRow(slider) {
    const row = $('#sliderRow' + slider.id);

    row.find('td:nth-child(2)').text(slider.category?.name ?? '-');
    row.find('td:nth-child(3)').text(slider.title);
    row.find('td:nth-child(5)').text(slider.sub_title ?? '-');

    const imageCell = row.find('td:nth-child(4)');

    if (slider.image) {
        const imageUrl = `{{ asset(config('constants.IMAGE_PATH')) }}${slider.image}?v=${Date.now()}`;

        imageCell.html(`
            <img src="${imageUrl}" width="120" class="img-fluid rounded">
        `);
    } else {
        imageCell.html(`<span class="text-muted">No Image</span>`);
    }
}


    // Show/hide "No sliders" message
    function toggleNoSliderMessage(){
        if($('#slidersBody tr').length === 0){
            $('#noSlidersMessage').removeClass('d-none');
        } else {
            $('#noSlidersMessage').addClass('d-none');
        }
    }

});

</script>

</script>


    </body>
</html>
