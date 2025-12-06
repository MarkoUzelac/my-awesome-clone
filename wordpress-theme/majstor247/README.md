# Majstor 247 WordPress Theme

Profesionalna tema za hitne majstorske usluge.

## Instalacija

1. **Preuzmite cijelu mapu** `majstor247`
2. **Kompresirajte u ZIP** datoteku (npr. `majstor247.zip`)
3. **U WordPress Admin**, idite na **Izgled → Teme → Dodaj novu → Prenesi temu**
4. **Prenesite ZIP datoteku** i aktivirajte temu

## Struktura datoteka

```
majstor247/
├── style.css           # Glavni stilovi i meta podaci teme
├── functions.php       # Funkcije teme, AJAX handler, Customizer
├── header.php          # Zaglavlje stranice
├── footer.php          # Podnožje stranice
├── front-page.php      # Početna stranica (homepage)
├── index.php           # Blog/arhiva objava
├── page.php            # Predložak za stranice
├── single.php          # Predložak za pojedinačne objave
├── 404.php             # Stranica za 404 grešku
├── assets/
│   └── js/
│       └── main.js     # JavaScript funkcionalnosti
└── screenshot.png      # Slika teme (dodajte sami, 1200x900px)
```

## Postavke teme

Idite na **Izgled → Prilagodi** za uređivanje:

- **Contact Information**: Broj telefona i email
- **Hero Section**: Naslovi i statistike
- **Site Identity**: Logo i naziv stranice

## Preporučeni Plugini za testiranje

| Plugin | Opis |
|--------|------|
| **Theme Check** | Validira temu prema WordPress standardima |
| **Debug Bar** | Prikazuje debug informacije |
| **Query Monitor** | Praćenje upita, hook-ova i performansi |
| **Health Check & Troubleshooting** | Testira zdravlje stranice |
| **WP Mail SMTP** | Osigurava ispravno slanje emailova |

## Kontakt forma

Kontakt forma koristi WordPress AJAX za slanje emailova. Poruke se šalju na admin email adresu definiranu u WordPress postavkama.

Za naprednije forme, preporučamo:
- **Contact Form 7**
- **WPForms**
- **Gravity Forms**

## Prilagodba

### Boje
Sve boje su definirane kao CSS varijable u `style.css`. Uredite `:root` sekciju za promjenu boja.

### Sadržaj
- Usluge, cijene i lokacije su hardkodirane u `front-page.php`
- Za dinamički sadržaj, preporučamo ACF (Advanced Custom Fields) plugin

## Podrška

Za pitanja i podršku, kontaktirajte nas na info@majstor247.online
