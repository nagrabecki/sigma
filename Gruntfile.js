module.exports = function(grunt){

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		/**
		*Sass task
		**/
		sass: {
			dev: {
				options: {
					style: 'expanded',
					sourcemap: true,
				},
				files: {
					'compiled/style-human.css': 'sass/style.scss'
				}
			},
			dist: {
				options: {
					style: 'compressed',
					sourcemap: true,
				},
				files: {
					'compiled/style.css': 'sass/style.scss'
				}
			}
		},

		/**
		*Autoprefixer
		**/
		autoprefixer: {
			options: {
				browsers: ['opera 12', 'ff 15', 'chrome 25'],
				map: true
			},
			// Prefix all files
			multiple_files: {
				expand: true,
				flatten: true,
				src: 'compiled/*.css',
				dest: ''
			}
		},

		/**
		*Watch task
		**/
		watch: {
			css: {
				files: '**/*.scss',
				tasks: ['sass', 'autoprefixer']
			}
		}

	});

	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.registerTask('default', ['watch']);
}