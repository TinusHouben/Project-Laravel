# Backend Web Eindopdracht: Dynamische Website met Laravel

## Projectoverzicht
Voor het vak **Backend Web** heb ik een dynamische website ontwikkeld met **Laravel 12**. Dit project is bedoeld om alle concepten die in de cursus zijn behandeld in de praktijk toe te passen. De website maakt gebruik van een **MVC-architectuur**, **authenticatie**, **databasebeheer**, en **contentbeheer**.

Het project bevat de basisfunctionaliteiten van een typische webapplicatie, waaronder gebruikersregistratie, een profielpagina, een nieuwssectie, een FAQ-pagina, en een contactformulier.

## Functionaliteiten

### 1. **Login Systeem**
- **Registratie**: Bezoekers kunnen zich registreren voor een nieuw account.
- **Inloggen**: Gebruikers kunnen inloggen met hun account.
- **Adminbeheer**: Enkel admins kunnen andere gebruikers beheren (verheffen tot admin, nieuwe gebruikers aanmaken).

### 2. **Profielpagina**
- Elke gebruiker heeft een **publiek profiel**.
- Ingelogde gebruikers kunnen hun **profielgegevens** aanpassen, zoals:
  - Username
  - Verjaardag
  - Profielfoto
  - Korte "Over mij"-tekst

### 3. **Nieuwssectie**
- **Nieuwsitems** kunnen worden toegevoegd, gewijzigd en verwijderd door admins.
- Bezoekers kunnen de **nieuwsitems** bekijken en de **details** van elk item lezen.
  - Nieuwsitems bevatten: 
    - Titel
    - Afbeelding
    - Content
    - Publicatiedatum

### 4. **FAQ Pagina**
- De **FAQ-pagina** bevat een lijst van vragen en antwoorden, gegroepeerd per categorie.
- Admins kunnen **FAQ-items** en categorieën beheren (toevoegen, wijzigen, verwijderen).
- Elke bezoeker kan de **FAQ-pagina** inzien.

### 5. **Contactpagina**
- Bezoekers kunnen een **contactformulier** invullen.
- Na het verzenden van het formulier ontvangt de **admin** een e-mail met de inhoud van het formulier.

## Installatiehandleiding

1. **Clone de repository** naar je lokale machine:
   ```bash
   git clone https://github.com/TinusHouben/Project-Laravel.git


Screenshots
1. Homepagina (pagina links naar andere secties)

2. Profielpagina (voor een ingelogde gebruiker)

3. FAQ-pagina (met lijst van categorieën en antwoorden)

4. Nieuwsdetailpagina (met afbeelding, titel, en content)

Gebruikte Bronnen
Laravel Documentatie: https://laravel.com/docs

TailwindCSS Documentatie: https://tailwindcss.com/docs

Stack Overflow voor technische oplossingen.

Chatgpt voor als ik een probleem had en het niet kon vinden op stack overflow.


