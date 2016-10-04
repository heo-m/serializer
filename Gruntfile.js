module.exports = function (grunt) {

  versionHandler = {
    updateComposerJson: function (versionString) {
        return versionHandler.setVersionInJsonFile(versionString, "composer.json", 4, "version");
    },
    updatePackageJson: function (versionString) {
        return versionHandler.setVersionInJsonFile(versionString, "package.json", 2, "version");
    },
    validateVersionString: function (versionString) {
        return (typeof versionString === 'string' || versionString instanceof String) && versionString.length > 0;
    },
    setVersionInJsonFile: function (versionString, fileName, indentationSize, versionObjectKey) {
      if (versionHandler.validateVersionString(versionString)) {
        if (grunt.file.exists(fileName)) {
          jsonContents = grunt.file.readJSON(fileName);
          if (typeof jsonContents[versionObjectKey] !== "undefined") {
            jsonContents[versionObjectKey] = versionString;
            grunt.file.write(fileName, JSON.stringify(jsonContents, null, indentationSize));
          } else {
            grunt.log.error("Key " + versionObjectKey + " in file " + fileName + " was not found.");
            return 255;
          }
        } else {
          grunt.log.error("File " + fileName + " was not found.");
          return 255;
        }
      } else {
        grunt.log.error("Provided version " + versionString + " is invalid.");
        return 255;
      }
    }
  };

  grunt.initConfig({
    pkg: grunt.file.readJSON("package.json"),
    exec: {
      doc: "./vendor/bin/phpdoc",
      unit: "./vendor/bin/phpunit",
      sniff: "./vendor/bin/phpcs --standard=vendor/escapestudios/symfony2-coding-standard/Symfony2/ src",
      dumpAutoload: "composer dump-autoload"
    },
    clean: {
      doc: "doc/*"
    },
    watch: {
      phpdoc: {
        files: ["src/**/*.*"],
        tasks: ["clean:doc", "exec:doc"],
        options: {
          debounceDelay: 5000
        }
      }
    }
  });

  grunt.loadNpmTasks("grunt-exec");
  grunt.loadNpmTasks("grunt-contrib-clean");
  grunt.loadNpmTasks("grunt-contrib-watch");

  grunt.registerTask("test", ["exec:dumpAutoload", "exec:sniff", "exec:unit"]);

  grunt.registerTask("version", "Updates the version of the package.", function () {
    grunt.task.run("test");
    versionString = grunt.option("set");
    if (versionHandler.updateComposerJson(versionString) || versionHandler.updatePackageJson(versionString)) {
      grunt.fail.warn("Version can't be updated.")
    }
    grunt.task.run("doc");
  });

  grunt.registerTask("doc", ["clean:doc", "exec:doc"]);
  grunt.registerTask("default", ["test", "doc"]);
}
