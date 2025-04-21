
# 📦 Customer Social Finder

A Laravel package to help find social media profiles (LinkedIn, Facebook, Twitter) of a person based on their name, profession, company, and location — using the Google Custom Search API.

---

## 🚀 Features

- 🧠 Accepts name, profession, company, and location as input
- 🔍 Searches LinkedIn, Facebook, and Twitter using Google Custom Search
- 📷 Displays title, link, snippet, and thumbnail (if available)
- 🎨 Includes a ready-to-use Blade view

---

## 📥 Installation

### Step 1: Require via Composer

```bash
composer require minulhasanrokan/customer-social-finder
```

---

## 📂 Publish Views (Optional)

To publish the default Blade view:

```bash
php artisan vendor:publish --tag=views
```

---

## ⚙️ Configuration

### Step 1: Add Google API credentials to `.env`

```env
GOOGLE_API_KEY=your_google_api_key
GOOGLE_CX_ID=your_custom_search_engine_id
```

### Step 2: Update `config/services.php`

```php
'google' => [
    'key' => env('GOOGLE_API_KEY'),
    'cx' => env('GOOGLE_CX_ID'),
],
```

---

## 🔗 Route Setup

You can add a route in your `web.php` to use the form:

```php
use Minulhasanrokan\CustomerSocialFinder\Http\Controllers\SocialProfileController;

Route::match(['get', 'post'], '/social-finder', [SocialProfileController::class, 'index']);
```

---

## 🖼️ Blade View Example

Here’s how the output is structured:

```blade
@foreach ($results as $result)
    <div class="profile-card">
        <h3>{{ $result['title'] }}</h3>
        <a href="{{ $result['link'] }}" target="_blank">{{ $result['link'] }}</a>
        <p>{{ $result['snippet'] }}</p>
        @if($result['image'])
            <img src="{{ $result['image'] }}" alt="Thumbnail">
        @endif
    </div>
@endforeach
```

---

## 🔐 How to Get Google API Credentials

1. Visit [Google Cloud Console](https://console.cloud.google.com/)
2. Create a new project
3. Enable **Custom Search JSON API**
4. Go to [Programmable Search Engine](https://programmablesearchengine.google.com/)
5. Create a new search engine with sites like:
   ```
   *.linkedin.com, *.facebook.com, *.twitter.com
   ```
6. Get your **Search Engine ID (cx)** and **API key**

---

## 🧾 Example Search Query

The search will build something like:

```
John Doe Software Engineer Acme Inc New York site:linkedin.com OR site:facebook.com OR site:twitter.com
```

This query is passed to Google’s Custom Search API.

---

## 🛠 Requirements

- PHP ^8.0
- Laravel ^10.0 || ^11.0 || ^12.0
- Google Custom Search API credentials

---

## 📁 Project Structure

src/
├── Http/
│   └── Controllers/
│       └── SocialProfileController.php
├── resources/
│   └── views/
│       └── form.blade.php
├── routes/
│   └── web.php
└── CustomerSocialFinderServiceProvider.php

## 🙋 License

MIT License © [Md. Minul Hasan](https://github.com/minulhasanrokan)
