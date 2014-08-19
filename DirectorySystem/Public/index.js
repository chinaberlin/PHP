$(function () {

    $('th input[type="checkbox"]').on('change', function () {
        if ($(this).prop("checked")) {
            $('tr input[type="checkbox"]').prop("checked", true);
            $('.kp-nav button').removeAttr('disabled');
        } else {
            $('tr input[type="checkbox"]').prop("checked", false);
            $('.kp-nav button').attr('disabled', true);
        }
    });

    $('td input[type="checkbox"]').on('change', function () {

        var allCount = $('td input[type="checkbox"]').length;

        var checkedCount = $('td input[type="checkbox"]:checked').length;

        if (allCount === checkedCount) {
            $('th input[type="checkbox"]').prop('checked', true);
        } else {
            $('th input[type="checkbox"]').prop('checked', false);
        }

        if (checkedCount > 0) {
            $('.kp-nav button').removeAttr('disabled');
        } else {
            $('.kp-nav button').attr('disabled', true);
        }
    });

    $('.kp-nav .delete').on('click', function () {
        var path = [];
        $('td input[type="checkbox"]:checked').each(function () {
            path.push($(this).attr('data-path'));
        });

        location.href = 'action.php?action=delete&name=' + path.join('||') + '&' + location.href.split('?').pop();
    })


    $.get('api.php?' + location.href.split('?').pop(), function (data) {

        var html = '<ul>';
        var child = data.child;
        html += '<li data-count="1" data-path="' + data.root + '">' + data.root.split('/').pop() + '</li>'
        for (var i = 0 , l = child.length; i < l; i++) {

            var path = child[i];

            var count = path.split('\\').length;

            html += '<li data-count="' + count + '" class="' + (count > 2 ? 'hidden' : '') + '" style="text-indent: ' + (count - 1) + 'em;" data-path="' + path + '">' + path.split('\\').pop() + '</li>'

        }

        html += '</ul>';

        $('.directoryList').html(html);
    }, 'json');

    $('body').on('click', '.directoryList li', function () {
        var count = $(this).attr('data-count');
        var index = $(this).index();
        var path = $(this).attr('data-path');

        $('.directoryList li:gt(' + index + ')').each(function () {

            if ($(this).attr('data-path').indexOf(path) !== -1) {
                if ($(this).attr('data-count') == (parseInt(count) + 1)) {
                    $(this).removeClass('hidden');
                }
            }

        })
        $('.directoryList li').css({background:''});
        $(this).css({background:'red'})
    })

});