let courseContentShow = 0;
let mobileNavsShow = 0;
let mobileSearchShow = 0;
let videoUrlPrefix = '';

$('#locale').on('change', (e) => {

    console.log(e.target.text)

    if($(`#${e.target.value}`).length) {

      return;

    }

    console.log(e.target)

    let videoURLInputHTML = 

    `<div class="col-md-6 form-group">
        <label for="inputEmail4" class="form-label">Video URL (${ $('#locale option:selected').text() })</label>
        <input type="text" class="form-control video-url" name="video_urls[]" value="${e.target.value}::" id="${e.target.value}"/>
    </div>
    <div class="col-md-6"></div>`;

    $('#video-url-wrapper').append(videoURLInputHTML);

    $(`#${e.target.value}`).on('focus', (e) => {

      videoUrlPrefix = e.target.value;
    
    });

    $(`#${e.target.value}`).on('input', (e) => {


      if( e.target.value.length < videoUrlPrefix.length )
      {
    
        $(e.target).val(videoUrlPrefix);
    
      };
    
    });

});

$('.video-url').on('input', (e) => {


  if( e.target.value.split("::")[0] + '::' != videoUrlPrefix )
  {

    $(e.target).val(videoUrlPrefix);

  };

});

$('.video-url').on('focus', (e) => {

  videoUrlPrefix = e.target.value.split("::")[0] + '::';

});

$('#showSearchBtn').on('click', () => {

    if(!mobileSearchShow) {

      $('.search-wrapper').addClass('active');
      $('.backdrop-mobile').addClass('active');
      mobileSearchShow = 1;

    }
    else {

      $('.search-wrapper').removeClass('active');
      $('.backdrop-mobile').removeClass('active');
      mobileSearchShow = 0;

    }

});

$('#showMobileNavsBtn').on('click', () => {

    if(!mobileNavsShow) {

      $('.mobile-navs').addClass('active');
      mobileNavsShow = 1;

    }
    else {

      $('.mobile-navs').removeClass('active');
      mobileNavsShow = 0;

    }

});

$(ext.jsId.updateProfileImgInput).on('change', (e) => {

    $url = URL.createObjectURL(e.target.files[0]);
    $(ext.jsId.profileImg).attr("src", $url );
    $(ext.jsId.profileImgUploadForm).submit();

});

$(ext.jsId.updateProfileImgBtn).on('click', () => {

    $(ext.jsId.updateProfileImgInput).click();

});

$('.reply-btn').on('click', function() {

    let commentId = $(this).data('jsCommentId');

    $('#commentId').val(commentId);

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

$('#toggleCourseContentMobileViewBtn').on("click", (e) => {

    if(!courseContentShow) {

      $('.course-content').css({ 'transform' : 'translateX(0)', 'display': 'block' });

      $(e.currentTarget).css('rotate', '180deg');

    }

    else {

      $('.course-content').css({ 'transform' : 'translateX(-100%)' });

            $(e.currentTarget).css('rotate', '0deg');

    }

    courseContentShow = !courseContentShow;

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