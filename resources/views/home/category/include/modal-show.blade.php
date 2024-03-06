{{-- // Modal Show --}}
{{-- // id basicModal{{ $row->id }} --}}
{{-- // digunakan untuk menampilkan modal --}}
{{-- // dengan id yang berbeda-beda --}}
<div class="modal fade" id="basicModal{{ $row->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{-- // $row->name adalah data name dari category --}}
                <h5 class="modal-title">Category Name :  
                    <strong class="text-uppercase fw-bold">
                        {{ $row->name }}</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            {{-- // menampilkan image dengan class img-thumbnail --}}
            <div class="modal-body d-flex justify-content-center">
                <img src="{{ $row->image }}" 
                    alt="image" 
                    class="img-thumbnail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>