module.exports = function (grunt) {

  versionHandler = {
    parseVersionString: function (versionString) {
      return versionString.split(".");
    },
    bumpPatchVersion: function (versionString) {
      parts = versionHandler.parseVersionString(versionString);
      parts[2] = parseInt(parts[2]) + 1;

      return parts.join(".");
    },
    bumpMinorVersion: function (versionString) {
      parts = versionHandler.parseVersionString(versionString);
      parts[1] = parseInt(parts[1]) + 1;
      parts[2] = 0;

      return parts.join(".");
    },
    bumpMajorVersion: function (versionString) {
        parts = versionHandler.parseVersionString(versionString);
        parts[0] = parseInt(parts[0]) + 1;
        parts[1] = 0;
        parts[2] = 0;

        return parts.join(".");
    },
    bumpInJsonFile: function (fileName, indentation, versionType) {
      if (grunt.file.exists(fileName)) {
        jsonContents = grunt.file.readJSON(fileName);
        switch (versionType) {
          case "patch":
            jsonContents.version = versionHandler.bumpPatchVersion(jsonContents.version);
            break;
          case "minor":
            jsonContents.version = versionHandler.bumpMinorVersion(jsonContents.version);
            break;
          case "major":
            jsonContents.version = versionHandler.bumpMajorVersion(jsonContents.version);
            break;
          default:
            grunt.log.error("Invalid bump type " + versionType + ".");
            return 255;
        }
        grunt.file.write(fileName, JSON.stringify(jsonContents, null, indentation));
      } else {
        grunt.log.error("File " + fileName + " was not found.");
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

  grunt.registerTask("version-bump:patch", "Updates the package PATCH version", function () {
    grunt.task.run("test");
    versionHandler.bumpInJsonFile("composer.json", 4, "patch");
    versionHandler.bumpInJsonFile("package.json", 2, "patch");
    grunt.task.run("phpdoc");
  });

  grunt.registerTask("version-bump:minor", "Updates the package MINOR version", function () {
    grunt.task.run("test");
    versionHandler.bumpInJsonFile("composer.json", 4, "minor");
    versionHandler.bumpInJsonFile("package.json", 2, "minor");
    grunt.task.run("doc");
  });

  grunt.registerTask("version-bump:major", "Updates the package MAJOR version", function () {
    grunt.task.run("test");
    versionHandler.bumpInJsonFile("composer.json", 4, "major");
    versionHandler.bumpInJsonFile("package.json", 2, "major");
    grunt.task.run("doc");
  });

  grunt.registerTask("doc", ["clean:doc", "exec:doc"]);
  grunt.registerTask("default", ["test", "doc"]);
}
