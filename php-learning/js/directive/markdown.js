/**
 * Created by hzj on 14-2-27.
 */
/**
 * Kittencup Api (http://api.kittencup.com/)
 *
 * @date 14-2-27下午10:02
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

'use strict';

KITTENCUP.directive('kpMarkdown', ['$sce',function ($sce) {
        var converter = new Showdown.converter();
        return {
            restrict: 'AE',
            replace:true,
            link: function (scope, element, attrs) {
                if (attrs.kpMarkdown) {
                    scope.$watch(attrs.kpMarkdown, function (newVal) {
                        var html = newVal ? converter.makeHtml(newVal) : '';
                        element.html(html);
                    });
                } else {

                    var html = converter.makeHtml(element.val());

                    element.parent().html(html);
                }
            }
        };
    }]);