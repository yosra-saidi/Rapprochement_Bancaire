<form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <!-- Autres champs du formulaire -->
    <button type="submit">Ajouter</button>
</form>
