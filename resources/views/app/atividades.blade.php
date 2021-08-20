View do usuário autenticado
<br>
{{ Auth::user()->nome_usuario }}
<br>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Sair</button>
</form> 