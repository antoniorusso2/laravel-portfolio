<x-app-layout>
    <div class="container">
        <div class="row flex-wrap mb-5">
            <div class="col-12">
                <h2 class="text-capitalize my-4 fs-1">
                    Crea Tipologia
                </h2>
            </div>
            <div class="col">
                <a href="{{ route('types.index') }}" class="btn btn-outline-warning">Indietro</a>
            </div>
        </div>
        <div class="row row-gap-3 description">
            <div class="col-12 col-md-6 fs-3">
                <form action="{{ route('types.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <input
                            type="text"
                            class="form-control"
                            id="description"
                            name="description"
                        >
                    </div>
                    <button type="submit" class="btn btn-primary">Crea</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
