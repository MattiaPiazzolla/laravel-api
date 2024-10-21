<div class="w-75">
    <div class="w-100 bg-primary text-light d-flex justify-content-center">
        <h2>Nuovo messaggio ricevuto dalla form del sito</h2>
        <p>Ecco i dati:</p>
        <table>
            <tbody>
                <tr>
                    <td>Nome</td>
                    <td>{{ $lead->name }}</td>
                </tr>
                <tr>
                    <td>Cognome</td>
                    <td>{{ $lead->surname }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $lead->email }}</td>
                </tr>
                <tr>
                    <td>Telefono</td>
                    <td>{{ $lead->phone }}</td>
                </tr>
                <tr>
                    <td>Messaggio</td>
                    <td>{{ $lead->content }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
