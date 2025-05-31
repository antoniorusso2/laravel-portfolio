@props(['route', 'item', 'trigger' => ''])

<!-- Modal -->
<div
    class="modal fade"
    id="{{ $trigger }}DeleteModal{{ $item->id }}"
    tabindex="-1"
    aria-labelledby="{{ $trigger }}DeleteModal"
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
                Una volta eliminato non sarà possibile ripristinarlo.
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >Annulla</button>
                <form method="POST" action="{{ $route }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</div>
