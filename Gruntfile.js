module.exports = function(grunt) {

	require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		sass: {
			dist: {
				options: {
					style: 'compressed', //nested, compact, compressed, expanded
					sourcemap: 'none',
					precision: 2 //decimal precision
				},
				files: {
					'build/css/main.css' : 'src/scss/main.scss' //Destination : Source
				}
			}
		},

		//AUTOPREFIXER
		autoprefixer: {
			options: {
				browsers: ['last 2 versions', 'ie 8', 'ie 9']
			},
			dist: {
				files: {
					'build/css/main.css' : 'build/css/main.css'
				}
			}
		},

		//UGLIFY
		uglify: {
			build: {
				files: [{
					expand: true,
					src: 'src/js/*.js',
					dest: 'build/js/',
					flatten: true,
					rename: function(destBase, destPath){
						return destBase + destPath.replace(
							'.js', '.min.js');
					}
				}]
			}
		},

		//CSSLINT
		csslint: {
			strict: {
				options: {
					import: 2
				},
				src: ['css/*.css']
			}
		},

		//JSHINT
		jshint: {
			files: ['src/js/**/*.js'],
			options: {
				expr: true,
				curly: true,
				undef: true,
				unused: true,
				devel: true, //alert, console.log
				globals: {
					jQuery: true,
					console: true,
					module: true,
					document: true,
					$: true,
					window: true,
					setInterval: true,
					clearInterval: true,
					setTimeout: true,
					localStorage: true
				}
			}
		},

		//WATCH
		watch: {
			css: {
				files: ['src/scss/*.scss'],
				tasks: ['sass', 'autoprefixer', 'csslint']
			},
			js: {
				files: ['src/js/*.js'],
				tasks: [/*'jshint',*/ 'uglify']
			}
		}
	});

	grunt.registerTask('default', ['watch']);
}