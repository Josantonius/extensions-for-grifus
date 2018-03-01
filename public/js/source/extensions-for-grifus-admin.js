/**
 * Extensions For Grifus WordPress plugin.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   josantonius/extensions-for-grifus
 * @copyright 2017 - 2018 (c) Josantonius - Extensions For Grifus
 * @license   GPL-2.0+
 * @link      https://github.com/josantonius/extensions-for-grifus.git
 * @since     1.0.0
 */

(function ($) {
    
   $(document).ready(function () {

      if (typeof eliasis !== 'undefined') {
         var extensions_for_grifus = eliasis;
      } else {
         var extensions_for_grifus = extensionsForGrifusAdmin;
      }

      function setModal(id) {

          var dialog = document.querySelector('dialog');
          var showDialogButton = document.querySelector(id);
          if (! dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
          }
          showDialogButton.addEventListener('click', function() {
            dialog.showModal();
          });

         dialog.addEventListener('click', function (event) {
            var rect = dialog.getBoundingClientRect();
            var isInDialog=(rect.top <= event.clientY && event.clientY <= rect.top + rect.height && rect.left <= event.clientX && event.clientX <= rect.left + rect.width);
            if (!isInDialog) {
              dialog.close();
            }
         });
        dialog.querySelector('.close').addEventListener('click', function() {
          dialog.close();
        });
      }

      /**
       * Dogecoin Donate Button
       * @author Felix Yadomi
       * @link   http://codepen.io/yadomi/pen/EGiKD
       */
      function bitcoinButton() {

         $(function(){
            var url = extensions_for_grifus.icons_url;
            var btn = '<div class="symbol">' +
                        '<img id ="symbol" src="' + url +'bitcoin.png">' +
                      '</div>' +
                      '<p>' +
                        '<span class="currency">Bitcoin</span>' +
                      '</p>';
            $('.btn-dogecoin').each(function(){
               $(this).append(btn);
            });
            $('.btn-dogecoin').click(function(event) {
               var that = this;
               $(this).addClass('opened');  
               $(this).children('p').children('.currency').text($(this).data('address')); 
               $('html').one('click',function() {
                  $(that).removeClass('opened');
                  $(that).children('p').children('.currency').text('Bitcoin');  
               });
               event.stopPropagation();
            });
         });
      }

      function appendToFooter() {
         if ($('body').width() < 783) {
            $('#jst-footer').appendTo("#wpwrap").fadeIn();
         } else {
            $('#jst-footer').appendTo("#wpfooter").fadeIn();
         }
         $('#jst-support').appendTo("#wpwrap").fadeIn();
      }

      function animateButton() {
         var animation = function(){
            $("#donate-button i").fadeTo(1000, .1)
                                 .fadeTo(1000, 1);
         }
         setInterval(animation, 60000);
      }

      function menuHandler(mode, menu, id) {
         $('#toplevel_page_' + menu + ' ul').find('li').each(function(li) {
            var name = $(this).text().split(' ').join('');
            var match = id.indexOf(name) >= 0;
            if (mode === 'hide-submenu' && match) {
               $(this).fadeOut();
            } else if (mode === 'show-submenu' && match) {
               $(this).fadeIn();
            }                    
         });
      }

      animateButton();
      bitcoinButton();
      setModal('#donate-button');
      appendToFooter();

      $(window).resize(function() {
         appendToFooter();
      });

   });

})(jQuery);