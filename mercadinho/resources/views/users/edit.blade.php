<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-200">Nome</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                class="form-input mt-1 block w-full text-gray-900 dark:text-gray-100 bg-gray-200 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded" required />
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 dark:text-gray-200">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                class="form-input mt-1 block w-full text-gray-900 dark:text-gray-100 bg-gray-200 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded" required />
                        </div>

                        <div class="mb-4">
                            <label for="telefone" class="block text-gray-700 dark:text-gray-200">Telefone</label>
                            <input type="text" id="telefone" name="telefone" value="{{ old('telefone', $user->telefone) }}"
                                class="form-input mt-1 block w-full text-gray-900 dark:text-gray-100 bg-gray-200 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded" required />
                        </div>

                        <div class="mb-4">
                            <label for="cpf" class="block text-gray-700 dark:text-gray-200">CPF</label>
                            <input type="text" id="cpf" name="cpf" value="{{ old('cpf', $user->cpf) }}"
                                class="form-input mt-1 block w-full text-gray-900 dark:text-gray-100 bg-gray-200 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded" required />
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Atualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
