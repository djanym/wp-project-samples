# Project Notes

## Initial setup

### 1. Get the code.
1. Clone this repository to your system.
2. Install WordPress in the root directory of this repository, without the `wp-content` directory - that's already part of this repository.

### 2. Import your database (optional)
Use SQL dump if provided.

### 3. WordPress configuration
Add to your wp-config.php:
```
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_HOME', 'http://[project-url]' );
define('WP_SITEURL', 'http://[project-url]' );
```

### 4. Install Node.
1. If you don't have it already, download [Node](https://nodejs.org/en/).
2. Install it.

### 5. Install theme dependencies.
1. `cd` to the theme directory
2. Run `npm install`.

### 6. Compiling JS & CSS files.
1. `cd` to the theme directory
2. Run `gulp` for generating CSS & JS assets files.

## Theme notes.

1. Images, fonts, etc. files should be located in `theme/assets` folder.
2. Source CSS, SCSS. JS files are located in the `theme/src` folder.
3. All SCSS and JS will be automatically build (compiled, minified, etc.) into `theme/assets` folder.
4. ***IMPORTANT!*** **Do not** store working files in the  `assets/css`, `assets/js` folders. 
All files in this folder are erased when build task executes. Store your files in the `theme/src` folder.
5. Try to minimize `src/scss/bootstrap.custom.scss` file by including only necessary parts.
6. Try to minimize `src/js/bootstrap.custom.js` file by including only necessary parts.

### Happy coding!

--------------

# Update NODE
sudo npm cache clean -f
sudo npm install -g n
sudo n stable
# Fix permission error (also requires after Node update)
sudo chown -R $USER /usr/local/lib/node_modules

# Update NPM itself
npm install npm@latest -g

# To update to a new major version all the packages inside project, install the npm-check-updates package globally:
npm install -g npm-check-updates
# Then run it:
ncu -u

# This command will update all the packages listed to the latest version
npm update


[theme-slug-placeholder]
[theme-name-placeholder]

_theme_slug_placeholder_
