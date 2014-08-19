/**
 * Created by hzj on 14-2-27.
 */
/**
 * Kittencup Api (http://api.kittencup.com/)
 *
 * @date 14-2-27下午9:40
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

'use strict';

var KITTENCUP = angular.module('kittencup', ['ngRoute', 'ngCookies'])


    .config(function ($routeProvider) {

        $routeProvider.when('/', {

        }).when('/teacher-:title', {
                controller: 'kittencupCtrl',
                templateUrl: function (params,$scope) {
                    return './article/teacher/' + params.title + '.txt'
                }
        }).when('/student-:title', {
            controller: 'kittencupCtrl',
            templateUrl: function (params,$scope) {
                return './article/student/' + params.title + '.txt'
            }
        }).otherwise({
            redirectTo: '/'
        });
    });