## Checklist App

### Step 0
rename .env.example to .env

### Step 1: run compose install
```
cd /your directory with app in
composer install
```

### Step 2
Run npm install
```
npm install
```

### Step 3 
Run database migration into sqlite db
```
php artisan migrate
```

### Step 4
Generate app keys
```
php artisan key:generate
```

### Step 5
Host it so you can access the site
```
php artisan serve
```
Now go to the url it displays

