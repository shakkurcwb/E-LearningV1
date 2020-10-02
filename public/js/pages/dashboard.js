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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/laravel/pages/dashboard.js":
/*!********************************************************!*\
  !*** ./resources/assets/js/laravel/pages/dashboard.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}
/*
 *  Document   : be_pages_dashboard.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Dashboard Page
 */


var pageDashboard =
/*#__PURE__*/
function () {
  function pageDashboard() {
    _classCallCheck(this, pageDashboard);
  }

  _createClass(pageDashboard, null, [{
    key: "initCharts",

    /*
     * Chart.js, for more examples you can check out http://www.chartjs.org/docs
     *
     */
    value: function initCharts() {
      // Set Global Chart.js configuration
      Chart.defaults.global.defaultFontColor = '#495057';
      Chart.defaults.scale.gridLines.color = 'transparent';
      Chart.defaults.scale.gridLines.zeroLineColor = 'transparent';
      Chart.defaults.scale.display = false;
      Chart.defaults.scale.ticks.beginAtZero = true;
      Chart.defaults.global.elements.line.borderWidth = 0;
      Chart.defaults.global.elements.point.radius = 0;
      Chart.defaults.global.elements.point.hoverRadius = 0;
      Chart.defaults.global.tooltips.cornerRadius = 3;
      Chart.defaults.global.legend.labels.boxWidth = 12; // Get Chart Containers

      var chartEarningsCon = jQuery('.js-chartjs-dashboard-earnings');
      var chartSalesCon = jQuery('.js-chartjs-dashboard-sales'); // Set Chart Variables

      var chartEarnings, chartEarningsOptions, chartEarningsData, chartSales, chartSalesOptions, chartSalesData; // Earnigns Chart Options

      chartEarningsOptions = {
        maintainAspectRatio: false,
        scales: {
          yAxes: [{
            ticks: {
              suggestedMax: 3000
            }
          }]
        },
        tooltips: {
          intersect: false,
          callbacks: {
            label: function label(tooltipItems, data) {
              return ' $' + tooltipItems.yLabel;
            }
          }
        }
      }; // Earnigns Chart Options

      chartSalesOptions = {
        maintainAspectRatio: false,
        scales: {
          yAxes: [{
            ticks: {
              suggestedMax: 260
            }
          }]
        },
        tooltips: {
          intersect: false,
          callbacks: {
            label: function label(tooltipItems, data) {
              return ' ' + tooltipItems.yLabel + ' Sales';
            }
          }
        }
      }; // Earnings Chart Data

      chartEarningsData = {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
        datasets: [{
          label: 'This Year',
          fill: true,
          backgroundColor: 'rgba(132, 94, 247, .3)',
          borderColor: 'transparent',
          pointBackgroundColor: 'rgba(132, 94, 247, 1)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgba(132, 94, 247, 1)',
          data: [2150, 1350, 1560, 980, 1260, 1720, 1115, 1690, 1870, 2420, 2100, 2730]
        }, {
          label: 'Last Year',
          fill: true,
          backgroundColor: 'rgba(233, 236, 239, 1)',
          borderColor: 'transparent',
          pointBackgroundColor: 'rgba(233, 236, 239, 1)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgba(233, 236, 239, 1)',
          data: [2200, 1700, 1100, 1900, 1680, 2560, 1340, 1450, 2000, 2500, 1550, 1880]
        }]
      }; // Sales Chart Data

      chartSalesData = {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
        datasets: [{
          label: 'This Year',
          fill: true,
          backgroundColor: 'rgba(34, 184, 207, .3)',
          borderColor: 'transparent',
          pointBackgroundColor: 'rgba(34, 184, 207, 1)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgba(34, 184, 207, 1)',
          data: [175, 120, 169, 82, 135, 169, 132, 130, 192, 230, 215, 260]
        }, {
          label: 'Last Year',
          fill: true,
          backgroundColor: 'rgba(233, 236, 239, 1)',
          borderColor: 'transparent',
          pointBackgroundColor: 'rgba(233, 236, 239, 1)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgba(233, 236, 239, 1)',
          data: [220, 170, 110, 215, 168, 227, 154, 135, 210, 240, 145, 178]
        }]
      }; // Init Earnings Chart

      if (chartEarningsCon.length) {
        chartEarnings = new Chart(chartEarningsCon, {
          type: 'line',
          data: chartEarningsData,
          options: chartEarningsOptions
        });
      } // Init Sales Chart


      if (chartSalesCon.length) {
        chartSales = new Chart(chartSalesCon, {
          type: 'line',
          data: chartSalesData,
          options: chartSalesOptions
        });
      }
    }
    /*
     * Init functionality
     *
     */

  }, {
    key: "init",
    value: function init() {
      this.initCharts();
    }
  }]);

  return pageDashboard;
}(); // Initialize when page loads


jQuery(function () {
  pageDashboard.init();
});

/***/ }),

/***/ 3:
/*!**************************************************************!*\
  !*** multi ./resources/assets/js/laravel/pages/dashboard.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Admin\Desktop\Coding\__OLD\Fala\resources\assets\js\laravel\pages\dashboard.js */"./resources/assets/js/laravel/pages/dashboard.js");


/***/ })

/******/ });