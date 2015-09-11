$(document).ready(function() {


    var fishlike = {
        likeAction: 'tx_fishlike_like[action]=like',
        getCounterAction: 'tx_fishlike_like[action]=getCounter',
        typeNum: 1441893610,
        path: '/',

        getCounter: function (objectType, objectUid, element) {
            jQuery.ajax({
                url: fishlike.path,
                data: '&' + fishlike.getCounterAction
                + '&type=' + fishlike.typeNum
                + '&tx_fishlike_like[type]=' + objectType
                + '&tx_fishlike_like[uid]=' + objectUid,
                success: function (resultData) {
                    $(element).find('.fishlike-count').html(resultData.count);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },

        like: function (objectType, objectUid, element) {
            $.ajax({
                url: fishlike.path,
                data: +'&' + likeAction
                + '&type=' + typeNum
                + 'tx_fishlike_like[type]=' + objectType
                + '&tx_fishlike_like[uid]=' + objectUid,
                success: function (resultData) {
                    $(element).find('.fishlike-count').html(resultData.count);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },

        init: function() {
            $('.fishlike-button').each(function(){
                var uid = $(this).data('uid');
                var type = $(this).data('type');
                fishlike.getCounter(type, uid, $(this));
                $(this).click(function(e) {
                    e.preventDefault();
                    fishlike.like(type, uid, $(this));
                });
            });
        }
    };

    fishlike.init();
});
