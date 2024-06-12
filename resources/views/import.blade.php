<!DOCTYPE html>
<html>
<head>
    <title>Importation de Factures</title>
</head>
<body>
    <form action="/rapprochement" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Choisissez un fichier Excel :</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Importer et comparer</button>
    </form>
</body>
</html>
