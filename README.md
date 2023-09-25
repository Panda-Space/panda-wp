# 🐼 Get started
## 📂 Project structure
```project
|--📂app
|--📂resources
|  |--📂vue
|  |--📂admin
```
### Legend:
1. `/app` dir is for backend enviroment
2. `/resources/vue` dir is for public frontend
3. `/resources/admin` dir is for admin frontend (wordpress dashboard)

## 🔋 Installation
1. Install composer dependencies
```sh
composer install
```

2. Install Panda WP project
```sh
php panda install
```

# 😋 Icons

1. Search new icons on [Iconify](https://icon-sets.iconify.design/):
2. Add new icon on template (html):
```html
<Icon icon="eva:close-fill" />
```

# ✅ Scripts

## 👻 Vue
* Development
```sh
npm run vue:serve
```

* Staging
```sh
npm run vue:stage
```

* Production
```sh
npm run vue:build
```

## 🛠️ Admin
* Development
```sh
npm run admin:serve
```

* Staging
```sh
npm run admin:stage
```

* Production
```sh
npm run admin:build
```
