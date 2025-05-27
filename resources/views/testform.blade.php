<h1>Test Formulier</h1>
<form method="POST" action="{{ route('contact.send') }}">
    @csrf
    <input type="text" name="name" placeholder="Naam" required><br>
    <input type="email" name="email" placeholder="E-mail" required><br>
    <textarea name="message" placeholder="Bericht" required></textarea><br>
    <button type="submit">Verstuur</button>
</form>
