$(function () {

    $('th input[type="checkbox"]').on('change', function () {
        if ($(this).prop("checked")) {
            $('tr input[type="checkbox"]').prop("checked", true);
            $('.kp-nav button').removeAttr('disabled');
        } else {
            $('tr input[type="checkbox"]').prop("checked", false);
            $('.kp-nav button').attr('disabled',true);
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

        if(checkedCount > 0){
            $('.kp-nav button').removeAttr('disabled');
        }else{
            $('.kp-nav button').attr('disabled',true);
        }
    });

    $('.kp-nav .delete').on('click',function(){
        var path = [];
        $('td input[type="checkbox"]:checked').each(function(){
            path.push($(this).attr('data-path'));
        });

        location.href = 'action.php?action=delete&path='+ path.join('||');
    })

});