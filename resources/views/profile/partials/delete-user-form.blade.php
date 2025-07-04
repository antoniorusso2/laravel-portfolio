<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Elimina Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Una volta eliminato l\'account, tutti i dati ad esso collegati saranno eliminati permanentemente. Prima di eliminare il tuo account scarica tutti i dati che preferisci salvare.') }}
        </p>
    </header>

    <x-buttons.danger x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Elimina Account') }}</x-buttons.danger>

    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable
    >
        <form
            method="post"
            action="{{ route('profile.destroy') }}"
            class="p-6"
        >
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Una volta eliminato l\'account, tutti i dati ad esso collegati saranno eliminati permanentemente. Inserisci la tua password per confermare l\'eliminazione.') }}
            </p>

            <div class="mt-6">
                <x-forms.input-label
                    for="password"
                    value="{{ __('Password') }}"
                    class="sr-only"
                />

                <x-forms.inputs.text
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-forms.input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-buttons.secondary x-on:click="$dispatch('close')">
                    {{ __('Annulla') }}
                </x-buttons.secondary>

                <x-buttons.danger class="ms-3">
                    {{ __('Elimina') }}
                </x-buttons.danger>
            </div>
        </form>
    </x-modal>
</section>
