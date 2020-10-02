/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/process/browser.js":
/*!*****************************************!*\
  !*** ./node_modules/process/browser.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// shim for using process in browser
var process = module.exports = {};

// cached from whatever global is present so that test runners that stub it
// don't break things.  But we need to wrap it in a try catch in case it is
// wrapped in strict mode code which doesn't define any globals.  It's inside a
// function because try/catches deoptimize in certain engines.

var cachedSetTimeout;
var cachedClearTimeout;

function defaultSetTimout() {
    throw new Error('setTimeout has not been defined');
}
function defaultClearTimeout () {
    throw new Error('clearTimeout has not been defined');
}
(function () {
    try {
        if (typeof setTimeout === 'function') {
            cachedSetTimeout = setTimeout;
        } else {
            cachedSetTimeout = defaultSetTimout;
        }
    } catch (e) {
        cachedSetTimeout = defaultSetTimout;
    }
    try {
        if (typeof clearTimeout === 'function') {
            cachedClearTimeout = clearTimeout;
        } else {
            cachedClearTimeout = defaultClearTimeout;
        }
    } catch (e) {
        cachedClearTimeout = defaultClearTimeout;
    }
} ())
function runTimeout(fun) {
    if (cachedSetTimeout === setTimeout) {
        //normal enviroments in sane situations
        return setTimeout(fun, 0);
    }
    // if setTimeout wasn't available but was latter defined
    if ((cachedSetTimeout === defaultSetTimout || !cachedSetTimeout) && setTimeout) {
        cachedSetTimeout = setTimeout;
        return setTimeout(fun, 0);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedSetTimeout(fun, 0);
    } catch(e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't trust the global object when called normally
            return cachedSetTimeout.call(null, fun, 0);
        } catch(e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error
            return cachedSetTimeout.call(this, fun, 0);
        }
    }


}
function runClearTimeout(marker) {
    if (cachedClearTimeout === clearTimeout) {
        //normal enviroments in sane situations
        return clearTimeout(marker);
    }
    // if clearTimeout wasn't available but was latter defined
    if ((cachedClearTimeout === defaultClearTimeout || !cachedClearTimeout) && clearTimeout) {
        cachedClearTimeout = clearTimeout;
        return clearTimeout(marker);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedClearTimeout(marker);
    } catch (e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't  trust the global object when called normally
            return cachedClearTimeout.call(null, marker);
        } catch (e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error.
            // Some versions of I.E. have different rules for clearTimeout vs setTimeout
            return cachedClearTimeout.call(this, marker);
        }
    }



}
var queue = [];
var draining = false;
var currentQueue;
var queueIndex = -1;

function cleanUpNextTick() {
    if (!draining || !currentQueue) {
        return;
    }
    draining = false;
    if (currentQueue.length) {
        queue = currentQueue.concat(queue);
    } else {
        queueIndex = -1;
    }
    if (queue.length) {
        drainQueue();
    }
}

function drainQueue() {
    if (draining) {
        return;
    }
    var timeout = runTimeout(cleanUpNextTick);
    draining = true;

    var len = queue.length;
    while(len) {
        currentQueue = queue;
        queue = [];
        while (++queueIndex < len) {
            if (currentQueue) {
                currentQueue[queueIndex].run();
            }
        }
        queueIndex = -1;
        len = queue.length;
    }
    currentQueue = null;
    draining = false;
    runClearTimeout(timeout);
}

process.nextTick = function (fun) {
    var args = new Array(arguments.length - 1);
    if (arguments.length > 1) {
        for (var i = 1; i < arguments.length; i++) {
            args[i - 1] = arguments[i];
        }
    }
    queue.push(new Item(fun, args));
    if (queue.length === 1 && !draining) {
        runTimeout(drainQueue);
    }
};

// v8 likes predictible objects
function Item(fun, array) {
    this.fun = fun;
    this.array = array;
}
Item.prototype.run = function () {
    this.fun.apply(null, this.array);
};
process.title = 'browser';
process.browser = true;
process.env = {};
process.argv = [];
process.version = ''; // empty string to avoid regexp issues
process.versions = {};

function noop() {}

process.on = noop;
process.addListener = noop;
process.once = noop;
process.off = noop;
process.removeListener = noop;
process.removeAllListeners = noop;
process.emit = noop;
process.prependListener = noop;
process.prependOnceListener = noop;

process.listeners = function (name) { return [] }

process.binding = function (name) {
    throw new Error('process.binding is not supported');
};

process.cwd = function () { return '/' };
process.chdir = function (dir) {
    throw new Error('process.chdir is not supported');
};
process.umask = function() { return 0; };


/***/ }),

/***/ "./resources/assets/js/laravel/pages/live.js":
/*!***************************************************!*\
  !*** ./resources/assets/js/laravel/pages/live.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(process) {function ownKeys(object, enumerableOnly) {
  var keys = Object.keys(object);

  if (Object.getOwnPropertySymbols) {
    var symbols = Object.getOwnPropertySymbols(object);
    if (enumerableOnly) symbols = symbols.filter(function (sym) {
      return Object.getOwnPropertyDescriptor(object, sym).enumerable;
    });
    keys.push.apply(keys, symbols);
  }

  return keys;
}

function _objectSpread(target) {
  for (var i = 1; i < arguments.length; i++) {
    var source = arguments[i] != null ? arguments[i] : {};

    if (i % 2) {
      ownKeys(source, true).forEach(function (key) {
        _defineProperty(target, key, source[key]);
      });
    } else if (Object.getOwnPropertyDescriptors) {
      Object.defineProperties(target, Object.getOwnPropertyDescriptors(source));
    } else {
      ownKeys(source).forEach(function (key) {
        Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key));
      });
    }
  }

  return target;
}

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

var root = process.env.MIX_APP_URL;
var defaultAvatarPath = root + '/media/avatars/avatar0.jpg';
var storagePath = root + '/storage/';
var roomSubject = 'SALA EXCLUSIVA';
var domain = 'meet.jit.si';
var api = null;
var events = [];
var publicUsers = [];
jQuery(function () {
  document.querySelector('#live-session').innerHTML = "";
  var options = {
    roomName: room,
    width: '100%',
    height: 600,
    parentNode: document.querySelector('#live-session'),
    devices: {//
    },
    interfaceConfigOverwrite: {
      filmStripOnly: false
    },
    configOverwrite: {// DEFAULT_LOCAL_DISPLAY_NAME: user.person.age ? user.person.age : 'N/I',
    },
    onload: whenLive
  };
  api = new JitsiMeetExternalAPI(domain, options);
});

function whenLive() {
  //
  // Regular Events
  //
  api.addEventListener("avatarChanged", function ($e) {//console.log('avatar loaded', $e);
  });
  api.addEventListener("incomingMessage", function ($e) {
    console.log('message received', $e);
  });
  api.addEventListener("outgoingMessage", function ($e) {
    console.log('message sent', $e);
  });
  api.addEventListener("displayNameChange", function ($e) {
    console.log('name changed', $e);
  });
  api.addEventListener("emailChange", function ($e) {
    console.log('email changed', $e);
  }); //
  // Friendly Events
  //

  api.addEventListener("participantJoined", function ($e) {
    console.log('member joined the room', $e, api.getNumberOfParticipants());
    updateSummary('members', api.getNumberOfParticipants());
    updateEvents('memberArrive', _objectSpread({}, $e, {
      membersOnline: api.getNumberOfParticipants(),
      created: new Date()
    }));
  });
  api.addEventListener("participantKickedOut", function ($e) {
    console.error('member kicked from the room', $e);
  });
  api.addEventListener("participantLeft", function ($e) {
    console.log('member left the room', $e);
    updateSummary('members', api.getNumberOfParticipants());
    updateEvents('memberLeft', _objectSpread({}, $e, {
      membersOnline: api.getNumberOfParticipants(),
      created: new Date()
    }));
  });
  api.addEventListener("passwordRequired", function () {
    console.error('room has a password');
    alert("Desculpe, mas esta sala foi fechada para manutencao. Tente novamente mais tarde.");
  }); // 
  // Plugin Errors
  // 

  api.addEventListener("cameraError", function (error) {
    console.error('camera fail to load', error);
    alert('A camera nao esta respondendo. Verificou permissao? Tem alguma outra coisa usando a camera?');
  });
  api.addEventListener("micError", function (error) {
    console.error('mic fail to load', error);
    alert('O microfone nao esta respondendo. Verificou permissao? Tem alguma outra coisa usando o microfone ou camera?');
  }); //
  // Conference Events
  //

  api.addEventListener("videoConferenceJoined", function ($e) {
    console.warn('video conference joined', $e);
  });
  api.addEventListener("videoConferenceLeft", function ($e) {
    console.warn('video conference left', $e);
  }); //
  // Audio Changes
  //

  api.addEventListener("audioAvailabilityChanged", function ($e) {
    console.warn('audio has changed', $e);
  });
  api.addEventListener("audioMuteStatusChanged", function ($e) {
    console.warn('muted has changed', $e);
    updateStatus("muted", $e.muted);
  }); //
  // Video Events
  //

  api.addEventListener("videoAvailabilityChanged", function ($e) {
    console.warn('video has changed', $e);
  });
  api.addEventListener("videoMuteStatusChanged", function ($e) {
    console.warn('video muted has changed', $e);
    updateStatus("video", $e.muted);
  }); //
  // Settings Events
  //

  api.addEventListener("screenSharingStatusChanged", function ($e) {
    console.warn('screen sharing has changed', $e);
  });
  api.addEventListener("tileViewChanged", function ($e) {
    console.warn('tile view has changed', $e);
  });
  api.addEventListener("deviceListChanged", function ($e) {
    console.warn('devices list has changed', $e);
  });
  api.addEventListener("filmstripDisplayChanged", function ($e) {
    console.warn('pvt mode (filmstrip) has changed', $e);
  });
  api.addEventListener("subjectChange", function ($e) {
    if ($e && $e.subject !== roomSubject) {
      console.log('subject has changed', $e);

      if ($e.subject.length > 2) {
        alert($e.subject);
      }
    }
  });
  api.addEventListener("suspendDetected", function () {
    console.warn('are you awake?');
  });
  api.addEventListener("readyToClose", function () {
    console.error('ready to die...');
    api.dispose();
    $('#live').append("<a class=\"btn btn-lg btn-primary\" href=\"/live\">Entrar na Sala</a>");
  }); // Set Initial Configurations

  api.executeCommand('subject', roomSubject);
  api.executeCommand('displayName', user.person.full_name);
  api.executeCommand('email', user.email);
  api.executeCommand('avatarUrl', user.settings.avatar_url); // Actions / Commands

  api.executeCommand('toggleAudio');
  api.executeCommand('toggleVideo');
}

function updateStatus(event, value) {
  if (event === 'muted') {
    createOrUpdateStatus(event, {
      value: value,
      content: value ? 'Mic OFF' : 'Mic ON'
    });
  }

  if (event === 'video') {
    createOrUpdateStatus(event, {
      value: value,
      content: value ? 'Cam OFF' : 'Cam ON'
    });
  }
}

function updateSummary(event, value) {
  if (event === 'members') {
    createOrUpdateSummary(event, {
      value: value,
      content: value ? "".concat(value, " Usuarios Online") : "Nenhum Usuario Online"
    });
  }
}

function createOrUpdateStatus(name, properties) {
  var root = $("#live-status-".concat(name));

  if (root.length === 0) {
    $('#live-status').append("<div id=\"live-status-".concat(name, "\" class=\"badge badge-pill badge-danger mr-2\">").concat(properties.content, "</div>"));
    return;
  }

  if (properties.value) {
    root.removeClass('badge-success').addClass('badge-danger');
    root.text(properties.content);
  } else {
    root.removeClass('badge-danger').addClass('badge-success');
    root.text(properties.content);
  }
}

function createOrUpdateSummary(name, properties) {
  var root = $("#live-summary-".concat(name));

  if (root.length === 0) {
    $('#live-status').append("<div id=\"live-summary-".concat(name, "\" class=\"badge badge-primary float-right\">").concat(properties.content, "</div>"));
    return;
  }

  if (properties.value > 1) {
    root.removeClass('badge-secondary').addClass('badge-primary');
    root.text(properties.content);
  } else {
    root.removeClass('badge-primary').addClass('badge-secondary');
    root.text(properties.content);
  }
}

function updateEvents(event, properties) {
  if (event === 'memberArrive') {
    publicUsers.push(properties);
    pushNewEvent(event, _objectSpread({}, properties, {
      content: "".concat(properties.created.toLocaleString(), ": ").concat(properties.displayName, " entrou na sala.")
    }));
  }

  if (event === 'memberLeft') {
    var _user = publicUsers.find(function (user) {
      return user.id == properties.id;
    });

    pushNewEvent(event, _objectSpread({}, properties, {
      content: "".concat(properties.created.toLocaleString(), ": ").concat(_user.displayName, " saiu da sala.")
    }));
  }
}

function pushNewEvent(name, properties) {
  events.push(_objectSpread({
    name: name
  }, properties));
  var root = $("#live-events");

  if (root.length > 0) {
    root.empty();
    events.sort(function (b, a) {
      return a.created - b.created;
    }).slice(0, 5).forEach(function (event) {
      root.append("<div id=\"event-".concat(event.name, "\" class=\"alert alert-info d-flex align-items-center\" role=\"alert\">").concat(event.content, "</div>"));
    });
    return;
  }
}
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../../../node_modules/process/browser.js */ "./node_modules/process/browser.js")))

/***/ }),

/***/ 4:
/*!*********************************************************!*\
  !*** multi ./resources/assets/js/laravel/pages/live.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Admin\Desktop\Coding\__OLD\Fala\resources\assets\js\laravel\pages\live.js */"./resources/assets/js/laravel/pages/live.js");


/***/ })

/******/ });