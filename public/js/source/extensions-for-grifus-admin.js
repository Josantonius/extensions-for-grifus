/**
 * Extensions For Grifus WordPress plugin.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/Extensions-For-Grifus.git
 * @since      1.0.0
 */

(function ($) {
    
   $(document).ready(function () {

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
            var url = eliasis.icons_url;
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

      function moduleStatusHandler(id, state) {

         $.ajax({
            url: eliasis.ajax_url,
            type: 'post',
            data: {
               id:           id,
               state:        state,
               action:       'moduleStatusHandler',
               custom_nonce: eliasis.nonce
            },
            success:function(data) {

               var response = JSON.parse(data);

               //console.log(response);

               $('.jst-install-error').fadeOut();

               if (response.error) {
                  $('.jst-error-msg').text(response.error);
                  $('.jst-install-error').fadeIn();
               }

               var state = response.state;

               var stateText = response.stateText;

               $('#' + id).attr('data-state', state).text(stateText);

               if (state === 'active') {

                  menuHandler('show-submenu', 'extensions-for-grifus', id);

                  $('#' + id).prop("disabled", false);
                  $('#' + id).addClass('module-btn-active');
                  $('#' + id).removeClass('module-btn-uninstalled');
                  $('#' + id).removeClass('module-btn-outdated');
                  $('#' + id + '-rmv').fadeOut();

               } else if (state === 'inactive') {

                  menuHandler('hide-submenu', 'extensions-for-grifus', id);

                  $('#' + id).prop("disabled", false);
                  $('#' + id).removeClass('module-btn-uninstalled');
                  $('#' + id).removeClass('module-btn-active');
                  $('#' + id + '-rmv').fadeIn();

               } else if (state === 'installed') {

                  $('#' + id).removeClass('module-btn-uninstalled');
                  $('#' + id).removeClass('module-btn-active');
                  $('#' + id + '-rmv').fadeIn();
               
               } else if (state === 'uninstalled') {

                  $('#' + id).prop("disabled", false);
                  $('#' + id).addClass('module-btn-uninstalled');
                  $('#' + id + '-rmv').fadeOut();
               
               } else {

                  $('#' + id).removeClass('module-btn-active');
               }
            },
            error: function(errorThrown){
               //console.log(errorThrown);
            } 

         });

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

      $(".module-btn").click(function(e) {

         var state = $(this).attr('data-state');

         var id = $(this).attr('id');

         if (state === 'outdated') {

            $('#' + id).prop("disabled",true);

            var textButton = eliasis.updating + '...';

            $('#' + id).attr('data-state', state).text(textButton);

         } else if (state === 'uninstalled') {

            $('#' + id).prop("disabled",true);

            var textButton = eliasis.installing + '...';

            $('#' + id).attr('data-state', state).text(textButton);
         }

         moduleStatusHandler(id, state);

      });

      $(".module-btn-uninstall").click(function(e) {

         moduleStatusHandler($(this).attr('data-id'), $(this).attr('data-state'));

      });

   });

})(jQuery);