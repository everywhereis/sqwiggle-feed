'use strict';

module.exports = function(grunt) {
    // Project Configuration
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            js: {
                files: ['gruntfile.js', 'js/*.js'],
                // tasks: ['jshint'],
                options: {
                    livereload: true,
                },
            },
            css: {
                files: ['css/**'],
                options: {
                    livereload: true
                }
            }, 
            php: {
            	files: ['*.php', 'resources/*.php'],
            	options: {
            		livereload: true
            	}
            },
            html: {
                files: ['*.html', 'public/views/*.html'],
                options: {
                    livereload: true
                }
            }
        },
        concurrent: {
            tasks: ['watch'],
            options: {
                logConcurrentOutput: true
            }
        },
    });

    //Load NPM tasks 
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-concurrent');
    grunt.loadNpmTasks('grunt-release');

    //Making grunt default to force in order not to break the project.
    grunt.option('force', true);

    //Default task(s).
    grunt.registerTask('default', ['concurrent']);
};