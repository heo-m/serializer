module.exports = function (grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON("package.json"),
    exec: {
      phpdoc: "./vendor/bin/phpdoc"
    },
    clean: {
      phpdoc: "doc/*"
    },
    watch: {
      phpdoc: {
        files: ["src/**/*.*"],
        tasks: ["clean:phpdoc", "exec:phpdoc"],
        options: {
          debounceDelay: 5000
        }
      }
    }
  });

  grunt.loadNpmTasks("grunt-exec");
  grunt.loadNpmTasks("grunt-contrib-clean");
  grunt.loadNpmTasks("grunt-contrib-watch");

  grunt.registerTask("phpdoc", ["clean:phpdoc", "exec:phpdoc"]);
  grunt.registerTask("default", ["phpdoc"]);
}
