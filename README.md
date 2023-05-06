# CRITICK - WORDPRESS STARTER THEME (2022)
## Gulp4, SCSS, JavaScript ES6+, WEBP, fonts.

<br />

## Please run all commands from the current theme folder.

<br />

### 1. Change the value of the pathRoot to your local domain name in
`gulpfile.babel.js -> config -> path.js`

### 2. Install dependencies:
`npm i`

### 3. Start development:
`npm start`

### 4. Production build:
`npm run build`

### 5. You are awesome! Happy coding! ;-)

<hr />
<br />

## Where to place SCSS / JS / images / fonts source files?

<br />

Nice question! Inside your `src` directory.

<hr />
<br />

## Where are processed files located?

<br />

Inside your `static` directory. It will appear after starting development or after running production build.

<hr />
<br />

## Features:

<br />

### 1. Styles

<br />

#### 1.1. `SCSS` support.

<br />

#### 1.2. If `background-url` points to a local image that has its `WEBP` version - it will be replaced.

<br />

#### 1.3. If there are different `CSS`-properties that could be replaced with their short version - they will be replaced automatically.

<br />

#### 1.4. All `@media` queries with the same rules will be grouped together.

<br />

#### 1.5. No frameworks - please see `components/grid.scss` and `components/vars.scss` to edit `.container` properties.

<br />

#### 1.6. Also, use standard `@media` and your variables from `components/vars.scss` for breakpoints:
`@media all and (min-width: $xl) {}`

<br />

#### 1.7. Put styles for specific pages in `src/scss/pages`.<br />
Processed files will appear in `static/css/pages`.

<br />

#### 1.7. Gulp4 default sourcemaps added.

<hr />
<br />

### 2. JavaScript

<br />

#### 2.1. ES6+ with `import` / `export` support.

<br />

#### 2.2. Gulp4 default sourcemaps added.

<br />

#### 2.3. Put scripts for specific pages in `src/js/pages`. You can set another name for this directory.<br />
Processed files will appear in `static/js/<source_js_file_name>/<source_js_file_name>.min.js`.

<hr />
<br />

### 3. Local Images

<br />

#### 3.1. Minification of `PNG`, `JPG`, `JPEG`, `GIF`, `SVG`. Please place them inside your `src/img/` directory and then include them into your code from your `static/img/` directory.

<br />


#### 3.2. Also creates `WEBP` version of the image.

<hr />
<br />

### 4. Fonts

<br />

#### 4.1. Put local fonts into your `src/fonts/` directory. They will be moved to `static/fonts/`.

<br />

#### 4.2. Use `components/fonts.scss` to include local fonts with `@font-face` rules from your `static/fonts/` directory.

<hr />
<br />

### 5. Errors
Pop-up system notifications are added - now you will not waste your time searching for errors.

<hr />
<br />

### 6. Cleaning static/ directory

<br />

#### 6.1. Every time you will run development or production build, the following subdirectories of your `static/` directory will be cleared:
`js` | `css` | `img` | `fonts`

<br />

#### 6.2. Any other subdirectories will not be affected, so feel free to add everything you need to your `static/` directory. ;-)

<hr />
<br />

### Default styles and scripts size after build
`main.min.css` - 1.34 KB
<br />
`main.min.js` - 536 B