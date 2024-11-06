<body>
    <h1>Clientes</h1>
        <p>Digite um nome para filtrar:</p>
            <input type="text" id="filtro" placeholder="Buscar por nomes..." onkeyup="filtrarClientes()">
    <table>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        @foreach($clientes as $cliente)
            <tr class="cliente-linha">
                <td class="nome-cliente">{{$cliente->nome}}</td>
                <td>{{$cliente->cpf}}</td>
                <td>{{$cliente->telefone}}</td>
                <td>{{$cliente->email}}</td>
                <td>
                    <form action="{{ url('deletarCliente/'.$cliente->id) }}" method="POST" onsubmit="return confirm('TEM CERTEZA?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Deletar</button>
                    </form>
                    <a href="{{ url('editarCliente/'.$cliente->id) }}">Editar</a> 
                </td>
            </tr>
        @endforeach
    </table>
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
</body>
