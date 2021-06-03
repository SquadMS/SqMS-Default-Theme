/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************************!*\
  !*** ./resources/js/public/server-status-listener.js ***!
  \*******************************************************/
function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

document.addEventListener('DOMContentLoaded', function () {
  /* Define class needles, properties/updaters and event fields for automated updating */
  var DEFINITIONS = [['data-server-name', 'innerText', 'name'], ['data-count', 'innerText', 'playerCount'], ['data-queue', 'innerText', 'serverQueue'], ['data-slots', 'innerText', 'slots'], ['data-reserved', 'innerText', 'reservedSlots']];
  /* Check if Echo is installed, loaded and instanciated */

  if (window.Echo) {
    /* Get all servers elements */
    var servers = document.getElementsByClassName('server');

    var _iterator = _createForOfIteratorHelper(servers),
        _step;

    try {
      var _loop = function _loop() {
        var server = _step.value;
        Echo.channel("server-status.".concat(server.getAttribute('server-id'))).listen('ServerStatusUpdated', function (event) {
          var _iterator2 = _createForOfIteratorHelper(DEFINITIONS),
              _step2;

          try {
            for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
              var triple = _step2.value;

              var _iterator3 = _createForOfIteratorHelper(server.getElementsByClassName(triple[0])),
                  _step3;

              try {
                for (_iterator3.s(); !(_step3 = _iterator3.n()).done;) {
                  var element = _step3.value;

                  if (isFunction(triple[1])) {
                    triple[1](element, event[triple[2]]);
                  } else {
                    element[triple[1]] = event[triple[2]];
                  }
                }
              } catch (err) {
                _iterator3.e(err);
              } finally {
                _iterator3.f();
              }
            }
          } catch (err) {
            _iterator2.e(err);
          } finally {
            _iterator2.f();
          }

          toggleOnlineVisibility(server, event.online);
        });
      };

      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        _loop();
      }
    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }
  }

  function toggleOnlineVisibility(root) {
    var state = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;

    var _iterator4 = _createForOfIteratorHelper(root.getElementsByClassName('data-show-online')),
        _step4;

    try {
      for (_iterator4.s(); !(_step4 = _iterator4.n()).done;) {
        var element = _step4.value;
        element.classList.toggle('d-none', !state);
      }
    } catch (err) {
      _iterator4.e(err);
    } finally {
      _iterator4.f();
    }

    var _iterator5 = _createForOfIteratorHelper(root.getElementsByClassName('data-show-offline')),
        _step5;

    try {
      for (_iterator5.s(); !(_step5 = _iterator5.n()).done;) {
        var _element = _step5.value;

        _element.classList.toggle('d-none', state);
      }
    } catch (err) {
      _iterator5.e(err);
    } finally {
      _iterator5.f();
    }
  }

  function isFunction(functionToCheck) {
    return functionToCheck && {}.toString.call(functionToCheck) === '[object Function]';
  }
});
/******/ })()
;