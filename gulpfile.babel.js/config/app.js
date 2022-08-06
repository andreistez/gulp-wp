const isProd    = process.argv.includes( '--production' )
const isDev     = ! isProd

export default {
	isProd	: isProd,
	isDev	: isDev,

	webpack	: {
		mode: isProd ? 'production' : 'development'
	},

	imagemin: {
		verbose: true
	},

	fonter	: {
		formats: ['ttf', 'otf', 'woff', 'eot', 'svg']
	}
}