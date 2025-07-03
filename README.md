# Ostedni HR - Zadanie rekrutacyjne

## Instalacja

Na początku należy pobrać projekt
```
https://github.com/michal3085/OstedniTest.git
```
- [ ] Komendy w folderze projektu
```
composer install
```
- [ ] Należy utworzyć plik .env na podstawie pliku .env.example - np.:
```
cp .env.example .env
```
```
php artisan key:generate
```
-----

## Baza danych

W projekcie przygotowałem Factories i Seedery, dlatego po wykonaniu migracji:

```
php artisan migrate
```

można wypełnić bazę przykładowymi danymi za pomocą:

```
php artisan db:seed
```

## Endpoint dla dodawania oceny:


```
/api/goal-evaluation
```
