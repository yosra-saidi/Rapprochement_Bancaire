<!DOCTYPE html>
<html>
<head>
    <title>Rapprochement Bancaire</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
        .container {
            max-width: 800px; /* Adjusted to provide more space for detailed information */
            margin: auto;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        #results p {
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
            background: #e9ecef;
        }
        #run-reconciliation {
            display: block;
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        #run-reconciliation:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Rapprochement Bancaire</h1>
        <div id="results"></div>
        <button id="run-reconciliation">Run Reconciliation</button>
    </div>

    <script>
        document.getElementById('run-reconciliation').addEventListener('click', function() {
            fetch('{{ route('rapprochement.run') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                let resultsDiv = document.getElementById('results');
                resultsDiv.innerHTML = '';
                if (data.success) {
                    resultsDiv.innerHTML = '<p class="alert alert-success">Succès: Toutes les factures sont payées</p>';
                } else {
                    data.factures.forEach(facture => {
                        resultsDiv.innerHTML += `
                            <div class="alert alert-warning">
                                <p><strong>Facture ID:</strong> ${facture.id}</p>
                                <p><strong>Client ID:</strong> ${facture.client_id}</p>
                                <p><strong>Montant:</strong> ${facture.montant} D</p>
                                <p><strong>Date:</strong> ${facture.date}</p>
                                <p><strong>Status:</strong> ${facture.status}</p>
                            </div>
                        `;
                    });
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
