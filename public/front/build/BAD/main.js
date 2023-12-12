webpackJsonp([44],[
/* 0 */,
/* 1 */,
/* 2 */,
/* 3 */,
/* 4 */,
/* 5 */,
/* 6 */,
/* 7 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__eventManager_module__ = __webpack_require__(340);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "f", function() { return __WEBPACK_IMPORTED_MODULE_0__eventManager_module__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__eventManager_service__ = __webpack_require__(106);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "g", function() { return __WEBPACK_IMPORTED_MODULE_1__eventManager_service__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__models_ecommerceEvent__ = __webpack_require__(20);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "e", function() { return __WEBPACK_IMPORTED_MODULE_2__models_ecommerceEvent__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__models_customEvent__ = __webpack_require__(208);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return __WEBPACK_IMPORTED_MODULE_3__models_customEvent__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__models_mjEvent__ = __webpack_require__(107);
/* unused harmony reexport MJEvent */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__models_productImpression__ = __webpack_require__(209);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "j", function() { return __WEBPACK_IMPORTED_MODULE_5__models_productImpression__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__models_productClick__ = __webpack_require__(342);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "i", function() { return __WEBPACK_IMPORTED_MODULE_6__models_productClick__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__models_productView__ = __webpack_require__(343);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "k", function() { return __WEBPACK_IMPORTED_MODULE_7__models_productView__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__models_addToCart__ = __webpack_require__(344);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_8__models_addToCart__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__models_removeFromCart__ = __webpack_require__(345);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "m", function() { return __WEBPACK_IMPORTED_MODULE_9__models_removeFromCart__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__models_promotionImpression__ = __webpack_require__(346);
/* unused harmony reexport PromotionImpression */
/* unused harmony reexport ProductImpressionModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__models_promotionClick__ = __webpack_require__(210);
/* unused harmony reexport PromotionClick */
/* unused harmony reexport PromotionClickModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__models_checkout__ = __webpack_require__(347);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return __WEBPACK_IMPORTED_MODULE_12__models_checkout__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_13__models_purchase__ = __webpack_require__(348);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "l", function() { return __WEBPACK_IMPORTED_MODULE_13__models_purchase__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_14__models_customEventModel__ = __webpack_require__(207);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "d", function() { return __WEBPACK_IMPORTED_MODULE_14__models_customEventModel__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_15__enums_eventType__ = __webpack_require__(16);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "h", function() { return __WEBPACK_IMPORTED_MODULE_15__enums_eventType__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_16__models_virtualPageView__ = __webpack_require__(349);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "n", function() { return __WEBPACK_IMPORTED_MODULE_16__models_virtualPageView__["a"]; });



















//# sourceMappingURL=index.js.map

/***/ }),
/* 8 */,
/* 9 */,
/* 10 */,
/* 11 */,
/* 12 */,
/* 13 */,
/* 14 */,
/* 15 */,
/* 16 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return EventType; });
var EventType;
(function (EventType) {
    EventType[EventType["productImpression"] = 0] = "productImpression";
    EventType[EventType["productClick"] = 1] = "productClick";
    EventType[EventType["productView"] = 2] = "productView";
    EventType[EventType["addToCart"] = 3] = "addToCart";
    EventType[EventType["removeFromCart"] = 4] = "removeFromCart";
    EventType[EventType["checkout"] = 5] = "checkout";
    EventType[EventType["purchase"] = 6] = "purchase";
    EventType[EventType["promotionImpression"] = 7] = "promotionImpression";
    EventType[EventType["promotionClick"] = 8] = "promotionClick";
    EventType[EventType["customEvent"] = 9] = "customEvent";
    EventType[EventType["virtualPageView"] = 10] = "virtualPageView";
})(EventType || (EventType = {}));
//# sourceMappingURL=eventType.js.map

/***/ }),
/* 17 */,
/* 18 */,
/* 19 */,
/* 20 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return EcommerceEvent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__mjEvent__ = __webpack_require__(107);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();


/**
 * Global class for ecommerce events
 */
var EcommerceEvent = (function (_super) {
    __extends(EcommerceEvent, _super);
    function EcommerceEvent() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    EcommerceEvent.prototype.isValid = function () { };
    EcommerceEvent.prototype.getJson = function () { };
    EcommerceEvent.prototype.getEventType = function () { return __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].customEvent; };
    EcommerceEvent.prototype.fromMJEvent = function (event) { };
    return EcommerceEvent;
}(__WEBPACK_IMPORTED_MODULE_0__mjEvent__["a" /* MJEvent */]));

//# sourceMappingURL=ecommerceEvent.js.map

/***/ }),
/* 21 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__config_module__ = __webpack_require__(317);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_0__config_module__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__config__ = __webpack_require__(196);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return __WEBPACK_IMPORTED_MODULE_1__config__["a"]; });


//# sourceMappingURL=index.js.map

/***/ }),
/* 22 */,
/* 23 */,
/* 24 */,
/* 25 */,
/* 26 */,
/* 27 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__core_services_module__ = __webpack_require__(316);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "e", function() { return __WEBPACK_IMPORTED_MODULE_0__core_services_module__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__api_service__ = __webpack_require__(332);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_1__api_service__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__service_helper__ = __webpack_require__(105);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "f", function() { return __WEBPACK_IMPORTED_MODULE_2__service_helper__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__session_handler__ = __webpack_require__(202);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "g", function() { return __WEBPACK_IMPORTED_MODULE_3__session_handler__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__entities__ = __webpack_require__(203);
/* unused harmony reexport Auth */
/* unused harmony reexport Token */
/* unused harmony reexport Session */
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "h", function() { return __WEBPACK_IMPORTED_MODULE_4__entities__["d"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__authentication_service__ = __webpack_require__(204);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return __WEBPACK_IMPORTED_MODULE_5__authentication_service__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__config__ = __webpack_require__(60);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "d", function() { return __WEBPACK_IMPORTED_MODULE_6__config__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__app_update_service__ = __webpack_require__(337);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return __WEBPACK_IMPORTED_MODULE_7__app_update_service__["a"]; });








//# sourceMappingURL=index.js.map

/***/ }),
/* 28 */,
/* 29 */,
/* 30 */,
/* 31 */,
/* 32 */,
/* 33 */,
/* 34 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__orion_context_module__ = __webpack_require__(325);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "g", function() { return __WEBPACK_IMPORTED_MODULE_0__orion_context_module__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__error__ = __webpack_require__(137);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return __WEBPACK_IMPORTED_MODULE_1__error__["a"]; });
/* unused harmony reexport GException */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__location__ = __webpack_require__(327);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return __WEBPACK_IMPORTED_MODULE_2__location__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__locationdetails__ = __webpack_require__(201);
/* unused harmony reexport PostalDetails */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__order_mode__ = __webpack_require__(138);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "e", function() { return __WEBPACK_IMPORTED_MODULE_4__order_mode__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__payload__ = __webpack_require__(136);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "h", function() { return __WEBPACK_IMPORTED_MODULE_5__payload__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__orion_context__ = __webpack_require__(198);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "f", function() { return __WEBPACK_IMPORTED_MODULE_6__orion_context__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__store__ = __webpack_require__(329);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "i", function() { return __WEBPACK_IMPORTED_MODULE_7__store__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__slot__ = __webpack_require__(330);
/* unused harmony reexport Slot */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__cart_summary__ = __webpack_require__(331);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_9__cart_summary__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__location_channel__ = __webpack_require__(200);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "d", function() { return __WEBPACK_IMPORTED_MODULE_10__location_channel__["a"]; });











//# sourceMappingURL=index.js.map

/***/ }),
/* 35 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__common_module__ = __webpack_require__(318);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return __WEBPACK_IMPORTED_MODULE_0__common_module__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__commons__ = __webpack_require__(197);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_1__commons__["a"]; });


//# sourceMappingURL=index.js.map

/***/ }),
/* 36 */,
/* 37 */,
/* 38 */,
/* 39 */,
/* 40 */,
/* 41 */,
/* 42 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__seo_module__ = __webpack_require__(315);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return __WEBPACK_IMPORTED_MODULE_0__seo_module__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__seo_service__ = __webpack_require__(338);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "e", function() { return __WEBPACK_IMPORTED_MODULE_1__seo_service__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__seo_controller__ = __webpack_require__(59);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return __WEBPACK_IMPORTED_MODULE_2__seo_controller__["b"]; });
/* unused harmony reexport ISeo */
/* unused harmony reexport IPixels */
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "d", function() { return __WEBPACK_IMPORTED_MODULE_2__seo_controller__["c"]; });
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_2__seo_controller__["a"]; });






//# sourceMappingURL=index.js.map

/***/ }),
/* 43 */,
/* 44 */,
/* 45 */,
/* 46 */,
/* 47 */,
/* 48 */,
/* 49 */,
/* 50 */,
/* 51 */,
/* 52 */,
/* 53 */,
/* 54 */,
/* 55 */,
/* 56 */,
/* 57 */,
/* 58 */,
/* 59 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return SeoController; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return SeoPageDetails; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return PixelPageDetails; });
/* unused harmony export ISeo */
/* unused harmony export IPixels */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__martjack_ng_seo__ = __webpack_require__(42);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_ionic_angular__ = __webpack_require__(13);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__ngx_meta_core__ = __webpack_require__(205);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_Observable__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_Observable___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_4_rxjs_Observable__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__config_constants__ = __webpack_require__(206);
/**
 * Author: Kishore
 * To implement SEO in your page:
 *     1. import SeoController and SeoPageDetails from seo module
 *     2. Implement the ISeo Interface on your main class
 *     3. return your page information as SeoPageDetails model from the interface
 *        implementation
 *
 * Consists of three classes
 *     1. SeoController Injectable
 *     2. Iseo Interface and SeoPageDetails model to be returned from the page
 */
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};






var SeoController = (function () {
    function SeoController(seo, app, meta) {
        var _this = this;
        this.seo = seo;
        this.app = app;
        this.meta = meta;
        this.app.viewDidEnter.subscribe(function (view) {
            if (typeof view.instance.getSEODetails === 'function') {
                var seoDetails = view.instance.getSEODetails();
                _this.setSeoInfo(seoDetails.pageName, seoDetails.pageType);
            }
            if (typeof view.instance.getPixelDetails === 'function') {
                var pixelDetails = view.instance.getPixelDetails();
                _this.setPixel(pixelDetails.pageName, pixelDetails.params);
            }
        });
    }
    SeoController.prototype.setSeoInfo = function (pageName, pageType) {
        var _this = this;
        this.seo.getSeo(pageName, pageType)
            .map(function (res) {
            if (Array.isArray(res.response) && res.response.length > 0) {
                return res.response[0];
            }
            return res.response;
        })
            .subscribe(function (seoInfo) {
            if (!seoInfo || !seoInfo.tags || !(Array.isArray(seoInfo.tags)) || seoInfo.tags.length == 0) {
                return;
            }
            seoInfo.tags.map(function (key) {
                if (key === 'title') {
                    _this.meta.setTitle(seoInfo['title']);
                }
                else {
                    _this.meta.setTag(key, seoInfo[key]);
                }
            });
        }, function (err) {
            _this.errorObservable(__WEBPACK_IMPORTED_MODULE_5__config_constants__["h" /* SET_ERROR */]);
        });
    };
    SeoController.prototype.setPixel = function (pageName, params) {
        var _this = this;
        this.seo.setPixels(pageName, params)
            .map(function (res) { res; })
            .subscribe(function (pixelInfo) {
            console.log(pixelInfo);
        }, function (err) {
            _this.errorObservable(__WEBPACK_IMPORTED_MODULE_5__config_constants__["h" /* SET_ERROR */]);
        });
    };
    SeoController.prototype.errorObservable = function (error) {
        throw __WEBPACK_IMPORTED_MODULE_4_rxjs_Observable__["Observable"].throw(error);
    };
    SeoController = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__martjack_ng_seo__["e" /* SeoService */],
            __WEBPACK_IMPORTED_MODULE_2_ionic_angular__["b" /* App */],
            __WEBPACK_IMPORTED_MODULE_3__ngx_meta_core__["b" /* MetaService */]])
    ], SeoController);
    return SeoController;
}());

var SeoPageDetails = (function () {
    function SeoPageDetails(pageName, pageType) {
        if (pageType === void 0) { pageType = 'static'; }
        this.pageName = pageName;
        this.pageType = pageType;
    }
    return SeoPageDetails;
}());

var PixelPageDetails = (function () {
    function PixelPageDetails(pageName, params) {
        this.pageName = pageName;
        this.params = params;
    }
    return PixelPageDetails;
}());

var ISeo = (function () {
    function ISeo() {
    }
    return ISeo;
}());

var IPixels = (function () {
    function IPixels() {
    }
    return IPixels;
}());

//# sourceMappingURL=seo-controller.js.map

/***/ }),
/* 60 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ConfigConstants; });
/*
 * @Author: PV(confused)
 * @Date: 2017-12-06 15:11:51
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2017-12-19 19:43:54
 */
var ConfigConstants = (function () {
    function ConfigConstants() {
    }
    ConfigConstants.BASE_URL = 'baseUrl';
    ConfigConstants.PUBLIC_KEY_STORAGE_KEY = "publicKey";
    ConfigConstants.AUTH_TOKEN_URL = '/authentication/authToken';
    ConfigConstants.VALIDATE_TOKEN_URL = '/authentication/validate';
    ConfigConstants.ACCESS_TOKEN_URL = '/authentication/accessToken';
    ConfigConstants.AUTH_TOKEN_EXPIRY_TIME_KEY = 'auth_token_expiry_time';
    ConfigConstants.ACCESS_TOKEN_EXPIRY_TIME_KEY = 'access_token_expiry_time';
    ConfigConstants.APP_DETAILS_URL = '/appDetails/getAppDetail';
    //errors
    ConfigConstants.AUTH_TOKEN_ERROR = 'Auth Token Could Not Be Set';
    ConfigConstants.ACCESS_TOKEN_ERROR = 'Access Token Could Not Be Set';
    //global keys, move to ng-config
    ConfigConstants.DOMAIN = 'merchant_id';
    ConfigConstants.MERCHANT_ID = 'merchant_id';
    ConfigConstants.USER_ID = 'user_Id';
    ConfigConstants.DEFAULT_LANGUAGE = 'language';
    return ConfigConstants;
}());

//# sourceMappingURL=config.js.map

/***/ }),
/* 61 */,
/* 62 */,
/* 63 */,
/* 64 */,
/* 65 */,
/* 66 */,
/* 67 */,
/* 68 */,
/* 69 */,
/* 70 */,
/* 71 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__alert_services_module__ = __webpack_require__(339);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_0__alert_services_module__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__alert_services__ = __webpack_require__(134);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return __WEBPACK_IMPORTED_MODULE_1__alert_services__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__alert_options__ = __webpack_require__(259);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return __WEBPACK_IMPORTED_MODULE_2__alert_options__["a"]; });



//# sourceMappingURL=index.js.map

/***/ }),
/* 72 */,
/* 73 */,
/* 74 */,
/* 75 */,
/* 76 */,
/* 77 */,
/* 78 */,
/* 79 */,
/* 80 */,
/* 81 */,
/* 82 */,
/* 83 */,
/* 84 */,
/* 85 */,
/* 86 */,
/* 87 */,
/* 88 */,
/* 89 */,
/* 90 */,
/* 91 */,
/* 92 */,
/* 93 */,
/* 94 */,
/* 95 */,
/* 96 */,
/* 97 */,
/* 98 */,
/* 99 */,
/* 100 */,
/* 101 */,
/* 102 */,
/* 103 */,
/* 104 */,
/* 105 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ServiceHelper; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_http__ = __webpack_require__(39);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
/*
 * @Author: PV(confused)
 * @Date: 2016-12-29 14:26:57
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2017-12-27 19:35:40
 */



var ServiceHelper = (function () {
    function ServiceHelper() {
    }
    ServiceHelper.prototype.setDomainName = function (domain) {
        this.domain = domain;
    };
    ServiceHelper.prototype.setAccessToken = function (token) {
        this.accessToken = token;
    };
    ServiceHelper.prototype.setAuthToken = function (token) {
        this.authToken = token;
    };
    ServiceHelper.prototype.setUserID = function (userID) {
        this.userID = userID;
    };
    ServiceHelper.prototype.setLanguageCode = function (language) {
        this.language = language;
    };
    ServiceHelper.prototype.getLanguageCode = function () {
        return this.language;
    };
    /**
     * this will be saved in localstorage after login
     */
    ServiceHelper.prototype.getApiUrl = function () {
        return this.domain;
    };
    ServiceHelper.prototype.getHeaders = function (headerOptions) {
        if (headerOptions == null || typeof headerOptions == 'undefined') {
            headerOptions = new Map();
        }
        var headers = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["a" /* Headers */]({
            'userId': this.userID,
            'authtoken': this.authToken,
            'accesstoken': this.accessToken,
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + this.accessToken
        });
        /**
         * in case language is provided by the application
         */
        if (this.language) {
            console.log("setting language header", this.language);
            headers.set("language", this.language);
        }
        if (headerOptions != null && typeof headerOptions != 'undefined') {
            headerOptions.forEach(function (value, key) {
                headers.set(key, value);
            });
        }
        console.log("header = ", headers);
        var options = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["d" /* RequestOptions */]({ headers: headers });
        return options;
    };
    ServiceHelper.prototype.getQueryParams = function (queryParams) {
        var params = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["e" /* URLSearchParams */]();
        if (queryParams != null && typeof queryParams != 'undefined') {
            queryParams.forEach(function (v, k) {
                params.set(k, v);
            });
        }
        if (this.language) {
            console.log("setting language query param", this.language);
            params.set("languagecode", this.language);
            params.set("languageCode", this.language);
        }
        return params;
    };
    ServiceHelper.prototype.getMerchantID = function () {
        return this.merchantID;
    };
    ServiceHelper.prototype.setOrgID = function (merchantID) {
        this.merchantID = merchantID;
    };
    ServiceHelper.getAccessTokenParams = function () {
        var params = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["e" /* URLSearchParams */]();
        return params;
    };
    ServiceHelper = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [])
    ], ServiceHelper);
    return ServiceHelper;
}());

//# sourceMappingURL=service-helper.js.map

/***/ }),
/* 106 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return EventManagerService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_rxjs_BehaviorSubject__ = __webpack_require__(141);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_rxjs_BehaviorSubject___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_rxjs_BehaviorSubject__);
/**
 * Author - Yogesh Mayacharya
 * Module for global event management implementation
 * Publish events to different event managers/tag managers
*/
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var EventManagerService = (function () {
    function EventManagerService() {
        this._events = new __WEBPACK_IMPORTED_MODULE_1_rxjs_BehaviorSubject__["BehaviorSubject"](null);
    }
    /**
     * Get events object of type BehaviorSubject<MJEvent>
     */
    EventManagerService.prototype.getSubscription = function () {
        if (!this._events) {
            this._events = new __WEBPACK_IMPORTED_MODULE_1_rxjs_BehaviorSubject__["BehaviorSubject"](null);
        }
        return this._events;
    };
    /**
     * Publish event to tag manager event listeners,
     * respective tag manager services will take care handling the event
     * @param event : MJEvent
     */
    EventManagerService.prototype.pushEvent = function (mjEvent) {
        if (!this._events) {
            this._events = new __WEBPACK_IMPORTED_MODULE_1_rxjs_BehaviorSubject__["BehaviorSubject"](null);
        }
        if (!mjEvent) {
            this._log("Invalid event in event manager service");
            return;
        }
        if (!mjEvent.isValid()) {
            this._log("Invalid event in event manager service");
            return;
        }
        this._events.next(mjEvent);
    };
    /**
     * Log messages to console
     * @param message : string
     */
    EventManagerService.prototype._log = function (message) {
        console.log(message);
    };
    EventManagerService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [])
    ], EventManagerService);
    return EventManagerService;
}());

//# sourceMappingURL=eventManager.service.js.map

/***/ }),
/* 107 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return MJEvent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
/**
 * Global class for any Event
 * Every event should exted this class
 */

var MJEvent = (function () {
    function MJEvent() {
    }
    MJEvent.prototype.isValid = function () { };
    MJEvent.prototype.getJson = function () { };
    MJEvent.prototype.getEventType = function () { return __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["h" /* EventType */].customEvent; };
    MJEvent.prototype.fromMJEvent = function (event) { };
    return MJEvent;
}());

//# sourceMappingURL=mjEvent.js.map

/***/ }),
/* 108 */,
/* 109 */,
/* 110 */,
/* 111 */,
/* 112 */,
/* 113 */,
/* 114 */,
/* 115 */,
/* 116 */,
/* 117 */,
/* 118 */,
/* 119 */,
/* 120 */,
/* 121 */,
/* 122 */,
/* 123 */,
/* 124 */,
/* 125 */,
/* 126 */,
/* 127 */,
/* 128 */,
/* 129 */,
/* 130 */,
/* 131 */,
/* 132 */,
/* 133 */,
/* 134 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AlertService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(13);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__martjack_ng_config__ = __webpack_require__(21);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__ngx_translate_core__ = __webpack_require__(57);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_observable_forkJoin__ = __webpack_require__(133);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_observable_forkJoin___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_4_rxjs_observable_forkJoin__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__martjack_ng_core_service__ = __webpack_require__(27);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6_rxjs_Observable__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6_rxjs_Observable___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_6_rxjs_Observable__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__martjack_ng_context__ = __webpack_require__(34);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
/*
 * @Author: PV(confused)
 * @Date: 2018-01-03 13:19:41
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2018-03-09 18:38:36
 */








var AlertService = (function () {
    function AlertService(loadingCtrl, alertCtrl, toastCtrl, config, api, _translate, context) {
        this.loadingCtrl = loadingCtrl;
        this.alertCtrl = alertCtrl;
        this.toastCtrl = toastCtrl;
        this.config = config;
        this.api = api;
        this._translate = _translate;
        this.context = context;
        this.errorObj = null;
        this.forceDismiss = false;
    }
    AlertService.prototype.init = function () {
        this.alertPoperties = this.config.get("alert");
        this.className = this.alertPoperties["class"];
        this.toastPosition = this.alertPoperties["toastPosition"];
        // window['isUpdateAvailable']
        // .then(isAvailable => {
        //     if (isAvailable) {
        //         const toast = this.toastCtrl.create({
        //             message: 'New Update available! Reload the webapp to see the latest juicy changes.',
        //             position: 'bottom',
        //             showCloseButton: true,
        //         });
        //         toast.present();
        //     }
        // });
    };
    AlertService.prototype.startLoading = function () {
        var _this = this;
        this.init();
        var className = this.className;
        this.context.payload.subscribe(function (payload) {
            if (_this.alertPoperties["order-mode"]) {
                className = _this.alertPoperties["order-mode"][payload.orderMode];
            }
            if (_this.loading)
                return;
            var customLoading = "<div class=" + className + "></div>";
            _this.loading = _this.loadingCtrl.create({
                spinner: 'hide',
                content: customLoading,
            });
            _this.loading.onDidDismiss(function () {
                console.log('Dismissed loading');
            });
            _this.loading.present().catch();
        });
    };
    AlertService.prototype.stopLoading = function () {
        if (this.loading && (typeof this.loading.dismiss === 'function')) {
            this.loading.dismiss().catch();
            this.loading = null;
        }
    };
    /**
     * @param option
     * @param classRef
     * @param params
     * @param cancelCallback
     */
    AlertService.prototype.showConfirm = function (option, classRef, params, cancelCallback) {
        var _this = this;
        Object(__WEBPACK_IMPORTED_MODULE_4_rxjs_observable_forkJoin__["forkJoin"])(this._translate.get(option.title), this._translate.get(option.message)).subscribe(function (response) {
            var alert = _this.alertCtrl.create({
                title: response[0],
                message: response[1],
                cssClass: option.cssClass,
                buttons: [
                    {
                        text: option.dismissName,
                        role: 'cancel',
                        cssClass: option.dismissClass,
                        handler: function () {
                            console.log('Cancel clicked');
                            if (params == 'checkForCancel') {
                                classRef.clickedCancel(params);
                            }
                            if (cancelCallback) {
                                cancelCallback(classRef);
                            }
                        }
                    },
                    {
                        text: option.okName,
                        cssClass: option.okClass,
                        handler: function () {
                            classRef.doProcess(params);
                        }
                    }
                ]
            });
            alert.present();
        });
    };
    AlertService.prototype.showAlert = function (option, classRef, params, enableBackdropDismiss, closeAlert) {
        var _this = this;
        if (enableBackdropDismiss === void 0) { enableBackdropDismiss = true; }
        if (closeAlert === void 0) { closeAlert = true; }
        Object(__WEBPACK_IMPORTED_MODULE_4_rxjs_observable_forkJoin__["forkJoin"])(this._translate.get(option.title), this._translate.get(option.message)).subscribe(function (response) {
            var alert = _this.alertCtrl.create({
                title: response[0],
                subTitle: response[1],
                buttons: [
                    {
                        text: option.dismissName,
                        handler: function () {
                            if (!classRef) {
                                return closeAlert;
                            }
                            classRef.doProcess(params);
                            return closeAlert;
                        }
                    }
                ],
                enableBackdropDismiss: enableBackdropDismiss
            });
            alert.present().catch();
            return;
        });
    };
    /**
     * {
     * "message"
     * "position"
     * "preprendText"
     * "closeButton"
     * "closeButtonText"
     * "cssClass"
     * "duration"
     * "classRef: any"
     * }
     * @param obj
     */
    AlertService.prototype.presentToastBetter = function (obj) {
        var position = (obj.position ? obj.position : "top");
        var closeButton = (obj.closeButton ? obj.closeButton : false);
        var preprendText = (obj.preprendText ? obj.preprendText : '');
        var duration = (obj.duration ? obj.duration : 3000);
        var cssClass = (obj.cssClass ? obj.cssClass : '');
        var classRef = (obj.classRef ? obj.classRef : '');
        this.presentToast(obj.message, closeButton, obj.closeButtonText, position, preprendText, cssClass, duration, classRef);
    };
    AlertService.prototype.presentToast = function (msg, closeButton, text, position, preprendText, cssClass, duration, classRef) {
        var _this = this;
        if (closeButton === void 0) { closeButton = false; }
        if (text === void 0) { text = "Ok"; }
        if (position === void 0) { position = 'top'; }
        if (preprendText === void 0) { preprendText = ''; }
        if (cssClass === void 0) { cssClass = ''; }
        if (duration === void 0) { duration = 3000; }
        this._translate.get(msg).subscribe(function (translatedMessage) {
            var toastOption = {
                message: preprendText + translatedMessage,
                position: position,
                cssClass: cssClass
            };
            toastOption.duration = duration;
            if (closeButton) {
                toastOption.cssClass += " white-color";
                toastOption.showCloseButton = closeButton;
                toastOption.closeButtonText = text;
            }
            var time = Date.now();
            _this.toast = _this.toastCtrl.create(toastOption);
            _this.toast.present().catch();
            _this.toast.onDidDismiss(function () {
                var time2 = Date.now();
                console.log("doToastAction called");
                if (time2 - time - duration < 0 && classRef) {
                    if (!_this.forceDismiss)
                        classRef.doToastAction();
                }
            });
        });
    };
    AlertService.prototype.handleError = function (errorCode, context, fallBackCode) {
        var _this = this;
        this.getErrorObj()
            .subscribe(function (res) {
            _this.errorObj = res;
            var errorObj = res.errors[errorCode];
            if (!errorObj || (errorObj && !errorObj.action)) {
                console.error(" Error code not present : " + errorCode);
                _this.presentToast('Please try again later!!!');
                return;
            }
            switch (errorObj.action) {
                case 'toast':
                    var toastOption = _this.prepareToastObj(errorObj, context);
                    _this.presentToastBetter(toastOption);
                    break;
                case 'alert':
                    alert("please implement the action");
                case 'transition':
                    alert("please implement the action");
            }
        });
    };
    AlertService.prototype.getErrorObj = function () {
        if (this.errorObj) {
            return __WEBPACK_IMPORTED_MODULE_6_rxjs_Observable__["Observable"].of(this.errorObj);
        }
        var url = this.config.get("assetsBaseUrl");
        return this.api
            .get(url + 'errors.json', new Map());
    };
    AlertService.prototype.clearToast = function () {
        var _this = this;
        this.forceDismiss = true;
        if (this.toast) {
            this.toast.dismiss().catch(function (e) { });
        }
        setTimeout(function () {
            _this.forceDismiss = false;
        }, 1000);
    };
    AlertService.prototype.prepareToastObj = function (errorObj, context) {
        var obj = errorObj.toast;
        var message = obj.message;
        var c = '';
        if (context)
            c = context.toLowerCase();
        if (context && (typeof obj.message === 'object' &&
            c in obj.message)) {
            message = obj.message[c];
        }
        return {
            "message": message,
            "position": obj.position,
            "preprendText": obj.preprendText,
            "closeButton": obj.closeButton,
            "closeButtonText": obj.closeButtonText,
            "cssClass": obj.cssClass,
            "duration": obj.duration,
            "classRef": obj.classRef
        };
    };
    AlertService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["h" /* LoadingController */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["a" /* AlertController */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["o" /* ToastController */],
            __WEBPACK_IMPORTED_MODULE_2__martjack_ng_config__["b" /* MJConfig */],
            __WEBPACK_IMPORTED_MODULE_5__martjack_ng_core_service__["a" /* ApiService */],
            __WEBPACK_IMPORTED_MODULE_3__ngx_translate_core__["d" /* TranslateService */],
            __WEBPACK_IMPORTED_MODULE_7__martjack_ng_context__["f" /* OrionContext */]])
    ], AlertService);
    return AlertService;
}());

//# sourceMappingURL=alert-services.js.map

/***/ }),
/* 135 */,
/* 136 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Payload; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__order_mode__ = __webpack_require__(138);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_rxjs_add_observable_throw__ = __webpack_require__(55);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_rxjs_add_observable_throw___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_rxjs_add_observable_throw__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__location_channel__ = __webpack_require__(200);



var Payload = (function () {
    function Payload() {
        this.isSet = false;
        this.orderMode = __WEBPACK_IMPORTED_MODULE_0__order_mode__["a" /* OrderMode */].DELIVERY;
        this.locationChannel = __WEBPACK_IMPORTED_MODULE_2__location_channel__["a" /* LocationChannel */].MANUAL_ENTRY;
    }
    return Payload;
}());

//# sourceMappingURL=payload.js.map

/***/ }),
/* 137 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Fucked; });
/* unused harmony export GException */
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
/*
 * @Author: PV(confused)
 * @Date: 2017-12-14 12:39:05
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2018-01-11 19:00:35
 */
var Fucked = (function (_super) {
    __extends(Fucked, _super);
    function Fucked(code, message) {
        var _this = _super.call(this, "APP_ERROR__" + message) || this;
        _this.isAppErr = true;
        _this.code = code;
        _this.message = message;
        return _this;
    }
    return Fucked;
}(Error));

/**
 * Handles global exception
 */
var GException = (function () {
    function GException() {
    }
    return GException;
}());

//# sourceMappingURL=error.js.map

/***/ }),
/* 138 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return OrderMode; });
/*
 * @Author: PV(confused)
 * @Date: 2017-12-14 11:53:36
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2017-12-14 12:30:16
 */
var OrderMode;
(function (OrderMode) {
    OrderMode["DELIVERY"] = "H";
    OrderMode["TAKEAWAY"] = "T";
})(OrderMode || (OrderMode = {}));
//# sourceMappingURL=order-mode.js.map

/***/ }),
/* 139 */,
/* 140 */,
/* 141 */,
/* 142 */,
/* 143 */,
/* 144 */,
/* 145 */,
/* 146 */,
/* 147 */,
/* 148 */,
/* 149 */,
/* 150 */,
/* 151 */,
/* 152 */,
/* 153 */
/***/ (function(module, exports) {

function webpackEmptyAsyncContext(req) {
	// Here Promise.resolve().then() is used instead of new Promise() to prevent
	// uncatched exception popping up in devtools
	return Promise.resolve().then(function() {
		throw new Error("Cannot find module '" + req + "'.");
	});
}
webpackEmptyAsyncContext.keys = function() { return []; };
webpackEmptyAsyncContext.resolve = webpackEmptyAsyncContext;
module.exports = webpackEmptyAsyncContext;
webpackEmptyAsyncContext.id = 153;

/***/ }),
/* 154 */,
/* 155 */,
/* 156 */,
/* 157 */,
/* 158 */,
/* 159 */,
/* 160 */,
/* 161 */,
/* 162 */,
/* 163 */,
/* 164 */,
/* 165 */,
/* 166 */,
/* 167 */,
/* 168 */,
/* 169 */,
/* 170 */,
/* 171 */,
/* 172 */,
/* 173 */,
/* 174 */,
/* 175 */,
/* 176 */,
/* 177 */,
/* 178 */,
/* 179 */,
/* 180 */,
/* 181 */,
/* 182 */,
/* 183 */,
/* 184 */,
/* 185 */,
/* 186 */,
/* 187 */,
/* 188 */,
/* 189 */,
/* 190 */,
/* 191 */,
/* 192 */,
/* 193 */,
/* 194 */,
/* 195 */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"../pages/about/about.module": [
		396,
		32
	],
	"../pages/add-edit-address/add-edit-address.module": [
		399,
		0
	],
	"../pages/addresses/addresses.module": [
		406,
		20
	],
	"../pages/builder/builder.module": [
		397,
		43
	],
	"../pages/checkout/checkout.module": [
		398,
		8
	],
	"../pages/contact/contact.module": [
		404,
		26
	],
	"../pages/coupons/coupons.module": [
		400,
		42
	],
	"../pages/customization/customization.module": [
		401,
		22
	],
	"../pages/deal-details/deal-details.module": [
		402,
		7
	],
	"../pages/deal-landing/deal-landing.module": [
		405,
		6
	],
	"../pages/deals-completed/deals-completed.module": [
		403,
		41
	],
	"../pages/deals/deals.module": [
		407,
		10
	],
	"../pages/delivery-success/delivery-success.module": [
		408,
		18
	],
	"../pages/desserts/desserts.module": [
		409,
		14
	],
	"../pages/drinks/drinks.module": [
		410,
		13
	],
	"../pages/favourites/favourites.module": [
		412,
		9
	],
	"../pages/home/home.module": [
		411,
		21
	],
	"../pages/location/location.module": [
		413,
		1
	],
	"../pages/login/login.module": [
		414,
		29
	],
	"../pages/mobile/mobile.module": [
		415,
		40
	],
	"../pages/ng-promotion/promotion.module": [
		418,
		34
	],
	"../pages/ng-rider-tracking/rider-tracking.module": [
		416,
		39
	],
	"../pages/nutrition/nutrition.module": [
		417,
		25
	],
	"../pages/order-details/order-details.module": [
		422,
		5
	],
	"../pages/order-history/order-history.module": [
		419,
		15
	],
	"../pages/otp-verification/otp-verification.module": [
		420,
		23
	],
	"../pages/pdp-view2/pdp-view2.module": [
		421,
		38
	],
	"../pages/pdp/pdp.module": [
		424,
		37
	],
	"../pages/pizza-builder/pizza-builder.module": [
		425,
		36
	],
	"../pages/pizza/pizza.module": [
		423,
		12
	],
	"../pages/product-landing/product-landing.module": [
		427,
		3
	],
	"../pages/profile/profile.module": [
		426,
		28
	],
	"../pages/registration/registration.module": [
		439,
		31
	],
	"../pages/search-order/search-order.module": [
		428,
		17
	],
	"../pages/search/search.module": [
		429,
		19
	],
	"../pages/setpassword/setpassword.module": [
		430,
		35
	],
	"../pages/showcase/showcase.module": [
		431,
		4
	],
	"../pages/sides/sides.module": [
		432,
		11
	],
	"../pages/slots/slots.module": [
		433,
		27
	],
	"../pages/store-list/store-list.module": [
		435,
		24
	],
	"../pages/store-mode-selector/store-mode-selector.module": [
		434,
		33
	],
	"../pages/success/success.module": [
		436,
		16
	],
	"../pages/terms/terms.module": [
		437,
		30
	],
	"../pages/track/track.module": [
		438,
		2
	]
};
function webpackAsyncContext(req) {
	var ids = map[req];
	if(!ids)
		return Promise.reject(new Error("Cannot find module '" + req + "'."));
	return __webpack_require__.e(ids[1]).then(function() {
		return __webpack_require__(ids[0]);
	});
};
webpackAsyncContext.keys = function webpackAsyncContextKeys() {
	return Object.keys(map);
};
webpackAsyncContext.id = 195;
module.exports = webpackAsyncContext;

/***/ }),
/* 196 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return MJConfig; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var MJConfig = (function () {
    /*************************************
     * Default constructor for config
     *************************************/
    function MJConfig() {
    }
    MJConfig.prototype.loadConfigFile = function (appConfig) {
        this.appConfig = appConfig;
    };
    /***
     * Get config value for current environment
     ***/
    MJConfig.prototype.get = function (key) {
        if (key === null || key === undefined) {
            return null;
        }
        return this.appConfig[key];
    };
    MJConfig = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [])
    ], MJConfig);
    return MJConfig;
}());

//# sourceMappingURL=config.js.map

/***/ }),
/* 197 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Commons; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(13);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_rxjs_add_operator_map__ = __webpack_require__(54);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_rxjs_add_operator_map___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_3_rxjs_add_operator_map__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_add_observable_from__ = __webpack_require__(258);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_add_observable_from___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_4_rxjs_add_observable_from__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_rxjs_add_operator_catch__ = __webpack_require__(132);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_rxjs_add_operator_catch___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_5_rxjs_add_operator_catch__);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
/*
 * @Author: PV(confused)
 * @Date: 2017-12-06 15:11:51
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2018-01-11 19:05:12
 */


// import { AppVersion } from '@ionic-native/app-version';
// import { Network } from '@ionic-native/network';




var Commons = (function () {
    //private appVersion: AppVersion, 
    //private network: Network
    function Commons(ionicPlatform) {
        this.ionicPlatform = ionicPlatform;
        this.setPlatform(ionicPlatform);
    }
    Commons_1 = Commons;
    Commons.prototype.setPlatform = function (platform) {
        this.platform = Commons_1.platform = platform;
    };
    Commons.prototype.hasConnection = function () {
        // if (Commons.isCordova())
        //   return !(this.network.type === 'none');
        // else
        return navigator.onLine;
    };
    /**
     * Compare two software version numbers (e.g. 1.7.1)
     * Returns:
     *
     *  0 if they're identical
     *  negative if v1 < v2
     *  positive if v1 > v2
     *  Nan if they in the wrong format
     *
     *  E.g.:
     *
     *  assert(version_number_compare("1.7.1", "1.6.10") > 0);
     *  assert(version_number_compare("1.7.1", "1.7.10") < 0);
     *
     *  "Unit tests": http://jsfiddle.net/ripper234/Xv9WL/28/
     *
     *  Taken from http://stackoverflow.com/a/6832721/11236
     */
    Commons.compareVersionNumbers = function (v1, v2) {
        var v1parts = v1.split('.');
        var v2parts = v2.split('.');
        // First, validate both numbers are true version numbers
        function validateParts(parts) {
            for (var i = 0; i < parts.length; ++i) {
                // if (!Commons.isPositiveInteger(parts[i])) {
                //     return false;
                // }
            }
            return true;
        }
        if (!validateParts(v1parts) || !validateParts(v2parts)) {
            return NaN;
        }
        for (var i = 0; i < v1parts.length; ++i) {
            if (v2parts.length === i) {
                return 1;
            }
            if (v1parts[i] === v2parts[i]) {
                continue;
            }
            if (v1parts[i] > v2parts[i]) {
                return 1;
            }
            return -1;
        }
        if (v1parts.length != v2parts.length) {
            return -1;
        }
        return 0;
    };
    Commons.isCordova = function () {
        //return true;
        if (Commons_1.platform != null) {
            if (Commons_1.platform.is('cordova')) {
                return true;
            }
        }
        return false;
    };
    Commons.prototype.isMobileApp = function () {
        if (this.platform && this.platform.is('cordova')) {
            return true;
        }
        return false;
    };
    Commons.prototype.getPlatformName = function () {
        if (this.platform && this.platform.is('ios')) {
            return 'iOS';
        }
        else if (this.platform && this.platform.is('android')) {
            return 'android';
        }
        else if (this.platform && this.platform.is('core')) {
            return 'Desktop';
        }
        else if (this.platform && this.platform.is('windows')) {
            return 'Windows';
        }
        return 'Other';
    };
    Commons.isAndroid = function () {
        //return true;
        if (Commons_1.platform != null) {
            if (Commons_1.platform.is('android')) {
                return true;
            }
        }
        return false;
    };
    Commons.isiOS = function () {
        //return true;
        if (Commons_1.platform != null) {
            if (Commons_1.platform.is('ios')) {
                return true;
            }
        }
        return false;
    };
    Commons.prototype.getAppVersion = function () {
        if (Commons_1.isCordova()) {
            // return this.appVersion.getVersionNumber().then(appVersion => {
            //   if( Commons.compareVersionNumbers( appVersion, "Config.APP_VERSION" ) >= 0 ){
            //     return new Promise((resolve) => {
            //       resolve(appVersion)
            //     })
            //   }else{
            //     return new Promise((resolve) => {
            //       resolve("Config.APP_VERSION");
            //     })          
            //   }
            // });
        }
        else {
            return new Promise(function (resolve) {
                resolve("Config.APP_VERSION");
            });
        }
    };
    Commons.getPlatform = function () {
        if (Commons_1.isCordova())
            return Commons_1.platform.platforms().join(',');
        else
            return "PWA";
    };
    Commons.equals = function (a, b) {
        if (a.toUpperCase() == b.toUpperCase())
            return true;
        return false;
    };
    Commons.isEmpty = function (obj) {
        // null and undefined are "empty"
        if (obj == null)
            return true;
        // Assume if it has a length property with a non-zero value
        // that that property is correct.
        if (obj.length > 0)
            return false;
        if (obj.length === 0)
            return true;
        // If it isn't an object at this point
        // it is empty, but it can't be anything *but* empty
        // Is it empty?  Depends on your application.
        if (typeof obj !== "object")
            return true;
        // Otherwise, does it have any properties of its own?
        // Note that this doesn't handle
        // toString and valueOf enumeration bugs in IE < 9
        for (var key in obj) {
            if (Object.prototype.hasOwnProperty.call(obj, key))
                return false;
        }
        return true;
    };
    Commons.prototype.convertArr = function (input, decimals) {
        var exp, suffixes = ['k', 'M', 'G', 'T', 'P', 'E'];
        if (input < 1000) {
            return [input, ""];
        }
        exp = Math.floor(Math.log(input) / Math.log(1000));
        return [(input / Math.pow(1000, exp)).toFixed(decimals), suffixes[exp - 1]];
    };
    Commons.prototype.convert = function (input, decimals) {
        var exp, suffixes = ['k', 'M', 'G', 'T', 'P', 'E'];
        if (input < 1000) {
            return input.toFixed(decimals);
        }
        exp = Math.floor(Math.log(input) / Math.log(1000));
        return (input / Math.pow(1000, exp)).toFixed(decimals) + suffixes[exp - 1];
    };
    Commons.isNull = function (v) {
        if (v != null && v) {
            return false;
        }
        return true;
    };
    Commons.isBoolNull = function (value) {
        if (value == null || value == "undefined") {
            return true;
        }
        return false;
    };
    Commons.isKeyExists = function (key, obj) {
        if (obj.hasOwnProperty(key)) {
            return true;
        }
        return false;
    };
    Commons.isStrExistsInArr = function (yourArray, str) {
        if (yourArray.indexOf(str) > -1) {
            return true;
        }
        return false;
    };
    Commons.prototype.constructPair = function (data) {
        var arr = [];
        data.forEach(function (value, key) {
            arr.push({ "name": key, "value": value });
        });
        return arr;
    };
    /**
     * Format of data needs to
     * Array of {"name":key, "value": value}
     * @param data
     */
    Commons.prototype.checkPairHasValues = function (data) {
        return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].from(this.constructPair(data)).map(function (res) {
            if (Commons_1.isEmpty(res["value"])) {
                return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].throw(res["name"] + " is not defined");
            }
            return res["value"];
        });
    };
    /**
     * Replaces the template
     * @param template
     * @param templateArgs
     */
    Commons.prototype.templateReplace = function (template, templateArgs) {
        templateArgs.forEach(function (value, key) {
            template = template.replace("{{" + key + "}}", value);
        });
        return template;
    };
    Commons.platform = null;
    Commons.PREF_IS_FIRST = "PREF_IS_FIRST";
    Commons.PREF_ACCESS_TOKEN = "PREF_ACCESS_TOKEN";
    Commons.PREF_IS_LOGGEDIN = "PREF_IS_LOGGEDIN";
    Commons.PREF_GOT_NOTIFICATION = "PREF_GOT_NOTIFICATION";
    Commons.ORG_VIEW_SETTING = "ORG_VIEW_SETTING";
    Commons = Commons_1 = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["m" /* Platform */]])
    ], Commons);
    return Commons;
    var Commons_1;
}());

//# sourceMappingURL=commons.js.map

/***/ }),
/* 198 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return OrionContext; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__error__ = __webpack_require__(137);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__payload__ = __webpack_require__(136);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__ionic_storage__ = __webpack_require__(41);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__martjack_ng_utils__ = __webpack_require__(35);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_rxjs_Observable__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_rxjs_Observable___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_5_rxjs_Observable__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6_rxjs_BehaviorSubject__ = __webpack_require__(141);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6_rxjs_BehaviorSubject___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_6_rxjs_BehaviorSubject__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7_rxjs_add_observable_of__ = __webpack_require__(56);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7_rxjs_add_observable_of___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_7_rxjs_add_observable_of__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8_rxjs_add_observable_fromPromise__ = __webpack_require__(72);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8_rxjs_add_observable_fromPromise___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_8_rxjs_add_observable_fromPromise__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9_rxjs_add_observable_throw__ = __webpack_require__(55);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9_rxjs_add_observable_throw___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_9_rxjs_add_observable_throw__);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
/*
 * @Author: PV(confused)
 * @Date: 2017-12-14 12:51:28
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2017-12-28 14:57:48
 *
 * All the headache of management of context will done here
 * This it as a ThreadLocal concept
 *
 * Anything you want to save in memory/storage will
 * automatically done by this guys in a way it is required
 *
 * There is two division :
 * 1. Payload
 * 2. Other Maps
 *
 * There will be strict checking that only objects are going
 * in and no is just adding string and numbers
 */










var OrionContext = (function () {
    function OrionContext(sessionStorage) {
        this.sessionStorage = sessionStorage;
        this._payload = null;
        this.PAYLOAD_KEY = "orion-payload-key";
        this._randomObj = new Map();
        this._randomMemObj = new Map();
    }
    Object.defineProperty(OrionContext.prototype, "payload", {
        get: function () {
            var _this = this;
            if (!__WEBPACK_IMPORTED_MODULE_4__martjack_ng_utils__["a" /* Commons */].isNull(this._payload)) {
                return __WEBPACK_IMPORTED_MODULE_5_rxjs_Observable__["Observable"].of(this._payload);
            }
            return __WEBPACK_IMPORTED_MODULE_5_rxjs_Observable__["Observable"].fromPromise(this.sessionStorage.get(this.PAYLOAD_KEY))
                .map(function (cachedResult) {
                if (cachedResult != null && typeof cachedResult !== 'undefined') {
                    _this._payload = cachedResult;
                    return _this._payload;
                }
                return new __WEBPACK_IMPORTED_MODULE_2__payload__["a" /* Payload */]();
            });
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(OrionContext.prototype, "slotId", {
        set: function (slotId) {
            this.init();
            this._payload.slotId = slotId;
            this.updatePayload();
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(OrionContext.prototype, "location", {
        set: function (location) {
            this.init();
            this._payload.location = location;
            this.updatePayload();
        },
        enumerable: true,
        configurable: true
    });
    OrionContext.prototype.init = function () {
        if (this._payload == null)
            this._payload = new __WEBPACK_IMPORTED_MODULE_2__payload__["a" /* Payload */]();
    };
    Object.defineProperty(OrionContext.prototype, "orderMode", {
        get: function () {
            return this._payload.orderMode;
        },
        set: function (orderMode) {
            this.init();
            this._payload.orderMode = orderMode;
            this.updatePayload();
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(OrionContext.prototype, "store", {
        set: function (store) {
            this.init();
            this._payload.store = store;
            this.updatePayload();
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(OrionContext.prototype, "cart", {
        set: function (cart) {
            this.init();
            this._payload.cart = cart;
            this.updatePayload();
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(OrionContext.prototype, "deliverySlot", {
        set: function (slot) {
            this.init();
            this._payload.deliverySlot = slot;
            this.updatePayload();
        },
        enumerable: true,
        configurable: true
    });
    OrionContext.prototype.updatePayload = function () {
        this.sessionStorage.set(this.PAYLOAD_KEY, this._payload).catch(function (e) {
            console.log("key could not be updated please report :(", e);
        });
    };
    /**
     * Keeping promise becajse do not want ant one to miss subscribe
     * @param key
     * @param value
     */
    OrionContext.prototype.set = function (key, value) {
        var _this = this;
        if (key == this.PAYLOAD_KEY)
            throw __WEBPACK_IMPORTED_MODULE_5_rxjs_Observable__["Observable"].throw(new __WEBPACK_IMPORTED_MODULE_1__error__["a" /* Fucked */](1001, "DON'T PLAY AROUND, THIS KEY IS RESERVED"));
        return this.sessionStorage.set(key, value).then(function (value) {
            _this._randomObj[key] = value;
            return value;
        });
    };
    /**
     * Keeping promise becajse do not want ant one to miss subscribe
     * @param key
     * @param value
     */
    OrionContext.prototype.publish = function (key, value) {
        if (key == this.PAYLOAD_KEY)
            throw __WEBPACK_IMPORTED_MODULE_5_rxjs_Observable__["Observable"].throw(new __WEBPACK_IMPORTED_MODULE_1__error__["a" /* Fucked */](1001, "DON'T PLAY AROUND, THIS KEY IS RESERVED"));
        if (!this._randomMemObj.has(key))
            this._randomMemObj.set(key, new __WEBPACK_IMPORTED_MODULE_6_rxjs_BehaviorSubject__["BehaviorSubject"](value));
        var subject = this._randomMemObj.get(key).next(value);
        return true;
    };
    OrionContext.prototype.subscribe = function (key) {
        if (!this._randomMemObj.has(key)) {
            this.publish(key, []);
        }
        return this._randomMemObj.get(key);
    };
    /**
     * @param key Not keeping in memory
     */
    OrionContext.prototype.get = function (key) {
        return __WEBPACK_IMPORTED_MODULE_5_rxjs_Observable__["Observable"].fromPromise(this.sessionStorage.get(key))
            .map(function (cachedResult) {
            if (cachedResult != null && typeof cachedResult !== 'undefined') {
                return cachedResult;
            }
            return null;
        });
    };
    /**
     * to be used only in temp cases
     * Does not guarantee the consistency
     */
    OrionContext.prototype.getCachedPayload = function () {
        return this._payload;
    };
    Object.defineProperty(OrionContext.prototype, "locationChannel", {
        set: function (channel) {
            this.init();
            this._payload.locationChannel = channel;
            this.updatePayload();
        },
        enumerable: true,
        configurable: true
    });
    OrionContext = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_3__ionic_storage__["b" /* Storage */]])
    ], OrionContext);
    return OrionContext;
}());

//# sourceMappingURL=orion-context.js.map

/***/ }),
/* 199 */,
/* 200 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return LocationChannel; });
var LocationChannel;
(function (LocationChannel) {
    LocationChannel["MANUAL_ENTRY"] = "ADDRESS_ENTERED";
    LocationChannel["LOCATE_ME"] = "AUTO_DETECT";
})(LocationChannel || (LocationChannel = {}));
//# sourceMappingURL=location-channel.js.map

/***/ }),
/* 201 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return PostalDetails; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__constants__ = __webpack_require__(328);

var PostalDetails = (function () {
    function PostalDetails(locationDetails) {
        if (!locationDetails) {
            return;
        }
        if (!locationDetails.geometry || !locationDetails.formatted_address
            || !locationDetails.address_components) {
            return;
        }
        this.latitude = locationDetails.geometry.location.lat;
        this.longitude = locationDetails.geometry.location.lng;
        this.address = locationDetails.formatted_address;
        var components = locationDetails.address_components;
        for (var component = 0; component < (components.length); component++) {
            if (!components[component].types[0]) {
                this.state = '';
                this.country = '';
                this.pinCode = '';
                this.city = '';
            }
            if (components[component].types[0] === __WEBPACK_IMPORTED_MODULE_0__constants__["a" /* ADDRESS_MAP */].gcode) {
                this.state = components[component].long_name;
            }
            if (components[component].types[0] === __WEBPACK_IMPORTED_MODULE_0__constants__["b" /* CITY_MAP */].gcode) {
                this.city = components[component].long_name;
            }
            if (components[component].types[0] === __WEBPACK_IMPORTED_MODULE_0__constants__["c" /* COUNTRY_MAP */].gcode) {
                this.country = components[component].long_name;
            }
            if (components[component].types[0] === __WEBPACK_IMPORTED_MODULE_0__constants__["d" /* POSTAL_CODE_MAP */].gcode) {
                this.pinCode = components[component].long_name;
            }
        }
    }
    return PostalDetails;
}());

//# sourceMappingURL=locationdetails.js.map

/***/ }),
/* 202 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return SessionHandler; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__config__ = __webpack_require__(60);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__service_helper__ = __webpack_require__(105);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__entities__ = __webpack_require__(203);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__ionic_storage__ = __webpack_require__(41);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__martjack_ng_utils__ = __webpack_require__(35);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__martjack_ng_config__ = __webpack_require__(21);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7_rxjs_Observable__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7_rxjs_Observable___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_7_rxjs_Observable__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8_rxjs_add_observable_of__ = __webpack_require__(56);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8_rxjs_add_observable_of___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_8_rxjs_add_observable_of__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9_rxjs_add_observable_fromPromise__ = __webpack_require__(72);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9_rxjs_add_observable_fromPromise___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_9_rxjs_add_observable_fromPromise__);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
/*
 * @Author: PV(confused)
 * @Date: 2016-12-29 14:26:41
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2018-01-11 21:17:31
 */










var SessionHandler = (function () {
    function SessionHandler(config, sessionStorage, serviceHelper) {
        this.config = config;
        this.sessionStorage = sessionStorage;
        this.serviceHelper = serviceHelper;
        this.SESSION = "SESSION";
        this.session = null;
        this.loggedIn = false;
    }
    SessionHandler.prototype.buildUserProfile = function (data) {
        if (__WEBPACK_IMPORTED_MODULE_5__martjack_ng_utils__["a" /* Commons */].isNull(data) || data == 'undefined') {
            return __WEBPACK_IMPORTED_MODULE_3__entities__["d" /* UserProfile */].getGuesUser(this.config.get('default_user_id'));
        }
        var userRoleType;
        if (data.userRoleType)
            userRoleType = data.userRoleType;
        else
            userRoleType = data.authEntities.userRoleType;
        if (userRoleType == 'USER')
            this.loggedIn = true;
        return new __WEBPACK_IMPORTED_MODULE_3__entities__["d" /* UserProfile */](data.id, data.loginName, data.mobile, data.firstName, data.lastName, userRoleType, data.url);
    };
    SessionHandler.prototype.buildAuth = function (data, accessToken) {
        var authValidity = this.config.get(__WEBPACK_IMPORTED_MODULE_1__config__["a" /* ConfigConstants */].AUTH_TOKEN_EXPIRY_TIME_KEY);
        if (!accessToken) {
            var accessValidity = this.config.get(__WEBPACK_IMPORTED_MODULE_1__config__["a" /* ConfigConstants */].ACCESS_TOKEN_EXPIRY_TIME_KEY);
            accessToken = new __WEBPACK_IMPORTED_MODULE_3__entities__["c" /* Token */](data.accessToken, accessValidity, Date.now());
        }
        //console.log("Test: Validity:" + accessValidity)
        var authToken = new __WEBPACK_IMPORTED_MODULE_3__entities__["c" /* Token */](data.authToken, authValidity, Date.now());
        var merchantID = this.config.get(__WEBPACK_IMPORTED_MODULE_1__config__["a" /* ConfigConstants */].MERCHANT_ID);
        return new __WEBPACK_IMPORTED_MODULE_3__entities__["a" /* Auth */](authToken, accessToken, merchantID);
    };
    SessionHandler.prototype.setup = function () {
        if (this.session.user.accessLevel == 'USER')
            this.loggedIn = true;
        this.serviceHelper.setUserID(this.session.user.id);
        this.serviceHelper.setDomainName(this.session.domainName);
        this.serviceHelper.setAuthToken(this.session.auth.bearerToken.value);
        this.serviceHelper.setAccessToken(this.session.auth.accessToken.value);
    };
    SessionHandler.prototype.clearSession = function () {
        this.serviceHelper.setUserID(null);
        this.serviceHelper.setAuthToken(null);
        this.serviceHelper.setDomainName(null);
        this.serviceHelper.setAccessToken(null);
        this.session = null;
        this.loggedIn = false;
        this.sessionStorage.clear();
    };
    SessionHandler.prototype.isAuthValid = function () {
        //console.log("Test: Auth Validation Called");
        return this.getSessionDetails().map(function (session) {
            if (session == null) {
                return false;
            }
            return __WEBPACK_IMPORTED_MODULE_3__entities__["c" /* Token */].isValid(session.auth.bearerToken);
        });
    };
    //----------------------------------------------------//
    //------------------ PUBLIC APIS --------------------//
    //--------------------------------------------------//
    SessionHandler.prototype.doesSessionExists = function () {
        return this.getSessionDetails().map(function (session) {
            if (session == null) {
                console.log("Test: doesSessionExists Empty Session");
                return false;
            }
            var isAccessTokenValid = __WEBPACK_IMPORTED_MODULE_3__entities__["c" /* Token */].isValid(session.auth.accessToken);
            if (isAccessTokenValid) {
                console.log("Test: doesSessionExists VALID access token");
                return true;
            }
            console.log("Test: doesSessionExists INvalid access token");
            return false;
        });
    };
    Object.defineProperty(SessionHandler.prototype, "sessionDetails", {
        get: function () {
            return this.session;
        },
        enumerable: true,
        configurable: true
    });
    /**
     * Invalidate Cache
     * @returns {Promise<any>}
     */
    SessionHandler.prototype.cacheInvalidate = function () {
        return this.sessionStorage.clear();
    };
    SessionHandler.prototype.getSessionDetails = function () {
        var _this = this;
        if (!__WEBPACK_IMPORTED_MODULE_5__martjack_ng_utils__["a" /* Commons */].isNull(this.session)) {
            return __WEBPACK_IMPORTED_MODULE_7_rxjs_Observable__["Observable"].of(this.session);
        }
        return __WEBPACK_IMPORTED_MODULE_7_rxjs_Observable__["Observable"].fromPromise(this.sessionStorage.get(this.SESSION))
            .map(function (cachedResult) {
            if (cachedResult != null && typeof cachedResult !== 'undefined') {
                _this.session = cachedResult;
                console.log("session =", _this.session);
                _this.setup();
                return _this.sessionDetails;
            }
            else {
                return null;
            }
        });
    };
    SessionHandler.prototype.buildSession = function (data, refresh) {
        if (refresh === void 0) { refresh = false; }
        //console.log("Test: Access Token: " + data.auth.accessToken);
        //console.log("Test: Auth Token: " + data.auth.authToken);
        var isTokenUnchanged = this.session && (data.auth.accessToken == this.session.auth.accessToken.value)
            && (data.auth.authToken == this.session.auth.bearerToken.value);
        if (!isTokenUnchanged || refresh) {
            console.log("Test: TOKENS HAVE CHANGED");
            var auth = null;
            var userProfile = void 0;
            if (this.session && data.auth.accessToken == this.session.auth.accessToken.value) {
                auth = this.buildAuth(data.auth, this.session.auth.accessToken);
                if (refresh) {
                    userProfile = this.buildUserProfile(data.user);
                }
                else {
                    userProfile = this.session.user;
                }
            }
            else {
                auth = this.buildAuth(data.auth);
                userProfile = this.buildUserProfile(data.user);
            }
            var domain = this.config.get(__WEBPACK_IMPORTED_MODULE_1__config__["a" /* ConfigConstants */].DOMAIN);
            var merchantID = this.config.get(__WEBPACK_IMPORTED_MODULE_1__config__["a" /* ConfigConstants */].MERCHANT_ID);
            this.session = new __WEBPACK_IMPORTED_MODULE_3__entities__["b" /* Session */](auth, userProfile, domain, merchantID);
            this.sessionStorage.set(this.SESSION, this.session);
            this.setup();
        }
        return __WEBPACK_IMPORTED_MODULE_7_rxjs_Observable__["Observable"].of(this.sessionDetails);
    };
    SessionHandler.prototype.getUserProfile = function () {
        var _this = this;
        if (!__WEBPACK_IMPORTED_MODULE_5__martjack_ng_utils__["a" /* Commons */].isNull(this.session)) {
            return __WEBPACK_IMPORTED_MODULE_7_rxjs_Observable__["Observable"].of(this.session.user);
        }
        return __WEBPACK_IMPORTED_MODULE_7_rxjs_Observable__["Observable"].fromPromise(this.sessionStorage.get(this.SESSION))
            .map(function (cachedResult) {
            if (cachedResult != null && typeof cachedResult !== 'undefined') {
                _this.session = cachedResult;
                _this.setup();
                return _this.sessionDetails.user;
            }
        });
    };
    SessionHandler.prototype.updateGuestProfile = function (userProfile) {
        var _this = this;
        // debugger;
        return __WEBPACK_IMPORTED_MODULE_7_rxjs_Observable__["Observable"].fromPromise(this.sessionStorage.get(this.SESSION))
            .flatMap(function (cachedResult) {
            console.log("cachedResult", cachedResult);
            if (cachedResult != null && typeof cachedResult !== 'undefined') {
                _this.sessionDetails.user = userProfile;
            }
            console.log("cachedResult", cachedResult);
            return _this.sessionStorage.set(_this.SESSION, _this.sessionDetails);
        }).flatMap(function (res) { return __WEBPACK_IMPORTED_MODULE_7_rxjs_Observable__["Observable"].of(res); })
            .catch(function (err) { return __WEBPACK_IMPORTED_MODULE_7_rxjs_Observable__["Observable"].throw('Error in session update', err); });
    };
    //is logged in
    SessionHandler.prototype.isLoggedIn = function () {
        return this.loggedIn;
    };
    SessionHandler = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_6__martjack_ng_config__["b" /* MJConfig */],
            __WEBPACK_IMPORTED_MODULE_4__ionic_storage__["b" /* Storage */],
            __WEBPACK_IMPORTED_MODULE_2__service_helper__["a" /* ServiceHelper */]])
    ], SessionHandler);
    return SessionHandler;
}());

//# sourceMappingURL=session-handler.js.map

/***/ }),
/* 203 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__auth__ = __webpack_require__(334);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_0__auth__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__token__ = __webpack_require__(335);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return __WEBPACK_IMPORTED_MODULE_1__token__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__session__ = __webpack_require__(336);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return __WEBPACK_IMPORTED_MODULE_2__session__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__user_profile__ = __webpack_require__(287);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "d", function() { return __WEBPACK_IMPORTED_MODULE_3__user_profile__["a"]; });




//# sourceMappingURL=index.js.map

/***/ }),
/* 204 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AuthenticationService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_http__ = __webpack_require__(39);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs_add_operator_map__ = __webpack_require__(54);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs_add_operator_map___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_rxjs_add_operator_map__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_rxjs_add_operator_mergeMap__ = __webpack_require__(130);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_rxjs_add_operator_mergeMap___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_3_rxjs_add_operator_mergeMap__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_add_observable_throw__ = __webpack_require__(55);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_add_observable_throw___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_4_rxjs_add_observable_throw__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_rxjs_Observable__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_rxjs_Observable___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_5_rxjs_Observable__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__config__ = __webpack_require__(60);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__martjack_ng_config__ = __webpack_require__(21);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
/*
 * @Author: PV(confused)
 * @Date: 2017-12-06 15:11:51
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2017-12-19 20:13:37
 */








var AuthenticationService = (function () {
    function AuthenticationService(http, config) {
        this.http = http;
        this.config = config;
        this.baseURL = null;
        this.AUTH_TOKEN_URL = '/authentication/authToken';
        this.VALIDATE_TOKEN_URL = '/authentication/validate';
        this.ACCESS_TOKEN_URL = '/authentication/accessToken';
    }
    Object.defineProperty(AuthenticationService.prototype, "baseUrl", {
        get: function () {
            if (this.baseURL == null)
                this.baseURL = this.config.get(__WEBPACK_IMPORTED_MODULE_6__config__["a" /* ConfigConstants */].BASE_URL);
            return this.baseURL;
        },
        enumerable: true,
        configurable: true
    });
    /**
     * Returns a authentication token(Auth token)
     * @return authtoken
     * @method getAuthToken
     */
    AuthenticationService.prototype.getAuthToken = function () {
        var options = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["d" /* RequestOptions */]({
            headers: new __WEBPACK_IMPORTED_MODULE_1__angular_http__["a" /* Headers */]({
                'accept': 'application/json'
            })
        });
        var url = this.baseUrl + __WEBPACK_IMPORTED_MODULE_6__config__["a" /* ConfigConstants */].AUTH_TOKEN_URL;
        return this.http.get(url, options);
    };
    /**
     * Returns a access token taking authtoken as input
     * @method getAccessToken
     * @param authtoken: string
     */
    AuthenticationService.prototype.getAccessToken = function (authtoken) {
        var url = this.baseUrl + __WEBPACK_IMPORTED_MODULE_6__config__["a" /* ConfigConstants */].ACCESS_TOKEN_URL;
        var publicKey = this.config.get(__WEBPACK_IMPORTED_MODULE_6__config__["a" /* ConfigConstants */].PUBLIC_KEY_STORAGE_KEY);
        var userId = this.config.get(__WEBPACK_IMPORTED_MODULE_6__config__["a" /* ConfigConstants */].USER_ID);
        var options = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["d" /* RequestOptions */]({
            headers: new __WEBPACK_IMPORTED_MODULE_1__angular_http__["a" /* Headers */]({
                'userId': userId,
                'authtoken': authtoken.json(),
                'publickey': publicKey,
                'accept': 'application/json'
            })
        });
        return this.http.post(url, {}, options);
    };
    AuthenticationService.prototype.throwException = function (error) {
        throw __WEBPACK_IMPORTED_MODULE_5_rxjs_Observable__["Observable"].throw({ "error": error, "code": 401 });
    };
    AuthenticationService.prototype.renewAuthToken = function () {
        var _this = this;
        return this.getAuthToken().map(function (authtoken) {
            if (!authtoken) {
                _this.throwException(__WEBPACK_IMPORTED_MODULE_6__config__["a" /* ConfigConstants */].AUTH_TOKEN_ERROR);
            }
            return authtoken;
        });
    };
    /**
     * gets all new tokens, used to start a new session
     * @method getAuthentication
     */
    AuthenticationService.prototype.getAuthentication = function () {
        var _this = this;
        return this.getAuthToken().map(function (authtoken) {
            if (!authtoken) {
                _this.throwException(__WEBPACK_IMPORTED_MODULE_6__config__["a" /* ConfigConstants */].AUTH_TOKEN_ERROR);
            }
            return authtoken;
        }).flatMap(function (authToken) { return _this.getAccessToken(authToken).map(function (res) {
            if (!res || !res.json().Token || !res.json().Token.AccessToken) {
                _this.throwException(__WEBPACK_IMPORTED_MODULE_6__config__["a" /* ConfigConstants */].ACCESS_TOKEN_ERROR);
            }
            return { "auth": { "authToken": authToken.json(), "accessToken": res.json().Token.AccessToken } };
        }); });
    };
    AuthenticationService.prototype.log = function (text) {
        console.log("ERROR, this._SERVICE_IDENTIFIER, text" + text);
    };
    AuthenticationService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_http__["b" /* Http */], __WEBPACK_IMPORTED_MODULE_7__martjack_ng_config__["b" /* MJConfig */]])
    ], AuthenticationService);
    return AuthenticationService;
}());

//# sourceMappingURL=authentication-service.js.map

/***/ }),
/* 205 */,
/* 206 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return BASE_URL; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return EMPTY_INPUT; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "e", function() { return NO_SEO_DATA; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "d", function() { return NO_PIXEL_DATA; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return FETCH_ERROR; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "h", function() { return SET_ERROR; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "g", function() { return SEO_URL; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "f", function() { return PIXEL_URL; });
var BASE_URL = 'baseUrl';
var EMPTY_INPUT = { "code": 422, "error": "error in the parameters passed" };
var NO_SEO_DATA = { "code": 204, "error": "No SEO Data Found" };
var NO_PIXEL_DATA = { "code": 204, "error": "No Pixel Data Found" };
var FETCH_ERROR = { "code": 500, "error": "Error in fetching SEO data" };
var SET_ERROR = { "code": 501, "error": "Error in setting SEO data" };
var SEO_URL = "/seoinfos/getByPage";
var PIXEL_URL = "/pixelInfos/getPixelByPage";
//# sourceMappingURL=config-constants.js.map

/***/ }),
/* 207 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CustomEventModel; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__models_customEvent__ = __webpack_require__(208);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__enums_eventType__ = __webpack_require__(16);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();


/**
 * Global custom event model to push custom events to event manager
 */
var CustomEventModel = (function (_super) {
    __extends(CustomEventModel, _super);
    function CustomEventModel(event, eventLable, eventValue, eventAction, eventCategory, eventCustomDimensions) {
        var _this = _super.call(this) || this;
        /** Event type */
        _this._eventType = __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].customEvent;
        /** custom event category */
        _this._eventCustomDimensions = new Map();
        _this._event = event ? event : "";
        _this._eventLabel = eventLable ? eventLable : "";
        _this._eventValue = eventValue ? eventValue : "";
        _this._eventAction = eventAction ? eventAction : "";
        _this._eventCategory = eventCategory ? eventCategory : "";
        _this._eventCustomDimensions = eventCustomDimensions;
        return _this;
    }
    /** Get current event type */
    CustomEventModel.prototype.getEventType = function () {
        return __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].customEvent;
    };
    /**
     * Check if custom event is valid
     */
    CustomEventModel.prototype.isValid = function () {
        if (this._event || this._eventLabel || this._eventValue || this._eventAction || this._eventCategory) {
            return true;
        }
        this._log('Invalid parameter configuration for custom event in event manager');
        return false;
    };
    /** Log messages */
    CustomEventModel.prototype._log = function (message) {
        console.log(message);
    };
    return CustomEventModel;
}(__WEBPACK_IMPORTED_MODULE_0__models_customEvent__["a" /* CustomEvent */]));

//# sourceMappingURL=customEventModel.js.map

/***/ }),
/* 208 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CustomEvent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__mjEvent__ = __webpack_require__(107);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();


/**
 * Global class for custom events
 */
var CustomEvent = (function (_super) {
    __extends(CustomEvent, _super);
    function CustomEvent() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    CustomEvent.prototype.isValid = function () { };
    CustomEvent.prototype.getJson = function () { };
    CustomEvent.prototype.getEventType = function () { return __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].customEvent; };
    CustomEvent.prototype.fromMJEvent = function (event) { };
    return CustomEvent;
}(__WEBPACK_IMPORTED_MODULE_0__mjEvent__["a" /* MJEvent */]));

//# sourceMappingURL=customEvent.js.map

/***/ }),
/* 209 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ProductImpression; });
/* unused harmony export ProductImpressionModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__ = __webpack_require__(20);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__enums_eventType__ = __webpack_require__(16);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();


/**
 * Global product impression model to push product impression events to event manager
 */
var ProductImpression = (function (_super) {
    __extends(ProductImpression, _super);
    function ProductImpression(currencyCode, listName, _products) {
        var _this = _super.call(this) || this;
        /** Event type */
        _this._eventType = __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].productImpression;
        /** Current CurrencyCode*/
        _this._currencyCode = '';
        /** Name of the list products belong to */
        _this._listName = '';
        /** Array of ProductImpressionModule with product data */
        _this._products = [];
        if (!currencyCode || !listName || !_products || !_products.length) {
            _this._log('Invalid parameter configuration for product impression event in event manager');
            return _this;
        }
        _this._currencyCode = currencyCode;
        _this._listName = listName;
        _this._products = _products;
        return _this;
    }
    /**
     * Check if configuration for product impression event is valid
     */
    ProductImpression.prototype.isValid = function () {
        if (!this._currencyCode || !this._listName || !this._products || !this._products.length) {
            this._log('Invalid parameter configuration for product impression event in event manager');
            return false;
        }
        return true;
    };
    /**
     * Get inputs for product impression event and validate
     * map data from 'Product' model to 'ProductImpressionModel'
     * return new ProductImpression
     * @param currencyCode : string
     * @param listName : string
     * @param products : array<Product>
     */
    ProductImpression.fromProductModel = function (currencyCode, listName, products) {
        if (!currencyCode || !listName || !products || !products.length) {
            return;
        }
        /**
         * Validate each property from Product model to ProductImpressionModel
         * Fill only valid properties
         */
        var impressions = [];
        products.forEach(function (product, index) {
            var impression = new ProductImpressionModel();
            if (product.Title)
                impression.name = product.Title;
            if (product.id)
                impression.id = product.id;
            if (product.bundle_price)
                impression.price = product.bundle_price;
            if (product.brand)
                impression.brand = product.brand;
            if (product.leafCategoryName)
                impression.category = product.leafCategoryName;
            if (product.getSelectedVariantText())
                impression.variant = product.getSelectedVariantText();
            if (listName)
                impression.list = listName;
            impression.position = index + 1;
            impressions.push(impression);
        });
        return new ProductImpression(currencyCode, listName, impressions);
    };
    /**
     * Get inputs for product impression event and validate
     * map data from 'Item' model to 'ProductImpressionModel'
     * return new ProductImpression
     * @param currencyCode : string
     * @param listName : string
     * @param products : array<Item>
     */
    ProductImpression.fromItemModel = function (currencyCode, listName, items) {
        if (!currencyCode || !listName || !items || !items.length) {
            return;
        }
        /**
         * Validate each property from Product model to ProductImpressionModel
         * Fill only valid properties
         */
        var impressions = [];
        items.forEach(function (item, index) {
            var impression = new ProductImpressionModel();
            if (item.title)
                impression.name = item.title;
            if (item.id)
                impression.id = item.id;
            if (item.web_price)
                impression.price = item.web_price;
            // Data not available in Item model
            // if (item.brand) impression.brand = item.brand;
            // if (item.h1_category_name) impression.category = item.h1_category_name;
            if (item.variant_product_id)
                impression.variant = item.variant_product_id.toString();
            if (listName)
                impression.list = listName;
            impression.position = index + 1;
            impressions.push(impression);
        });
        return new ProductImpression(currencyCode, listName, impressions);
    };
    /**
     * Get inputs for product impression event and validate
     * map data from suggestive selling model to 'ProductImpressionModel'
     * return new ProductImpression
     * @param currencyCode : string
     * @param listName : string
     * @param products : array<any>
     */
    ProductImpression.fromSuggestiveModel = function (currencyCode, listName, products) {
        if (!currencyCode || !listName || !products || !products.length) {
            return;
        }
        /**
         * Validate each property from suggestive selling model to ProductImpressionModel
         * Fill only valid properties
         */
        var impressions = [];
        products.forEach(function (product, index) {
            var impression = new ProductImpressionModel();
            if (product.Title)
                impression.name = product.Title;
            if (product.ID)
                impression.id = product.ID;
            if (product.WebPrice)
                impression.price = product.WebPrice;
            if (product.Brand)
                impression.brand = product.Brand;
            if (product.leafCategory)
                impression.category = product.leafCategory;
            // Not available in suggestive selling
            // if (product.selected_variant_text) impression.variant = product.selected_variant_text;
            if (listName)
                impression.list = listName;
            impression.position = index + 1;
            impressions.push(impression);
        });
        return new ProductImpression(currencyCode, listName, impressions);
    };
    /**
     * Get current event type
     */
    ProductImpression.prototype.getEventType = function () {
        return __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].productImpression;
    };
    /** Log messages */
    ProductImpression.prototype._log = function (message) {
        console.log(message);
    };
    return ProductImpression;
}(__WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__["a" /* EcommerceEvent */]));

var ProductImpressionModel = (function () {
    function ProductImpressionModel() {
        this.variant = '';
    }
    return ProductImpressionModel;
}());

//# sourceMappingURL=productImpression.js.map

/***/ }),
/* 210 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export PromotionClick */
/* unused harmony export PromotionClickModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__ = __webpack_require__(20);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__enums_eventType__ = __webpack_require__(16);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();


/**
 * Global promotion click model to push promotion click event to event manager
 */
var PromotionClick = (function (_super) {
    __extends(PromotionClick, _super);
    function PromotionClick(promotions) {
        var _this = _super.call(this) || this;
        /** Event type */
        _this._eventType = __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].promotionClick;
        /** promotions array */
        _this._promotions = [];
        if (!promotions || !promotions.length) {
            _this._log('Invalid parameter configuration for promotion click event in event manager');
            return _this;
        }
        _this._promotions = promotions;
        return _this;
    }
    /**
     * Check if configuration for promotion click event is valid
     */
    PromotionClick.prototype.isValid = function () {
        if (!this._promotions || !this._promotions.length) {
            this._log('Invalid parameter configuration for promotion click event in event manager');
            return false;
        }
        return true;
    };
    /**
     * Get current event type
     */
    PromotionClick.prototype.getEventType = function () {
        return __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].promotionClick;
    };
    /** Log messages */
    PromotionClick.prototype._log = function (message) {
        console.log(message);
    };
    return PromotionClick;
}(__WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__["a" /* EcommerceEvent */]));

var PromotionClickModel = (function () {
    function PromotionClickModel() {
    }
    return PromotionClickModel;
}());

//# sourceMappingURL=promotionClick.js.map

/***/ }),
/* 211 */,
/* 212 */,
/* 213 */,
/* 214 */,
/* 215 */,
/* 216 */,
/* 217 */,
/* 218 */,
/* 219 */,
/* 220 */,
/* 221 */,
/* 222 */,
/* 223 */,
/* 224 */,
/* 225 */,
/* 226 */,
/* 227 */,
/* 228 */,
/* 229 */,
/* 230 */,
/* 231 */,
/* 232 */,
/* 233 */,
/* 234 */,
/* 235 */,
/* 236 */,
/* 237 */,
/* 238 */,
/* 239 */,
/* 240 */,
/* 241 */,
/* 242 */,
/* 243 */,
/* 244 */,
/* 245 */,
/* 246 */,
/* 247 */,
/* 248 */,
/* 249 */,
/* 250 */,
/* 251 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__gtm_module__ = __webpack_require__(374);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_0__gtm_module__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__gtm_service__ = __webpack_require__(252);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return __WEBPACK_IMPORTED_MODULE_1__gtm_service__["a"]; });


//# sourceMappingURL=index.js.map

/***/ }),
/* 252 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return GTMService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__ = __webpack_require__(7);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__models_productImpression__ = __webpack_require__(375);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__models_productClick__ = __webpack_require__(376);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__models_productView__ = __webpack_require__(377);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__models_addToCart__ = __webpack_require__(378);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__models_removeFromCart__ = __webpack_require__(379);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__models_promotionImpression__ = __webpack_require__(380);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__models_promotionClick__ = __webpack_require__(381);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__models_checkout__ = __webpack_require__(382);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__models_purchase__ = __webpack_require__(383);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__models_virtualPageView__ = __webpack_require__(384);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__models_customEventModel__ = __webpack_require__(385);
/**
 * Author - Yogesh Mayacharya
 * Service for Google Tag Manager implementation
 * E-commerce and custom events are tracked for GA using GTM
*/
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var __param = (this && this.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};













var GTMService = (function () {
    function GTMService(_eventManagerService, config) {
        this._eventManagerService = _eventManagerService;
        this.config = config;
        this.firebaseAnalytics = null;
        console.log("config-- yogesh", config);
        this._DATA_LAYER = (window['dataLayer']) ? (window['dataLayer']) : [];
        if (GlobalConfig.gtmID && GlobalConfig.gaTrackingID) {
            this.handleEvent();
        }
    }
    GTMService.prototype.firebaseInit = function (firebase) {
        console.log("this.firebaseAnalytics", this.firebaseAnalytics);
        this.firebaseAnalytics = firebase;
    };
    /**
     * Subscribe to global event push
     * Push event to GTM dataLayer object
     */
    GTMService.prototype.handleEvent = function () {
        var _this = this;
        this._events = this._eventManagerService.getSubscription();
        this._events.map(this.mapEvent).subscribe(function (event) {
            if (!event) {
                return;
            }
            if (!event.isValid()) {
                return;
            }
            console.log("datalayer", _this._DATA_LAYER, window['dataLayer']);
            _this._DATA_LAYER.push(event.getJson());
            if (_this.firebaseAnalytics) {
                var fEvent = event.getJson();
                var eventName = fEvent['event'];
                console.log("this.firebaseAnalytics", _this.firebaseAnalytics, eventName, fEvent);
                _this.firebaseAnalytics.logEvent(eventName, event.getFJson()).then(function (success) {
                    console.log("firebase inner", success);
                }).catch(function (err) {
                    console.log("firebase inner err", err);
                });
            }
        });
    };
    /**
     * Map global event manager event to respective local GTM event
     * @param event : MJEvent
     */
    GTMService.prototype.mapEvent = function (event) {
        if (!event) {
            return;
        }
        var mappedGtmEvent;
        switch (event.getEventType()) {
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].productImpression:
                mappedGtmEvent = __WEBPACK_IMPORTED_MODULE_2__models_productImpression__["a" /* ProductImpression */].fromMJEvent(event);
                break;
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].productClick:
                mappedGtmEvent = __WEBPACK_IMPORTED_MODULE_3__models_productClick__["a" /* ProductClick */].fromMJEvent(event);
                break;
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].productView:
                mappedGtmEvent = __WEBPACK_IMPORTED_MODULE_4__models_productView__["a" /* ProductView */].fromMJEvent(event);
                break;
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].addToCart:
                mappedGtmEvent = __WEBPACK_IMPORTED_MODULE_5__models_addToCart__["a" /* AddToCart */].fromMJEvent(event);
                break;
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].removeFromCart:
                mappedGtmEvent = __WEBPACK_IMPORTED_MODULE_6__models_removeFromCart__["a" /* RemoveFromCart */].fromMJEvent(event);
                break;
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].productImpression:
                mappedGtmEvent = __WEBPACK_IMPORTED_MODULE_7__models_promotionImpression__["a" /* PromotionImpression */].fromMJEvent(event);
                break;
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].promotionClick:
                mappedGtmEvent = __WEBPACK_IMPORTED_MODULE_8__models_promotionClick__["a" /* PromotionClick */].fromMJEvent(event);
                break;
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].checkout:
                mappedGtmEvent = __WEBPACK_IMPORTED_MODULE_9__models_checkout__["a" /* Checkout */].fromMJEvent(event);
                break;
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].purchase:
                mappedGtmEvent = __WEBPACK_IMPORTED_MODULE_10__models_purchase__["a" /* Purchase */].fromMJEvent(event);
                break;
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].customEvent:
                mappedGtmEvent = __WEBPACK_IMPORTED_MODULE_12__models_customEventModel__["a" /* CustomEventModel */].fromMJEvent(event);
                break;
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].virtualPageView:
                mappedGtmEvent = __WEBPACK_IMPORTED_MODULE_11__models_virtualPageView__["a" /* VirtualPageView */].fromMJEvent(event);
                break;
            default:
                mappedGtmEvent = null;
                break;
        }
        return mappedGtmEvent;
    };
    GTMService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __param(1, Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Inject"])('gtmConfig')),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["g" /* EventManagerService */], Object])
    ], GTMService);
    return GTMService;
}());

//# sourceMappingURL=gtm.service.js.map

/***/ }),
/* 253 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__fbq_module__ = __webpack_require__(386);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_0__fbq_module__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__fbq_service__ = __webpack_require__(254);
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return __WEBPACK_IMPORTED_MODULE_1__fbq_service__["a"]; });


//# sourceMappingURL=index.js.map

/***/ }),
/* 254 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return FBQService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__ = __webpack_require__(7);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__models_viewContent__ = __webpack_require__(387);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__models_addToCart__ = __webpack_require__(388);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__models_checkout__ = __webpack_require__(389);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__models_purchase__ = __webpack_require__(390);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__models_customEventModel__ = __webpack_require__(391);
/**
 * Author - Yogesh Mayacharya
 * Service for Google Tag Manager implementation
 * E-commerce and custom events are tracked for GA using GTM
*/
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var __param = (this && this.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};







var CHECKOUT_STEP_ONE = '1';
var ADD_PAYMENT_INFO_EVENT = 'AddPaymentInfo';
var FBQService = (function () {
    function FBQService(_eventManagerService, config) {
        this._eventManagerService = _eventManagerService;
        this.config = config;
        if (GlobalConfig.fbqid) {
            this.handleEvent();
        }
    }
    /**
     * Subscribe to global event push
     * Track fbq event
     */
    FBQService.prototype.handleEvent = function () {
        this._event = this._eventManagerService.getSubscription();
        this._event.map(this.mapEvent).subscribe(function (event) {
            if (!event) {
                return;
            }
            if (!event.isValid()) {
                return;
            }
            var eventJSON = event.getJson();
            fbq('track', eventJSON.event, eventJSON.customData);
        });
    };
    /**
     * Map global event manager event to respective local fbq event
     * @param event : MJEvent
     */
    FBQService.prototype.mapEvent = function (event) {
        if (!event) {
            return;
        }
        var mappedFBQEvent;
        switch (event.getEventType()) {
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].productView:
                mappedFBQEvent = __WEBPACK_IMPORTED_MODULE_2__models_viewContent__["a" /* ViewContent */].fromMJEvent(event);
                break;
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].addToCart:
                mappedFBQEvent = __WEBPACK_IMPORTED_MODULE_3__models_addToCart__["a" /* AddToCart */].fromMJEvent(event);
                break;
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].checkout:
                if (event['_step'] === CHECKOUT_STEP_ONE) {
                    mappedFBQEvent = __WEBPACK_IMPORTED_MODULE_4__models_checkout__["a" /* Checkout */].fromMJEvent(event);
                }
                break;
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].purchase:
                mappedFBQEvent = __WEBPACK_IMPORTED_MODULE_5__models_purchase__["a" /* Purchase */].fromMJEvent(event);
                break;
            case __WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["h" /* EventType */].customEvent:
                if (event['_event'] === ADD_PAYMENT_INFO_EVENT) {
                    mappedFBQEvent = __WEBPACK_IMPORTED_MODULE_6__models_customEventModel__["a" /* CustomEventModel */].fromMJEvent(event);
                }
                break;
            default:
                mappedFBQEvent = null;
                break;
        }
        return mappedFBQEvent;
    };
    FBQService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __param(1, Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Inject"])('fbqConfig')),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__martjack_ng_event_manager__["g" /* EventManagerService */], Object])
    ], FBQService);
    return FBQService;
}());

//# sourceMappingURL=fbq.service.js.map

/***/ }),
/* 255 */,
/* 256 */,
/* 257 */,
/* 258 */,
/* 259 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AlertOption; });
/*
 * @Author: PV(confused)
 * @Date: 2018-01-03 13:38:54
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2018-01-03 18:17:38
 */
var AlertOption = (function () {
    function AlertOption(title, message, cssClass, dismissName, okName, dismissClass, okClass) {
        this.dismissName = 'Dismiss';
        this.okName = 'Confirm';
        this.dismissClass = 'dismiss-button';
        this.okClass = 'confirm-button';
        this.title = title;
        this.message = message;
        this.cssClass = cssClass;
        if (dismissName) {
            this.dismissName = dismissName;
            this.dismissClass = dismissClass;
            this.okClass = okClass;
            this.okName = okName;
        }
    }
    return AlertOption;
}());

//# sourceMappingURL=alert-options.js.map

/***/ }),
/* 260 */,
/* 261 */,
/* 262 */,
/* 263 */,
/* 264 */,
/* 265 */,
/* 266 */,
/* 267 */,
/* 268 */,
/* 269 */,
/* 270 */,
/* 271 */,
/* 272 */,
/* 273 */,
/* 274 */,
/* 275 */,
/* 276 */,
/* 277 */,
/* 278 */,
/* 279 */,
/* 280 */,
/* 281 */,
/* 282 */,
/* 283 */,
/* 284 */,
/* 285 */,
/* 286 */,
/* 287 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return UserProfile; });
/*
 * @Author: PV(confused)
 * @Date: 2017-12-06 15:11:51
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2018-01-19 15:42:03
 */
var UserProfile = (function () {
    function UserProfile(id, email, mobile, firstName, lastName, accessLevel, image) {
        this.isVegFilter = false;
        this.id = id;
        this.email = email;
        this.mobile = mobile;
        this.firstName = firstName;
        this.lastName = lastName;
        this.accessLevel = accessLevel;
        this.image = image;
    }
    UserProfile.getServiceObject = function (user, merchantID) {
        var userDetails = Object.freeze({
            customer: {
                MobileNo: user.mobile,
                UserName: user.email,
                merchantId: merchantID
            }
        });
        return userDetails;
    };
    UserProfile.getGuesUser = function (id) {
        if (id === void 0) { id = "00000000-0000-0000-0000-000000000000"; }
        return new UserProfile(id, "", "", "", "", "GUEST", "https://pickaface.net/assets/images/slides/slide2.png");
    };
    return UserProfile;
}());

//# sourceMappingURL=user_profile.js.map

/***/ }),
/* 288 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return SearchPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(13);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


/**
 * Generated class for the SearchPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var SearchPage = (function () {
    function SearchPage(navCtrl, viewCtrl, mdlCtrl, app) {
        this.navCtrl = navCtrl;
        this.viewCtrl = viewCtrl;
        this.mdlCtrl = mdlCtrl;
        this.app = app;
    }
    SearchPage.prototype.ionViewDidLoad = function () {
        console.log('ionViewDidLoad SearchPage');
    };
    SearchPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'page-search',template:/*ion-inline-start:"/var/lib/jenkins/workspace/acp-desktop-phindia/source/src/pages/search/search.html"*/'<search-widget></search-widget>'/*ion-inline-end:"/var/lib/jenkins/workspace/acp-desktop-phindia/source/src/pages/search/search.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["k" /* NavController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["p" /* ViewController */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* ModalController */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["b" /* App */]])
    ], SearchPage);
    return SearchPage;
}());

//# sourceMappingURL=search.js.map

/***/ }),
/* 289 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return StoreModeSelectorPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(13);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__martjack_ng_alert_services__ = __webpack_require__(71);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__martjack_ng_context__ = __webpack_require__(34);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




var StoreModeSelectorPage = (function () {
    function StoreModeSelectorPage(navCtrl, navParams, viewCtrl, alertService, context, app) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.viewCtrl = viewCtrl;
        this.alertService = alertService;
        this.context = context;
        this.app = app;
    }
    StoreModeSelectorPage.prototype.ionViewDidLoad = function () {
        this.params = {
            'type': this.navParams.get('type'),
            'returnPage': this.navParams.get('returnPage'),
            'applicableModes': this.navParams.get('applicableModes'),
            'validate': this.navParams.get('validate')
        };
    };
    StoreModeSelectorPage.prototype.navigateTo = function (page) {
        this.viewCtrl.dismiss(null);
    };
    StoreModeSelectorPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'store-mode-selector',template:/*ion-inline-start:"/var/lib/jenkins/workspace/acp-desktop-phindia/source/src/pages/store-mode-selector/store-mode-selector.html"*/'<ion-content class="storeMode">\n    <selection-widget [params]="params"></selection-widget>\n    <div text-center style="color: white;position: relative; top:343px; cursor: pointer;" (click)="navigateTo(\'home\')">{{\'STORE_MODE_SELECTOR_NAVIGATE\'|translate}}</div>\n</ion-content>'/*ion-inline-end:"/var/lib/jenkins/workspace/acp-desktop-phindia/source/src/pages/store-mode-selector/store-mode-selector.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["k" /* NavController */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["l" /* NavParams */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["p" /* ViewController */],
            __WEBPACK_IMPORTED_MODULE_2__martjack_ng_alert_services__["c" /* AlertService */],
            __WEBPACK_IMPORTED_MODULE_3__martjack_ng_context__["f" /* OrionContext */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["b" /* App */]])
    ], StoreModeSelectorPage);
    return StoreModeSelectorPage;
}());

//# sourceMappingURL=store-mode-selector.js.map

/***/ }),
/* 290 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser_dynamic__ = __webpack_require__(291);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__app_module__ = __webpack_require__(295);


Object(__WEBPACK_IMPORTED_MODULE_0__angular_platform_browser_dynamic__["a" /* platformBrowserDynamic */])().bootstrapModule(__WEBPACK_IMPORTED_MODULE_1__app_module__["a" /* AppModule */]);
//# sourceMappingURL=main.js.map

/***/ }),
/* 291 */,
/* 292 */,
/* 293 */,
/* 294 */,
/* 295 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export HttpLoaderFactory */
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__ = __webpack_require__(28);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_common__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_ionic_angular__ = __webpack_require__(13);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__app_component__ = __webpack_require__(372);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__ionic_storage__ = __webpack_require__(41);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__ionic_native_diagnostic__ = __webpack_require__(277);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__ionic_native_open_native_settings__ = __webpack_require__(278);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__angular_common_http__ = __webpack_require__(392);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__ngx_translate_core__ = __webpack_require__(57);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__ngx_translate_http_loader__ = __webpack_require__(393);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__martjack_ng_utils__ = __webpack_require__(35);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__martjack_ng_core_service__ = __webpack_require__(27);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_13__martjack_ng_context__ = __webpack_require__(34);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_14__martjack_ng_config__ = __webpack_require__(21);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_15__martjack_ng_alert_services__ = __webpack_require__(71);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_16__martjack_ng_seo__ = __webpack_require__(42);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_17__angular_http__ = __webpack_require__(39);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_18__global_exceptions__ = __webpack_require__(395);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_19__martjack_ng_event_manager__ = __webpack_require__(7);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_20__martjack_ng_gtm__ = __webpack_require__(251);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_21__martjack_ng_fbq__ = __webpack_require__(253);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};





//Ionic Common Modules

// import { StatusBar } from '@ionic-native/status-bar';
// import { SplashScreen } from '@ionic-native/splash-screen';
// import { AppVersion } from '@ionic-native/app-version';
// import { Network } from '@ionic-native/network';


//Translate Modules



//MJ Common Modules





// import { RaygunModule } from '@martjack/ng-raygun';






function HttpLoaderFactory(http) {
    return new __WEBPACK_IMPORTED_MODULE_10__ngx_translate_http_loader__["a" /* TranslateHttpLoader */](http);
}
var AppModule = (function () {
    function AppModule() {
    }
    AppModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["NgModule"])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_4__app_component__["a" /* MyApp */]
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_17__angular_http__["c" /* HttpModule */],
                __WEBPACK_IMPORTED_MODULE_15__martjack_ng_alert_services__["a" /* AlertModule */].forRoot(),
                __WEBPACK_IMPORTED_MODULE_5__ionic_storage__["a" /* IonicStorageModule */].forRoot(),
                __WEBPACK_IMPORTED_MODULE_14__martjack_ng_config__["a" /* ConfigModule */].forRoot(),
                __WEBPACK_IMPORTED_MODULE_11__martjack_ng_utils__["b" /* CommonsModule */].forRoot(),
                __WEBPACK_IMPORTED_MODULE_13__martjack_ng_context__["g" /* OrionContextModule */].forRoot(),
                __WEBPACK_IMPORTED_MODULE_12__martjack_ng_core_service__["e" /* CoreServiceModule */].forRoot(),
                // RaygunModule.forRoot(),
                __WEBPACK_IMPORTED_MODULE_16__martjack_ng_seo__["c" /* SeoModule */].forRoot(),
                __WEBPACK_IMPORTED_MODULE_19__martjack_ng_event_manager__["f" /* EventManagerModule */].forRoot(),
                __WEBPACK_IMPORTED_MODULE_20__martjack_ng_gtm__["a" /* GTMModule */].forRoot({
                    "gtm": {
                        "gtmID": GlobalConfig.gtmID,
                        "gaTrackingID": GlobalConfig.gaTrackingID
                    }
                }),
                __WEBPACK_IMPORTED_MODULE_21__martjack_ng_fbq__["a" /* FBQModule */].forRoot({ "fbqId": GlobalConfig.fbqid }),
                __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__["a" /* BrowserModule */].withServerTransition({ appId: 'angular-universal-demo' }),
                __WEBPACK_IMPORTED_MODULE_3_ionic_angular__["e" /* IonicModule */].forRoot(__WEBPACK_IMPORTED_MODULE_4__app_component__["a" /* MyApp */], {
                    mode: 'md',
                    tabsPlacement: 'top',
                    tabsHideOnSubPages: true,
                    preloadModules: true,
                    locationStrategy: 'path'
                }, {
                    links: [
                        { loadChildren: '../pages/about/about.module#AboutPageModule', name: 'about', segment: 'about', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/builder/builder.module#BuilderPageModule', name: 'builder', segment: 'builder', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/checkout/checkout.module#CheckoutPageModule', name: 'checkout', segment: 'checkout', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/add-edit-address/add-edit-address.module#AddEditAddressPageModule', name: 'newaddress', segment: 'address/add', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/coupons/coupons.module#CouponsPageModule', name: 'coupons', segment: 'coupons', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/customization/customization.module#CustomizationPageModule', name: 'customization', segment: 'customization', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/deal-details/deal-details.module#DealDetailsPageModule', name: 'deal-details', segment: 'deal-details', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/deals-completed/deals-completed.module#DealsCompletedPageModule', name: 'deals-completed', segment: 'deals-completed', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/contact/contact.module#ContactPageModule', name: 'contact', segment: 'contact', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/deal-landing/deal-landing.module#DealLandingModule', name: 'deal-landing', segment: 'deals/:deal-name', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/addresses/addresses.module#AddressesPageModule', name: 'addresses', segment: 'address/list', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/deals/deals.module#DealsPageModule', name: 'deals', segment: 'deals', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/delivery-success/delivery-success.module#DelierySuccessModule', name: 'delivery-success', segment: 'delivery-success', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/desserts/desserts.module#DessertsPageModule', name: 'desserts', segment: 'desserts', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/drinks/drinks.module#DrinksPageModule', name: 'drinks', segment: 'drinks', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/home/home.module#HomePageModule', name: 'home', segment: 'home', priority: 'high', defaultHistory: [] },
                        { loadChildren: '../pages/favourites/favourites.module#LoginPageModule', name: 'favourites', segment: 'favourites', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/location/location.module#LocationPageModule', name: 'location', segment: 'location', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/login/login.module#LoginPageModule', name: 'login', segment: 'login', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/mobile/mobile.module#MobilePageModule', name: 'mobile', segment: 'mobile', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/ng-rider-tracking/rider-tracking.module#RiderTrackingModule', name: 'rider-tracking', segment: 'rider-tracking', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/nutrition/nutrition.module#NutritionPageModule', name: 'nutrition', segment: 'nutrition', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/ng-promotion/promotion.module#PromotionModalModule', name: 'promotion', segment: 'promotion', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/order-history/order-history.module#OrderHistoryPageModule', name: 'order-history', segment: 'orders', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/otp-verification/otp-verification.module#OTPVerficationModule', name: 'verification', segment: 'otp-verification', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/pdp-view2/pdp-view2.module#PdpView2PageModule', name: 'pdpdetails', segment: 'pdp-view2', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/order-details/order-details.module#OrderDetailsPageModule', name: 'order-details', segment: 'orders/:id/:mobile', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/pizza/pizza.module#PizzaModule', name: 'pizza', segment: 'pizza', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/pdp/pdp.module#PdpPageModule', name: 'pdp', segment: 'pdp', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/pizza-builder/pizza-builder.module#PizzaBuilderPageModule', name: 'PizzaBuilderPage', segment: 'pizza-builder', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/profile/profile.module#ProfilePageModule', name: 'profile', segment: 'profile', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/product-landing/product-landing.module#ProductLandingModule', name: 'offers-landing', segment: 'offers/:promo', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/search-order/search-order.module#SuccessPageModule', name: 'search-order', segment: 'order/search', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/search/search.module#SearchPageModule', name: 'search', segment: 'search', priority: 'high', defaultHistory: [] },
                        { loadChildren: '../pages/setpassword/setpassword.module#SetpasswordPageModule', name: 'SetpasswordPage', segment: 'setpassword', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/showcase/showcase.module#ShowcaseModule', name: 'product', segment: 'product', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/sides/sides.module#SidesModule', name: 'sides', segment: 'sides', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/slots/slots.module#SlotsPageModule', name: 'SlotsPage', segment: 'slots', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/store-mode-selector/store-mode-selector.module#StoreModeSelectorPageModule', name: 'store-mode-selector', segment: 'store-mode-selector', priority: 'high', defaultHistory: [] },
                        { loadChildren: '../pages/store-list/store-list.module#StoreListPageModule', name: 'stores', segment: 'stores', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/success/success.module#SuccessPageModule', name: 'success', segment: 'success/:id/:mobile', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/terms/terms.module#TermsPageModule', name: 'terms', segment: 'terms', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/track/track.module#TrackPageModule', name: 'track-order', segment: 'track/:id/:mobile', priority: 'off', defaultHistory: [] },
                        { loadChildren: '../pages/registration/registration.module#RegistrationPageModule', name: 'registration', segment: 'registration', priority: 'off', defaultHistory: [] }
                    ]
                }),
                __WEBPACK_IMPORTED_MODULE_8__angular_common_http__["b" /* HttpClientModule */],
                __WEBPACK_IMPORTED_MODULE_9__ngx_translate_core__["b" /* TranslateModule */].forRoot({
                    loader: {
                        provide: __WEBPACK_IMPORTED_MODULE_9__ngx_translate_core__["a" /* TranslateLoader */],
                        useFactory: HttpLoaderFactory,
                        deps: [__WEBPACK_IMPORTED_MODULE_8__angular_common_http__["a" /* HttpClient */]]
                    }
                })
            ],
            bootstrap: [__WEBPACK_IMPORTED_MODULE_3_ionic_angular__["d" /* IonicApp */]],
            entryComponents: [
                __WEBPACK_IMPORTED_MODULE_4__app_component__["a" /* MyApp */]
            ],
            providers: [
                __WEBPACK_IMPORTED_MODULE_2__angular_common__["c" /* CurrencyPipe */],
                __WEBPACK_IMPORTED_MODULE_2__angular_common__["e" /* DecimalPipe */],
                __WEBPACK_IMPORTED_MODULE_9__ngx_translate_core__["c" /* TranslatePipe */],
                __WEBPACK_IMPORTED_MODULE_6__ionic_native_diagnostic__["a" /* Diagnostic */],
                __WEBPACK_IMPORTED_MODULE_7__ionic_native_open_native_settings__["a" /* OpenNativeSettings */],
                //AppVersion, Network,
                // StatusBar,
                // SplashScreen,
                __WEBPACK_IMPORTED_MODULE_15__martjack_ng_alert_services__["c" /* AlertService */],
                __WEBPACK_IMPORTED_MODULE_15__martjack_ng_alert_services__["c" /* AlertService */],
                { provide: __WEBPACK_IMPORTED_MODULE_1__angular_core__["ErrorHandler"], useClass: __WEBPACK_IMPORTED_MODULE_18__global_exceptions__["a" /* MyExceptionHandler */] },
            ]
        })
    ], AppModule);
    return AppModule;
}());

//# sourceMappingURL=app.module.js.map

/***/ }),
/* 296 */,
/* 297 */,
/* 298 */,
/* 299 */,
/* 300 */,
/* 301 */,
/* 302 */,
/* 303 */,
/* 304 */,
/* 305 */,
/* 306 */,
/* 307 */,
/* 308 */,
/* 309 */,
/* 310 */,
/* 311 */,
/* 312 */,
/* 313 */,
/* 314 */,
/* 315 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export seoServiceFactory */
/* unused harmony export seoControllerFactory */
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return SeoModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__martjack_ng_core_service__ = __webpack_require__(27);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__martjack_ng_config__ = __webpack_require__(21);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4____ = __webpack_require__(42);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__martjack_ng_utils__ = __webpack_require__(35);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__ngx_meta_core__ = __webpack_require__(205);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7_ionic_angular__ = __webpack_require__(13);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};









function seoServiceFactory(config, api, commons) {
    return new __WEBPACK_IMPORTED_MODULE_4____["e" /* SeoService */](config, api, commons);
}
function seoControllerFactory(seo, app, meta) {
    return new __WEBPACK_IMPORTED_MODULE_4____["b" /* SeoController */](seo, app, meta);
}
var SeoModule = (function () {
    function SeoModule() {
    }
    SeoModule_1 = SeoModule;
    SeoModule.forRoot = function () {
        return {
            ngModule: SeoModule_1,
            providers: [{
                    provide: __WEBPACK_IMPORTED_MODULE_4____["e" /* SeoService */],
                    useFactory: seoServiceFactory,
                    deps: [__WEBPACK_IMPORTED_MODULE_3__martjack_ng_config__["b" /* MJConfig */], __WEBPACK_IMPORTED_MODULE_2__martjack_ng_core_service__["a" /* ApiService */], __WEBPACK_IMPORTED_MODULE_5__martjack_ng_utils__["a" /* Commons */]]
                },
                {
                    provide: __WEBPACK_IMPORTED_MODULE_4____["b" /* SeoController */],
                    useFactory: seoControllerFactory,
                    deps: [__WEBPACK_IMPORTED_MODULE_4____["e" /* SeoService */], __WEBPACK_IMPORTED_MODULE_7_ionic_angular__["b" /* App */], __WEBPACK_IMPORTED_MODULE_6__ngx_meta_core__["b" /* MetaService */]]
                }]
        };
    };
    SeoModule = SeoModule_1 = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */],
                __WEBPACK_IMPORTED_MODULE_6__ngx_meta_core__["a" /* MetaModule */].forRoot()
            ]
        })
    ], SeoModule);
    return SeoModule;
    var SeoModule_1;
}());

;
//# sourceMappingURL=seo_module.js.map

/***/ }),
/* 316 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export serviceHelperFactory */
/* unused harmony export authServiceFactory */
/* unused harmony export sessionHandlerFactory */
/* unused harmony export apiServiceFactory */
/* unused harmony export appUpdateServiceFactory */
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CoreServiceModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_http__ = __webpack_require__(39);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__martjack_ng_config__ = __webpack_require__(21);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__martjack_ng_utils__ = __webpack_require__(35);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_ionic_angular__ = __webpack_require__(13);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6____ = __webpack_require__(27);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__ionic_storage__ = __webpack_require__(41);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__martjack_ng_context__ = __webpack_require__(34);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};









function serviceHelperFactory() {
    return new __WEBPACK_IMPORTED_MODULE_6____["f" /* ServiceHelper */]();
}
function authServiceFactory(http, config) {
    return new __WEBPACK_IMPORTED_MODULE_6____["c" /* AuthenticationService */](http, config);
}
function sessionHandlerFactory(config, storage, serviceHelper) {
    return new __WEBPACK_IMPORTED_MODULE_6____["g" /* SessionHandler */](config, storage, serviceHelper);
}
function apiServiceFactory(http, storage, events, auth, serviceHelper, commons, sessionHandler, context) {
    return new __WEBPACK_IMPORTED_MODULE_6____["a" /* ApiService */](http, storage, events, auth, serviceHelper, commons, sessionHandler, context);
}
function appUpdateServiceFactory(api, config) {
    return new __WEBPACK_IMPORTED_MODULE_6____["b" /* AppUpdateService */](api, config);
}
var CoreServiceModule = (function () {
    function CoreServiceModule() {
    }
    CoreServiceModule_1 = CoreServiceModule;
    CoreServiceModule.forRoot = function () {
        return {
            ngModule: CoreServiceModule_1,
            providers: [{
                    provide: __WEBPACK_IMPORTED_MODULE_6____["f" /* ServiceHelper */], useFactory: serviceHelperFactory
                }, {
                    provide: __WEBPACK_IMPORTED_MODULE_6____["c" /* AuthenticationService */], useFactory: authServiceFactory, deps: [__WEBPACK_IMPORTED_MODULE_2__angular_http__["b" /* Http */], __WEBPACK_IMPORTED_MODULE_3__martjack_ng_config__["b" /* MJConfig */]]
                }, {
                    provide: __WEBPACK_IMPORTED_MODULE_6____["g" /* SessionHandler */], useFactory: sessionHandlerFactory, deps: [__WEBPACK_IMPORTED_MODULE_3__martjack_ng_config__["b" /* MJConfig */], __WEBPACK_IMPORTED_MODULE_7__ionic_storage__["b" /* Storage */], __WEBPACK_IMPORTED_MODULE_6____["f" /* ServiceHelper */]]
                }, {
                    provide: __WEBPACK_IMPORTED_MODULE_6____["a" /* ApiService */], useFactory: apiServiceFactory, deps: [__WEBPACK_IMPORTED_MODULE_2__angular_http__["b" /* Http */], __WEBPACK_IMPORTED_MODULE_7__ionic_storage__["b" /* Storage */],
                        __WEBPACK_IMPORTED_MODULE_5_ionic_angular__["c" /* Events */], __WEBPACK_IMPORTED_MODULE_6____["c" /* AuthenticationService */], __WEBPACK_IMPORTED_MODULE_6____["f" /* ServiceHelper */], __WEBPACK_IMPORTED_MODULE_4__martjack_ng_utils__["a" /* Commons */], __WEBPACK_IMPORTED_MODULE_6____["g" /* SessionHandler */], __WEBPACK_IMPORTED_MODULE_8__martjack_ng_context__["f" /* OrionContext */]]
                }, {
                    provide: __WEBPACK_IMPORTED_MODULE_6____["b" /* AppUpdateService */], useFactory: appUpdateServiceFactory, deps: [__WEBPACK_IMPORTED_MODULE_6____["a" /* ApiService */], __WEBPACK_IMPORTED_MODULE_3__martjack_ng_config__["b" /* MJConfig */]]
                }]
        };
    };
    CoreServiceModule = CoreServiceModule_1 = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */]
            ]
        })
    ], CoreServiceModule);
    return CoreServiceModule;
    var CoreServiceModule_1;
}());

//# sourceMappingURL=core-services.module.js.map

/***/ }),
/* 317 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export configServiceFactory */
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ConfigModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__config__ = __webpack_require__(196);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_common__ = __webpack_require__(12);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



function configServiceFactory() {
    return new __WEBPACK_IMPORTED_MODULE_1__config__["a" /* MJConfig */]();
}
var ConfigModule = (function () {
    function ConfigModule() {
    }
    ConfigModule_1 = ConfigModule;
    ConfigModule.forRoot = function () {
        return {
            ngModule: ConfigModule_1,
            providers: [__WEBPACK_IMPORTED_MODULE_1__config__["a" /* MJConfig */]]
        };
    };
    ConfigModule = ConfigModule_1 = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [__WEBPACK_IMPORTED_MODULE_2__angular_common__["b" /* CommonModule */]]
        })
    ], ConfigModule);
    return ConfigModule;
    var ConfigModule_1;
}());

//# sourceMappingURL=config_module.js.map

/***/ }),
/* 318 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export commonServiceFactory */
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CommonsModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__commons__ = __webpack_require__(197);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_common__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_ionic_angular__ = __webpack_require__(13);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};


// import { AppVersion } from '@ionic-native/app-version';
// import { Network } from '@ionic-native/network';


//appVersion: AppVersion, network: Network
function commonServiceFactory(platform) {
    return new __WEBPACK_IMPORTED_MODULE_1__commons__["a" /* Commons */](platform);
}
var CommonsModule = (function () {
    function CommonsModule() {
    }
    CommonsModule_1 = CommonsModule;
    CommonsModule.forRoot = function () {
        return {
            ngModule: CommonsModule_1,
            providers: [{
                    provide: __WEBPACK_IMPORTED_MODULE_1__commons__["a" /* Commons */], useFactory: commonServiceFactory, deps: [__WEBPACK_IMPORTED_MODULE_3_ionic_angular__["m" /* Platform */]]
                }]
        };
    };
    CommonsModule = CommonsModule_1 = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [__WEBPACK_IMPORTED_MODULE_2__angular_common__["b" /* CommonModule */]]
        })
    ], CommonsModule);
    return CommonsModule;
    var CommonsModule_1;
}());

//appVersion, network
//AppVersion, Network 
//# sourceMappingURL=common_module.js.map

/***/ }),
/* 319 */,
/* 320 */,
/* 321 */,
/* 322 */,
/* 323 */,
/* 324 */,
/* 325 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export orionContextServiceFactory */
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return OrionContextModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__orion_context__ = __webpack_require__(198);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_common__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__ionic_storage__ = __webpack_require__(41);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};




function orionContextServiceFactory(storage) {
    return new __WEBPACK_IMPORTED_MODULE_1__orion_context__["a" /* OrionContext */](storage);
}
var OrionContextModule = (function () {
    function OrionContextModule() {
    }
    OrionContextModule_1 = OrionContextModule;
    OrionContextModule.forRoot = function () {
        return {
            ngModule: OrionContextModule_1,
            providers: [{
                    provide: __WEBPACK_IMPORTED_MODULE_1__orion_context__["a" /* OrionContext */], useFactory: orionContextServiceFactory, deps: [__WEBPACK_IMPORTED_MODULE_3__ionic_storage__["b" /* Storage */]]
                }]
        };
    };
    OrionContextModule = OrionContextModule_1 = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [__WEBPACK_IMPORTED_MODULE_2__angular_common__["b" /* CommonModule */]]
        })
    ], OrionContextModule);
    return OrionContextModule;
    var OrionContextModule_1;
}());

//# sourceMappingURL=orion-context.module.js.map

/***/ }),
/* 326 */,
/* 327 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Location; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__locationdetails__ = __webpack_require__(201);
/*
 * @Author: PV(confused)
 * @Date: 2017-12-14 15:42:18
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2017-12-15 03:06:43
 */

var Location = (function () {
    function Location(location) {
        var _this = this;
        this.additionalDetails = {};
        this.deliveryModes = [];
        this.name = location.description;
        this.placeID = location.place_id;
        if (location.AdditionalDetails) {
            location.AdditionalDetails.forEach(function (element) {
                if (element.Key && element.Value) {
                    _this.additionalDetails[element.Key] = element.Value;
                }
            });
        }
        this.deliveryModes = location.DeliveryModes;
    }
    Location.prototype.update = function (latitude, longitude, formated) {
        this.latitude = latitude;
        this.formated = formated;
        this.longitude = longitude;
    };
    Location.prototype.updatePostalDetail = function (locationDetails) {
        this.placeID = locationDetails.place_id;
        this.latitude = locationDetails.geometry.location.lat;
        this.longitude = locationDetails.geometry.location.lng;
        this.formated = locationDetails.formatted_address;
        this.postalDetails = new __WEBPACK_IMPORTED_MODULE_0__locationdetails__["a" /* PostalDetails */](locationDetails);
    };
    Location.prototype.updateLocality = function (localityAddress) {
        this.locality = localityAddress;
    };
    Location.copy = function (location) {
        var newLocation = new Location({});
        newLocation.name = location.name;
        newLocation.placeID = location.placeID;
        newLocation.latitude = location.latitude;
        newLocation.longitude = location.longitude;
        newLocation.formated = location.formated;
        newLocation.postalDetails = location.postalDetails;
        return newLocation;
    };
    Location.prototype.isValid = function () {
        if (!this.name && !this.placeID) {
            return false;
        }
        return true;
    };
    Location.prototype.canFindAddress = function () {
        if (!this.latitude || !this.longitude) {
            return false;
        }
        return true;
    };
    /**
     * @param location
     */
    Location.prototype.equals = function (location) {
        if (this.placeID == location.placeID)
            return true;
        return false;
    };
    return Location;
}());

//# sourceMappingURL=location.js.map

/***/ }),
/* 328 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ADDRESS_MAP; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return CITY_MAP; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return COUNTRY_MAP; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "d", function() { return POSTAL_CODE_MAP; });
var ADDRESS_MAP = {
    'gcode': 'administrative_area_level_1',
    'mcode': 'state'
};
var CITY_MAP = {
    'gcode': 'administrative_area_level_2',
    'mcode': 'city'
};
var COUNTRY_MAP = {
    'gcode': 'country',
    'mcode': 'country'
};
var POSTAL_CODE_MAP = {
    'gcode': 'postal_code',
    'mcode': 'pinCode'
};
//# sourceMappingURL=constants.js.map

/***/ }),
/* 329 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Store; });
/*
 * @Author: PV(confused)
 * @Date: 2017-12-15 17:11:09
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2018-01-04 18:08:04
 */
var Store = (function () {
    function Store(store) {
        this.otherCity = '';
        if (!store) {
            return;
        }
        this.pincode = store.Pincode;
        this.id = store.ID;
        this.name = store.Name;
        this.description = store.Description;
        this.address = store.Address;
        this.city = store.City;
        this.cityID = store.CityID;
        this.country = store.Country;
        this.countryCode = store.CountryCode;
        this.deliveryMode = store.DeliveryMode;
        this.latitude = store.Latitude;
        this.longitude = store.Longitude;
        this.state = store.State;
        this.stateCode = store.StateCode;
        this.area = store.Area;
        this.areaName = store.AreaName;
        this.locationCode = store.LocationCode;
        this.contactNo = store.ContactNo;
        this.onTime = store.OnTime;
        this.offTime = store.OffTime;
        this.distance = store.Distance;
    }
    /**
     * to validate the store, we are checking if ID, Name and address are valid
     */
    Store.prototype.isValid = function () {
        if (this.id && this.name) {
            return true;
        }
        else {
            return false;
        }
    };
    return Store;
}());

//# sourceMappingURL=store.js.map

/***/ }),
/* 330 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export Slot */
/*
 * @Author: PV(confused)
 * @Date: 2018-03-19 19:12:21
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2018-03-20 17:41:04
 *
 * This is just to store the object so that slot can be retrieved for
 * compare purpose
 */
var Slot = (function () {
    function Slot(slot) {
        this.slotId = slot.slotId;
        this.slotTime = slot.slotTime;
        this.time = slot.time;
        this.day = slot.day;
        this.dateTime = slot.dateTime;
        this.deliveryDate = slot.deliveryDate;
    }
    Slot.setDefaultSlot = function () {
        return new Slot({
            slotId: -1,
            time: "ASAP",
            day: "TODAY",
            dateTime: "TODAY ASAP",
            deliveryDate: new Date().toDateString()
        });
    };
    return Slot;
}());

//# sourceMappingURL=slot.js.map

/***/ }),
/* 331 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CartSummary; });
var CartSummary = (function () {
    function CartSummary(storeID, orderMode) {
        this.total = 0;
        this.price = 0;
        this.totalPrice = 0;
        this.storeID = storeID;
        this.orderMode = orderMode;
    }
    CartSummary.add = function (cart, price, total) {
        if (!cart.price)
            cart.price = 0;
        cart.price += price;
        cart.totalPrice += price;
        cart.total += total;
    };
    CartSummary.remove = function (cart, price, total) {
        cart.price -= price;
        cart.totalPrice -= price;
        cart.total -= total;
    };
    CartSummary.update = function (cart, price, total) {
        cart.price = price;
        cart.total = total;
    };
    CartSummary.updateAll = function (cart, price, total, totalPrice) {
        cart.price = price;
        cart.totalPrice = totalPrice;
        cart.total = total;
    };
    return CartSummary;
}());

//# sourceMappingURL=cart-summary.js.map

/***/ }),
/* 332 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ApiService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_http__ = __webpack_require__(39);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_rxjs_add_operator_map__ = __webpack_require__(54);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_rxjs_add_operator_map___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_3_rxjs_add_operator_map__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_add_operator_catch__ = __webpack_require__(132);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_add_operator_catch___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_4_rxjs_add_operator_catch__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_rxjs_add_observable_throw__ = __webpack_require__(55);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_rxjs_add_observable_throw___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_5_rxjs_add_observable_throw__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6_rxjs_add_operator_mergeMap__ = __webpack_require__(130);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6_rxjs_add_operator_mergeMap___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_6_rxjs_add_operator_mergeMap__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7_rxjs_add_observable_of__ = __webpack_require__(56);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7_rxjs_add_observable_of___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_7_rxjs_add_observable_of__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__service_helper__ = __webpack_require__(105);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__session_handler__ = __webpack_require__(202);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__authentication_service__ = __webpack_require__(204);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11_ionic_angular__ = __webpack_require__(13);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__ionic_storage__ = __webpack_require__(41);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_13__martjack_ng_utils__ = __webpack_require__(35);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_14__martjack_ng_context__ = __webpack_require__(34);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
/*
 * @Author: PV(confused)
 * @Date: 2017-12-06 15:11:51
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2018-01-18 20:03:26
 */











//models




// import { TrackingService } from '../../services/mixpanel';
// import { TrackingEventName } from '../../constants/mixpanel';
var CACHE_TTL = 60 * 60; // 1 hour
//WILL GO IN READ ME
//1. this.events.publish('api:resolved', true);
//  Error Obj : { "error": key, "code": value[0] }
//2. this.events.publish('api:no-network', true);
var ApiService = (function () {
    function ApiService(http, storage, events, auth, serviceHelper, commons, sessionHandler, context) {
        this.http = http;
        this.storage = storage;
        this.events = events;
        this.auth = auth;
        this.serviceHelper = serviceHelper;
        this.commons = commons;
        this.sessionHandler = sessionHandler;
        this.context = context;
        this.showToast = true;
    }
    ApiService.prototype.hasConnection = function () {
        return this.commons.hasConnection();
    };
    /**
     * Builds the url to be called
     *
     * @param location
     * @param params
     * @param domain
     */
    ApiService.prototype.getUrl = function (location, params) {
        var url = location;
        if (__WEBPACK_IMPORTED_MODULE_13__martjack_ng_utils__["a" /* Commons */].isCordova()) {
            var url_1 = this.serviceHelper.getApiUrl() + "/" + location;
        }
        var queryParams = this.serviceHelper.getQueryParams(params);
        url += "?" + queryParams.toString();
        return url;
    };
    /**
     * Sends the response status to Tracking Service
     * and raise a event to check if anything needs to be done about api
     * api:resolved
     *
     * @param timeStart
     * @param location
     * @param params
     */
    ApiService.prototype.logResponseTime = function (timeStart, location, params, code) {
        var timeEnd = Date.now();
        var timeTaken = (timeEnd - timeStart) / 1000;
        var p = {
            "url": location,
            "responseCode": code,
            "timeTakem": timeTaken
        };
        if (params != null && typeof params != 'undefined') {
            params.forEach(function (v, k) {
                p[k] = v;
            });
        }
        //this.trackingService.track(MixpanelEventName.API_TIME, p);
        this.events.publish('api:resolved', true);
    };
    ApiService.prototype.handleBadHttpResponse = function (code) {
        var codeMap = new Map();
        codeMap.set(401, "NOT-AUTHORISED");
        var lookup = codeMap.get(code);
        if (lookup) {
            var globalErr = { "error": lookup, "code": code };
            this.events.publish('api:resolved', globalErr);
            throw __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].throw(globalErr);
        }
    };
    //TODO : actual auth exception will need to come in
    //We also need to handle the session & auth token separately
    ApiService.prototype.handleExceptionAndApply = function (data, isError) {
        var _this = this;
        if (isError === void 0) { isError = false; }
        var codeMap = new Map();
        codeMap.set("NO-NETWORK", [0]);
        codeMap.set("BAD-GATEWAY", [500, 502]);
        codeMap.set("NOT-AUTHORISED", [401, 403, 405, 1013]);
        codeMap.forEach(function (value, key) {
            var code = data.MessageCode;
            if (data.messageCode) {
                code = data.messageCode;
            }
            try {
                code = parseInt(code);
            }
            catch (e) { }
            if (isError)
                code = data.status; //HTTP header
            if (code && value.indexOf(code) > -1) {
                var globalErr = { "error": key, "code": value[0] };
                _this.events.publish('api:resolved', globalErr);
                throw __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].throw(globalErr);
            }
        });
        if (isError)
            throw __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].throw(data);
    };
    ApiService.prototype.getCode = function (res) {
        var code = 200;
        if (!__WEBPACK_IMPORTED_MODULE_13__martjack_ng_utils__["a" /* Commons */].isEmpty(res) && __WEBPACK_IMPORTED_MODULE_13__martjack_ng_utils__["a" /* Commons */].isKeyExists("MessageCode", res)) {
            code = res["MessageCode"];
        }
        if (!__WEBPACK_IMPORTED_MODULE_13__martjack_ng_utils__["a" /* Commons */].isEmpty(res) && __WEBPACK_IMPORTED_MODULE_13__martjack_ng_utils__["a" /* Commons */].isKeyExists("messageCode", res)) {
            code = res["messageCode"];
        }
        return code;
    };
    /**
     * creates the session
     */
    ApiService.prototype.createSession = function (forceAuthValid) {
        var _this = this;
        if (forceAuthValid === void 0) { forceAuthValid = false; }
        return this.sessionHandler.doesSessionExists().flatMap(function (doesExists) {
            if (doesExists) {
                return _this.sessionHandler.isAuthValid().flatMap(function (isAuthValid) {
                    if (!isAuthValid || forceAuthValid) {
                        console.log("Test: Invalid Auth refreshing the same");
                        return _this.auth.renewAuthToken().map(function (authToken) {
                            var session = _this.sessionHandler.sessionDetails;
                            var res = {
                                "auth": {
                                    "authToken": authToken.json(),
                                    "accessToken": session.auth.accessToken.value
                                }
                            };
                            return res;
                        });
                    }
                    else {
                        var session = _this.sessionHandler.sessionDetails;
                        var res = {
                            "auth": {
                                "authToken": session.auth.bearerToken.value,
                                "accessToken": session.auth.accessToken.value
                            }
                        };
                        return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].of(res);
                    }
                });
            }
            return _this.auth.getAuthentication();
        }).flatMap(function (res) {
            //console.log("Test: " + JSON.stringify(res));
            return _this.sessionHandler.buildSession(res);
        });
    };
    ApiService.prototype.logout = function () {
        this.sessionHandler.clearSession();
        return this.createSession();
    };
    ApiService.prototype.httpGet = function (location, params, headerOptions) {
        var _this = this;
        var timeStart = Date.now();
        var url = this.getUrl(location, params);
        console.log('Url:' + url);
        return this.createSession()
            .flatMap(function (session) {
            var options = _this.serviceHelper.getHeaders(headerOptions);
            console.log('Options:' + options);
            return _this.http.get(url, options);
        }).map(function (res) {
            _this.logResponseTime(timeStart, location, params, _this.getCode(res));
            var response = res.json();
            _this.handleExceptionAndApply(response);
            return response;
        }).catch(function (err) {
            _this.logResponseTime(timeStart, location, params, err.status);
            _this.handleBadHttpResponse(err.status);
            return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].throw(err);
        });
    };
    /**
     * Check Item for Expired Cache
     * In case of no connection it would be fetched from cached data.
     * @param {data: any, expires: number} item - Cache item
     * @returns {boolean}
     */
    ApiService.prototype.itemExpired = function (item, ttl, keyName) {
        if (!this.hasConnection()) {
            /**
             * ng-utils exposes a service which handles
             * this as a toast. In case someone wants to overide that they can implement thier own
             */
            this.events.publish('api:no-network', true);
            return false;
        }
        var isExpired = (typeof item !== 'undefined' && typeof item.expires !== 'undefined') ?
            this.currentTimestamp() > item.expires : true;
        if (isExpired || ttl < 0) {
            this.storage.remove(keyName);
            return true;
        }
        return false;
    };
    /**
     * Get Current Timestamp
     * @returns {number}
     */
    ApiService.prototype.currentTimestamp = function () {
        return Math.floor(new Date().getTime() / 1000);
    };
    /**
     * Returns the post call
     * @param location
     * @param data
     * @param params
     * @param domain
     */
    ApiService.prototype.post = function (location, data, params, domain) {
        var _this = this;
        var timeStart = Date.now();
        var url = this.getUrl(location, params);
        console.log('Url:' + url);
        return this.createSession()
            .flatMap(function (session) {
            var options = _this.serviceHelper.getHeaders(new Map());
            return _this.http.post(url, data, options);
        })
            .map(function (res) {
            _this.logResponseTime(timeStart, location, params, _this.getCode(res));
            var response = (typeof res.json() === "object") ? res.json() : JSON.parse(res.json());
            _this.handleExceptionAndApply(response);
            return response;
        }).catch(function (err) {
            _this.logResponseTime(timeStart, location, params, err.status);
            _this.handleBadHttpResponse(err.status);
            return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].throw(err);
        });
    };
    /**
     * Returns the post call
     * @param location
     * @param data
     * @param params
     * @param domain
     */
    ApiService.prototype.put = function (location, data, params, domain) {
        var _this = this;
        var timeStart = Date.now();
        var url = this.getUrl(location, params);
        console.log('Url:' + url);
        return this.createSession()
            .flatMap(function (session) {
            var options = _this.serviceHelper.getHeaders(new Map());
            return _this.http.put(url, data, options);
        })
            .map(function (res) {
            _this.logResponseTime(timeStart, location, params, _this.getCode(res));
            var response = (typeof res.json() === "object") ? res.json() : JSON.parse(res.json());
            _this.handleExceptionAndApply(response);
            return response;
        }).catch(function (err) {
            _this.logResponseTime(timeStart, location, params, err.status);
            _this.handleBadHttpResponse(err.status);
            return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].throw(err);
        });
    };
    /**
     * Returns the post call
     * @param location
     * @param data
     * @param params
     * @param domain
     */
    ApiService.prototype.delete = function (location, params, domain) {
        var _this = this;
        var timeStart = Date.now();
        var url = this.getUrl(location, params);
        var options = this.serviceHelper.getHeaders(new Map());
        console.log('Url:' + url);
        console.log('Options:' + options);
        return this.createSession()
            .flatMap(function (session) {
            var options = _this.serviceHelper.getHeaders(new Map());
            return _this.http.delete(url, options);
        })
            .map(function (res) {
            _this.logResponseTime(timeStart, location, params, _this.getCode(res));
            var response = (typeof res.json() === "object") ? res.json() : JSON.parse(res.json());
            _this.handleExceptionAndApply(response);
            return response;
        }).catch(function (err) {
            _this.logResponseTime(timeStart, location, params, err.status);
            _this.handleBadHttpResponse(err.status);
            return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].throw(err);
        });
    };
    /**
     * Get Cached Item
     * @param {string} location - API endpoint of cached item
     * @param {map} params - Query params that would be passed in the get call
     * @param {number=} ttl - TTL in seconds (-1 to invalidate immediately)
     * @param {string} keyName - Cache key : if not passed we would make location as key
     */
    ApiService.prototype.get = function (location, params, ttl, keyName, headerOptions) {
        var _this = this;
        if (ttl === void 0) { ttl = -1; }
        if (typeof keyName == 'undefined') {
            keyName = location;
        }
        var timeStart = Date.now();
        var url = this.getUrl(location, params);
        // if ttl is < 0, delete cached item and retrieve a fresh one
        var forceExpiry = false;
        if (ttl < 0) {
            forceExpiry = true;
        }
        keyName = keyName + '_' + this.serviceHelper.getLanguageCode();
        return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].fromPromise(this.storage.get(keyName))
            .flatMap(function (cachedResult) {
            if (cachedResult != null && typeof cachedResult !== 'undefined') {
                // something's in the cache
                var data_1 = JSON.parse(cachedResult);
                return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].of({
                    "expired": _this.itemExpired(data_1, ttl, keyName),
                    "data": data_1
                });
            }
            var data = {};
            return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].of({ "expired": true, "data": data });
        }).flatMap(function (cachedData) {
            if (cachedData.expired)
                return _this.httpGet(location, params, headerOptions);
            return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].of({
                "static": true, "data": cachedData.data.data
            });
        }).flatMap(function (res) {
            if (__WEBPACK_IMPORTED_MODULE_13__martjack_ng_utils__["a" /* Commons */].isKeyExists("static", res)
                && res.static)
                return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].of(res.data);
            return _this.setItem(keyName, res, params, ttl);
        });
    };
    ApiService.prototype.noCacheGet = function (location, params, headerOptions) {
        return this.httpGet(location, params, headerOptions);
    };
    /**
     * Set Cached Item
     * @param {string} name - Key name of item to store
     * @param {any} data - Value of data to store
     * @param {Map<string, string>} params - Query Params
     * @param {ttl=} ttl - TTL in seconds
     */
    ApiService.prototype.setItem = function (name, data, params, ttl) {
        // TODO Checks to be added
        //TODO: Handle empty object caching ???
        if (__WEBPACK_IMPORTED_MODULE_13__martjack_ng_utils__["a" /* Commons */].isNull(data)) {
            return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].of(data);
        }
        var expiration = (typeof ttl !== 'undefined' && ttl) ?
            this.currentTimestamp() + ttl : this.currentTimestamp() + CACHE_TTL;
        var value = JSON.stringify({ data: data, expires: expiration });
        if (ttl == -1) {
            return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].of(data);
        }
        return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].fromPromise(this.storage.set(name, value)).map(function (res) {
            return data;
        }).catch(function (err) {
            return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["Observable"].of(data);
        });
    };
    /**
     * Delete Cached Item
     * @param {string} name - Key name of item to delete
     * @returns {Promise<any>}
     */
    ApiService.prototype.deleteItem = function (name) {
        return this.storage.remove(name);
    };
    ApiService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_http__["b" /* Http */], __WEBPACK_IMPORTED_MODULE_12__ionic_storage__["b" /* Storage */],
            __WEBPACK_IMPORTED_MODULE_11_ionic_angular__["c" /* Events */], __WEBPACK_IMPORTED_MODULE_10__authentication_service__["a" /* AuthenticationService */],
            __WEBPACK_IMPORTED_MODULE_8__service_helper__["a" /* ServiceHelper */], __WEBPACK_IMPORTED_MODULE_13__martjack_ng_utils__["a" /* Commons */],
            __WEBPACK_IMPORTED_MODULE_9__session_handler__["a" /* SessionHandler */],
            __WEBPACK_IMPORTED_MODULE_14__martjack_ng_context__["f" /* OrionContext */]])
    ], ApiService);
    return ApiService;
}());

//# sourceMappingURL=api-service.js.map

/***/ }),
/* 333 */,
/* 334 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Auth; });
var Auth = (function () {
    function Auth(bearerToken, accessToken, merchantID) {
        this.accessToken = accessToken;
        this.bearerToken = bearerToken;
        this.merchantID = merchantID;
    }
    return Auth;
}());

//# sourceMappingURL=auth.js.map

/***/ }),
/* 335 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Token; });
/*
 * @Author: PV(confused)
 * @Date: 2017-12-06 15:11:51
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2017-12-19 18:49:40
 */
var Token = (function () {
    function Token(value, validTill, sessionTime) {
        this.value = value;
        this.validTill = validTill;
        this.sessionTime = sessionTime;
    }
    Token.isValid = function (token) {
        var validTill = 0;
        if (!token.validTill) {
            validTill = token.validTill = 0;
        }
        else {
            validTill = token.validTill;
        }
        console.log("Test: Validation: " + validTill * 60000 + "Elapsed Time: " + (Date.now() - token.sessionTime) + "  " + token.value);
        if (Date.now() < (token.sessionTime + validTill * 60000))
            return true;
        return false;
    };
    return Token;
}());

//# sourceMappingURL=token.js.map

/***/ }),
/* 336 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Session; });
var Session = (function () {
    function Session(auth, user, domainName, merchantID) {
        this.user = user;
        this.auth = auth;
        this.domainName = domainName;
        this.merchantID = merchantID;
    }
    return Session;
}());

//# sourceMappingURL=session.js.map

/***/ }),
/* 337 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppUpdateService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__martjack_ng_core_service__ = __webpack_require__(27);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__martjack_ng_config__ = __webpack_require__(21);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__config__ = __webpack_require__(60);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_Observable__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_Observable___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_4_rxjs_Observable__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_rxjs_add_operator_map__ = __webpack_require__(54);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_rxjs_add_operator_map___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_5_rxjs_add_operator_map__);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};






var AppUpdateService = (function () {
    function AppUpdateService(api, config) {
        this.api = api;
        this.config = config;
    }
    AppUpdateService.prototype.getVersionUpdateDetails = function (appVersion, platform) {
        var params = new Map();
        params.set("platform", platform);
        params.set("version", appVersion);
        params.set("merchantId", this.config.get(__WEBPACK_IMPORTED_MODULE_3__config__["a" /* ConfigConstants */].MERCHANT_ID));
        //TODO: Create a model for response object
        var location = this.config.get(__WEBPACK_IMPORTED_MODULE_3__config__["a" /* ConfigConstants */].BASE_URL) + __WEBPACK_IMPORTED_MODULE_3__config__["a" /* ConfigConstants */].APP_DETAILS_URL;
        return this.api.get(location, params).map(function (data) {
            if (data.response) {
                var resObj = new Object();
                resObj['latest'] = data.response.latest;
                resObj['forceUpdate'] = data.response.forceUpdate;
                resObj['message'] = data.response.message;
                return __WEBPACK_IMPORTED_MODULE_4_rxjs_Observable__["Observable"].of(resObj);
            }
            // return this.throwError('No app data');
            console.log("No Response from Mongo");
        }).catch(function (error) {
            // return Observable.throw(error);
            console.log(error);
            return __WEBPACK_IMPORTED_MODULE_4_rxjs_Observable__["Observable"].of(error);
        });
    };
    AppUpdateService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__martjack_ng_core_service__["a" /* ApiService */], __WEBPACK_IMPORTED_MODULE_2__martjack_ng_config__["b" /* MJConfig */]])
    ], AppUpdateService);
    return AppUpdateService;
}());

//# sourceMappingURL=app-update.service.js.map

/***/ }),
/* 338 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return SeoService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_rxjs_Observable__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_rxjs_Observable___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_rxjs_Observable__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__martjack_ng_config__ = __webpack_require__(21);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__martjack_ng_core_service__ = __webpack_require__(27);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__martjack_ng_utils__ = __webpack_require__(35);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__martjack_ng_seo_config_constants__ = __webpack_require__(206);
/**
 * Author: Kishore
 * This service will be called from the controller and will give the seo response
 */
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};






var SeoService = (function () {
    function SeoService(config, api, commons) {
        this.config = config;
        this.api = api;
        this.commons = commons;
    }
    SeoService.prototype.getSeo = function (pageName, pageType) {
        var _this = this;
        var inputData = new Map([["pageName", pageName], ["pageType", pageType]]);
        this.commons.checkPairHasValues(inputData).subscribe(function () { }, function (err) {
            _this.errorObservable(__WEBPACK_IMPORTED_MODULE_5__martjack_ng_seo_config_constants__["b" /* EMPTY_INPUT */]);
        });
        return this.getSeoResponse(pageName, pageType);
    };
    SeoService.prototype.getSeoResponse = function (pageName, pageType) {
        var _this = this;
        var params = new Map();
        params.set('pageName', pageName);
        params.set('pageType', pageType);
        var location = this.config.get(__WEBPACK_IMPORTED_MODULE_5__martjack_ng_seo_config_constants__["a" /* BASE_URL */]) + __WEBPACK_IMPORTED_MODULE_5__martjack_ng_seo_config_constants__["g" /* SEO_URL */];
        return this.api.get(location, params).map(function (res) {
            if (!res) {
                _this.errorObservable(__WEBPACK_IMPORTED_MODULE_5__martjack_ng_seo_config_constants__["e" /* NO_SEO_DATA */]);
            }
            return res;
        }).catch(function (err) {
            return __WEBPACK_IMPORTED_MODULE_1_rxjs_Observable__["Observable"].throw(__WEBPACK_IMPORTED_MODULE_5__martjack_ng_seo_config_constants__["c" /* FETCH_ERROR */]);
        });
    };
    SeoService.prototype.setPixels = function (pageName, params) {
        var _this = this;
        var inputData = new Map();
        inputData.set('pageName', pageName);
        params.set('merchantId', this.config.get('merchant_id'));
        var utmSourceKey = "utm_source", utmSourceValue = null;
        var utmSourcePair = document.cookie.split(';').filter(function (ele) { return ele.indexOf(utmSourceKey) > -1; });
        if (utmSourcePair.length > 0) {
            utmSourceValue = utmSourcePair[0].substring(utmSourcePair[0].indexOf("=") + 1);
            inputData.set(utmSourceKey, utmSourceValue);
        }
        var paramObject = Object.create(null);
        params.forEach(function (value, key) {
            paramObject[key] = value;
        });
        inputData.set('params', JSON.stringify(paramObject));
        this.commons.checkPairHasValues(inputData).subscribe(function () { }, function (err) {
            return _this.errorObservable(__WEBPACK_IMPORTED_MODULE_5__martjack_ng_seo_config_constants__["b" /* EMPTY_INPUT */]);
        });
        var location = this.config.get(__WEBPACK_IMPORTED_MODULE_5__martjack_ng_seo_config_constants__["a" /* BASE_URL */]) + __WEBPACK_IMPORTED_MODULE_5__martjack_ng_seo_config_constants__["f" /* PIXEL_URL */];
        return this.api.get(location, inputData).map(function (res) {
            if (!res || !res.response) {
                return _this.errorObservable(__WEBPACK_IMPORTED_MODULE_5__martjack_ng_seo_config_constants__["d" /* NO_PIXEL_DATA */]);
            }
            return res;
        }).catch(function (err) {
            return __WEBPACK_IMPORTED_MODULE_1_rxjs_Observable__["Observable"].throw(__WEBPACK_IMPORTED_MODULE_5__martjack_ng_seo_config_constants__["c" /* FETCH_ERROR */]);
        });
    };
    SeoService.prototype.errorObservable = function (error) {
        throw __WEBPACK_IMPORTED_MODULE_1_rxjs_Observable__["Observable"].throw(error);
    };
    SeoService.prototype.translatePIDtoSeoName = function (productID) {
        var landing = this.config.get('landing');
        if (!landing || !landing.deals) {
            return;
        }
        var obj = landing.deals.find(function (res) {
            return res['productID'] == productID;
        });
        return obj;
    };
    SeoService.prototype.translateSeoNametoPID = function (seoName) {
        var landing = this.config.get('landing');
        if (!landing || !landing.deals) {
            return;
        }
        var obj = landing.deals.find(function (res) {
            return res['seoName'] == seoName;
        });
        return obj;
    };
    SeoService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2__martjack_ng_config__["b" /* MJConfig */],
            __WEBPACK_IMPORTED_MODULE_3__martjack_ng_core_service__["a" /* ApiService */],
            __WEBPACK_IMPORTED_MODULE_4__martjack_ng_utils__["a" /* Commons */]])
    ], SeoService);
    return SeoService;
}());

//# sourceMappingURL=seo.service.js.map

/***/ }),
/* 339 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export alertServiceFactory */
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AlertModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__martjack_ng_config__ = __webpack_require__(21);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__alert_services__ = __webpack_require__(134);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_ionic_angular__ = __webpack_require__(13);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__ngx_translate_core__ = __webpack_require__(57);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__martjack_ng_core_service__ = __webpack_require__(27);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__martjack_ng_context__ = __webpack_require__(34);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};








function alertServiceFactory(loadingCtrl, alertCtrl, toastCtrl, config, api, translatorCtrl, orionContext) {
    return new __WEBPACK_IMPORTED_MODULE_3__alert_services__["a" /* AlertService */](loadingCtrl, alertCtrl, toastCtrl, config, api, translatorCtrl, orionContext);
}
var AlertModule = (function () {
    function AlertModule() {
    }
    AlertModule_1 = AlertModule;
    AlertModule.forRoot = function () {
        return {
            ngModule: AlertModule_1,
            providers: [{
                    provide: AlertModule_1, useFactory: alertServiceFactory,
                    deps: [__WEBPACK_IMPORTED_MODULE_4_ionic_angular__["h" /* LoadingController */], __WEBPACK_IMPORTED_MODULE_4_ionic_angular__["a" /* AlertController */], __WEBPACK_IMPORTED_MODULE_4_ionic_angular__["o" /* ToastController */], __WEBPACK_IMPORTED_MODULE_2__martjack_ng_config__["b" /* MJConfig */], __WEBPACK_IMPORTED_MODULE_6__martjack_ng_core_service__["a" /* ApiService */], __WEBPACK_IMPORTED_MODULE_5__ngx_translate_core__["d" /* TranslateService */], __WEBPACK_IMPORTED_MODULE_7__martjack_ng_context__["f" /* OrionContext */]]
                }]
        };
    };
    AlertModule = AlertModule_1 = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */]
            ]
        })
    ], AlertModule);
    return AlertModule;
    var AlertModule_1;
}());

;
//# sourceMappingURL=alert-services.module.js.map

/***/ }),
/* 340 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export eventManagerServiceFactory */
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return EventManagerModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__eventManager_service__ = __webpack_require__(106);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__customEvent_directive__ = __webpack_require__(341);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};


// import {
//     ProductModule,
//     ProductService
// } from '@martjack/ng-product';
// import {
//     StorageModule,
//     StorageService
// } from '@martjack/ng-storage';


function eventManagerServiceFactory() {
    return new __WEBPACK_IMPORTED_MODULE_2__eventManager_service__["a" /* EventManagerService */]();
}
var EventManagerModule = (function () {
    function EventManagerModule() {
    }
    EventManagerModule_1 = EventManagerModule;
    EventManagerModule.forRoot = function () {
        return {
            ngModule: EventManagerModule_1,
            providers: [
                __WEBPACK_IMPORTED_MODULE_3__customEvent_directive__["a" /* CustomEventDirective */],
                {
                    provide: __WEBPACK_IMPORTED_MODULE_2__eventManager_service__["a" /* EventManagerService */],
                    useFactory: eventManagerServiceFactory
                }
            ]
        };
    };
    EventManagerModule = EventManagerModule_1 = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */]
            ],
            exports: [
                __WEBPACK_IMPORTED_MODULE_3__customEvent_directive__["a" /* CustomEventDirective */]
            ],
            declarations: [
                __WEBPACK_IMPORTED_MODULE_3__customEvent_directive__["a" /* CustomEventDirective */]
            ]
        })
    ], EventManagerModule);
    return EventManagerModule;
    var EventManagerModule_1;
}());

//# sourceMappingURL=eventManager_module.js.map

/***/ }),
/* 341 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CustomEventDirective; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__eventManager_service__ = __webpack_require__(106);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__models_customEventModel__ = __webpack_require__(207);
/**
 * Directive for handling custom events in event manager
 */
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var CustomEventDirective = (function () {
    function CustomEventDirective(_el, _eventManagerService) {
        this._el = _el;
        this._eventManagerService = _eventManagerService;
    }
    /** Listener for element click */
    CustomEventDirective.prototype.onclick = function () {
        this.pushCustomEvent();
    };
    /** Create custom event object and push it to event manager */
    CustomEventDirective.prototype.pushCustomEvent = function () {
        var customEvent = new __WEBPACK_IMPORTED_MODULE_2__models_customEventModel__["a" /* CustomEventModel */](this.event, this.eventLabel, this.eventValue, this.eventAction, this.eventCategory);
        this._eventManagerService.pushEvent(customEvent);
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Input"])(),
        __metadata("design:type", String)
    ], CustomEventDirective.prototype, "event", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Input"])(),
        __metadata("design:type", String)
    ], CustomEventDirective.prototype, "eventLabel", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Input"])(),
        __metadata("design:type", String)
    ], CustomEventDirective.prototype, "eventValue", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Input"])(),
        __metadata("design:type", String)
    ], CustomEventDirective.prototype, "eventAction", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Input"])(),
        __metadata("design:type", String)
    ], CustomEventDirective.prototype, "eventCategory", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["HostListener"])('click'),
        __metadata("design:type", Function),
        __metadata("design:paramtypes", []),
        __metadata("design:returntype", void 0)
    ], CustomEventDirective.prototype, "onclick", null);
    CustomEventDirective = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Directive"])({
            selector: '[customEvent]'
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_0__angular_core__["ElementRef"],
            __WEBPACK_IMPORTED_MODULE_1__eventManager_service__["a" /* EventManagerService */]])
    ], CustomEventDirective);
    return CustomEventDirective;
}());

//# sourceMappingURL=customEvent.directive.js.map

/***/ }),
/* 342 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ProductClick; });
/* unused harmony export ProductClickModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__ = __webpack_require__(20);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__enums_eventType__ = __webpack_require__(16);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();


/**
 * Global product click model to push product click event to event manager
 */
var ProductClick = (function (_super) {
    __extends(ProductClick, _super);
    function ProductClick(listName, products) {
        var _this = _super.call(this) || this;
        /** Event type */
        _this._eventType = __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].productClick;
        /** List name of the list product belongs to */
        _this._listName = '';
        /** Array of ProductClickModel with product data */
        _this._products = [];
        if (!listName || !products || !products.length) {
            _this._log('Invalid parameter configuration for product click event in event manager');
            return _this;
        }
        _this._listName = listName;
        _this._products = products;
        return _this;
    }
    /**
     * Check if configuration for product click event is valid
     */
    ProductClick.prototype.isValid = function () {
        if (!this._listName || !this._products || !this._products.length) {
            this._log('Invalid parameter configuration for product click event in event manager');
            return false;
        }
        return true;
    };
    /**
     * Get inputs for product click event and validate
     * map data from 'Product' model to 'ProductClickModel'
     * return new ProductClick
     * @param currencyCode : string
     * @param listName : string
     * @param products : array<Product>
     */
    ProductClick.fromProductModel = function (listName, products) {
        if (!listName || !products || !products.length) {
            return;
        }
        /**
         * Validate each property from Product model to ProductClickModel
         * Fill only valid properties
         */
        var clickProducts = [];
        products.forEach(function (product, index) {
            var clickProduct = new ProductClickModel();
            if (product.Title)
                clickProduct.name = product.Title;
            if (product.id)
                clickProduct.id = product.id;
            if (product.bundle_price)
                clickProduct.price = product.bundle_price;
            if (product.brand)
                clickProduct.brand = product.brand;
            if (product.leafCategoryName)
                clickProduct.category = product.leafCategoryName;
            if (product.getSelectedVariantText())
                clickProduct.variant = product.getSelectedVariantText();
            clickProduct.position = index + 1;
            clickProducts.push(clickProduct);
        });
        return new ProductClick(listName, clickProducts);
    };
    /**
     * Get inputs for product click event and validate
     * map data from 'Item' model to 'ProductClickModel'
     * return new ProductClick
     * @param currencyCode : string
     * @param listName : string
     * @param products : array<Item>
     */
    ProductClick.fromItemModel = function (currencyCode, listName, items) {
        if (!currencyCode || !listName || !items || !items.length) {
            return;
        }
        /**
         * Validate each property from Product model to ProductClickModel
         * Fill only valid properties
         */
        var clickProducts = [];
        items.forEach(function (item, index) {
            var clickProduct = new ProductClickModel();
            if (item.title)
                clickProduct.name = item.title;
            if (item.id)
                clickProduct.id = item.id;
            if (item.web_price)
                clickProduct.price = item.web_price;
            // Data not available in Item model
            // if (item.brand) impression.brand = item.brand;
            // if (item.h1_category_name) impression.category = item.h1_category_name;
            // if (item.variant_product_id) impression.variant = item.variant_product_id.toString();
            clickProduct.position = index + 1;
            clickProducts.push(clickProduct);
        });
        return new ProductClick(listName, clickProducts);
    };
    /**
     * Get inputs for product impression event and validate
     * map data from suggestive selling model to 'ProductClickModel'
     * return new ProductClick
     * @param currencyCode : string
     * @param listName : string
     * @param products : array<any>
     */
    ProductClick.fromSuggestiveModel = function (listName, products) {
        if (!listName || !products || !products.length) {
            return;
        }
        /**
         * Validate each property from suggestive selling model to ProductClickModel
         * Fill only valid properties
         */
        var clickProducts = [];
        products.forEach(function (product, index) {
            var clickProduct = new ProductClickModel();
            if (product.Title)
                clickProduct.name = product.Title;
            if (product.ID)
                clickProduct.id = product.ID;
            if (product.WebPrice)
                clickProduct.price = product.WebPrice;
            if (product.Brand)
                clickProduct.brand = product.Brand;
            if (product.leafCategory)
                clickProduct.category = product.leafCategory;
            // Not available in suggestive selling
            // if (product.selected_variant_text) impression.variant = product.selected_variant_text;            
            clickProduct.position = index + 1;
            clickProducts.push(clickProduct);
        });
        return new ProductClick(listName, clickProducts);
    };
    /**
     * Get current event type
     */
    ProductClick.prototype.getEventType = function () {
        return __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].productClick;
    };
    /** Log messages */
    ProductClick.prototype._log = function (message) {
        console.log(message);
    };
    return ProductClick;
}(__WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__["a" /* EcommerceEvent */]));

var ProductClickModel = (function () {
    function ProductClickModel() {
    }
    return ProductClickModel;
}());

//# sourceMappingURL=productClick.js.map

/***/ }),
/* 343 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ProductView; });
/* unused harmony export ProductViewModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__ = __webpack_require__(20);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__enums_eventType__ = __webpack_require__(16);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();


/**
 * Global product view model to push product view event to event manager
 */
var ProductView = (function (_super) {
    __extends(ProductView, _super);
    function ProductView(listName, products) {
        var _this = _super.call(this) || this;
        /** Event type */
        _this._eventType = __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].productView;
        /** Name of the list product belongs to */
        _this._listName = '';
        /** Array of ProductViewModel with product data */
        _this._products = [];
        if (!listName || !products || !products.length) {
            _this._log('Invalid parameter configuration for product view event in event manager');
            return _this;
        }
        _this._listName = listName;
        _this._products = products;
        return _this;
    }
    /**
     * Check if configuration for product view event is valid
     */
    ProductView.prototype.isValid = function () {
        if (!this._listName || !this._products || !this._products.length) {
            this._log('Invalid parameter configuration for product view event in event manager');
            return false;
        }
        return true;
    };
    /**
     * Get inputs for product view event and validate
     * map data from 'Product' model to 'ProductViewModel'
     * return new ProductView
     * @param currencyCode : string
     * @param listName : string
     * @param products : array<Product>
     */
    ProductView.fromProductModel = function (listName, products) {
        if (!listName || !products || !products.length) {
            return;
        }
        /**
         * Validate each property from Product model to ProductViewModel
         * Fill only valid properties
         */
        var viewProducts = [];
        products.forEach(function (product, index) {
            var viewProduct = new ProductViewModel();
            if (product.Title)
                viewProduct.name = product.Title;
            if (product.id)
                viewProduct.id = product.id;
            if (product.bundle_price)
                viewProduct.price = product.bundle_price;
            if (product.brand)
                viewProduct.brand = product.brand;
            if (product.leafCategoryName)
                viewProduct.category = product.leafCategoryName;
            if (product.getSelectedVariantText())
                viewProduct.variant = product.getSelectedVariantText();
            viewProducts.push(viewProduct);
        });
        return new ProductView(listName, viewProducts);
    };
    /**
     * Get inputs for product view event and validate
     * map data from suggestive selling product model to 'ProductViewModel'
     * return new ProductView
     * @param currencyCode : string
     * @param listName : string
     * @param products : array<any>
     */
    ProductView.fromSuggestiveModel = function (listName, products) {
        if (!listName || !products || !products.length) {
            return;
        }
        /**
         * Validate each property from Product model to ProductViewModel
         * Fill only valid properties
         */
        var viewProducts = [];
        products.forEach(function (product, index) {
            var viewProduct = new ProductViewModel();
            if (product.Title)
                viewProduct.name = product.Title;
            if (product.ID)
                viewProduct.id = product.ID;
            if (product.WebPrice)
                viewProduct.price = product.WebPrice;
            if (product.Brand)
                viewProduct.brand = product.Brand;
            if (product.leafCategory)
                viewProduct.category = product.leafCategory;
            // Not available in suggestive selling
            // if (product.selected_variant_text) impression.variant = product.selected_variant_text;            
            viewProducts.push(viewProduct);
        });
        return new ProductView(listName, viewProducts);
    };
    /**
     * Get current event type
     */
    ProductView.prototype.getEventType = function () {
        return __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].productView;
    };
    /** Log messages */
    ProductView.prototype._log = function (message) {
        console.log(message);
    };
    return ProductView;
}(__WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__["a" /* EcommerceEvent */]));

var ProductViewModel = (function () {
    function ProductViewModel() {
        this.variant = '';
    }
    return ProductViewModel;
}());

//# sourceMappingURL=productView.js.map

/***/ }),
/* 344 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AddToCart; });
/* unused harmony export AddToCartProductModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__ = __webpack_require__(20);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__enums_eventType__ = __webpack_require__(16);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();


/**
 * Global add to cart model to push add to cart event to event manager
 */
var AddToCart = (function (_super) {
    __extends(AddToCart, _super);
    function AddToCart(currencyCode, products) {
        var _this = _super.call(this) || this;
        /** Event type */
        _this._eventType = __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].addToCart;
        /** Current CurrencyCode*/
        _this._currencyCode = '';
        /** Array of AddToCartProductModel with product data */
        _this._products = [];
        if (!currencyCode || !products || !products.length) {
            _this._log('Invalid parameter configuration for add to cart event in event manager');
            return _this;
        }
        _this._currencyCode = currencyCode;
        _this._products = products;
        return _this;
    }
    /**
     * Check if configuration for add to cart event is valid
     */
    AddToCart.prototype.isValid = function () {
        if (!this._currencyCode || !this._products || !this._products.length) {
            this._log('Invalid parameter configuration for add to cart event in event manager');
            return false;
        }
        return true;
    };
    /**
     * Get inputs for add to cart event and validate
     * map data from 'Product' model to 'AddToCartProductModel'
     * return new AddToCart
     * @param currencyCode : string
     * @param listName : string
     * @param products : array<Product>
     */
    AddToCart.fromProductModel = function (currencyCode, products) {
        if (!currencyCode || !products || !products.length) {
            return;
        }
        /**
         * Validate each property from Product model to AddToCartProductModel
         * Fill only valid properties
         */
        var addToCartProducts = [];
        products.forEach(function (product, index) {
            var addToCartProduct = new AddToCartProductModel();
            if (product.Title)
                addToCartProduct.name = product.Title;
            if (product.id)
                addToCartProduct.id = product.id;
            if (product.bundle_price)
                addToCartProduct.price = product.bundle_price;
            if (product.brand)
                addToCartProduct.brand = product.brand;
            if (product.leafCategoryName)
                addToCartProduct.category = product.leafCategoryName;
            if (product.getSelectedVariantText())
                addToCartProduct.variant = product.getSelectedVariantText();
            if (product.getQuantity())
                addToCartProduct.quantity = product.getQuantity();
            addToCartProducts.push(addToCartProduct);
        });
        return new AddToCart(currencyCode, addToCartProducts);
    };
    /**
     * Get inputs for add to cart event and validate
     * map data from 'CartItem' model to 'AddToCartProductModel'
     * return new AddToCart
     * @param currencyCode : string
     * @param listName : string
     * @param products : array<CartItem>
     */
    AddToCart.fromCartItemModel = function (currencyCode, products) {
        if (!currencyCode || !products || !products.length) {
            return;
        }
        /**
         * Validate each property from Product model to AddToCartProductModel
         * Fill only valid properties
         */
        var addToCartProducts = [];
        products.forEach(function (cartItem, index) {
            var addToCartProduct = new AddToCartProductModel();
            if (cartItem.description)
                addToCartProduct.name = cartItem.description;
            if (cartItem.productId)
                addToCartProduct.id = cartItem.productId;
            if (cartItem.webPrice)
                addToCartProduct.price = cartItem.webPrice;
            if (cartItem.brandName)
                addToCartProduct.brand = cartItem.brandName;
            if (cartItem.categoryName)
                addToCartProduct.category = cartItem.categoryName;
            if (cartItem.selectedVariant)
                addToCartProduct.variant = cartItem.selectedVariant;
            if (cartItem.updatedQuantity)
                addToCartProduct.quantity = cartItem.updatedQuantity;
            addToCartProducts.push(addToCartProduct);
        });
        return new AddToCart(currencyCode, addToCartProducts);
    };
    /**
     * Get inputs for product impression event and validate
     * map data from suggestive selling model to 'ProductClickModel'
     * return new ProductClick
     * @param currencyCode : string
     * @param listName : string
     * @param products : array<any>
     */
    AddToCart.fromSuggestiveModel = function (currencyCode, products) {
        var _this = this;
        if (!currencyCode || !products || !products.length) {
            return;
        }
        /**
         * Validate each property from suggestive selling model to ProductClickModel
         * Fill only valid properties
         */
        var addToCartProducts = [];
        products.forEach(function (product, index) {
            var addToCartProduct = new AddToCartProductModel();
            if (product.Title)
                addToCartProduct.name = product.Title;
            if (product.ID)
                addToCartProduct.id = product.ID;
            if (product.WebPrice)
                addToCartProduct.price = product.WebPrice;
            if (product.Brand)
                addToCartProduct.brand = product.Brand;
            if (product.leafCategory)
                addToCartProduct.category = product.leafCategory;
            // Not available in suggestive selling
            // if (product.selected_variant_text) impression.variant = product.selected_variant_text;                        
            addToCartProduct.quantity = _this.DEFAULT_QUANTITY;
            addToCartProducts.push(addToCartProduct);
        });
        return new AddToCart(currencyCode, addToCartProducts);
    };
    /**
     * Get current event type
     */
    AddToCart.prototype.getEventType = function () {
        return __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].addToCart;
    };
    /** Log messages */
    AddToCart.prototype._log = function (message) {
        console.log(message);
    };
    /** Default quantity */
    AddToCart.DEFAULT_QUANTITY = 1;
    return AddToCart;
}(__WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__["a" /* EcommerceEvent */]));

var AddToCartProductModel = (function () {
    function AddToCartProductModel() {
        this.quantity = 1;
    }
    return AddToCartProductModel;
}());

//# sourceMappingURL=addToCart.js.map

/***/ }),
/* 345 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return RemoveFromCart; });
/* unused harmony export RemoveFromCartProductModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__ = __webpack_require__(20);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__enums_eventType__ = __webpack_require__(16);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();


/**
 * Global remove from cart model to push remove from cart event to event manager
 */
var RemoveFromCart = (function (_super) {
    __extends(RemoveFromCart, _super);
    function RemoveFromCart(products) {
        var _this = _super.call(this) || this;
        /** Event type */
        _this._eventType = __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].removeFromCart;
        /** Array of RemoveFromCartProductModel with product data */
        _this._products = [];
        if (!products || !products.length) {
            _this._log('Invalid parameter configuration for remove from cart event in event manager');
            return _this;
        }
        _this._products = products;
        return _this;
    }
    ;
    /**
     * Check if configuration for remove from cart event is valid
     */
    RemoveFromCart.prototype.isValid = function () {
        if (!this._products || !this._products.length) {
            this._log('Invalid parameter configuration for remove from cart event in event manager');
            return false;
        }
        return true;
    };
    /**
     * Get inputs for remove from cart event and validate
     * map data from 'CartItem' model to 'RemoveFromCartProductModel'
     * return new RemoveFromCart
     * @param currencyCode : string
     * @param listName : string
     * @param products : array<CartItem>
     */
    RemoveFromCart.fromCartItemModel = function (products) {
        if (!products || !products.length) {
            return;
        }
        if (!products.length) {
            return;
        }
        /**
         * Validate each property from CartItem model to RemoveFromCartProductModel
         * Fill only valid properties
         */
        var removeFromCartProducts = [];
        products.forEach(function (cartItem, index) {
            var addToCartProduct = new RemoveFromCartProductModel();
            if (cartItem.description)
                addToCartProduct.name = cartItem.description;
            if (cartItem.productId)
                addToCartProduct.id = cartItem.productId;
            if (cartItem.webPrice)
                addToCartProduct.price = cartItem.webPrice;
            if (cartItem.brandName)
                addToCartProduct.brand = cartItem.brandName;
            if (cartItem.categoryName)
                addToCartProduct.category = cartItem.categoryName;
            if (cartItem.selectedVariant)
                addToCartProduct.variant = cartItem.selectedVariant;
            if (cartItem.updatedQuantity)
                addToCartProduct.quantity = cartItem.updatedQuantity;
            removeFromCartProducts.push(addToCartProduct);
        });
        return new RemoveFromCart(removeFromCartProducts);
    };
    /**
     * Get current event type
     */
    RemoveFromCart.prototype.getEventType = function () {
        return __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].removeFromCart;
    };
    /** Log messages */
    RemoveFromCart.prototype._log = function (message) {
        console.log(message);
    };
    return RemoveFromCart;
}(__WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__["a" /* EcommerceEvent */]));

var RemoveFromCartProductModel = (function () {
    function RemoveFromCartProductModel() {
        this.quantity = 1;
    }
    return RemoveFromCartProductModel;
}());

//# sourceMappingURL=removeFromCart.js.map

/***/ }),
/* 346 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export PromotionImpression */
/* unused harmony export PromotionImpressionModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__ = __webpack_require__(20);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__enums_eventType__ = __webpack_require__(16);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();


/**
 * Global promotion impression model to push promotion impression event to event manager
 */
var PromotionImpression = (function (_super) {
    __extends(PromotionImpression, _super);
    function PromotionImpression(promotions) {
        var _this = _super.call(this) || this;
        /** Event type */
        _this._eventType = __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].promotionImpression;
        /** promotions array */
        _this._promotions = [];
        if (!promotions || !promotions.length) {
            _this._log('Invalid parameter configuration for promotion impression event in event manager');
            return _this;
        }
        _this._promotions = promotions;
        return _this;
    }
    /**
     * Check if configuration for promotion impression event is valid
     */
    PromotionImpression.prototype.isValid = function () {
        if (!this._promotions || !this._promotions.length) {
            this._log('Invalid parameter configuration for promotion impression event in event manager');
            return false;
        }
        return true;
    };
    /**
     * Get current event type
     */
    PromotionImpression.prototype.getEventType = function () {
        return __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].promotionImpression;
    };
    /** Log messages */
    PromotionImpression.prototype._log = function (message) {
        console.log(message);
    };
    return PromotionImpression;
}(__WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__["a" /* EcommerceEvent */]));

var PromotionImpressionModel = (function () {
    function PromotionImpressionModel() {
    }
    return PromotionImpressionModel;
}());

//# sourceMappingURL=promotionImpression.js.map

/***/ }),
/* 347 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Checkout; });
/* unused harmony export CheckOutProductModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__ = __webpack_require__(20);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__enums_eventType__ = __webpack_require__(16);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();


/**
 * Global checkout model to push checkout step event to event manager
 */
var Checkout = (function (_super) {
    __extends(Checkout, _super);
    function Checkout(step, option, products) {
        var _this = _super.call(this) || this;
        /** Event type */
        _this._eventType = __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].checkout;
        /** Array of CheckOutProductModel with product data */
        _this._products = [];
        if (!step || !option || !products || !products.length) {
            _this._log('Invalid parameter configuration for checkout step event in event manager');
            return _this;
        }
        _this._step = step;
        _this._option = option;
        _this._products = products;
        return _this;
    }
    ;
    /**
     * Check if configuration for checkout event is valid
     */
    Checkout.prototype.isValid = function () {
        if (!this._step || !this._option || !this._products || !this._products.length) {
            this._log('Invalid parameter configuration for checkout step event in event manager');
            return false;
        }
        return true;
    };
    /**
     * Get inputs for checkout event and validate
     * map data from 'CartItem' model to 'CheckOutProductModel'
     * return new Checkout
     * @param step : string
     * @param option : string
     * @param items : array<Item>
     */
    Checkout.fromItemModel = function (step, option, items) {
        if (!step || !option || !items || !items.length) {
            return;
        }
        if (!items.length) {
            return;
        }
        /**
         * Validate each property from Product model to CheckOutProductModel
         * Fill only valid properties
         */
        var cartItems = [];
        items.forEach(function (item, index) {
            var cartItem = new CheckOutProductModel();
            if (item.description)
                cartItem.name = item.description;
            if (item.productId)
                cartItem.id = item.productId;
            if (item.webPrice)
                cartItem.price = item.webPrice;
            if (item.brandName)
                cartItem.brand = item.brandName;
            if (item.categoryName)
                cartItem.category = item.categoryName;
            if (item.selectedVariant)
                cartItem.variant = item.selectedVariant;
            if (item.quantity)
                cartItem.quantity = item.quantity;
            cartItems.push(cartItem);
        });
        return new Checkout(step, option, cartItems);
    };
    /**
     * Get current event type
     */
    Checkout.prototype.getEventType = function () {
        return __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].checkout;
    };
    /** Log messages */
    Checkout.prototype._log = function (message) {
        console.log(message);
    };
    return Checkout;
}(__WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__["a" /* EcommerceEvent */]));

var CheckOutProductModel = (function () {
    function CheckOutProductModel() {
    }
    return CheckOutProductModel;
}());

//# sourceMappingURL=checkout.js.map

/***/ }),
/* 348 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Purchase; });
/* unused harmony export PurchaseProductModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__ = __webpack_require__(20);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__enums_eventType__ = __webpack_require__(16);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();


/**
 * Global purchase model to push purchase event to event manager
 */
var Purchase = (function (_super) {
    __extends(Purchase, _super);
    function Purchase(id, affiliation, revenue, tax, shipping, coupon, products) {
        var _this = _super.call(this) || this;
        /** Event type */
        _this._eventType = __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].purchase;
        /** Array of CheckOutProductModel with product data */
        _this._products = [];
        if (!id || !revenue || !products || !products.length) {
            _this._log('Invalid parameter configuration for purchase event in event manager');
            return _this;
        }
        _this._id = id;
        _this._affiliation = affiliation;
        _this._revenue = revenue;
        _this._tax = tax;
        _this._shipping = shipping;
        _this._coupon = coupon;
        _this._products = products;
        return _this;
    }
    /**
     * Check if configuration for purchase event is valid
     */
    Purchase.prototype.isValid = function () {
        if (!this._id || !this._revenue || !this._products || !this._products.length) {
            this._log('Invalid parameter configuration for purchase event in event manager');
            return false;
        }
        return true;
    };
    /**
     * Get inputs for purchase event and validate
     * map data from 'CartItem' model to 'CheckOutProductModel'
     * return new Checkout
     * @param step : string
     * @param option : string
     * @param items : array<Item>
     */
    Purchase.fromOrderInfoModel = function (id, affiliation, revenue, tax, shipping, coupon, orderItems) {
        if (!id || !revenue || !orderItems || !orderItems.length) {
            return;
        }
        /**
         * Validate each property from OrderInfo model to PurchaseProductModel
         * Fill only valid properties
         */
        var purchaseItems = [];
        orderItems.forEach(function (cartItem, index) {
            var purchaseItem = new PurchaseProductModel();
            if (cartItem.description)
                purchaseItem.name = cartItem.description;
            if (cartItem.productId)
                purchaseItem.id = cartItem.productId;
            if (cartItem.webPrice)
                purchaseItem.price = cartItem.webPrice;
            // if (cartItem.brandName) purchaseItem.brand = cartItem.brandName;
            if (cartItem.CategoryName)
                purchaseItem.category = cartItem.CategoryName;
            if (cartItem.selectedVariantText)
                purchaseItem.variant = cartItem.selectedVariantText;
            if (cartItem.quantity)
                purchaseItem.quantity = cartItem.quantity;
            purchaseItems.push(purchaseItem);
        });
        if (!affiliation)
            affiliation = this.ONLINE_STORE;
        if (!tax)
            tax = this.ZERO;
        if (!shipping)
            shipping = this.ZERO;
        if (!coupon)
            coupon = this.EMPTY_STRING;
        return new Purchase(id, affiliation, revenue, tax, shipping, coupon, purchaseItems);
    };
    /**
     * Get current event type
     */
    Purchase.prototype.getEventType = function () {
        return __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].purchase;
    };
    /** Log messages */
    Purchase.prototype._log = function (message) {
        console.log(message);
    };
    /** Constant for 'Online Store' string */
    Purchase.ONLINE_STORE = 'Online Store';
    /** Constant for number 0 */
    Purchase.ZERO = 0;
    /** Constant for number 0 */
    Purchase.EMPTY_STRING = '';
    return Purchase;
}(__WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__["a" /* EcommerceEvent */]));

var PurchaseProductModel = (function () {
    function PurchaseProductModel() {
    }
    return PurchaseProductModel;
}());

//# sourceMappingURL=purchase.js.map

/***/ }),
/* 349 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return VirtualPageView; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__ = __webpack_require__(20);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__enums_eventType__ = __webpack_require__(16);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();


/**
 * Global virtual page view model to push page view event to event manager
 */
var VirtualPageView = (function (_super) {
    __extends(VirtualPageView, _super);
    function VirtualPageView(pagePath) {
        var _this = _super.call(this) || this;
        /** Event type */
        _this._eventType = __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].virtualPageView;
        _this._pagePath = '';
        if (!pagePath || pagePath === '') {
            _this._log('Invalid parameter configuration for virtual page view event in event manager');
            return _this;
        }
        _this._pagePath = pagePath;
        return _this;
    }
    /**
     * Check if configuration for virtual page view event is valid
     */
    VirtualPageView.prototype.isValid = function () {
        if (!this._pagePath || this._pagePath === '') {
            this._log('Invalid parameter configuration for virtual page view event in event manager');
            return false;
        }
        return true;
    };
    /**
     * Get inputs for add to cart event and validate
     * map data from 'Product' model to 'AddToCartProductModel'
     * return new AddToCart
     * @param currencyCode : string
     * @param listName : string
     * @param products : array<Product>
     */
    VirtualPageView.fromPageViewModel = function (pagePath) {
        return new VirtualPageView(pagePath);
    };
    /**
     * Get current event type
     */
    VirtualPageView.prototype.getEventType = function () {
        return __WEBPACK_IMPORTED_MODULE_1__enums_eventType__["a" /* EventType */].virtualPageView;
    };
    /** Log messages */
    VirtualPageView.prototype._log = function (message) {
        console.log(message);
    };
    return VirtualPageView;
}(__WEBPACK_IMPORTED_MODULE_0__models_ecommerceEvent__["a" /* EcommerceEvent */]));

//# sourceMappingURL=virtualPageView.js.map

/***/ }),
/* 350 */,
/* 351 */,
/* 352 */,
/* 353 */,
/* 354 */,
/* 355 */,
/* 356 */,
/* 357 */,
/* 358 */,
/* 359 */,
/* 360 */,
/* 361 */,
/* 362 */,
/* 363 */,
/* 364 */,
/* 365 */,
/* 366 */,
/* 367 */,
/* 368 */,
/* 369 */,
/* 370 */,
/* 371 */,
/* 372 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return MyApp; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(13);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__config__ = __webpack_require__(373);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__martjack_ng_config__ = __webpack_require__(21);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__martjack_ng_seo__ = __webpack_require__(42);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__martjack_ng_alert_services__ = __webpack_require__(71);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__ngx_translate_core__ = __webpack_require__(57);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__martjack_ng_core_service__ = __webpack_require__(27);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__martjack_ng_context__ = __webpack_require__(34);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__martjack_ng_gtm__ = __webpack_require__(251);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__martjack_ng_fbq__ = __webpack_require__(253);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__pages_store_mode_selector_store_mode_selector__ = __webpack_require__(289);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__pages_search_search__ = __webpack_require__(288);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


// import { StatusBar } from '@ionic-native/status-bar';
// import { SplashScreen } from '@ionic-native/splash-screen';





// import { RaygunService } from '@martjack/ng-raygun';








var MyApp = (function () {
    // public statusBar: StatusBar, public splashScreen: SplashScreen,
    function MyApp(platform, mjConfig, alert, api, session, context, events, 
        // private raygun: RaygunService,
        translatorService, seo, gtmService, fbqService, _ionicApp) {
        this.platform = platform;
        this.mjConfig = mjConfig;
        this.alert = alert;
        this.api = api;
        this.session = session;
        this.context = context;
        this.events = events;
        this.translatorService = translatorService;
        this.seo = seo;
        this.gtmService = gtmService;
        this.fbqService = fbqService;
        this._ionicApp = _ionicApp;
        this.rootPage = 'home';
        this.user = {};
        //console.log = function(){}
        this.mjConfig.loadConfigFile(__WEBPACK_IMPORTED_MODULE_2__config__["a" /* Config */].values);
        this.alert.init();
        console.log("pv = ", mjConfig.get("public_key"));
        this.initializeApp();
        this.initPage();
        // used for an example of ngFor and navigation
        this.initUser();
        // raygun.initialize();
        this.backButtonListener();
    }
    MyApp.prototype.backButtonListener = function () {
        var _this = this;
        window.onpopstate = function (evt) {
            // Close any active modals or overlays
            if (_this._ionicApp._modalPortal._views.length > 1) {
                var searchPage = _this._ionicApp._modalPortal._views[1].instance;
                var storeModeSelectorPage = _this._ionicApp._modalPortal._views[0].instance;
                if (searchPage instanceof __WEBPACK_IMPORTED_MODULE_12__pages_search_search__["a" /* SearchPage */] && storeModeSelectorPage instanceof __WEBPACK_IMPORTED_MODULE_11__pages_store_mode_selector_store_mode_selector__["a" /* StoreModeSelectorPage */]) {
                    _this._ionicApp._modalPortal._views[0].dismiss();
                }
            }
            var activePortal = _this._ionicApp._loadingPortal.getActive() ||
                _this._ionicApp._modalPortal.getActive() ||
                _this._ionicApp._toastPortal.getActive() ||
                _this._ionicApp._overlayPortal.getActive();
            if (activePortal) {
                activePortal.dismiss();
                return;
            }
        };
    };
    MyApp.prototype.initUser = function () {
        var _this = this;
        this.session.getUserProfile()
            .subscribe(function (user) {
            console.log("check here", user);
            _this.user = user;
            _this.initPage();
        });
    };
    MyApp.prototype.initPage = function () {
        this.pages = [];
        this.pages = [{ title: 'Home', component: 'home', class: 'list-text-header' }];
        if (this.session.isLoggedIn()) {
            this.pages = this.pages.concat([
                { title: 'Account', component: '', class: 'list-text-header' },
                { title: 'Profile', component: 'profile', class: 'list-text-content' },
                // { title: 'Order History', component: 'order-history', class: 'list-text-content' },
                { title: 'Saved Address', component: 'addresses', class: 'list-text-content' },
                { title: 'Saved Cards', component: '', class: 'list-text-content' },
                { title: 'Favourites', component: 'favourites', class: 'list-text-content' },
                { title: 'Logout', component: 'logout', class: 'list-text-content' },
            ]);
        }
        this.pages = this.pages.concat([
            { title: 'Track Order', component: 'search-order', class: 'list-text-header' },
            { title: 'New Order', component: 'home', class: 'list-text-header' },
            // { title: 'Change Fulfillment Mode', component: 'home', class: 'list-text-header' },
            { title: 'Gift Card Enquiry', component: 'search-card', class: 'list-text-header' },
        ]);
    };
    MyApp.prototype.initializeApp = function () {
        var _this = this;
        this.events.subscribe("authentication", function (data) {
            if (data) {
                _this.initUser();
            }
        });
        this.events.subscribe("api:resolved", function (data) {
            if (data && data.error && data.error == "NOT-AUTHORISED") {
                _this.logout("Your session got expired!!!");
            }
        });
        this.events.subscribe("api:resolved", function (data) {
            if (data && data.error && data.error == "NO-NETWORK") {
                _this.alert.presentToast("No Network Found!!!", false, "", "bottom");
            }
        });
        this.platform.ready().then(function () {
            // Okay, so the platform is ready and our plugins are available.
            // Here you can do any higher level native things you might need.
            // this.statusBar.styleDefault();
            // this.splashScreen.hide();
        });
        this.translatorService.setDefaultLang(this.mjConfig.get("lang"));
        var self = this;
        /**
         * Validating the authentication token to avoid session expiry and auth expiry while tab is open
         */
        setInterval(function () {
            self.api.post(self.mjConfig.get('baseUrl') + '/authentication/validate', {}, new Map()).subscribe(function (res) {
                console.log("Validated properly");
            });
        }, 300000);
    };
    MyApp.prototype.logout = function (msg) {
        var _this = this;
        if (msg === void 0) { msg = ''; }
        this.alert.startLoading();
        this.api.logout()
            .subscribe(function (res) {
            _this.context.publish("cart", null);
            console.log("session created");
            _this.nav.setRoot('home');
            _this.initPage();
            _this.user = {};
            if (msg) {
                _this.alert.presentToast(msg, false, "", "bottom");
            }
            _this.alert.stopLoading();
        }, function (err) {
            _this.nav.setRoot('home');
            _this.alert.presentToast("Something went wrong");
            _this.alert.stopLoading();
        });
    };
    MyApp.prototype.openPage = function (page) {
        var _this = this;
        // Reset the content nav to have just this page
        // we wouldn't want the back button to show in this scenario
        if (page.component == 'logout') {
            this.logout();
            return;
        }
        else if (page.component == 'search-order') {
            var navParams = {
                id: '',
                mobile: ''
            };
            this.nav.setRoot(page.component, navParams);
            return;
        }
        else if (page.tabNumber > 0) {
            this.context.payload
                .subscribe(function (payload) {
                if (!payload.store) {
                    _this.nav.push('search');
                    return;
                }
                else {
                    _this.nav.setRoot(page.component);
                }
            });
        }
        else if (page.component) {
            this.nav.setRoot(page.component);
        }
        // setTimeout(() => {
        //   if( page.tabNumber)
        //     this.nav.getActiveChildNav().select(1);
        // },0)
    };
    MyApp.prototype.ngAfterViewInit = function () {
        this.setAllPagePixel();
    };
    MyApp.prototype.setAllPagePixel = function () {
        var _this = this;
        if (this.nav) {
            this.nav.viewDidEnter.subscribe(function (view) {
                var params = new Map();
                _this.seo.setPixel('all', params);
            });
        }
    };
    MyApp.prototype.getPixelDetails = function () {
        var params = new Map();
        return new __WEBPACK_IMPORTED_MODULE_4__martjack_ng_seo__["a" /* PixelPageDetails */]('nopage', params);
    };
    ;
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["ViewChild"])(__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* Nav */]),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* Nav */])
    ], MyApp.prototype, "nav", void 0);
    MyApp = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({template:/*ion-inline-start:"/var/lib/jenkins/workspace/acp-desktop-phindia/source/src/app/app.html"*/'<ion-nav [root]="rootPage" #content swipeBackEnabled="false"></ion-nav>\n\n'/*ion-inline-end:"/var/lib/jenkins/workspace/acp-desktop-phindia/source/src/app/app.html"*/
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["m" /* Platform */],
            __WEBPACK_IMPORTED_MODULE_3__martjack_ng_config__["b" /* MJConfig */], __WEBPACK_IMPORTED_MODULE_5__martjack_ng_alert_services__["c" /* AlertService */],
            __WEBPACK_IMPORTED_MODULE_7__martjack_ng_core_service__["a" /* ApiService */], __WEBPACK_IMPORTED_MODULE_7__martjack_ng_core_service__["g" /* SessionHandler */],
            __WEBPACK_IMPORTED_MODULE_8__martjack_ng_context__["f" /* OrionContext */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["c" /* Events */],
            __WEBPACK_IMPORTED_MODULE_6__ngx_translate_core__["d" /* TranslateService */], __WEBPACK_IMPORTED_MODULE_4__martjack_ng_seo__["b" /* SeoController */],
            __WEBPACK_IMPORTED_MODULE_9__martjack_ng_gtm__["b" /* GTMService */], __WEBPACK_IMPORTED_MODULE_10__martjack_ng_fbq__["b" /* FBQService */], __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["d" /* IonicApp */]])
    ], MyApp);
    return MyApp;
}());

//# sourceMappingURL=app.component.js.map

/***/ }),
/* 373 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Config; });
/*
 * @Author: PV(confused)
 * @Date: 2017-12-06 15:11:51
 * @Last Modified by: PV(confused)
 * @Last Modified time: 2018-01-16 13:45:55
 */
var Config = (function () {
    function Config() {
    }
    Config.values = {
        "googleKey": "AIzaSyDiWrt80tVQ0t5JxrR4i21g3GQtw2nberA",
        "auth_token_expiry_time": 35,
        "access_token_expiry_time": 14400,
        "default_user_id": "52a3e909-7702-4b49-945d-0e095ddd28bd",
        "order": {
            "min": 175,
            "max": 25000,
            "phoneno_regex": /^\d{10}$/,
            "orderID_regex": /[^0-9a-zA-Z]/
        },
        "order_attributes": {
            "SkipDeliveryAreaValidation": true
        },
        "cod-order": {
            "max": 5000
        },
        "timing": {
            "asapEnabled": true
        },
        "cart": {
            "status": "A",
            "cartKey": '00000000-0000-0000-0000-000000000000'
        },
        "banner": {
            "cache_time": 10000,
            "mode": "tag",
            "storeID": 0,
            "value": "Home_mainbanner"
        },
        "alert": {
            "class": "pizza-delivery",
            "toastPosition": "top",
            "order-mode": {
                "H": "pizza-delivery",
                "T": "pizza-takeaway"
            }
        },
        "navigation": {
            "refcode": "e30667415",
            "ttl": "3600",
            "nav": [
                {
                    "Level1": "CU00216624",
                    "Level1Name": "Deals",
                    "LevelType": "category",
                    "NavigationId": 7662,
                    "NavigationItemId": 473352,
                    "RefCode": "e30667415"
                },
                {
                    "Level1": "CU00216622",
                    "Level1Name": "Pizza",
                    "LevelType": "category",
                    "NavigationId": 7662,
                    "NavigationItemId": 473352,
                    "RefCode": "e30667415"
                }
            ],
            "tabs": ["deals", "pizza", "sides", "drinks", "desserts"]
        },
        "product": {
            "veg-attribute": "CU00216530-001-1",
            "pizza": {
                "groups": [
                    {
                        "name": "Supreme",
                        "value": "Supreme"
                    },
                    {
                        "name": "Signature",
                        "value": "Signature"
                    },
                    {
                        "name": "Favourite",
                        "value": "Favourite"
                    },
                    {
                        "name": "Classic",
                        "value": "Classic"
                    },
                    {
                        "name": "Hand Tossed Big Pizza",
                        "value": "HTBP"
                    },
                    {
                        "name": "Cracker Thin",
                        "value": "Cracker Thin"
                    },
                    {
                        "name": "Grand Dip",
                        "value": "Grand Dip"
                    }
                ]
            }
        },
        "payment": {
            "RAZORPAY": {
                "image": "assets/imgs/payments--cc.png",
                "text": "Online Payment"
            },
            "COD": {
                "image": "assets/imgs/payments--cod.png",
                "text": "COD"
            },
            "VALUACCESS": {
                "image": "assets/imgs/payments--valuaccess.png",
                "text": "ValuAccess"
            },
            "GETSIMPL": {
                "image": "assets/imgs/payments--getsimpl.png",
                "text": "GetSimpl"
            },
        },
        "header": {
            "icon": "https://uatnew.pizzahut.co.in/assets/pizzahut-logo-icon.svg"
        },
        "assetsBaseUrl": "/assets/",
        "minimum_search_character": 4,
        "public_key": "U5AXK472",
        "publicKey": "U5AXK472",
        "secret_key": "E8MSQGN5BK1NJHQWMXAZC2PT",
        "merchant_id": "98d18d82-ba59-4957-9c92-3f89207a34f6",
        "baseUrl": "/api",
        "asset_base_url": "https://uatnew.pizzahut.co.in/assets/",
        "gtm": {
            "gtmID": "GTM-NJ9V9W7",
            "gaTrackingID": "UA-108261252-4"
        },
        "currencyCode": "INR",
        "countryCallingCode": "+91",
        "defaultStore": {
            "lat": 13.0504536,
            "long": 80.1917078,
            "storeId": "15612",
            "storeSep": " | Map Location:  ",
            "storeSep2": " , Map Location:  "
        },
        "fbqId": "someid",
        "asap": {
            "enabled": true,
            "immediateOrderAttribute": {
                "EntityFieldID": 1,
                "EntityFieldName": "IsImmediateOrder",
                "Type": "1",
                "MerchantID": "98d18d82-ba59-4957-9c92-3f89207a34f6",
                "IsPredefined": !0,
                "IsMandatory": !0,
                "SelectedValue": "{{SELECTED_VALUE}}",
                "lstOMSEntityFieldValues": [
                    {
                        "MerchantID": "98d18d82-ba59-4957-9c92-3f89207a34f6",
                        "EntityFieldValueID": 1,
                        "EntityFieldID": 1,
                        "Value": "{{SELECTED_VALUE}}",
                        "IsSelected": !0
                    }
                ]
            }
        },
        "lang": "en",
        "raygunConfig": {
            "keys": ["apiKey", "setVersion", "enableCrashReporting"],
            "apiKey": "jtrRrN7q2mElJKgkEMc6Rg==",
            "setVersion": "0.1.0",
            "enableCrashReporting": true
        },
        "merchantDetails": {
            id: "98d18d82-ba59-4957-9c92-3f89207a34f6",
            key: "rzp_test_YF2ZNHU2TzcZp7",
            name: "Pizza Hut",
            description: "",
            rzPayThemeColor: "#ed1c24"
        },
        "customizables": ["Pizza"],
        "disableCheckoutOTP": true,
        // NOTE:
        // not working in staging env, orders are failing. Commenting for now
        // "source":[{
        //     "EntityFieldID":2,
        //     "EntityFieldName":"channel",
        //     "Type":"1",
        //     "IsPredefined":!0,
        //     "IsMandatory":!0,
        //     "SelectedValue":"{{SELECTED_VALUE}}",
        //     "OrderEntityFieldValues":[
        //         {
        //             "EntityFieldID":2,
        //             "EntityFieldValueID":2,
        //             "Value":"{{SELECTED_VALUE}}",
        //             "IsSelected":!0
        //         }
        //     ]
        // }],
        "nonServicableAreaUrl": {
            isEnabled: true,
            url: "https://non-servicable-locations.firebaseio.com/.json"
        },
        "landing": {
            "deals": [
                {
                    "seoName": "magic-pizza-box-of-4-non-veg",
                    "storeID": 15354,
                    "productID": 8284632
                },
                { "seoName": "triple-treat-box-veg",
                    "storeID": 15354,
                    "productID": 8284182
                },
                {
                    "seoName": "triple-treat-box-non-veg",
                    "storeID": 15354,
                    "productID": 8284184
                },
                {
                    "seoName": "big-pizza-meal-for-4",
                    "storeID": 15354,
                    "productID": 8284196
                },
                {
                    "seoName": "big-pizza-meal-for-2",
                    "storeID": 15354,
                    "productID": 8284194
                },
                {
                    "seoName": "family-fun-meal-for-2",
                    "storeID": 15354,
                    "productID": 8284186
                },
                {
                    "seoName": "magic-pizza-box-of-4-veg",
                    "storeID": 15354,
                    "productID": 8284646
                }
            ]
        }
    };
    return Config;
}());

//# sourceMappingURL=config.js.map

/***/ }),
/* 374 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export gtmServiceFactory */
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return GTMModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__martjack_ng_event_manager__ = __webpack_require__(7);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__gtm_service__ = __webpack_require__(252);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};




function gtmServiceFactory(_eventManagerService, _config) {
    return new __WEBPACK_IMPORTED_MODULE_3__gtm_service__["a" /* GTMService */](_eventManagerService, _config);
}
var GTMModule = (function () {
    function GTMModule() {
    }
    GTMModule_1 = GTMModule;
    GTMModule.forRoot = function (gtmConfig) {
        return {
            ngModule: GTMModule_1,
            providers: [
                {
                    provide: 'gtmConfig', useValue: gtmConfig
                },
                {
                    provide: __WEBPACK_IMPORTED_MODULE_3__gtm_service__["a" /* GTMService */],
                    useFactory: gtmServiceFactory,
                    deps: [
                        __WEBPACK_IMPORTED_MODULE_2__martjack_ng_event_manager__["g" /* EventManagerService */],
                        'gtmConfig'
                    ]
                }
            ]
        };
    };
    GTMModule = GTMModule_1 = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */]
            ]
        })
    ], GTMModule);
    return GTMModule;
    var GTMModule_1;
}());

//# sourceMappingURL=gtm_module.js.map

/***/ }),
/* 375 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ProductImpression; });
/* unused harmony export ProductImpressionModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * Default Product impression model to track product impression, pushing it to GTM data layer
 */
var ProductImpression = (function (_super) {
    __extends(ProductImpression, _super);
    function ProductImpression(currencyCode, listName, _products) {
        var _this = _super.call(this) || this;
        /** Current CurrencyCode*/
        _this._currencyCode = '';
        /** List name of the list products belong to */
        _this._listName = '';
        /** Array of ProductImpressionModule with product data */
        _this._products = [];
        if (!currencyCode || !listName || !_products || !_products.length) {
            _this._log('Invalid parameter configuration for product impression event in gtm');
            return _this;
        }
        _this._currencyCode = currencyCode;
        _this._listName = listName;
        _this._products = _products;
        return _this;
    }
    /**
     * Check if configuration for product impression event is valid
     */
    ProductImpression.prototype.isValid = function () {
        if (!this._currencyCode || !this._listName || !this._products || !this._products.length) {
            this._log('Invalid parameter configuration for product impression event in gtm');
            return false;
        }
        return true;
    };
    /** Map global product impression from event manager to local product impression for GTM */
    ProductImpression.fromMJEvent = function (event) {
        return new ProductImpression(event._currencyCode, event._listName, event._products);
    };
    /**
     * Get product impression json object to push into dataLayer
     */
    ProductImpression.prototype.getJson = function () {
        return {
            'event': 'productImpression',
            'ecommerce': {
                'currencyCode': this._currencyCode,
                'impressions': this._products
            }
        };
    };
    ProductImpression.prototype.getFJson = function () {
        if (this._products.length < 1)
            return {};
        var p = this._products[0];
        p["currencyCode"] = this._currencyCode;
        return p;
    };
    /** Log messages */
    ProductImpression.prototype._log = function (message) {
        console.log(message);
    };
    return ProductImpression;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["e" /* EcommerceEvent */]));

var ProductImpressionModel = (function () {
    function ProductImpressionModel() {
    }
    return ProductImpressionModel;
}());

//# sourceMappingURL=productImpression.js.map

/***/ }),
/* 376 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ProductClick; });
/* unused harmony export ProductClickModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * Global product click model to push product click event to event manager
 */
var ProductClick = (function (_super) {
    __extends(ProductClick, _super);
    function ProductClick(listName, products) {
        var _this = _super.call(this) || this;
        /** List name of the list product belongs to */
        _this._listName = '';
        /** Array of ProductClickModel with product data */
        _this._products = [];
        if (!listName || !products || !products.length) {
            _this._log('Invalid parameter configuration for product click event in gtm');
            return _this;
        }
        _this._listName = listName;
        _this._products = products;
        return _this;
    }
    /**
     * Check if configuration for product click event is valid
     */
    ProductClick.prototype.isValid = function () {
        if (!this._listName || !this._products || !this._products.length) {
            this._log('Invalid parameter configuration for product click event in gtm');
            return false;
        }
        return true;
    };
    /** Map global product click model from event manager to local product click model for GTM */
    ProductClick.fromMJEvent = function (event) {
        return new ProductClick(event._listName, event._products);
    };
    /**
     * Get product click json object to push into dataLayer
     */
    ProductClick.prototype.getJson = function () {
        return {
            'event': 'productClick',
            'ecommerce': {
                'click': {
                    'actionField': { 'list': this._listName },
                    'products': this._products
                }
            }
        };
    };
    ProductClick.prototype.getFJson = function () {
        if (this._products.length < 1)
            return {};
        var p = this._products[0];
        p["list"] = this._listName;
        return p;
    };
    /** Log messages */
    ProductClick.prototype._log = function (message) {
        console.log(message);
    };
    return ProductClick;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["e" /* EcommerceEvent */]));

var ProductClickModel = (function () {
    function ProductClickModel() {
    }
    return ProductClickModel;
}());

//# sourceMappingURL=productClick.js.map

/***/ }),
/* 377 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ProductView; });
/* unused harmony export ProductViewModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * Global product view model to push product view event to event manager
 */
var ProductView = (function (_super) {
    __extends(ProductView, _super);
    function ProductView(listName, products) {
        var _this = _super.call(this) || this;
        /** Name of the list product belongs to */
        _this._listName = '';
        /** Array of ProductViewModel with product data */
        _this._products = [];
        if (!listName || !products || !products.length) {
            _this._log('Invalid parameter configuration for product view event in gtm');
            return _this;
        }
        _this._listName = listName;
        _this._products = products;
        return _this;
    }
    /**
     * Check if configuration for product view event is valid
     */
    ProductView.prototype.isValid = function () {
        if (!this._listName || !this._products || !this._products.length) {
            this._log('Invalid parameter configuration for product view event in gtm');
            return false;
        }
        return true;
    };
    /** Map global product impression from event manager to local product impression for GTM */
    ProductView.fromMJEvent = function (event) {
        return new ProductView(event._listName, event._products);
    };
    /**
     * Get product impression json object to push into dataLayer
     */
    ProductView.prototype.getJson = function () {
        return {
            'event': 'productView',
            'ecommerce': {
                'detail': {
                    'actionField': { 'list': this._listName },
                    'products': this._products
                }
            }
        };
    };
    ProductView.prototype.getFJson = function () {
        if (this._products.length < 1)
            return {};
        var p = this._products[0];
        p["list"] = this._listName;
        return p;
    };
    /** Log messages */
    ProductView.prototype._log = function (message) {
        console.log(message);
    };
    return ProductView;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["e" /* EcommerceEvent */]));

var ProductViewModel = (function () {
    function ProductViewModel() {
    }
    return ProductViewModel;
}());

//# sourceMappingURL=productView.js.map

/***/ }),
/* 378 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AddToCart; });
/* unused harmony export AddToCartProductModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * Global add to cart model to push add to cart event to event manager
 */
var AddToCart = (function (_super) {
    __extends(AddToCart, _super);
    function AddToCart(currencyCode, products) {
        var _this = _super.call(this) || this;
        /** Current CurrencyCode*/
        _this._currencyCode = '';
        /** Array of AddToCartProductModel with product data */
        _this._products = [];
        if (!currencyCode || !products || !products.length) {
            _this._log('Invalid parameter configuration for add to cart event in gtm');
            return _this;
        }
        _this._currencyCode = currencyCode;
        _this._products = products;
        return _this;
    }
    ;
    /**
     * Check if configuration for add to cart event is valid
     */
    AddToCart.prototype.isValid = function () {
        if (!this._currencyCode || !this._products || !this._products.length) {
            this._log('Invalid parameter configuration for add to cart event in gtm');
            return false;
        }
        return true;
    };
    /** Map global add to cart from event manager to local add to cart model for GTM */
    AddToCart.fromMJEvent = function (event) {
        return new AddToCart(event._currencyCode, event._products);
    };
    /**
     * Get add to cart json object to push into dataLayer
     */
    AddToCart.prototype.getJson = function () {
        return {
            'event': 'addToCart',
            'ecommerce': {
                'currencyCode': this._currencyCode,
                'add': {
                    'products': this._products
                }
            }
        };
    };
    AddToCart.prototype.getFJson = function () {
        if (this._products.length < 1)
            return {};
        var p = this._products[0];
        p["currencyCode"] = this._currencyCode;
        return p;
    };
    /** Log messages */
    AddToCart.prototype._log = function (message) {
        console.log(message);
    };
    return AddToCart;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["e" /* EcommerceEvent */]));

var AddToCartProductModel = (function () {
    function AddToCartProductModel() {
    }
    return AddToCartProductModel;
}());

//# sourceMappingURL=addToCart.js.map

/***/ }),
/* 379 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return RemoveFromCart; });
/* unused harmony export RemoveFromCartProductModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * Global remove from cart model to push remove from cart event to event manager
 */
var RemoveFromCart = (function (_super) {
    __extends(RemoveFromCart, _super);
    function RemoveFromCart(products) {
        var _this = _super.call(this) || this;
        /** Array of RemoveFromCartProductModel with product data */
        _this._products = [];
        if (!products || !products.length) {
            _this._log('Invalid parameter configuration for remove from cart event in gtm');
            return _this;
        }
        _this._products = products;
        return _this;
    }
    ;
    /**
     * Check if configuration for remove from cart event is valid
     */
    RemoveFromCart.prototype.isValid = function () {
        if (!this._products || !this._products.length) {
            this._log('Invalid parameter configuration for remove from cart event in gtm');
            return false;
        }
        return true;
    };
    /** Map global add to cart from event manager to local add to cart model for GTM */
    RemoveFromCart.fromMJEvent = function (event) {
        return new RemoveFromCart(event._products);
    };
    /**
     * Get add to cart json object to push into dataLayer
     */
    RemoveFromCart.prototype.getJson = function () {
        return {
            'event': 'removeFromCart',
            'ecommerce': {
                'remove': {
                    'products': this._products
                }
            }
        };
    };
    RemoveFromCart.prototype.getFJson = function () {
        if (this._products.length < 1)
            return {};
        var p = this._products[0];
        return p;
    };
    /** Log messages */
    RemoveFromCart.prototype._log = function (message) {
        console.log(message);
    };
    return RemoveFromCart;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["e" /* EcommerceEvent */]));

var RemoveFromCartProductModel = (function () {
    function RemoveFromCartProductModel() {
    }
    return RemoveFromCartProductModel;
}());

//# sourceMappingURL=removeFromCart.js.map

/***/ }),
/* 380 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return PromotionImpression; });
/* unused harmony export PromotionImpressionModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * Global promotion click model to push promotion click event to event manager
 */
var PromotionImpression = (function (_super) {
    __extends(PromotionImpression, _super);
    function PromotionImpression(promotions) {
        var _this = _super.call(this) || this;
        /** promo id */
        _this._promotions = [];
        if (!promotions || !promotions.length) {
            _this._log('Invalid parameter configuration for promotion impression event in gtm');
            return _this;
        }
        _this._promotions = promotions;
        return _this;
    }
    /**
     * Check if configuration for promotion click event is valid
     */
    PromotionImpression.prototype.isValid = function () {
        if (!this._promotions || this._promotions.length) {
            this._log('Invalid parameter configuration for promotion impression event in gtm');
            return false;
        }
        return true;
    };
    /** Map global promotion click from event manager to local promotion click for GTM */
    PromotionImpression.fromMJEvent = function (event) {
        return new PromotionImpression(event._promotions);
    };
    /**
     * Get product impression json object to push into dataLayer
     */
    PromotionImpression.prototype.getJson = function () {
        return {
            'event': 'promotionImpression',
            'ecommerce': {
                'promoView': {
                    'promotions': {
                        'promotions': this._promotions
                    }
                }
            }
        };
    };
    PromotionImpression.prototype.getFJson = function () {
        if (this._promotions.length < 1)
            return {};
        return this._promotions[0];
    };
    /** Log messages */
    PromotionImpression.prototype._log = function (message) {
        console.log(message);
    };
    return PromotionImpression;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["e" /* EcommerceEvent */]));

var PromotionImpressionModel = (function () {
    function PromotionImpressionModel() {
    }
    return PromotionImpressionModel;
}());

//# sourceMappingURL=promotionImpression.js.map

/***/ }),
/* 381 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return PromotionClick; });
/* unused harmony export PromotionClickModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * Global promotion click model to push promotion click event to event manager
 */
var PromotionClick = (function (_super) {
    __extends(PromotionClick, _super);
    function PromotionClick(promotions) {
        var _this = _super.call(this) || this;
        /** promo id */
        _this._promotions = [];
        if (!promotions || !promotions.length) {
            _this._log('Invalid parameter configuration for promotion click event in gtm');
            return _this;
        }
        _this._promotions = promotions;
        return _this;
    }
    /**
     * Check if configuration for promotion click event is valid
     */
    PromotionClick.prototype.isValid = function () {
        if (!this._promotions || !this._promotions.length) {
            this._log('Invalid parameter configuration for promotion click event in gtm');
            return false;
        }
        return true;
    };
    /** Map global promotion click from event manager to local promotion click for GTM */
    PromotionClick.fromMJEvent = function (event) {
        return new PromotionClick(event._promotions);
    };
    /**
     * Get product impression json object to push into dataLayer
     */
    PromotionClick.prototype.getJson = function () {
        return {
            'event': 'promotionClick',
            'ecommerce': {
                'promoClick': {
                    'promotions': this._promotions
                }
            }
        };
    };
    PromotionClick.prototype.getFJson = function () {
        if (this._promotions.length < 1)
            return {};
        return this._promotions[0];
    };
    /** Log messages */
    PromotionClick.prototype._log = function (message) {
        console.log(message);
    };
    return PromotionClick;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["e" /* EcommerceEvent */]));

var PromotionClickModel = (function () {
    function PromotionClickModel() {
    }
    return PromotionClickModel;
}());

//# sourceMappingURL=promotionClick.js.map

/***/ }),
/* 382 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Checkout; });
/* unused harmony export CheckOutProductModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * Global checkout model to push checkout step event to event manager
 */
var Checkout = (function (_super) {
    __extends(Checkout, _super);
    function Checkout(step, option, products) {
        var _this = _super.call(this) || this;
        /** Array of CheckOutProductModel with product data */
        _this._products = [];
        if (!step || !option || !products || !products.length) {
            _this._log('Invalid parameter configuration for checkout event in gtm');
            return _this;
        }
        _this._step = step;
        _this._option = option;
        _this._products = products;
        return _this;
    }
    ;
    /**
     * Check if configuration for checkout event is valid
     */
    Checkout.prototype.isValid = function () {
        if (!this._step || !this._option || !this._products || !this._products.length) {
            this._log('Invalid parameter configuration for checkout event in gtm');
            return false;
        }
        return true;
    };
    /** Map global checkout model from event manager to local checkout model for GTM */
    Checkout.fromMJEvent = function (event) {
        return new Checkout(event._step, event._option, event._products);
    };
    /**
     * Get checkout json object to push into dataLayer
     */
    Checkout.prototype.getJson = function () {
        return {
            'event': 'checkout',
            'ecommerce': {
                'checkout': {
                    'actionField': { 'step': this._step, 'option': this._option },
                    'products': this._products
                }
            }
        };
    };
    Checkout.prototype.getFJson = function () {
        if (this._products.length < 1)
            return {};
        var p = this._products[0];
        p["step"] = this._step;
        p["option"] = this._option;
        return p;
    };
    /** Log messages */
    Checkout.prototype._log = function (message) {
        console.log(message);
    };
    return Checkout;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["e" /* EcommerceEvent */]));

var CheckOutProductModel = (function () {
    function CheckOutProductModel() {
    }
    return CheckOutProductModel;
}());

//# sourceMappingURL=checkout.js.map

/***/ }),
/* 383 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Purchase; });
/* unused harmony export CheckOutProductModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * Global purchase model to push purchase event to event manager
 */
var Purchase = (function (_super) {
    __extends(Purchase, _super);
    function Purchase(id, affiliation, revenue, tax, shipping, coupon, products) {
        var _this = _super.call(this) || this;
        /** Array of CheckOutProductModel with product data */
        _this._products = [];
        if (!id || !revenue || !products || !products.length) {
            _this._log('Invalid parameter configuration for purchase event in gtm');
            return _this;
        }
        _this._id = id;
        _this._affiliation = affiliation ? affiliation : '';
        _this._revenue = revenue;
        _this._tax = tax ? tax : '0';
        _this._shipping = shipping ? shipping : '0';
        _this._coupon = coupon ? coupon : '';
        _this._products = products;
        return _this;
    }
    ;
    /**
     * Check if configuration for purchase event is valid
     */
    Purchase.prototype.isValid = function () {
        if (!this._id || !this._revenue || !this._products || !this._products.length) {
            this._log('Invalid parameter configuration for purchase event in gtm');
            return false;
        }
        return true;
    };
    /** Map global add to cart from event manager to local add to cart model for GTM */
    Purchase.fromMJEvent = function (event) {
        return new Purchase(event._id, event._affiliation, event._revenue, event._tax, event._shipping, event._coupon, event._products);
    };
    /**
     * Get add to cart json object to push into dataLayer
     */
    Purchase.prototype.getJson = function () {
        return {
            'event': 'purchase',
            'ecommerce': {
                'purchase': {
                    'actionField': {
                        'id': this._id,
                        'affiliation': this._affiliation,
                        'revenue': this._revenue,
                        'tax': this._tax,
                        'shipping': this._shipping,
                        'coupon': this._coupon
                    },
                    'products': this._products
                }
            }
        };
    };
    Purchase.prototype.getFJson = function () {
        return {
            'id': this._id,
            'affiliation': this._affiliation,
            'revenue': this._revenue,
            'tax': this._tax,
            'shipping': this._shipping,
            'coupon': this._coupon
        };
    };
    /** Log messages */
    Purchase.prototype._log = function (message) {
        console.log(message);
    };
    return Purchase;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["e" /* EcommerceEvent */]));

var CheckOutProductModel = (function () {
    function CheckOutProductModel() {
    }
    return CheckOutProductModel;
}());

//# sourceMappingURL=purchase.js.map

/***/ }),
/* 384 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return VirtualPageView; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * Global remove from cart model to push remove from cart event to event manager
 */
var VirtualPageView = (function (_super) {
    __extends(VirtualPageView, _super);
    function VirtualPageView(pagePath) {
        var _this = _super.call(this) || this;
        _this._pagePath = '';
        if (!pagePath || pagePath === '') {
            _this._log('Invalid parameter configuration for virtual page view event in GTM');
            return _this;
        }
        _this._pagePath = pagePath;
        return _this;
    }
    /**
     * Check if configuration for remove from cart event is valid
     */
    VirtualPageView.prototype.isValid = function () {
        if (!this._pagePath || this._pagePath === '') {
            this._log('Invalid parameter configuration for virtual page view event in GTM');
            return false;
        }
        return true;
    };
    /** Map global add to cart from event manager to local add to cart model for GTM */
    VirtualPageView.fromMJEvent = function (event) {
        return new VirtualPageView(event._pagePath);
    };
    /**
     * Get add to cart json object to push into dataLayer
     */
    VirtualPageView.prototype.getJson = function () {
        return {
            'event': 'virtualPageView',
            'pagePath': this._pagePath
        };
    };
    VirtualPageView.prototype.getFJson = function () {
        return this.getJson();
    };
    /** Log messages */
    VirtualPageView.prototype._log = function (message) {
        console.log(message);
    };
    return VirtualPageView;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["e" /* EcommerceEvent */]));

//# sourceMappingURL=virtualPageView.js.map

/***/ }),
/* 385 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CustomEventModel; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * Default custom event model to track custom events, pushing it to GTM data layer
 */
var CustomEventModel = (function (_super) {
    __extends(CustomEventModel, _super);
    function CustomEventModel(event, eventLable, eventValue, eventAction, eventCategory, eventCustomDimensions) {
        var _this = _super.call(this) || this;
        /** custom event category */
        _this._eventCustomDimensions = new Map();
        _this._event = event ? event : "";
        _this._eventLabel = eventLable ? eventLable : "";
        _this._eventValue = eventValue ? eventValue : "";
        _this._eventAction = eventAction ? eventAction : "";
        _this._eventCategory = eventCategory ? eventCategory : "";
        _this._eventCustomDimensions = eventCustomDimensions;
        return _this;
    }
    /**
     * Check if custom event is valid
     */
    CustomEventModel.prototype.isValid = function () {
        if (this._event || this._eventLabel || this._eventValue || this._eventAction || this._eventCategory) {
            return true;
        }
        this._log('Invalid parameter configuration for custom event in gtm');
        return false;
    };
    /** Map global product impression from event manager to local product impression for GTM */
    CustomEventModel.fromMJEvent = function (customEvent) {
        return new CustomEventModel(customEvent._event, customEvent._eventLabel, customEvent._eventValue, customEvent._eventAction, customEvent._eventCategory, customEvent._eventCustomDimensions);
    };
    /**
     * get json object for custom event to add it to data layer
     */
    CustomEventModel.prototype.getJson = function () {
        var customEvent = {
            'event': this._event,
            'eventLabel': this._eventLabel,
            'eventValue': this._eventValue,
            'eventAction': this._eventAction,
            'eventCategory': this._eventCategory
        };
        if (!this._eventCustomDimensions || this._eventCustomDimensions.size < 1) {
            return customEvent;
        }
        var iterator = this._eventCustomDimensions.entries();
        var value = iterator.next().value;
        while (value) {
            customEvent[value[0]] = value[1];
            value = iterator.next().value;
        }
        return customEvent;
    };
    CustomEventModel.prototype.getFJson = function () {
        return this.getJson();
    };
    /** Log messages */
    CustomEventModel.prototype._log = function (message) {
        console.log(message);
    };
    return CustomEventModel;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["c" /* CustomEvent */]));

//# sourceMappingURL=customEventModel.js.map

/***/ }),
/* 386 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export fbqServiceFactory */
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return FBQModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__(12);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__martjack_ng_event_manager__ = __webpack_require__(7);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__fbq_service__ = __webpack_require__(254);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};




function fbqServiceFactory(_eventManagerService, _config) {
    return new __WEBPACK_IMPORTED_MODULE_3__fbq_service__["a" /* FBQService */](_eventManagerService, _config);
}
var FBQModule = (function () {
    function FBQModule() {
    }
    FBQModule_1 = FBQModule;
    FBQModule.forRoot = function (fbqConfig) {
        return {
            ngModule: FBQModule_1,
            providers: [
                {
                    provide: 'fbqConfig', useValue: fbqConfig
                },
                {
                    provide: __WEBPACK_IMPORTED_MODULE_3__fbq_service__["a" /* FBQService */],
                    useFactory: fbqServiceFactory,
                    deps: [
                        __WEBPACK_IMPORTED_MODULE_2__martjack_ng_event_manager__["g" /* EventManagerService */],
                        'fbqConfig'
                    ]
                }
            ]
        };
    };
    FBQModule = FBQModule_1 = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */]
            ]
        })
    ], FBQModule);
    return FBQModule;
    var FBQModule_1;
}());

//# sourceMappingURL=fbq_module.js.map

/***/ }),
/* 387 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ViewContent; });
/* unused harmony export ProductViewModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * Global product view model to push product view event to event manager
 */
var ViewContent = (function (_super) {
    __extends(ViewContent, _super);
    function ViewContent(products) {
        var _this = _super.call(this) || this;
        /** Array of ProductViewModel with product data */
        _this._products = [];
        if (!products || !products.length) {
            _this._log('Invalid parameter configuration for product view event in fbq');
            return _this;
        }
        _this._products = products;
        return _this;
    }
    /**
     * Check if configuration for product view event is valid
     */
    ViewContent.prototype.isValid = function () {
        if (!this._products || !this._products.length) {
            this._log('Invalid parameter configuration for product view event in fbq');
            return false;
        }
        return true;
    };
    /** Map global product impression from event manager to local product impression for GTM */
    ViewContent.fromMJEvent = function (event) {
        return new ViewContent(event._products);
    };
    /**
     * Get product impression json object to push into dataLayer
     */
    ViewContent.prototype.getJson = function () {
        var product = this._products[0];
        return {
            'event': 'ViewContent',
            'customData': {
                'content_name': product.name,
                'content_ids': product.id,
                'value': product.price,
                'content_type': 'product',
                'content_category': product.category,
            }
        };
    };
    /** Log messages */
    ViewContent.prototype._log = function (message) {
        console.log(message);
    };
    return ViewContent;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["e" /* EcommerceEvent */]));

var ProductViewModel = (function () {
    function ProductViewModel() {
    }
    return ProductViewModel;
}());

//# sourceMappingURL=viewContent.js.map

/***/ }),
/* 388 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AddToCart; });
/* unused harmony export AddToCartProductModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * FBQ add to cart model to track add to cart event
 */
var AddToCart = (function (_super) {
    __extends(AddToCart, _super);
    function AddToCart(currencyCode, products) {
        var _this = _super.call(this) || this;
        /** Current CurrencyCode*/
        _this._currencyCode = '';
        /** Array of AddToCartProductModel with product data */
        _this._products = [];
        if (!currencyCode || !products || !products.length) {
            _this._log('Invalid parameter configuration for add to cart event in fbq');
            return _this;
        }
        _this._currencyCode = currencyCode;
        _this._products = products;
        return _this;
    }
    /**
     * Check if configuration for add to cart event is valid
     */
    AddToCart.prototype.isValid = function () {
        if (!this._currencyCode || !this._products || !this._products.length) {
            this._log('Invalid parameter configuration for add to cart event in fbq');
            return false;
        }
        return true;
    };
    /** Map global add to cart from event manager to local add to cart model for FBQ */
    AddToCart.fromMJEvent = function (event) {
        return new AddToCart(event._currencyCode, event._products);
    };
    /**
     * Get add to cart json object to track
     */
    AddToCart.prototype.getJson = function () {
        var product = this._products[0];
        return {
            'event': 'AddToCart',
            'customData': {
                'content_name': product.name,
                'content_ids': product.id,
                'value': product.price,
                'content_type': 'product',
                'content_category': product.category,
                'currency': this._currencyCode
            }
        };
    };
    /** Log messages */
    AddToCart.prototype._log = function (message) {
        console.log(message);
    };
    return AddToCart;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["e" /* EcommerceEvent */]));

var AddToCartProductModel = (function () {
    function AddToCartProductModel() {
    }
    return AddToCartProductModel;
}());

//# sourceMappingURL=addToCart.js.map

/***/ }),
/* 389 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Checkout; });
/* unused harmony export CheckOutProductModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * FBQ checkout model to track checkout event
 */
var Checkout = (function (_super) {
    __extends(Checkout, _super);
    function Checkout(products) {
        var _this = _super.call(this) || this;
        /** Array of CheckOutProductModel with product data */
        _this._products = [];
        if (!products || !products.length) {
            _this._log('Invalid parameter configuration for checkout event in fbq');
            return _this;
        }
        _this._products = products;
        return _this;
    }
    /**
     * Check if configuration for checkout event is valid
     */
    Checkout.prototype.isValid = function () {
        if (!this._products || !this._products.length) {
            this._log('Invalid parameter configuration for checkout event in fbq');
            return false;
        }
        return true;
    };
    /** Map global checkout model from event manager to local checkout model for FBQ */
    Checkout.fromMJEvent = function (event) {
        return new Checkout(event._products);
    };
    /**
     * Get checkout json object to track
     */
    Checkout.prototype.getJson = function () {
        var contentIds = [];
        this._products.forEach(function (product) {
            contentIds.push(product.id);
        });
        return {
            'event': 'InitiateCheckout',
            'customData': {
                'content_name': 'Checkout',
                'content_ids': contentIds,
                'content_type': 'product_group',
                'contents': this._products
            }
        };
    };
    /** Log messages */
    Checkout.prototype._log = function (message) {
        console.log(message);
    };
    return Checkout;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["e" /* EcommerceEvent */]));

var CheckOutProductModel = (function () {
    function CheckOutProductModel() {
    }
    return CheckOutProductModel;
}());

//# sourceMappingURL=checkout.js.map

/***/ }),
/* 390 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Purchase; });
/* unused harmony export CheckOutProductModel */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * Global purchase model to push purchase event to event manager
 */
var Purchase = (function (_super) {
    __extends(Purchase, _super);
    function Purchase(id, affiliation, revenue, tax, shipping, coupon, products) {
        var _this = _super.call(this) || this;
        /** Array of CheckOutProductModel with product data */
        _this._products = [];
        if (!id || !revenue || !products || !products.length) {
            _this._log('Invalid parameter configuration for purchase event in fbq');
            return _this;
        }
        _this._id = id;
        _this._affiliation = affiliation ? affiliation : '';
        _this._revenue = revenue;
        _this._tax = tax ? tax : '0';
        _this._shipping = shipping ? shipping : '0';
        _this._coupon = coupon ? coupon : '';
        _this._products = products;
        return _this;
    }
    ;
    /**
     * Check if configuration for purchase event is valid
     */
    Purchase.prototype.isValid = function () {
        if (!this._id || !this._revenue || !this._products || !this._products.length) {
            this._log('Invalid parameter configuration for purchase event in fbq');
            return false;
        }
        return true;
    };
    /** Map global add to cart from event manager to local add to cart model for GTM */
    Purchase.fromMJEvent = function (event) {
        return new Purchase(event._id, event._affiliation, event._revenue, event._tax, event._shipping, event._coupon, event._products);
    };
    /**
     * Get add to cart json object to push into dataLayer
     */
    Purchase.prototype.getJson = function () {
        var contentIds = [];
        this._products.forEach(function (product) {
            contentIds.push(product.id);
        });
        return {
            'event': 'Purchase',
            'customData': {
                'value': this._revenue,
                'content_type': 'product_group',
                'content_name': 'Purchase',
                'content_ids': contentIds,
                'contents': this._products
            }
        };
    };
    /** Log messages */
    Purchase.prototype._log = function (message) {
        console.log(message);
    };
    return Purchase;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["e" /* EcommerceEvent */]));

var CheckOutProductModel = (function () {
    function CheckOutProductModel() {
    }
    return CheckOutProductModel;
}());

//# sourceMappingURL=purchase.js.map

/***/ }),
/* 391 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CustomEventModel; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__ = __webpack_require__(7);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

/**
 * Default custom event model to track custom events
 */
var CustomEventModel = (function (_super) {
    __extends(CustomEventModel, _super);
    function CustomEventModel(event, eventLable, eventValue, eventAction, eventCategory) {
        var _this = _super.call(this) || this;
        _this._event = event ? event : "";
        _this._eventLabel = eventLable ? eventLable : "";
        _this._eventValue = eventValue ? eventValue : "";
        _this._eventAction = eventAction ? eventAction : "";
        _this._eventCategory = eventCategory ? eventCategory : "";
        return _this;
    }
    /**
     * Check if custom event is valid
     */
    CustomEventModel.prototype.isValid = function () {
        if (this._event || this._eventLabel || this._eventValue || this._eventAction || this._eventCategory) {
            return true;
        }
        this._log('Invalid parameter configuration for custom event in fbq');
        return false;
    };
    /** Map global custom event from event manager to local custom event for fbq */
    CustomEventModel.fromMJEvent = function (customEvent) {
        return new CustomEventModel(customEvent._event, customEvent._eventLabel, customEvent._eventValue, customEvent._eventAction, customEvent._eventCategory);
    };
    /**
     * get json object for custom event
     */
    CustomEventModel.prototype.getJson = function () {
        return {
            'event': this._event,
            'customData': {
                'value': this._eventValue
            }
        };
    };
    /** Log messages */
    CustomEventModel.prototype._log = function (message) {
        console.log(message);
    };
    return CustomEventModel;
}(__WEBPACK_IMPORTED_MODULE_0__martjack_ng_event_manager__["c" /* CustomEvent */]));

//# sourceMappingURL=customEventModel.js.map

/***/ }),
/* 392 */,
/* 393 */,
/* 394 */,
/* 395 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return MyExceptionHandler; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(13);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


// import { RaygunService } from '@martjack/ng-raygun';
// import { RaygunModule } from '@martjack/ng-raygun/raygun.module';
/**
 * Raygun will be added in here.
 */
var MyExceptionHandler = (function () {
    function MyExceptionHandler(app, toastCtrl, events) {
        var _this = this;
        this.app = app;
        this.toastCtrl = toastCtrl;
        this.events = events;
        this.events.subscribe("api:resolved", function (data) {
            console.log("API:", data);
            if (data !== true) {
                console.log("API ERROR:", data);
                _this.handleError(data);
            }
        });
    }
    MyExceptionHandler.prototype.handleError = function (error) {
        console.log("ERROR:", error);
        // this.raygun.push(error);
        // let issueCode = this.getIssueType(error)
        // this.handleIssue(issueCode)                
        // try{
        //     if( Commons.isKeyExists( "rejection", error ) )            
        //         this.raygun.push(error.rejection);
        //     else
        //         this.raygun.push(error);
        //     return;
        // }catch(e){
        //     console.error("Raygun failed to collect");
        //     return
        // }
    };
    MyExceptionHandler = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["b" /* App */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["o" /* ToastController */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["c" /* Events */]])
    ], MyExceptionHandler);
    return MyExceptionHandler;
}());

//# sourceMappingURL=global-exceptions.js.map

/***/ })
],[290]);
//# sourceMappingURL=main.js.map