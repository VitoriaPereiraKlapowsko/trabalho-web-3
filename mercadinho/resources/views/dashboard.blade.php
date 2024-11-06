<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="mb-4">
                        <input type="text" id="filtro" placeholder="Buscar cliente por nome"
                            onkeyup="filtrarClientes()" 
                            class="w-full px-4 py-2 border rounded dark:bg-gray-700 dark:text-gray-100" />
                    </div>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nome</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Telefone</th>
                                <th class="px-4 py-2">CPF</th>
                                <th class="px-4 py-2">Criado em</th>
                                <th class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="cliente-linha">
                                <td class="border px-4 py-2 nome-cliente">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">{{ $user->telefone }}</td>
                                <td class="border px-4 py-2">{{ $user->cpf }}</td>
                                <td class="border px-4 py-2">{{ $user->created_at->format('d/m/Y') }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Editar</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja deletar este cliente?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script>
        function filtrarClientes() {
            const filtro = document.getElementById('filtro').value.toUpperCase();
            const linhas = document.querySelectorAll('.cliente-linha');

            linhas.forEach(linha => {
                const nomeCliente = linha.querySelector('.nome-cliente').textContent.toUpperCase();

                if (nomeCliente.includes(filtro)) {
                    linha.style.display = ''; 
                } else {
                    linha.style.display = 'none'; 
                }
            });
        }
    </script>
</x-app-layout>
