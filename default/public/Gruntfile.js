module.exports = function (grunt) {
  "use strict";

  // Config...
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
      scripts: {
        files: ['./js/*.js', '!./js/sistema.gen.js'],
        tasks: ['concat']
      }
    },
    concat: {
      jquery: {
          src: ['./bower_components/jquery/dist/jquery.min.js', './bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js',
          './js/scripts.js'],
          dest: './js/sistema.gen.js'
      }
    }
  });
  // Load tasks...
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  // Default task.
  grunt.registerTask('default', 'watch');
};
