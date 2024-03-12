let videoProgressObj;
let _videoTimeInterval;
let videoDuration;
let lessonId = $(ext.jsId.lessonId).val();

if(sessionStorage.getItem("videoProgress")) {

    videoProgressObj = sessionStorage.getItem("videoProgress");

}

else {

    sessionStorage.setItem('videoProgress', JSON.stringify([]));

    videoProgressObj = sessionStorage.getItem("videoProgress");
}

var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";

var firstScriptTag = document.getElementsByTagName('script')[0];

firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;

function onYouTubeIframeAPIReady() {

    player = new YT.Player('player', {
        videoId: $(ext.jsId.videoId).val(),
        playerVars: {
            'playsinline': 1,
            'rel': 0
        }
    });

    if(lessonId) {

        player.addEventListener('onReady', () => {
            
            videoDuration = player.getDuration();

            commonObj.initYoutubeVideo(player, lessonId, videoProgressObj);

        });

        player.addEventListener('onStateChange', (event) => {

            //video playing
            if(event.data == 1) {

                _videoTimeInterval = setInterval(() => {

                    commonObj.storeYoutubeVideoProgress(player, lessonId, videoProgressObj);

                }, 5000);

            }

            //video paused
            if(event.data == 2) {

                _clearVideoTimeInterval = clearInterval(_videoTimeInterval);

            }

            //video ended
            if(event.data == 2) {

                _clearVideoTimeInterval = clearInterval(_videoTimeInterval);

                commonObj.storeYoutubeVideoProgress(player, lessonId, videoProgressObj);

            }

        });

    }

}
