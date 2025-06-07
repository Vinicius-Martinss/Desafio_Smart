<x-action-section>
    <x-slot name="title">
        {{ __('Deletar time') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Excluir esta equipe permanentemente.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Após a exclusão de uma equipe, todos os seus recursos e dados serão excluídos permanentemente. Antes de excluir esta equipe, baixe todos os dados ou informações sobre ela que você deseja manter.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                {{ __('Deletar Team') }}
            </x-danger-button>
        </div>

        <!-- Delete Team Confirmation Modal -->
        <x-confirmation-modal wire:model.live="confirmingTeamDeletion">
            <x-slot name="title">
                {{ __('Deletar Team') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Tem certeza de que deseja excluir esta equipe? Após a exclusão de uma equipe, todos os seus recursos e dados serão excluídos permanentemente.') }}
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteTeam" wire:loading.attr="disabled">
                    {{ __('Deletar Team') }}
                </x-danger-button>
            </x-slot>
        </x-confirmation-modal>
    </x-slot>
</x-action-section>
