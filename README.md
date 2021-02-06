##  Setup:

1. Clone **`.env.copy.php`** to **`.env.php`**
2. Change **`STAGE`** by **`dev`**

##  Plugins:

- ACF
##  Packages:

- jquery

- vue

- foundation-sites

- @fancyapps/fancybox

- swiper

##  Icons:

1. Check ``fontello-cli`` as local dependence:

```sh
npx fontello-cli --version
```

2.  List all existing icon fonts

```
$ npx fontello-cli open
```

3.  Add new icons or remove some
4.  Download **config.json** within theme (should replace the last)
5.  Install the new icons (actually this install all icons again)

```
$ npm run font:install
```

6.  Edit the fonts' route within **style/commons/fontello.css**

##  NPM Scripts:

* For Development

````bash
$ npm run start

````
* For Production

````bash
$ npm run build

````
* Install fonts

````bash
$ npm run font:install

````
