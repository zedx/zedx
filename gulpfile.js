'use strict';
process.env.DISABLE_NOTIFIER = true;

var elixir = require('laravel-elixir'),
    fs = require('fs'),
    taskPath = './tasks/',
    backendTask = './vendor/zedx/core/resources/task.js',
    frontendTask = './tasks/frontend.js',
    versionTask = './tasks/version.js';

elixir.config.sourcemaps = false;

require(backendTask)(elixir, fs);
require(frontendTask)(elixir, fs);
require(versionTask)(elixir, fs);
