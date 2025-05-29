@props(['route', 'item', 'type' => 'item'])

<!-- Modal -->
<div
    class="modal fade"
    id="{{ $type }}DeleteModal{{ $item->id }}"
    tabindex="-1"
    aria-labelledby="{{ $type }}DeleteModal"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Sicuro di voler eliminare questo elemento?</h1>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ $route }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</div>
