(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["article"],{

/***/ "./node_modules/babel-loader/lib/index.js!./node_modules/vue-loader/lib/index.js?!./src/js/components/Article.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib??vue-loader-options!./src/js/components/Article.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n//\n//\n//\n//\n//\n//\n//\n/* harmony default export */ __webpack_exports__[\"default\"] = ({\n  props: ['body']\n});\n\n//# sourceURL=webpack:///./src/js/components/Article.vue?./node_modules/babel-loader/lib!./node_modules/vue-loader/lib??vue-loader-options");

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js!./node_modules/vue-loader/lib/index.js?!./src/js/views/Article.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib??vue-loader-options!./src/js/views/Article.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ \"./node_modules/@babel/runtime/helpers/defineProperty.js\");\n/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);\n\n\nfunction ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }\n\nfunction _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }\n\n//\n//\n//\n//\n//\n//\n//\n//\n//\n//\n//\n//\n/* harmony default export */ __webpack_exports__[\"default\"] = ({\n  data: function data() {\n    return {\n      context: _objectSpread({}, panda)\n    };\n  },\n  created: function created() {\n    this.getFullContext('post-type', 'post', this.$route.params.article_slug);\n  }\n});\n\n//# sourceURL=webpack:///./src/js/views/Article.vue?./node_modules/babel-loader/lib!./node_modules/vue-loader/lib??vue-loader-options");

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./src/js/components/Article.vue?vue&type=template&id=7a3a6c4c&":
/*!****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/js/components/Article.vue?vue&type=template&id=7a3a6c4c& ***!
  \****************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"render\", function() { return render; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"staticRenderFns\", function() { return staticRenderFns; });\nvar render = function () {\n  var _vm = this\n  var _h = _vm.$createElement\n  var _c = _vm._self._c || _h\n  return _c(\n    \"article\",\n    { staticClass: \"padding-1 bg-pri-color white br--small\" },\n    [\n      _c(\"h3\", { staticClass: \"fs-21 w-bold margin-bottom-1\" }, [\n        _vm._v(_vm._s(_vm.body.title)),\n      ]),\n      _vm._v(\" \"),\n      _c(\n        \"router-link\",\n        {\n          staticClass: \"c-button c-button--white\",\n          attrs: { to: _vm.body.link },\n        },\n        [_vm._v(\"Leer más...\")]\n      ),\n    ],\n    1\n  )\n}\nvar staticRenderFns = []\nrender._withStripped = true\n\n\n\n//# sourceURL=webpack:///./src/js/components/Article.vue?./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options");

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./src/js/views/Article.vue?vue&type=template&id=292b6448&":
/*!***********************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/js/views/Article.vue?vue&type=template&id=292b6448& ***!
  \***********************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"render\", function() { return render; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"staticRenderFns\", function() { return staticRenderFns; });\nvar render = function () {\n  var _vm = this\n  var _h = _vm.$createElement\n  var _c = _vm._self._c || _h\n  return _c(\"section\", { staticClass: \"c-section c-section--article\" }, [\n    _c(\"div\", { staticClass: \"grid-container padding-vertical-2\" }, [\n      _c(\"h1\", { staticClass: \"text-center fs-25 w-bold\" }, [\n        _vm._v(_vm._s(_vm.context.post.title)),\n      ]),\n      _vm._v(\" \"),\n      _c(\"figure\", [\n        _c(\"img\", {\n          staticClass: \"width-100 of--contain\",\n          attrs: { src: _vm.context.post.thumbnail.src, alt: \"\" },\n        }),\n      ]),\n      _vm._v(\" \"),\n      _c(\"section\", {\n        domProps: { innerHTML: _vm._s(_vm.context.post.content) },\n      }),\n    ]),\n  ])\n}\nvar staticRenderFns = []\nrender._withStripped = true\n\n\n\n//# sourceURL=webpack:///./src/js/views/Article.vue?./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options");

/***/ }),

/***/ "./src/js/components/Article.vue":
/*!***************************************!*\
  !*** ./src/js/components/Article.vue ***!
  \***************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _Article_vue_vue_type_template_id_7a3a6c4c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Article.vue?vue&type=template&id=7a3a6c4c& */ \"./src/js/components/Article.vue?vue&type=template&id=7a3a6c4c&\");\n/* harmony import */ var _Article_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Article.vue?vue&type=script&lang=js& */ \"./src/js/components/Article.vue?vue&type=script&lang=js&\");\n/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ \"./node_modules/vue-loader/lib/runtime/componentNormalizer.js\");\n\n\n\n\n\n/* normalize component */\n\nvar component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__[\"default\"])(\n  _Article_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__[\"default\"],\n  _Article_vue_vue_type_template_id_7a3a6c4c___WEBPACK_IMPORTED_MODULE_0__[\"render\"],\n  _Article_vue_vue_type_template_id_7a3a6c4c___WEBPACK_IMPORTED_MODULE_0__[\"staticRenderFns\"],\n  false,\n  null,\n  null,\n  null\n  \n)\n\n/* hot reload */\nif (true) {\n  var api = __webpack_require__(/*! ./node_modules/vue-hot-reload-api/dist/index.js */ \"./node_modules/vue-hot-reload-api/dist/index.js\")\n  api.install(__webpack_require__(/*! vue */ \"./node_modules/vue/dist/vue.esm.js\"))\n  if (api.compatible) {\n    module.hot.accept()\n    if (!api.isRecorded('7a3a6c4c')) {\n      api.createRecord('7a3a6c4c', component.options)\n    } else {\n      api.reload('7a3a6c4c', component.options)\n    }\n    module.hot.accept(/*! ./Article.vue?vue&type=template&id=7a3a6c4c& */ \"./src/js/components/Article.vue?vue&type=template&id=7a3a6c4c&\", function(__WEBPACK_OUTDATED_DEPENDENCIES__) { /* harmony import */ _Article_vue_vue_type_template_id_7a3a6c4c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Article.vue?vue&type=template&id=7a3a6c4c& */ \"./src/js/components/Article.vue?vue&type=template&id=7a3a6c4c&\");\n(function () {\n      api.rerender('7a3a6c4c', {\n        render: _Article_vue_vue_type_template_id_7a3a6c4c___WEBPACK_IMPORTED_MODULE_0__[\"render\"],\n        staticRenderFns: _Article_vue_vue_type_template_id_7a3a6c4c___WEBPACK_IMPORTED_MODULE_0__[\"staticRenderFns\"]\n      })\n    })(__WEBPACK_OUTDATED_DEPENDENCIES__); }.bind(this))\n  }\n}\ncomponent.options.__file = \"src/js/components/Article.vue\"\n/* harmony default export */ __webpack_exports__[\"default\"] = (component.exports);\n\n//# sourceURL=webpack:///./src/js/components/Article.vue?");

/***/ }),

/***/ "./src/js/components/Article.vue?vue&type=script&lang=js&":
/*!****************************************************************!*\
  !*** ./src/js/components/Article.vue?vue&type=script&lang=js& ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _node_modules_babel_loader_lib_index_js_node_modules_vue_loader_lib_index_js_vue_loader_options_Article_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib!../../../node_modules/vue-loader/lib??vue-loader-options!./Article.vue?vue&type=script&lang=js& */ \"./node_modules/babel-loader/lib/index.js!./node_modules/vue-loader/lib/index.js?!./src/js/components/Article.vue?vue&type=script&lang=js&\");\n/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__[\"default\"] = (_node_modules_babel_loader_lib_index_js_node_modules_vue_loader_lib_index_js_vue_loader_options_Article_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__[\"default\"]); \n\n//# sourceURL=webpack:///./src/js/components/Article.vue?");

/***/ }),

/***/ "./src/js/components/Article.vue?vue&type=template&id=7a3a6c4c&":
/*!**********************************************************************!*\
  !*** ./src/js/components/Article.vue?vue&type=template&id=7a3a6c4c& ***!
  \**********************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Article_vue_vue_type_template_id_7a3a6c4c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Article.vue?vue&type=template&id=7a3a6c4c& */ \"./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./src/js/components/Article.vue?vue&type=template&id=7a3a6c4c&\");\n/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, \"render\", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Article_vue_vue_type_template_id_7a3a6c4c___WEBPACK_IMPORTED_MODULE_0__[\"render\"]; });\n\n/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, \"staticRenderFns\", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Article_vue_vue_type_template_id_7a3a6c4c___WEBPACK_IMPORTED_MODULE_0__[\"staticRenderFns\"]; });\n\n\n\n//# sourceURL=webpack:///./src/js/components/Article.vue?");

/***/ }),

/***/ "./src/js/views/Article.vue":
/*!**********************************!*\
  !*** ./src/js/views/Article.vue ***!
  \**********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _Article_vue_vue_type_template_id_292b6448___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Article.vue?vue&type=template&id=292b6448& */ \"./src/js/views/Article.vue?vue&type=template&id=292b6448&\");\n/* harmony import */ var _Article_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Article.vue?vue&type=script&lang=js& */ \"./src/js/views/Article.vue?vue&type=script&lang=js&\");\n/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ \"./node_modules/vue-loader/lib/runtime/componentNormalizer.js\");\n\n\n\n\n\n/* normalize component */\n\nvar component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__[\"default\"])(\n  _Article_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__[\"default\"],\n  _Article_vue_vue_type_template_id_292b6448___WEBPACK_IMPORTED_MODULE_0__[\"render\"],\n  _Article_vue_vue_type_template_id_292b6448___WEBPACK_IMPORTED_MODULE_0__[\"staticRenderFns\"],\n  false,\n  null,\n  null,\n  null\n  \n)\n\n/* hot reload */\nif (true) {\n  var api = __webpack_require__(/*! ./node_modules/vue-hot-reload-api/dist/index.js */ \"./node_modules/vue-hot-reload-api/dist/index.js\")\n  api.install(__webpack_require__(/*! vue */ \"./node_modules/vue/dist/vue.esm.js\"))\n  if (api.compatible) {\n    module.hot.accept()\n    if (!api.isRecorded('292b6448')) {\n      api.createRecord('292b6448', component.options)\n    } else {\n      api.reload('292b6448', component.options)\n    }\n    module.hot.accept(/*! ./Article.vue?vue&type=template&id=292b6448& */ \"./src/js/views/Article.vue?vue&type=template&id=292b6448&\", function(__WEBPACK_OUTDATED_DEPENDENCIES__) { /* harmony import */ _Article_vue_vue_type_template_id_292b6448___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Article.vue?vue&type=template&id=292b6448& */ \"./src/js/views/Article.vue?vue&type=template&id=292b6448&\");\n(function () {\n      api.rerender('292b6448', {\n        render: _Article_vue_vue_type_template_id_292b6448___WEBPACK_IMPORTED_MODULE_0__[\"render\"],\n        staticRenderFns: _Article_vue_vue_type_template_id_292b6448___WEBPACK_IMPORTED_MODULE_0__[\"staticRenderFns\"]\n      })\n    })(__WEBPACK_OUTDATED_DEPENDENCIES__); }.bind(this))\n  }\n}\ncomponent.options.__file = \"src/js/views/Article.vue\"\n/* harmony default export */ __webpack_exports__[\"default\"] = (component.exports);\n\n//# sourceURL=webpack:///./src/js/views/Article.vue?");

/***/ }),

/***/ "./src/js/views/Article.vue?vue&type=script&lang=js&":
/*!***********************************************************!*\
  !*** ./src/js/views/Article.vue?vue&type=script&lang=js& ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _node_modules_babel_loader_lib_index_js_node_modules_vue_loader_lib_index_js_vue_loader_options_Article_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib!../../../node_modules/vue-loader/lib??vue-loader-options!./Article.vue?vue&type=script&lang=js& */ \"./node_modules/babel-loader/lib/index.js!./node_modules/vue-loader/lib/index.js?!./src/js/views/Article.vue?vue&type=script&lang=js&\");\n/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__[\"default\"] = (_node_modules_babel_loader_lib_index_js_node_modules_vue_loader_lib_index_js_vue_loader_options_Article_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__[\"default\"]); \n\n//# sourceURL=webpack:///./src/js/views/Article.vue?");

/***/ }),

/***/ "./src/js/views/Article.vue?vue&type=template&id=292b6448&":
/*!*****************************************************************!*\
  !*** ./src/js/views/Article.vue?vue&type=template&id=292b6448& ***!
  \*****************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Article_vue_vue_type_template_id_292b6448___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Article.vue?vue&type=template&id=292b6448& */ \"./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./src/js/views/Article.vue?vue&type=template&id=292b6448&\");\n/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, \"render\", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Article_vue_vue_type_template_id_292b6448___WEBPACK_IMPORTED_MODULE_0__[\"render\"]; });\n\n/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, \"staticRenderFns\", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Article_vue_vue_type_template_id_292b6448___WEBPACK_IMPORTED_MODULE_0__[\"staticRenderFns\"]; });\n\n\n\n//# sourceURL=webpack:///./src/js/views/Article.vue?");

/***/ })

}]);