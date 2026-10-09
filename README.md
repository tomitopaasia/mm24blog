# mm24blog

Laravel 12 blogirakendus, mis kasutab **Tailwind CSS v4** ja **DaisyUI** kujundust.

---

## 🚀 Täielik paigaldusjuhend (kloonimisest käivitamiseni)

Järgi allolevaid samme projekti paigaldamiseks ja käivitamiseks Windows keskkonnas.

### 1. Projekti kloonimine

Klooni repositoorium oma arvutisse ja liigu projekti kausta:

```bash
git clone https://github.com/tomitopaasia/mm24blog.git
cd mm24blog
```

---

### 2. Vajalike põhitööriistade paigaldamine (Windows / winget)

Kui sul pole veel paigaldatud Visual Studio Code'i, Git'i või PHP-d, saad need Windows Package Manageri (`winget`) abil paigaldada:

```powershell
winget install -e --id Microsoft.VisualStudioCode
winget install -e --id Git.Git
winget install -e --id PHP.PHP
```

---

### 3. Bun paigaldamine

Paigalda Bun JavaScripti käituskeskkond ja paketihaldur Bun kodulehelt ([bun.sh](https://bun.sh/)):

```powershell
powershell -c "irm bun.sh/install.ps1 | iex"
```

> **Märkus:** Pärast Bun-i paigaldamist taaskäivita terminal, et käsk `bun` oleks kättesaadav.

---

### 4. Composer paigaldamine

Laadi alla ja paigalda PHP paketihaldur Composer ametlikult lehelt:
👉 [Composer Windows Installer (Composer-Setup.exe)](https://getcomposer.org/Composer-Setup.exe)

Või paigalda käsurealt:

```powershell
winget install -e --id Composer.Composer
```

Kontrolli paigaldust:

```bash
composer --version
```

---

### 5. PHP laienduste (extensions) lubamine failis `php.ini`

Ava oma PHP paigalduse kaustas olev `php.ini` fail ja veendu, et järgmised laiendused on sisse lülitatud (eemalda rea algusest semikoolon `;`):

```ini
extension=curl
extension=fileinfo
extension=mbstring
extension=openssl
extension=pdo_sqlite
extension=sqlite3
```

Salvesta fail ja kontrolli laienduste olemasolu:

```bash
php -m
```

---

### 6. PHP sõltuvuste paigaldamine

Paigalda projekti PHP paketid Composeriga:

```bash
composer install
```

---

### 7. Node / Bun sõltuvuste paigaldamine

Paigalda esipaneeli (frontend) sõltuvused Bun-iga:

```bash
bun install
```

---

### 8. Keskkonnafaili (.env) loomine

Kopeeri näidisfail `.env.example` failiks `.env`:

**Windows (PowerShell / CMD):**
```powershell
copy .env.example .env
```

**Git Bash / Linux:**
```bash
cp .env.example .env
```

---

### 9. Rakenduse salajase võtme genereerimine

Genereeri Laravel rakendusele unikaalne krüpteerimisvõti:

```bash
php artisan key:generate
```

---

### 10. Andmebaasi migratsioonide käivitamine

Käivita andmebaasi migratsioonid (kui küsitakse SQLite andmebaasifaili loomise kohta, vasta `yes`):

```bash
php artisan migrate
```

---

### 11. Projekti käivitamine

Käivita korraga nii Laraveli server kui ka Vite arendusserver:

```bash
composer run dev
```

> Teise võimalusena saad need käivitada kahes eraldi terminaliaknas:
> - Terminal 1: `php artisan serve`
> - Terminal 2: `bun run dev`

Rakendus on nüüd kättesaadav veebilehitsejas aadressil:
👉 **[http://localhost:8000](http://localhost:8000)**

---

## 🎨 Nuppude demonstratsioon ja ülesanne

Nuppude leht asub aadressil **`/buttons`** ([http://localhost:8000/buttons](http://localhost:8000/buttons)).

Failis `resources/views/buttons.blade.php` on teostatud:
1. **Lihtne nupp**
2. **Button Group** (View, Edit, Delete)
3. **Bootstrapi `btn-primary` järele tehtud ainult Tailwindi klassidega**, sisaldades:
   - baasstiil (`inline-block rounded-md border border-blue-600 bg-blue-600 px-4 py-2 text-white shadow-sm transition duration-150 ease-in-out`)
   - `:hover` olek (`hover:border-blue-700 hover:bg-blue-700`)
   - `:active` olek (`active:border-blue-800 active:bg-blue-800`)
   - `:focus` olek (`focus:outline-none focus:ring-4 focus:ring-blue-300`)
   - `:disabled` olek (`disabled:pointer-events-none disabled:opacity-65`)
4. **DaisyUI `btn-primary`** võrdluseks.