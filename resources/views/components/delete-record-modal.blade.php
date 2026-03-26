<div class="modal fade" id="{{ $title }}" tabindex="-1" aria-labelledby="{{ $title }}Label">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="{{ $title }}Label">Delete Modal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
            <div class="modal-body">
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="mt-3 p-4">
                    <h4 class="fw-medium mb-5">
                        {{ __('Are you sure you want to delete this record?') }}
                    </h4>

                    <div class="d-flex justify-content-end">
                        <x-secondary-button data-bs-dismiss="modal">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <a href="{{ $url }}" class="btn btn-danger px-4 py-2 border-0 rounded-0 ms-3">
                            {{ __('Delete') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
