import gulp from 'gulp'

// Plugins.
import plumber from 'gulp-plumber'
import notify from 'gulp-notify'
import rename from 'gulp-rename'
import uglify from 'gulp-uglify'
import gulpIf from 'gulp-if'

import rollup from 'gulp-better-rollup'
import babel from 'rollup-plugin-babel'
import resolve from 'rollup-plugin-node-resolve'
import commonjs from 'rollup-plugin-commonjs'

// Config.
import path from '../config/path'
import app from '../config/app'

const jsPages = () => {
	return gulp.src( path.jsPages.src, { sourcemaps: app.isDev } )
		.pipe( plumber( {
			errorHandler: notify.onError( error => ( {
				title	: 'ERROR IN JAVASCRIPT ACF',
				message	: error.message
			} ) )
		} ) )
		.pipe( rollup( {
			plugins: [
				babel(),
				resolve(),
				commonjs()
			]
		}, 'umd' ) )
		.pipe( gulpIf( app.isProd, uglify() ) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( gulp.dest( path.jsPages.dest, { sourcemaps: app.isDev } ) )
}

export default jsPages