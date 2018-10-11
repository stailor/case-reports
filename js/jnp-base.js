jQuery(document).ready(function($){
  var eventType;

  if (!!('ontouchstart' in window)) {
    $('html').addClass('touch');
    eventType = 'touchstart';
  } else {
    $('html').addClass('no-touch');
    eventType = 'click';
  }

  $('body').on(eventType, function(event) {
    event.stopPropagation();
    $('li.burger.open').trigger(eventType, 'close');
    $('li.search.open').trigger(eventType, 'close');
  });

  function toggleSearch(nav, id) {
    $(nav+' li.search').bind(eventType, function(event, close) {
      event.stopPropagation();

      function openClose(elem) {
        elem.toggleClass('open').toggleClass('closed');
        if (undefined == close) {
          $('li.burger.open').trigger(eventType, 'close');
        }
      }

      if ($('#'+id).length) {
        $('#'+id).toggle();
        openClose($(this));
      } else {
        $.post(ajax_object.ajax_url, {action: id}, function(data, textStatus, jqXHR) {
          $(nav).append(data);
          $('#'+id).on(eventType, function(event) {
            event.stopPropagation();
          });
          openClose($(nav+' li.search'));
        }, 'html');
      }
    });
  }
  toggleSearch('.nav-journal', 'search_form_journal');
  toggleSearch('.nav-journals', 'search_form_journals');


  $('li.burger').on(eventType, function(event, close) {
    event.stopPropagation();
    if ($('#nav-mobile').length) {
      var margin;
      if ($(this).hasClass('closed')) {
        margin = '-251px';
        $('#nav-mobile').toggle();
      } else {
        margin = '1px';
      }
      $('li.burger').toggleClass('open');
      $('.container').animate({
        marginLeft: margin
      }, 500, 'swing', function() {
        if ($('li.burger').toggleClass('closed').hasClass('closed')) {
          $('#nav-mobile').toggle();
        }
        if (undefined == close) {
          $('li.search.open').trigger(eventType, 'close');
        }
      });
    } else {
      $.post(ajax_object.ajax_url, {action: 'mobile_nav'}, function(data, textStatus, jqXHR) {
        $('body > .container').prepend(data);
        $('#close-burger').on(eventType, function(event) {
          event.stopPropagation();
          $('li.burger.open').trigger(eventType);
        });
        $('#nav-mobile').on(eventType, function(event) {
          event.stopPropagation();
        });
        $('li.burger').trigger(eventType);
      }, 'html');
    }
    return false;
  });

  $('#close-cookie').on(eventType, function(event) {
    event.stopPropagation();
    document.cookie = 'cookiebar=hide'; // TODO: set expiry
    $('section.cookie').toggleClass('hide');
  });
  $('#cookie-more').on(eventType, function(event) {
    event.stopPropagation();
    $('section.cookie').toggleClass('open').toggleClass('closed');
  });
});
