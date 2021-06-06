/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!*******************************************************!*\
  !*** ./resources/js/public/server-status-listener.js ***!
  \*******************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ ServerStatusListener)
/* harmony export */ });
function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var ServerStatusListenerDefinitions = {
  name: ['data-server-name', 'innerText'],
  count: ['data-count', 'innerText'],
  queue: ['data-queue', 'innerText'],
  slots: ['data-slots', 'innerText'],
  reserved: ['data-reserved', 'innerText'],
  levelClass: ['data-level-class', function () {}],
  teamTags: ['data-team-tags', function () {}]
};

var ServerStatusListener = /*#__PURE__*/function () {
  function ServerStatusListener() {
    var definitions = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
    var callback = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;

    _classCallCheck(this, ServerStatusListener);

    /* Merge options with defaults */
    this.definitions = Object.assign(ServerStatusListenerDefinitions, definitions);
    /* Callback to run once a server update has been received */

    this.callback = callback;
    /* Get all servers elements with an id set */

    this.servers = {};

    var _iterator = _createForOfIteratorHelper(document.querySelectorAll('.server[server-id]')),
        _step;

    try {
      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        var element = _step.value;
        this.servers[parseInt(element.getAttribute('server-id'))] = element;
      }
      /* Start listening */

    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }

    this.listen();
  }

  _createClass(ServerStatusListener, [{
    key: "listen",
    value: function listen() {
      var _this = this;

      /* Check if Echo is installed, loaded and instanciated */
      if (!window.Echo) {
        throw new Error('SquadServerListener requires Echo to be available!');
      }
      /* Listen for status updates */


      Echo.channel("server-status").listen('.SquadMS\\Servers\\Events\\ServerStatusUpdated', function (event) {
        /* Only update servers that are registered and found on the page */
        if (!Object.keys(_this.servers).includes(event.server.toString())) {
          console.log("Server ".concat(event.server, " is not registered, skipping..."));
          return;
        }
        /* Update with the configured definitions */


        for (var param in _this.definitions) {
          /* Get the pair, selector and modifier */
          var pair = _this.definitions[param];
          /* Get the data from the event */

          var value = event[param];
          /* Find all descendant elements of the server for the selector */

          var _iterator2 = _createForOfIteratorHelper(_this.servers[event.server].getElementsByClassName(pair[0])),
              _step2;

          try {
            for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
              var element = _step2.value;

              /* If the modifier is a function, execute it, otherwise simply write */
              if (_this.isFunction(pair[1])) {
                pair[1](element, value);
              } else {
                element[pair[1]] = value;
              }
            }
          } catch (err) {
            _iterator2.e(err);
          } finally {
            _iterator2.f();
          }
        }
        /* Toggle online/offline visibility elements */


        _this.toggleVisibilites(_this.servers[event.server], event.online);
        /* Run the user defined callback */


        if (_this.callback) {
          _this.callback(_this.servers[event.server], event);
        }
      });
    }
  }, {
    key: "toggleVisibilites",
    value: function toggleVisibilites(root) {
      var state = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;

      var _iterator3 = _createForOfIteratorHelper(root.getElementsByClassName('data-show-online')),
          _step3;

      try {
        for (_iterator3.s(); !(_step3 = _iterator3.n()).done;) {
          var element = _step3.value;
          element.classList.toggle('d-none', !state);
        }
      } catch (err) {
        _iterator3.e(err);
      } finally {
        _iterator3.f();
      }

      var _iterator4 = _createForOfIteratorHelper(root.getElementsByClassName('data-show-offline')),
          _step4;

      try {
        for (_iterator4.s(); !(_step4 = _iterator4.n()).done;) {
          var _element = _step4.value;

          _element.classList.toggle('d-none', state);
        }
      } catch (err) {
        _iterator4.e(err);
      } finally {
        _iterator4.f();
      }
    }
  }, {
    key: "isFunction",
    value: function isFunction(functionToCheck) {
      return functionToCheck && {}.toString.call(functionToCheck) === '[object Function]';
    }
  }]);

  return ServerStatusListener;
}();


window.ServerStatusListener = ServerStatusListener;
/******/ })()
;