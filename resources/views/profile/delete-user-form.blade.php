<x-action-section>
    <x-slot name="title">
        {{ __('Eliminare l\'account') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Elimina definitivamente il tuo account.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Una volta eliminato il tuo account, tutte le risorse e i dati ad esso collegati verranno eliminati definitivamente. Prima di eliminare il tuo account, ti consigliamo di scaricare tutti i dati o le informazioni che desideri conservare.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Eliminare l\'account') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Eliminare l\'account') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Sei sicuro di voler eliminare il tuo account? Una volta eliminato, tutte le risorse e i dati ad esso collegati verranno cancellati definitivamente. Inserisci la tua password per confermare l´eliminazione definitiva del tuo account.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4"
                                autocomplete="current-password"
                                placeholder="{{ __('Password') }}"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Annulla') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Eliminare l\'account') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
