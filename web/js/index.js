$().ready(function () {

    //полноэкранный скролл
    $('#fullpage').fullpage({
        //options here
        autoScrolling: true,
        scrollHorizontally: true,
        // navigation: true,
        css3:false,
        afterLoad: function(anchorLink, index){
        },

        onLeave: function(index, nextIndex, direction){

        }
    });

    //принять приглашение
    $('#b_success').on('click', function () {
        $.ajax({
            url: 'site/accept-invitation',
            type: 'get',
            dataType: 'json',
            data: {
                status: true,
                key: (new URL(location.href)).searchParams.get('key')
            },
            success: function (res) {
                if(res){
                    $('.inviting .content').html(res);
                }
            }
        });
    });

    function sendData(key, value) {
        let data = {
            key: (new URL(location.href)).searchParams.get('key')
        };
        data[key] = value;
        $.ajax({
            url: 'site/accept-invitation',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function (res) {
                if(res){
                    $('.inviting .content').html(res);
                }
            }
        });
    }
    //принять приглашение
    $('#b_success').on('click', function (){
        sendData('status', true);
    });

    $('body').on('click','.children', function (){
        sendData('children', $(this).text());
    });

    $('body').on('click','.partner', function (){
        sendData('partner', $(this).text());
    });

    $('body').on('click','.children_count', function (){
        sendData('children_count', $(this).text());
    });

    //счетчик до даты мероприятия
    let dateEnd = new Date('2022', '04', '05', '16', '00');
    setInterval(function(){
        let dateStart = new Date();
        let diff = dateEnd - dateStart;

        let day = Math.floor(diff / 1000 / 60 / 60 / 24);
        let hour = Math.floor((diff - (day * 24 * 60 * 60 * 1000)) / 1000 / 60 / 60);
        let min = Math.floor((diff - (day * 24 * 60 * 60 * 1000) - (hour * 1000 * 60 * 60)) / 1000 / 60);
        let sec = Math.floor((diff - (day * 24 * 60 * 60 * 1000) - (hour * 1000 * 60 * 60) - (min*1000*60)) / 1000);

        let counter = $('body').find('.counter:first');
        counter.find('.day:first').text(day);
        counter.find('.hour:first').text(hour);
        counter.find('.min:first').text(min);
        counter.find('.sec:first').text(sec);
    }, 1000);
});