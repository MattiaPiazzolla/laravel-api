<div class="w-75">
    <div class="w-100 bg-primary text-light d-flex justify-content-center">
        <h2>Nuovo messaggio ricevuto dalla form del sito</h2>
        <p>ecco i dati:</p>
        <table>
            <tbody>
                <tr>
                    <td>nome</td>
                    <td>{{ $lead->name }}</td>
                </tr>
                <tr>
                    <td>cognome</td>
                    <td>{{ $lead->surname }}</td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>{{ $lead->email }}</td>
                </tr>
                <tr>
                    <td>telefono</td>
                    <td>{{ $lead->phone }}</td>
                </tr>
                <tr>
                    <td>messaggi</td>
                    <td>{{ $lead->content }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
