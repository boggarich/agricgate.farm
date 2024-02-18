class commonClass {

    constructor(external) {

        this.ext = external;

    }

    verifyPayment(transactionRef) {

        var ids = this.ext.jsId;
        var urls = this.ext.url;

        let _verifyPaymentInterval = setInterval(() => {

                $.ajax({
                    url : urls.verifyPayment,
                    method : "post",
                    data : {transaction_ref: transactionRef},
                })
                .done((response) => {

                    if(response.status) {

                        $(ids.paymentVerificationHTML).addClass('hidden');
                        $(ids.paymentVerifiedHTML).removeClass('hidden');

                    }

                    else {

                        $(ids.paymentVerificationHTML).addClass('hidden');
                        $(ids.paymentVerificationFailedHTML).removeClass('hidden');

                    }

                    clearInterval(_verifyPaymentInterval);

                });

        }, 5000);

    }

    getNextLesson(event, currentLessonId, videoDuration) {

        let videoProgressObj = sessionStorage.getItem("videoProgress");
        let obj = JSON.parse(videoProgressObj);
        let currentLessonProgress = 0;
        let navigationURL;

        if(videoDuration) {

            obj.find( (el) => {

                if(el.hasOwnProperty(currentLessonId)) {

                    currentLessonProgress = el[currentLessonId];

                }

            });

            navigationURL = $(event.target)[0].href + 
            `?plvd=${videoDuration}&plp=${currentLessonProgress}&prev-lesson=${currentLessonId}`;

            location.href = navigationURL;

        }

        else {

            location.href = $(event.target)[0].href + `?prev-lesson=${currentLessonId}`;

        }

    }

    initVideo(player, lessonId, videoProgressObj) {

        let videoEl = player;

        let obj = JSON.parse(videoProgressObj);

        obj.find( (el) => {

            if(el.hasOwnProperty(lessonId)) {
                
                videoEl.currentTime = el[lessonId];

            }
        
        });

    }

    storeVideoProgress(player, lessonId, videoProgressObj ) {

        let currentTime = player.currentTime;

        let obj = JSON.parse(videoProgressObj);

        if(obj.find((el) => el.hasOwnProperty(lessonId))) {

            let _obj = obj.map( _videoProgressObj => {

                if(_videoProgressObj.hasOwnProperty(lessonId)) {

                    return { ..._videoProgressObj, [lessonId]: currentTime }

                }

                return _videoProgressObj;

            });


            sessionStorage.setItem("videoProgress", JSON.stringify(_obj));

        }
        else {

            if(obj.length){
                
                sessionStorage.setItem("videoProgress", JSON.stringify(
                    [ 
                        { [lessonId] : currentTime },
                        ...obj
                    ]
                ));

            }
            else {

                sessionStorage.setItem("videoProgress", JSON.stringify(
                    [ 
                        { [lessonId] : currentTime } 
                    ]
                ));

            }

        }
    

    }

    deleteSearchHistory(key, value) {

        let obj = JSON.parse(localStorage.getItem(key));

        var _obj = obj.filter( (searchQuery) => {

            return searchQuery !== value;

        });

        localStorage.setItem(key, JSON.stringify([..._obj]));

        return;

    }

    getSearchHistory(key = 'searchHistory') {

        let searchHistoryFetchStatus = $(this.ext.jsId.searchHistoryFetchStatus).val();

        if(searchHistoryFetchStatus == 'false') {

            let obj = JSON.parse(localStorage.getItem(key));
  
            if(obj) {
    
                let searchHistoryHTML = '';          
        
                $.each(obj, (index, item) => {

        
                    searchHistoryHTML = searchHistoryHTML + 
                                            `<div class="align-items-center mb-2">
                                                <a href="/search?search_query=${item}" class="flex-grow-1 recent-search">
                                                    <p class="mb-0">${ item }</p>
                                                </a>
                                                <button class="btn custom-close-btn delete-recent-search">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" class="position-relative">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.7552 0.244792C19.8328 0.322191 19.8944 0.414139 19.9364 0.515368C19.9784 0.616597 20 0.725119 20 0.834717C20 0.944315 19.9784 1.05284 19.9364 1.15407C19.8944 1.25529 19.8328 1.34724 19.7552 1.42464L1.42421 19.7556C1.26775 19.9121 1.05554 20 0.83428 20C0.613015 20 0.400813 19.9121 0.244355 19.7556C0.0878969 19.5992 0 19.387 0 19.1657C0 18.9445 0.0878969 18.7323 0.244355 18.5758L18.5754 0.244792C18.6528 0.167196 18.7447 0.105633 18.8459 0.0636274C18.9472 0.021622 19.0557 0 19.1653 0C19.2749 0 19.3834 0.021622 19.4846 0.0636274C19.5859 0.105633 19.6778 0.167196 19.7552 0.244792Z" fill="black"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.244792 0.244792C0.167196 0.322191 0.105633 0.414139 0.0636274 0.515368C0.021622 0.616597 0 0.725119 0 0.834717C0 0.944315 0.021622 1.05284 0.0636274 1.15407C0.105633 1.2553 0.167196 1.34724 0.244792 1.42464L18.5758 19.7556C18.7323 19.9121 18.9445 20 19.1657 20C19.387 20 19.5992 19.9121 19.7556 19.7556C19.9121 19.5992 20 19.387 20 19.1657C20 18.9445 19.9121 18.7323 19.7556 18.5758L1.42464 0.244792C1.34724 0.167196 1.25529 0.105633 1.15407 0.0636274C1.05284 0.021622 0.944315 0 0.834717 0C0.725119 0 0.616597 0.021622 0.515368 0.0636274C0.414139 0.105633 0.322191 0.167196 0.244792 0.244792Z" fill="black"/>
                                                    </svg>
                                                </button>
                                                <input type="hidden" value="${ item }" />
                                            </div>`;
            
        
                });
        
                $(this.ext.jsId.searchResultsWrapper).append(searchHistoryHTML);

                $(this.ext.jsId.searchHistoryFetchStatus).val(true);

                $(ext.classes.recentSearch).on('click', (e) => {

                    e.preventDefault();

                    var url = $(e.currentTarget)[0].href;
                    var search = new URL(url).search;
                    var params = new URLSearchParams(search).get('search_query');

                    this.setSearchHistory('searchHistory', params);

                    location.href = $(e.currentTarget)[0].href;
    
                })

                $(ext.classes.deleteRecentSearchBtn).on('click', (e) => {

                    var recent_search = $(e.currentTarget).next('input').val();

                    this.deleteSearchHistory('searchHistory', recent_search);

                    $(e.currentTarget).parent('div').css({ 'opacity': 0 , 'display' : 'none' })
    
                });
    
            }

        }
  
    }

    setSearchHistory(key, value) {

        if(value) {

            let obj = JSON.parse(localStorage.getItem(key));
    
            if(obj) {
                
                if(obj.find(el => el == value)) {

                    var _obj = obj.filter( (searchQuery) => {

                        return searchQuery !== value;

                    });

                    localStorage.setItem(key, JSON.stringify([value  , ..._obj]));
        
                    return;
                }
        
                else {
        
                    if(obj.length < 10) {
                    
                    localStorage.setItem(key, JSON.stringify([value  , ...obj]));
        
                    }
        
                    if(obj.length == 10) {
        
                    let searchHistory = obj;
        
                    searchHistory.pop();
        
                    localStorage.setItem(key, JSON.stringify([value  , ...searchHistory]));
                    
                    }
                    
        
                }
    
            }
            else {
    
                obj = [value];
        
                localStorage.setItem(key, JSON.stringify(obj));
    
            }

        }
  
    }

    addReply() {

        let commentId = $(this.ext.jsId.commentId).val();
        let reply = $(this.ext.jsId.reply).val();

        this.disEnbBtn(this.ext.jsId.addReplyBtn, 'dis');

        $.ajax({
            type: "POST",
            url: this.ext.url.addReply,
            data: { comment_id: commentId, reply: reply },
            success: (data) => {


                this.disEnbBtn(this.ext.jsId.addReplyBtn, 'enb');

                $(this.ext.jsId.reply).val('');
                
                $(this.ext.jsId.addReplyHTML).before(
                   
                    `
                    <div class="reply-wrapper mb-4">
                        <img src="/assets/img/PersonCircle.png" alt="user-profile"/>
                        <div class="reply">
                            <div class="d-flex reply-header">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0 me-3">${ data.user }</p>
                                    <span>few seconds ago</span>
                                </div>
                            </div>
                            <p>${ data.data.reply }</p>
                        </div>
                    </div>
                    `

                );

            }
        });


    }
 
    addComment() {

        let lessonId = $(this.ext.jsId.lessonId).val();
        let comment = $(this.ext.jsId.comment).val();

        this.disEnbBtn(this.ext.jsId.addCommentBtn, 'dis');

        $.ajax({
            type: "POST",
            url: this.ext.url.addComment,
            data: { lesson_id: lessonId, comment: comment },
            success: (data) => {


                this.disEnbBtn(this.ext.jsId.addCommentBtn, 'enb');

                $(this.ext.jsId.comment).val('');
                
                $(this.ext.jsId.commentsWrapper).append(
                   
                    `<div class="comment-wrapper mb-4">
                        <img src="/assets/img/PersonCircle.png" alt="user-profile"/>
                        <div class="comment">
                            <div class="d-flex comment-header">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0 me-3">${ data.user }</p>
                                    <span>few seconds ago</span>
                                </div>
                                <button class="btn reply-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                        <path d="M7.57132 14.875L1.72999 10.775C1.59241 10.6955 1.47839 10.5824 1.39918 10.4467C1.31998 10.311 1.27832 10.1575 1.27832 10.0013C1.27832 9.84505 1.31998 9.69152 1.39918 9.55584C1.47839 9.42015 1.59241 9.30699 1.72999 9.22752L7.57132 5.12502C7.71057 5.04496 7.869 5.00233 8.03055 5.00148C8.19209 5.00062 8.35099 5.04156 8.49111 5.12014C8.63124 5.19872 8.7476 5.31214 8.82839 5.44889C8.90917 5.58564 8.95151 5.74085 8.95109 5.89877V7.50002C10.8692 7.50002 16.6236 7.50002 17.9023 17.5C14.7055 11.875 8.95109 12.5 8.95109 12.5V14.1013C8.95109 14.8013 8.17617 15.2238 7.57132 14.8763V14.875Z" fill="#555555"/>
                                    </svg>
                                    Reply
                                </button>
                            </div>
                            <p>${ data.data.comment }</p>
                        </div>
                    </div>`

                );

            }
        });

    }

    addToFavorite() {

        let courseId = $(this.ext.jsId.courseId).val();

        this.disEnbBtn(this.ext.jsId.addToFavoriteBtn, 'dis');

        $.ajax({
            type: "POST",
            url: this.ext.url.addFavorite,
            data: { course_id: courseId },
            success: (data) => {


                this.disEnbBtn(this.ext.jsId.addToFavoriteBtn, 'enb');
                
                $(this.ext.jsId.addToFavoriteBtn).html(
                    `<svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="28.0556" cy="28.0556" r="26.6528" stroke="#555555" stroke-width="2.80556"/>
                    <path d="M37.9806 16.9902C37.7208 16.9979 37.4742 17.1065 37.2931 17.2929L22.0001 32.5859L15.7071 26.2929C15.615 26.1969 15.5046 26.1203 15.3825 26.0675C15.2603 26.0147 15.1289 25.9869 14.9959 25.9855C14.8628 25.9842 14.7309 26.0094 14.6077 26.0597C14.4845 26.1099 14.3726 26.1843 14.2785 26.2784C14.1844 26.3725 14.1101 26.4844 14.0598 26.6075C14.0095 26.7307 13.9843 26.8627 13.9856 26.9957C13.987 27.1288 14.0149 27.2602 14.0677 27.3823C14.1205 27.5045 14.1971 27.6148 14.2931 27.707L21.2931 34.707C21.4806 34.8944 21.7349 34.9998 22.0001 34.9998C22.2653 34.9998 22.5196 34.8944 22.7071 34.707L38.7071 18.707C38.8516 18.5665 38.9503 18.3857 38.9903 18.1882C39.0302 17.9906 39.0096 17.7857 38.931 17.6001C38.8525 17.4145 38.7197 17.2569 38.5501 17.1481C38.3805 17.0393 38.182 16.9842 37.9806 16.9902Z" fill="black"/>
                    </svg>
                    `
                );

            }
        });

    }

    disEnbBtn(id, action) {

        if(action == 'dis') {

            $(id).prop('disabled', true);

        }

        if(action == 'enb') {

            $(id).prop('disabled', false);

        }

    }

    askQuestion (userProfileImg, quill) {

        let courseId = $(this.ext.jsId.courseId).val();
        let question = $(this.ext.jsId.question).val();

        this.disEnbBtn(this.ext.jsId.askQuestionBtn, 'dis');

        $.ajax({
            type: "POST",
            url: this.ext.url.askQuestion,
            data: { course_id: courseId, question: question },
            success: (data) => {

                let html = `<div class="chat-wrapper">
                                <img src="${userProfileImg}" alt="profile image">
                                <div class="chat-bubble">
                                    <p>${ data.user }</p>
                                    ${ data.data.question }
                                </div>
                            </div>`;
                
                $(this.ext.jsId.questionsAndAnswersWrapper).append(html);

                quill.setContents([
                    { insert: '\n' }
                ]);

                this.disEnbBtn(this.ext.jsId.askQuestionBtn, 'enb');

            }
        });

    }

    search() {

        location.href = '/search';

    }

}