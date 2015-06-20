module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dev: {
        options: {
          style: "expanded",
          compass: true
        },
        files: {
          'a/c/screen.css' : 'scss/screen.scss'
        }
      }
    },
    watch: {
      css: {
        files: ['scss/*.scss'],
        tasks: ['sass:dev'],
        options: {
          livereload: true
        }
      }
    }
  });

  // Load the pluginis that provides the tasks.
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('default', ['watch']);
};
