jQuery(document).ready(function($) {

    $('body').on('click', '.nrw-like-post', function() {
        var $loveLink = $(this);
        var $id = $(this).attr('id');
        var $that = $(this);

        if ($loveLink.hasClass('liked')) return false;
        if ($(this).hasClass('inactive')) return false;

        var $dataToPass = {
            action: 'nrw-like-post',
            likes_id: $id
        }

        $.post(NrwLike.ajaxurl, $dataToPass, function(data) {
            $loveLink.find('span').html(data);
            $loveLink.addClass('liked').attr('title', 'You already like this!');
            $loveLink.find('span').css({
                'opacity': 1,
                'width': 'auto'
            });
        });

        $(this).addClass('inactive');

        return false;
    });


});