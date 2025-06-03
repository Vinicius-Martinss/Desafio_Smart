<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full size-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full size-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

            <!-- CPF -->
    <div class="col-span-6 sm:col-span-4">
        <x-label for="cpf" value="CPF" />
        <x-input id="cpf" type="text" class="mt-1 block w-full" wire:model.defer="state.cpf" />
        <x-input-error for="cpf" class="mt-2" />
    </div>

    <!-- Data de Nascimento -->
    <div class="col-span-6 sm:col-span-4">
        <x-label for="data_nascimento" value="Data de Nascimento" />
        <x-input id="data_nascimento" type="date"
                     class="mt-1 block w-full" wire:model.defer="state.data_nascimento" />
        <x-input-error for="data_nascimento" class="mt-2" />
    </div>

    <!-- Gênero -->
    <div class="col-span-6 sm:col-span-4">
        <x-label for="genero" value="Gênero" />
        <select id="genero" wire:model.defer="state.genero"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="">Selecione</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <option value="O">Outro</option>
        </select>
        <x-input-error for="genero" class="mt-2" />
    </div>

    <!-- Telefone -->
    <div class="col-span-6 sm:col-span-4">
        <x-label for="telefone" value="Telefone" />
        <x-input id="telefone" type="text" class="mt-1 block w-full" wire:model.defer="state.telefone" />
        <x-input-error for="telefone" class="mt-2" />
    </div>

    <!-- CEP -->
    <div class="col-span-6 sm:col-span-4">
        <x-label for="cep" value="CEP" />
        <x-input id="cep" type="text" class="mt-1 block w-full" wire:model.defer="state.cep" />
        <x-input-error for="cep" class="mt-2" />
    </div>

    <!-- Logradouro -->
    <div class="col-span-6 sm:col-span-4">
        <x-label for="logradouro" value="Logradouro" />
        <x-input id="logradouro" type="text" class="mt-1 block w-full" wire:model.defer="state.logradouro" />
        <x-input-error for="logradouro" class="mt-2" />
    </div>

    <!-- Número -->
    <div class="col-span-6 sm:col-span-4">
        <x-label for="numero" value="Número" />
        <x-input id="numero" type="text" class="mt-1 block w-full" wire:model.defer="state.numero" />
        <x-input-error for="numero" class="mt-2" />
    </div>

    <!-- Complemento -->
    <div class="col-span-6 sm:col-span-4">
        <x-label for="complemento" value="Complemento" />
        <x-input id="complemento" type="text" class="mt-1 block w-full" wire:model.defer="state.complemento" />
        <x-input-error for="complemento" class="mt-2" />
    </div>

    <!-- Bairro -->
    <div class="col-span-6 sm:col-span-4">
        <x-label for="bairro" value="Bairro" />
        <x-input id="bairro" type="text" class="mt-1 block w-full" wire:model.defer="state.bairro" />
        <x-input-error for="bairro" class="mt-2" />
    </div>

    <!-- Cidade -->
    <div class="col-span-6 sm:col-span-4">
        <x-label for="cidade" value="Cidade" />
        <x-input id="cidade" type="text" class="mt-1 block w-full" wire:model.defer="state.cidade" />
        <x-input-error for="cidade" class="mt-2" />
    </div>

    <!-- Estado -->
    <div class="col-span-6 sm:col-span-4">
        <x-label for="estado" value="Estado" />
        <x-input id="estado" type="text" class="mt-1 block w-full" wire:model.defer="state.estado"
                     maxlength="2" />
        <x-input-error for="estado" class="mt-2" />
    </div>

    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
