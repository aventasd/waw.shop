!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):t.PerfectScrollbar=e()}(this,function(){"use strict";function u(t){return getComputedStyle(t)}function p(t,e){for(var i in e){var n=e[i];"number"==typeof n&&(n+="px"),t.style[i]=n}return t}function f(t){var e=document.createElement("div");return e.className=t,e}function s(t,e){if(!o)throw new Error("No element matching method supported");return o.call(t,e)}function i(t){t.remove?t.remove():t.parentNode&&t.parentNode.removeChild(t)}function n(t,e){return Array.prototype.filter.call(t.children,function(t){return s(t,e)})}function v(t,e){var i=t.element.classList,n=w.state.scrolling(e);i.contains(n)?clearTimeout(a[e]):i.add(n)}function m(t,e){a[e]=setTimeout(function(){return t.element.classList.remove(w.state.scrolling(e))},t.settings.scrollingThreshold)}function b(t){if("function"==typeof window.CustomEvent)return new CustomEvent(t);var e=document.createEvent("CustomEvent");return e.initCustomEvent(t,!1,!1,void 0),e}function l(t,e,i,n){var r=i[0],l=i[1],o=i[2],s=i[3],a=i[4],c=i[5],h=t.element,d=!1;t.reach[s]=null,e<=0&&(e=0,t.reach[s]="start"),e>=t[r]-t[l]&&((e=t[r]-t[l])-h[o]<=2&&(d=!0),t.reach[s]="end");var u,p,f=h[o]-e;f&&(h.dispatchEvent(b("ps-scroll-"+s)),0<f?h.dispatchEvent(b("ps-scroll-"+a)):h.dispatchEvent(b("ps-scroll-"+c)),d||(h[o]=e),t.reach[s]&&h.dispatchEvent(b("ps-"+s+"-reach-"+t.reach[s])),n&&(v(u=t,p=s),m(u,p)))}function g(t){return parseInt(t,10)||0}function r(t,e){return t.settings.minScrollbarLength&&(e=Math.max(e,t.settings.minScrollbarLength)),t.settings.maxScrollbarLength&&(e=Math.min(e,t.settings.maxScrollbarLength)),e}function e(e,t){function i(t){X(e,d,f+g*(t[o]-b),!1),v(e,u),R(e),t.stopPropagation(),t.preventDefault()}function n(){m(e,u),e.event.unbind(e.ownerDocument,"mousemove",i)}var r=t[0],l=t[1],o=t[2],s=t[3],a=t[4],c=t[5],h=t[6],d=t[7],u=t[8],p=e.element,f=null,b=null,g=null;e.event.bind(e[a],"mousedown",function(t){f=p[h],b=t[o],g=(e[l]-e[r])/(e[s]-e[c]),e.event.bind(e.ownerDocument,"mousemove",i),e.event.once(e.ownerDocument,"mouseup",n),t.stopPropagation(),t.preventDefault()})}var o=Element.prototype.matches||Element.prototype.webkitMatchesSelector||Element.prototype.msMatchesSelector,w={main:"ps",element:{thumb:function(t){return"ps__thumb-"+t},rail:function(t){return"ps__rail-"+t},consuming:"ps__child--consume"},state:{focus:"ps--focus",active:function(t){return"ps--active-"+t},scrolling:function(t){return"ps--scrolling-"+t}}},a={x:null,y:null},c=function(t){this.element=t,this.handlers={}},t={isEmpty:{configurable:!0}};c.prototype.bind=function(t,e){void 0===this.handlers[t]&&(this.handlers[t]=[]),this.handlers[t].push(e),this.element.addEventListener(t,e,!1)},c.prototype.unbind=function(e,i){var n=this;this.handlers[e]=this.handlers[e].filter(function(t){return!(!i||t===i)||(n.element.removeEventListener(e,t,!1),!1)})},c.prototype.unbindAll=function(){for(var t in this.handlers)this.unbind(t)},t.isEmpty.get=function(){var e=this;return Object.keys(this.handlers).every(function(t){return 0===e.handlers[t].length})},Object.defineProperties(c.prototype,t);var Y=function(){this.eventElements=[]};Y.prototype.eventElement=function(e){var t=this.eventElements.filter(function(t){return t.element===e})[0];return t||(t=new c(e),this.eventElements.push(t)),t},Y.prototype.bind=function(t,e,i){this.eventElement(t).bind(e,i)},Y.prototype.unbind=function(t,e,i){var n=this.eventElement(t);n.unbind(e,i),n.isEmpty&&this.eventElements.splice(this.eventElements.indexOf(n),1)},Y.prototype.unbindAll=function(){this.eventElements.forEach(function(t){return t.unbindAll()}),this.eventElements=[]},Y.prototype.once=function(t,e,i){var n=this.eventElement(t),r=function(t){n.unbind(e,r),i(t)};n.bind(e,r)};var X=function(t,e,i,n){var r;if(void 0===n&&(n=!0),"top"===e)r=["contentHeight","containerHeight","scrollTop","y","up","down"];else{if("left"!==e)throw new Error("A proper axis should be provided");r=["contentWidth","containerWidth","scrollLeft","x","left","right"]}l(t,i,r,n)},h=document&&"WebkitAppearance"in document.documentElement.style,y=window&&("ontouchstart"in window||window.DocumentTouch&&document instanceof window.DocumentTouch),W=navigator&&navigator.msMaxTouchPoints,R=function(t){var e=t.element;t.containerWidth=e.clientWidth,t.containerHeight=e.clientHeight,t.contentWidth=e.scrollWidth,t.contentHeight=e.scrollHeight,e.contains(t.scrollbarXRail)||(n(e,w.element.rail("x")).forEach(function(t){return i(t)}),e.appendChild(t.scrollbarXRail)),e.contains(t.scrollbarYRail)||(n(e,w.element.rail("y")).forEach(function(t){return i(t)}),e.appendChild(t.scrollbarYRail)),!t.settings.suppressScrollX&&t.containerWidth+t.settings.scrollXMarginOffset<t.contentWidth?(t.scrollbarXActive=!0,t.railXWidth=t.containerWidth-t.railXMarginWidth,t.railXRatio=t.containerWidth/t.railXWidth,t.scrollbarXWidth=r(t,g(t.railXWidth*t.containerWidth/t.contentWidth)),t.scrollbarXLeft=g((t.negativeScrollAdjustment+e.scrollLeft)*(t.railXWidth-t.scrollbarXWidth)/(t.contentWidth-t.containerWidth))):t.scrollbarXActive=!1,!t.settings.suppressScrollY&&t.containerHeight+t.settings.scrollYMarginOffset<t.contentHeight?(t.scrollbarYActive=!0,t.railYHeight=t.containerHeight-t.railYMarginHeight,t.railYRatio=t.containerHeight/t.railYHeight,t.scrollbarYHeight=r(t,g(t.railYHeight*t.containerHeight/t.contentHeight)),t.scrollbarYTop=g(e.scrollTop*(t.railYHeight-t.scrollbarYHeight)/(t.contentHeight-t.containerHeight))):t.scrollbarYActive=!1,t.scrollbarXLeft>=t.railXWidth-t.scrollbarXWidth&&(t.scrollbarXLeft=t.railXWidth-t.scrollbarXWidth),t.scrollbarYTop>=t.railYHeight-t.scrollbarYHeight&&(t.scrollbarYTop=t.railYHeight-t.scrollbarYHeight),function(t,e){var i={width:e.railXWidth};e.isRtl?i.left=e.negativeScrollAdjustment+t.scrollLeft+e.containerWidth-e.contentWidth:i.left=t.scrollLeft,e.isScrollbarXUsingBottom?i.bottom=e.scrollbarXBottom-t.scrollTop:i.top=e.scrollbarXTop+t.scrollTop,p(e.scrollbarXRail,i);var n={top:t.scrollTop,height:e.railYHeight};e.isScrollbarYUsingRight?e.isRtl?n.right=e.contentWidth-(e.negativeScrollAdjustment+t.scrollLeft)-e.scrollbarYRight-e.scrollbarYOuterWidth:n.right=e.scrollbarYRight-t.scrollLeft:e.isRtl?n.left=e.negativeScrollAdjustment+t.scrollLeft+2*e.containerWidth-e.contentWidth-e.scrollbarYLeft-e.scrollbarYOuterWidth:n.left=e.scrollbarYLeft+t.scrollLeft,p(e.scrollbarYRail,n),p(e.scrollbarX,{left:e.scrollbarXLeft,width:e.scrollbarXWidth-e.railBorderXWidth}),p(e.scrollbarY,{top:e.scrollbarYTop,height:e.scrollbarYHeight-e.railBorderYWidth})}(e,t),t.scrollbarXActive?e.classList.add(w.state.active("x")):(e.classList.remove(w.state.active("x")),t.scrollbarXWidth=0,t.scrollbarXLeft=0,X(t,"left",0)),t.scrollbarYActive?e.classList.add(w.state.active("y")):(e.classList.remove(w.state.active("y")),t.scrollbarYHeight=0,t.scrollbarYTop=0,X(t,"top",0))},L={"click-rail":function(i){var n=i.element;i.event.bind(i.scrollbarY,"mousedown",function(t){return t.stopPropagation()}),i.event.bind(i.scrollbarYRail,"mousedown",function(t){var e=t.pageY-window.pageYOffset-i.scrollbarYRail.getBoundingClientRect().top>i.scrollbarYTop?1:-1;X(i,"top",n.scrollTop+e*i.containerHeight),R(i),t.stopPropagation()}),i.event.bind(i.scrollbarX,"mousedown",function(t){return t.stopPropagation()}),i.event.bind(i.scrollbarXRail,"mousedown",function(t){var e=t.pageX-window.pageXOffset-i.scrollbarXRail.getBoundingClientRect().left>i.scrollbarXLeft?1:-1;X(i,"left",n.scrollLeft+e*i.containerWidth),R(i),t.stopPropagation()})},"drag-thumb":function(t){e(t,["containerWidth","contentWidth","pageX","railXWidth","scrollbarX","scrollbarXWidth","scrollLeft","left","x"]),e(t,["containerHeight","contentHeight","pageY","railYHeight","scrollbarY","scrollbarYHeight","scrollTop","top","y"])},keyboard:function(l){var o=l.element;l.event.bind(l.ownerDocument,"keydown",function(t){if(!(t.isDefaultPrevented&&t.isDefaultPrevented()||t.defaultPrevented)&&(s(o,":hover")||s(l.scrollbarX,":focus")||s(l.scrollbarY,":focus"))){var e=document.activeElement?document.activeElement:l.ownerDocument.activeElement;if(e){if("IFRAME"===e.tagName)e=e.contentDocument.activeElement;else for(;e.shadowRoot;)e=e.shadowRoot.activeElement;if(s(r=e,"input,[contenteditable]")||s(r,"select,[contenteditable]")||s(r,"textarea,[contenteditable]")||s(r,"button,[contenteditable]"))return}var i=0,n=0;switch(t.which){case 37:i=t.metaKey?-l.contentWidth:t.altKey?-l.containerWidth:-30;break;case 38:n=t.metaKey?l.contentHeight:t.altKey?l.containerHeight:30;break;case 39:i=t.metaKey?l.contentWidth:t.altKey?l.containerWidth:30;break;case 40:n=t.metaKey?-l.contentHeight:t.altKey?-l.containerHeight:-30;break;case 32:n=t.shiftKey?l.containerHeight:-l.containerHeight;break;case 33:n=l.containerHeight;break;case 34:n=-l.containerHeight;break;case 36:n=l.contentHeight;break;case 35:n=-l.contentHeight;break;default:return}l.settings.suppressScrollX&&0!==i||l.settings.suppressScrollY&&0!==n||(X(l,"top",o.scrollTop-n),X(l,"left",o.scrollLeft+i),R(l),function(t,e){var i=o.scrollTop;if(0===t){if(!l.scrollbarYActive)return!1;if(0===i&&0<e||i>=l.contentHeight-l.containerHeight&&e<0)return!l.settings.wheelPropagation}var n=o.scrollLeft;if(0===e){if(!l.scrollbarXActive)return!1;if(0===n&&t<0||n>=l.contentWidth-l.containerWidth&&0<t)return!l.settings.wheelPropagation}return!0}(i,n)&&t.preventDefault())}var r})},wheel:function(a){function t(t){var e,i,n,r=(i=(e=t).deltaX,n=-1*e.deltaY,void 0!==i&&void 0!==n||(i=-1*e.wheelDeltaX/6,n=e.wheelDeltaY/6),e.deltaMode&&1===e.deltaMode&&(i*=10,n*=10),i!=i&&n!=n&&(i=0,n=e.wheelDelta),e.shiftKey?[-n,-i]:[i,n]),l=r[0],o=r[1];if(!function(t,e,i){if(!h&&c.querySelector("select:focus"))return!0;if(!c.contains(t))return!1;for(var n=t;n&&n!==c;){if(n.classList.contains(w.element.consuming))return!0;var r=u(n);if([r.overflow,r.overflowX,r.overflowY].join("").match(/(scroll|auto)/)){var l=n.scrollHeight-n.clientHeight;if(0<l&&!(0===n.scrollTop&&0<i||n.scrollTop===l&&i<0))return!0;var o=n.scrollLeft-n.clientWidth;if(0<o&&!(0===n.scrollLeft&&e<0||n.scrollLeft===o&&0<e))return!0}n=n.parentNode}return!1}(t.target,l,o)){var s=!1;a.settings.useBothWheelAxes?a.scrollbarYActive&&!a.scrollbarXActive?(X(a,"top",o?c.scrollTop-o*a.settings.wheelSpeed:c.scrollTop+l*a.settings.wheelSpeed),s=!0):a.scrollbarXActive&&!a.scrollbarYActive&&(X(a,"left",l?c.scrollLeft+l*a.settings.wheelSpeed:c.scrollLeft-o*a.settings.wheelSpeed),s=!0):(X(a,"top",c.scrollTop-o*a.settings.wheelSpeed),X(a,"left",c.scrollLeft+l*a.settings.wheelSpeed)),R(a),(s=s||function(t,e){var i=c.scrollTop;if(0===t){if(!a.scrollbarYActive)return!1;if(0===i&&0<e||i>=a.contentHeight-a.containerHeight&&e<0)return!a.settings.wheelPropagation}var n=c.scrollLeft;if(0===e){if(!a.scrollbarXActive)return!1;if(0===n&&t<0||n>=a.contentWidth-a.containerWidth&&0<t)return!a.settings.wheelPropagation}return!0}(l,o))&&(t.stopPropagation(),t.preventDefault())}}var c=a.element;void 0!==window.onwheel?a.event.bind(c,"wheel",t):void 0!==window.onmousewheel&&a.event.bind(c,"mousewheel",t)},touch:function(h){function d(t,e){X(h,"top",b.scrollTop-e),X(h,"left",b.scrollLeft-t),R(h)}function t(){w=!0}function e(){w=!1}function u(t){return t.targetTouches?t.targetTouches[0]:t}function p(t){return!(t.pointerType&&"pen"===t.pointerType&&0===t.buttons||(!t.targetTouches||1!==t.targetTouches.length)&&(!t.pointerType||"mouse"===t.pointerType||t.pointerType===t.MSPOINTER_TYPE_MOUSE))}function f(t){if(p(t)){Y=!0;var e=u(t);g.pageX=e.pageX,g.pageY=e.pageY,v=(new Date).getTime(),null!==r&&clearInterval(r),t.stopPropagation()}}function i(t){if(!Y&&h.settings.swipePropagation&&f(t),!w&&Y&&p(t)){var e=u(t),i={pageX:e.pageX,pageY:e.pageY},n=i.pageX-g.pageX,r=i.pageY-g.pageY;d(n,r),g=i;var l=(new Date).getTime(),o=l-v;0<o&&(m.x=n/o,m.y=r/o,v=l);var s=function(t,e){var i=b.scrollTop,n=b.scrollLeft,r=Math.abs(t),l=Math.abs(e);if(r<l){if(e<0&&i===h.contentHeight-h.containerHeight||0<e&&0===i)return{stop:!h.settings.swipePropagation,prevent:0===window.scrollY}}else if(l<r&&(t<0&&n===h.contentWidth-h.containerWidth||0<t&&0===n))return{stop:!h.settings.swipePropagation,prevent:!0};return{stop:!0,prevent:!0}}(n,r),a=s.stop,c=s.prevent;a&&t.stopPropagation(),c&&t.preventDefault()}}function n(){!w&&Y&&(Y=!1,h.settings.swipeEasing&&(clearInterval(r),r=setInterval(function(){h.isInitialized?clearInterval(r):m.x||m.y?Math.abs(m.x)<.01&&Math.abs(m.y)<.01?clearInterval(r):(d(30*m.x,30*m.y),m.x*=.8,m.y*=.8):clearInterval(r)},10)))}if(y||W){var b=h.element,g={},v=0,m={},r=null,w=!1,Y=!1;y?(h.event.bind(window,"touchstart",t),h.event.bind(window,"touchend",e),h.event.bind(b,"touchstart",f),h.event.bind(b,"touchmove",i),h.event.bind(b,"touchend",n)):W&&(window.PointerEvent?(h.event.bind(window,"pointerdown",t),h.event.bind(window,"pointerup",e),h.event.bind(b,"pointerdown",f),h.event.bind(b,"pointermove",i),h.event.bind(b,"pointerup",n)):window.MSPointerEvent&&(h.event.bind(window,"MSPointerDown",t),h.event.bind(window,"MSPointerUp",e),h.event.bind(b,"MSPointerDown",f),h.event.bind(b,"MSPointerMove",i),h.event.bind(b,"MSPointerUp",n)))}}},d=function(t,e){var i=this;if(void 0===e&&(e={}),"string"==typeof t&&(t=document.querySelector(t)),!t||!t.nodeName)throw new Error("no element is specified to initialize PerfectScrollbar");for(var n in(this.element=t).classList.add(w.main),this.settings={handlers:["click-rail","drag-thumb","keyboard","wheel","touch"],maxScrollbarLength:null,minScrollbarLength:null,scrollingThreshold:1e3,scrollXMarginOffset:0,scrollYMarginOffset:0,suppressScrollX:!1,suppressScrollY:!1,swipePropagation:!0,swipeEasing:!0,useBothWheelAxes:!1,wheelPropagation:!1,wheelSpeed:1},e)i.settings[n]=e[n];this.containerWidth=null,this.containerHeight=null,this.contentWidth=null,this.contentHeight=null;var r,l,o=function(){return t.classList.add(w.state.focus)},s=function(){return t.classList.remove(w.state.focus)};this.isRtl="rtl"===u(t).direction,this.isNegativeScroll=(l=t.scrollLeft,t.scrollLeft=-1,r=t.scrollLeft<0,t.scrollLeft=l,r),this.negativeScrollAdjustment=this.isNegativeScroll?t.scrollWidth-t.clientWidth:0,this.event=new Y,this.ownerDocument=t.ownerDocument||document,this.scrollbarXRail=f(w.element.rail("x")),t.appendChild(this.scrollbarXRail),this.scrollbarX=f(w.element.thumb("x")),this.scrollbarXRail.appendChild(this.scrollbarX),this.scrollbarX.setAttribute("tabindex",0),this.event.bind(this.scrollbarX,"focus",o),this.event.bind(this.scrollbarX,"blur",s),this.scrollbarXActive=null,this.scrollbarXWidth=null,this.scrollbarXLeft=null;var a=u(this.scrollbarXRail);this.scrollbarXBottom=parseInt(a.bottom,10),isNaN(this.scrollbarXBottom)?(this.isScrollbarXUsingBottom=!1,this.scrollbarXTop=g(a.top)):this.isScrollbarXUsingBottom=!0,this.railBorderXWidth=g(a.borderLeftWidth)+g(a.borderRightWidth),p(this.scrollbarXRail,{display:"block"}),this.railXMarginWidth=g(a.marginLeft)+g(a.marginRight),p(this.scrollbarXRail,{display:""}),this.railXWidth=null,this.railXRatio=null,this.scrollbarYRail=f(w.element.rail("y")),t.appendChild(this.scrollbarYRail),this.scrollbarY=f(w.element.thumb("y")),this.scrollbarYRail.appendChild(this.scrollbarY),this.scrollbarY.setAttribute("tabindex",0),this.event.bind(this.scrollbarY,"focus",o),this.event.bind(this.scrollbarY,"blur",s),this.scrollbarYActive=null,this.scrollbarYHeight=null,this.scrollbarYTop=null;var c,h,d=u(this.scrollbarYRail);this.scrollbarYRight=parseInt(d.right,10),isNaN(this.scrollbarYRight)?(this.isScrollbarYUsingRight=!1,this.scrollbarYLeft=g(d.left)):this.isScrollbarYUsingRight=!0,this.scrollbarYOuterWidth=this.isRtl?(c=this.scrollbarY,g((h=u(c)).width)+g(h.paddingLeft)+g(h.paddingRight)+g(h.borderLeftWidth)+g(h.borderRightWidth)):null,this.railBorderYWidth=g(d.borderTopWidth)+g(d.borderBottomWidth),p(this.scrollbarYRail,{display:"block"}),this.railYMarginHeight=g(d.marginTop)+g(d.marginBottom),p(this.scrollbarYRail,{display:""}),this.railYHeight=null,this.railYRatio=null,this.reach={x:t.scrollLeft<=0?"start":t.scrollLeft>=this.contentWidth-this.containerWidth?"end":null,y:t.scrollTop<=0?"start":t.scrollTop>=this.contentHeight-this.containerHeight?"end":null},this.settings.handlers.forEach(function(t){return L[t](i)}),this.event.bind(this.element,"scroll",function(){return R(i)}),R(this)},H={isInitialized:{configurable:!0}};return H.isInitialized.get=function(){return this.element.classList.contains(w.main)},d.prototype.update=function(){this.isInitialized&&(this.negativeScrollAdjustment=this.isNegativeScroll?this.element.scrollWidth-this.element.clientWidth:0,p(this.scrollbarXRail,{display:"block"}),p(this.scrollbarYRail,{display:"block"}),this.railXMarginWidth=g(u(this.scrollbarXRail).marginLeft)+g(u(this.scrollbarXRail).marginRight),this.railYMarginHeight=g(u(this.scrollbarYRail).marginTop)+g(u(this.scrollbarYRail).marginBottom),p(this.scrollbarXRail,{display:"none"}),p(this.scrollbarYRail,{display:"none"}),R(this),p(this.scrollbarXRail,{display:""}),p(this.scrollbarYRail,{display:""}))},d.prototype.destroy=function(){this.isInitialized&&(this.event.unbindAll(),i(this.scrollbarX),i(this.scrollbarY),i(this.scrollbarXRail),i(this.scrollbarYRail),this.removePsClasses(),this.element=null,this.scrollbarX=null,this.scrollbarY=null,this.scrollbarXRail=null,this.scrollbarYRail=null)},d.prototype.removePsClasses=function(){this.element.className=this.element.className.split(" ").filter(function(t){return!t.match(/^ps([-_].+|)$/)}).join(" ")},Object.defineProperties(d.prototype,H),d});