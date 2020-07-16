module.exports = function(grunt) {

	// 1. All configuration goes here
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		concat: {
			// 2. Configuration for concatinating files goes here
			dist: {
				src: [
					'../assets/js/libs/*.js',
					'../assets/js/main.js'
				],
				dest: '../assets/js/main.min.js',
			}
		},

		imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: '../assets/images/',
					src: ['**/*.{png,jpg,gif}'],
					dest: '../assets/images/'
				}]
			}
		},

		uglify: {
			build: {
				src: '../assets/js/main.min.js',
				dest: '../assets/js/main.min.js'
			}
		},

		watch: {
			scripts: {
				files: ['../assets/js/main.js'],
				tasks: ['concat', 'uglify'],
				options: {
					spawn: false,
				},
			}
		}

	});

	// 3. Where we tell Grunt we plan to use this plugin
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');

	// 4. Where we tell Grunt what to do when we type "grunt" into the terminal
	grunt.registerTask('default', ['concat', 'uglify', 'imagemin']);

};
