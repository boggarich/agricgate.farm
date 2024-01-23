$('.reply-btn').on('click', function() {

    $(this).closest('.comment-wrapper').after($('#addReplyHTML'));

    $('#addReplyHTML').css({ display: '-webkit-box', opacity: 1 });

});

$('.main-search-input').on('focusin', function () {

  $('.search-results-wrapper').css('display', 'block');
  $('#searchBtn').addClass('focus');

  commonObj.getSearchHistory();

});

$(document).on('click', function (e) {
  if (!$(e.target).closest('.main-search-input').length) {
    if (!$(e.target).closest('.search-results-wrapper').length) {
      $('.search-results-wrapper').css('display', 'none');
      $('.main-search-input').removeClass('focus');
      $('#searchBtn').removeClass('focus');
    } else {
      $('.search-results-wrapper').css('display', 'block');
    }
  } else {
    $('.main-search-input').addClass('focus');
  }
});

$('.search-results-wrapper').on("mouseenter", function () {
  $(this).css('display', 'block');
});

$('#toggleCourseContentBtn').on("click", function () {
  var clicks = $(this).data('clicks');
  if (clicks) {
    $('.course-content').removeClass(['w-0', 'min-h-0', 'h-0']);
    $('.lesson-pane').removeClass('w-100');
    $(this).find('svg').css('rotate', '0deg');
  } else {
    $('.course-content').addClass(['w-0', 'min-h-0', 'h-0']);
    $('.lesson-pane').addClass('w-100');
    $(this).find('svg').css('rotate', '180deg');
  }
  $(this).data("clicks", !clicks);
});