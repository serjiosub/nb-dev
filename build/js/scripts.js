$(document).ready(function(){function e(){var o,t=0,s=0,i=[];totalListStr="",$(".tariff-checkbox:checked").each(function(e){o=parseInt($(this).siblings(".tariff-item").attr("price")),t+=o,i.push($(this).siblings(".tariff-item").find("h3").text()),$(this).siblings(".tariff-item").hasClass("tariff-operator")&&(s=parseInt($(".short-select").val()),console.log("OPS: "+s),1<s&&(t+=o*(s-1)))}),$(".price-total-amount").html(t),$(".price-total-modal").html(t),totalListStr=String(i).replace(" ?",""),$("#user-order-list").val(totalListStr),$("#user-order-total").val(t),$("#user-order-ops").val(s),/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)?$(".tariff-checkbox").is(":checked")?($(".tariff-item").css("box-shadow","none"),$("#chat-24-widget-container").css("margin-bottom","75px"),$("#block-show").css("display","none"),$(".price-total-container").slideDown(150),$("#chat-24-widget-container").addClass("offset-up"),$("footer .container").addClass("pb-6")):($("#chat-24-widget-container").css("margin-bottom","75px"),$("#chat-24-widget-container").removeClass("offset-up"),$(".price-total-container").hide(),$("footer .container").removeClass("pb-6"),$("#block-show").slideDown(150)):$(".tariff-checkbox").is(":checked")?($(".tariff-item").css("box-shadow","none"),$("#chat-24-inner-container").css("margin-bottom","85px"),$("#block-show").css("display","none"),$(".price-total-container").slideDown(150),$("#chat-24-widget-container").addClass("offset-up"),$("footer .container").addClass("pb-6")):($("#chat-24-inner-container").css("margin-bottom","85px"),$("#chat-24-widget-container").removeClass("offset-up"),$(".price-total-container").hide(),$("footer .container").removeClass("pb-6"),$("#block-show").slideDown(150)),console.log("TP:"+t),console.log(i)}$(".scr-carousel").slick({slidesToShow:1,slidesToScroll:1,arrows:!0,appendArrows:$(".scr-carousel-arrows"),dots:!1,focusOnSelect:!0}),$(".feedback-slider").slick({slidesToShow:2,slidesToScroll:1,arrows:!0,appendArrows:$(".feedback-arrows"),dots:!1,focusOnSelect:!1,responsive:[{breakpoint:768,settings:{slidesToShow:1}}]}),$('[data-toggle="popover"]').popover({trigger:"hover"}),$(".tariff-item").each(function(e){pri=$(this).attr("price"),$(this).find(".price-holder").html(pri)}),$(".tariff-checkbox").change(function(){e()}),$(".short-select").change(function(){e()}),$(window).one("mouseover",function(){screen.width<960||jQuery(".dropdown-lang").on("mouseover",function(){var e=jQuery(this);e.children(".lang-menu").show(200,function(){e.mouseleave(function(){jQuery(this).children(".lang-menu").hide(200)})})})})}),function(s){"use strict";var o,e,i=s(".contact__form"),t=s(".contact__msg1"),a=s(".contact__msg2"),r=s(".contact__msg3");function n(e){e.fadeIn(),setTimeout(function(){e.fadeOut(3e3)},2e3)}function c(e){switch(e.status){case 400:n(t);break;case 500:n(a);break;case 403:n(r);break;default:!function(){i[0].reset(),s("#orderModal").modal("hide"),setTimeout(function(){s("#orderModalThanks").modal("show")},500);var e=5,o=s(".time-left").text(e),t=setInterval(function(){o.text(--e),e||(clearInterval(t),window.location.href="/")},1e3);dataLayer.push({event:"order-submit"})}()}}function d(e,o){o=o||window.location.href,e=e.replace(/[\[\]]/g,"\\$&");o=new RegExp("[?&]"+e+"(=([^&#]*)|&|#|$)").exec(o);return o?o[2]?decodeURIComponent(o[2].replace(/\+/g," ")):"":null}i.submit(function(e){e.preventDefault(),o=s(this).serialize(),s.ajax({type:"POST",url:i.attr("action"),data:o}).always(c)}),"/gr/"==window.location.pathname?s(document).ready(function(){s(".user-phone-mask").mask("+30 ( 999 ) 999-99-99")}):s(document).ready(function(){s(".user-phone-mask").mask("+38 ( 999 ) 999-99-99")}),(e=d("hash"))&&(e=d("hash"),s(".change-key").val(e),setTimeout(function(){s("#change").modal("show")},500)),s("#confirm_password").on("keyup",function(){var e=s("#password").val(),o=s(this).val();e!=o?(s(".restorePass-msg1").show(),s("#restore-submit").attr("disabled","disabled"),s("#password").removeAttr("disabled")):o&&(s("#restore-submit").removeAttr("disabled"),s(".restorePass-msg1").hide())}),s("#password").on("keyup",function(){s("#restore-submit").attr("disabled","disabled"),s(".restorePass-msg1").hide();var e=this.value.length;5<=e?(s("#confirm_password").removeAttr("disabled"),s("#confirm_password").val("")):e<5&&(s(".restorePass-msg1").hide(),s("#confirm_password").attr("disabled","disabled"),s("#confirm_password").val(""))}),s("#forgotform-email").on("keyup",function(){-1!=document.getElementById("forgotform-email").value.indexOf("@",0)?s("#forgot-submit").removeAttr("disabled"):s("#forgot-submit").attr("disabled","disabled")}),s(window).on("scroll",function(){var e=s("#price").offset().top;/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)?s(this).scrollTop()>e-300&&!s(".tariff-checkbox").is(":checked")?(s("#block-show").css("display","block"),s("#chat-24-widget-container").css("margin-bottom","75px")):s(".tariff-checkbox").is(":checked")?s("#chat-24-widget-container").css("margin-bottom","75px"):(s("#block-show").css("display","none"),s("#chat-24-widget-container").css("margin-bottom","0px")):s(this).scrollTop()>e-400&&!s(".tariff-checkbox").is(":checked")?(s("#block-show").css("display","block"),s("#chat-24-inner-container").css("margin-bottom","85px")):s(".tariff-checkbox").is(":checked")?s("#chat-24-inner-container").css("margin-bottom","85px"):(s("#block-show").css("display","none"),s("#chat-24-inner-container").css("margin-bottom","0px"));e=s("#price").offset().top;/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)?s(this).scrollTop()>e+1300&&!s(".tariff-checkbox").is(":checked")&&(s("#block-show").css("display","none"),s("#chat-24-widget-container").css("margin-bottom","0px")):s(this).scrollTop()>e+400&&!s(".tariff-checkbox").is(":checked")&&(s("#block-show").css("display","none"),s("#chat-24-inner-container").css("margin-bottom","0px"))}),s(".order-choose").click(function(){s(".tariff-item").css("box-shadow","0 0 10px 2px rgb(255, 0, 0)"),s(".rowstyle").css("transition","box-shadow 0.3s linear")}),s("#demo-email").on("keyup",function(){-1!=document.getElementById("demo-email").value.indexOf("@",0)?s("#reg-demo-submit").removeAttr("disabled"):s("#reg-demo-submit").attr("disabled","disabled")})}(jQuery);