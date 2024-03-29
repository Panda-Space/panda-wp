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

3. Install all VScode recommended extensions
``.vscode/extensions.json
``

4. Setting VScode for prettier (only once)
- Type ``CTRL + SHIFT + P``
- Type ``settings.json`` and select Open User Settings

```json
  "[javascript]": {
    "editor.defaultFormatter": "esbenp.prettier-vscode"
  },
  "[vue]": {
    "editor.defaultFormatter": "esbenp.prettier-vscode"
  },
  "[typescript]": {
    "editor.defaultFormatter": "esbenp.prettier-vscode"
  },
  "[scss]": {
    "editor.defaultFormatter": "esbenp.prettier-vscode"
  },
  "[css]": {
    "editor.formatOnSave": true,
    "editor.defaultFormatter": "esbenp.prettier-vscode"
  },
  "[json]": {
    "editor.defaultFormatter": "esbenp.prettier-vscode"
  },
```

5. Update format shortcuts by these new ones
![image](https://github.com/pincelkey/panda-wp/assets/20878555/123de6d8-e082-4e80-9103-5685c39fec97)

These new shortcuts are much faster because is close to comoon `ctrl + s`

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

First you need to set the live script which is gonna run by default (`resources\admin\.env.example`)

```sh
VITE_APP_LIVE_SCRIPT='example'
```

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
