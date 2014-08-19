/**
 * Created by hzj on 14-2-28.
 */
/**
 * Kittencup Api (http://api.kittencup.com/)
 *
 * @date 14-2-28下午4:44
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

$(function () {
    $('nav#menu').mmenu({
        slidingSubmenus: false
    });

    $('body').on('click', '#content img', function (e) {
        e.stopPropagation();
        if ($(this).attr('data-zoom') === 'open') {
            $(this).stop(true).animate({width:200});
            $(this).removeAttr('data-zoom');
        } else {
            $(this).stop(true).animate({width: '100%'});
            $(this).attr('data-zoom', 'open');
        }
    }).on('click','#content',function(){
        //$(this).find('img').stop(true).animate({width: 200}).removeAttr('data-zoom');;
    });
});