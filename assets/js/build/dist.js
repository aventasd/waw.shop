"use strict";!function(n){n(".animsition").animsition({inClass:"fade-in",outClass:"fade-out",inDuration:1500,outDuration:800,linkElement:".animsition-link",loading:!0,loadingParentElement:"html",loadingClass:"animsition-loading-1",loadingInner:'<div class="loader05"></div>',timeout:!1,timeoutCountdown:5e3,onLoadEvent:!0,browser:["animation-duration","-webkit-animation-duration"],overlay:!1,overlayClass:"animsition-overlay-slide",overlayParentElement:"html",transition:function(s){window.location.href=s}});var s=n(window).height()/2;n(window).on("scroll",function(){n(this).scrollTop()>s?n("#myBtn").css("display","flex"):n("#myBtn").css("display","none")}),n("#myBtn").on("click",function(){n("html, body").animate({scrollTop:0},300)});var o=n(".container-menu-desktop"),i=n(".wrap-menu-desktop");if(0<n(".top-bar").length)var e=n(".top-bar").height();else e=0;n(window).scrollTop()>e?(n(o).addClass("fix-menu-desktop"),n(i).css("top",0)):(n(o).removeClass("fix-menu-desktop"),n(i).css("top",e-n(this).scrollTop())),n(window).on("scroll",function(){n(this).scrollTop()>e?(n(o).addClass("fix-menu-desktop"),n(i).css("top",0)):(n(o).removeClass("fix-menu-desktop"),n(i).css("top",e-n(this).scrollTop()))}),n(".btn-show-menu-mobile").on("click",function(){n(this).toggleClass("is-active"),n(".menu-mobile").slideToggle()});for(var a=n(".arrow-main-menu-m"),t=0;t<a.length;t++)n(a[t]).on("click",function(){n(this).parent().find(".sub-menu-m").slideToggle(),n(this).toggleClass("turn-arrow-main-menu-m")});n(window).resize(function(){992<=n(window).width()&&("block"==n(".menu-mobile").css("display")&&(n(".menu-mobile").css("display","none"),n(".btn-show-menu-mobile").toggleClass("is-active")),n(".sub-menu-m").each(function(){"block"==n(this).css("display")&&(console.log("hello"),n(this).css("display","none"),n(a).removeClass("turn-arrow-main-menu-m"))}))}),n(".js-show-modal-search").on("click",function(){n(".modal-search-header").addClass("show-modal-search"),n(this).css("opacity","0")}),n(".js-hide-modal-search").on("click",function(){n(".modal-search-header").removeClass("show-modal-search"),n(".js-show-modal-search").css("opacity","1")}),n(".container-search-header").on("click",function(s){s.stopPropagation()});var l=n(".isotope-grid"),r=n(".filter-tope-group");r.each(function(){r.on("click","button",function(){var s=n(this).attr("data-filter");l.isotope({filter:s})})}),n(window).on("load",function(){l.each(function(){n(this).isotope({itemSelector:".isotope-item",layoutMode:"fitRows",percentPosition:!0,animationEngine:"best-available",masonry:{columnWidth:".isotope-item"}})})});var c=n(".filter-tope-group button");n(c).each(function(){n(this).on("click",function(){for(var s=0;s<c.length;s++)n(c[s]).removeClass("how-active1");n(this).addClass("how-active1")})}),n(".js-show-filter").on("click",function(){n(this).toggleClass("show-filter"),n(".panel-filter").slideToggle(400),n(".js-show-search").hasClass("show-search")&&(n(".js-show-search").removeClass("show-search"),n(".panel-search").slideUp(400))}),n(".js-show-search").on("click",function(){n(this).toggleClass("show-search"),n(".panel-search").slideToggle(400),n(".js-show-filter").hasClass("show-filter")&&(n(".js-show-filter").removeClass("show-filter"),n(".panel-filter").slideUp(400))}),n(".js-show-cart").on("click",function(){n(".js-panel-cart").addClass("show-header-cart")}),n(".js-hide-cart").on("click",function(){n(".js-panel-cart").removeClass("show-header-cart")}),n(".js-show-sidebar").on("click",function(){n(".js-sidebar").addClass("show-sidebar")}),n(".js-hide-sidebar").on("click",function(){n(".js-sidebar").removeClass("show-sidebar")}),n(".btn-num-product-down").on("click",function(){var s=Number(n(this).next().val());0<s&&n(this).next().val(s-1)}),n(".btn-num-product-up").on("click",function(){var s=Number(n(this).prev().val());n(this).prev().val(s+1)}),n(".wrap-rating").each(function(){var e=n(this).find(".item-rating"),i=-1,o=n(this).find("input");n(o).val(0),n(e).on("mouseenter",function(){var s=e.index(this),o=0;for(o=0;o<=s;o++)n(e[o]).removeClass("zmdi-star-outline"),n(e[o]).addClass("zmdi-star");for(var i=o;i<e.length;i++)n(e[i]).addClass("zmdi-star-outline"),n(e[i]).removeClass("zmdi-star")}),n(e).on("click",function(){var s=e.index(this);i=s,n(o).val(s+1)}),n(this).on("mouseleave",function(){var s=0;for(s=0;s<=i;s++)n(e[s]).removeClass("zmdi-star-outline"),n(e[s]).addClass("zmdi-star");for(var o=s;o<e.length;o++)n(e[o]).addClass("zmdi-star-outline"),n(e[o]).removeClass("zmdi-star")})}),n(".js-show-modal1").on("click",function(s){s.preventDefault(),n(".js-modal1").addClass("show-modal1")}),n(".js-hide-modal1").on("click",function(){n(".js-modal1").removeClass("show-modal1")})}(jQuery);
"use strict";
"use strict";
"use strict";
"use strict";