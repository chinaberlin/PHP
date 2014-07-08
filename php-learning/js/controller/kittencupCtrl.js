/**
 * Created by hzj on 14-2-27.
 */
/**
 * Kittencup Api (http://api.kittencup.com/)
 *
 * @date 14-2-27下午9:53
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

KITTENCUP.controller('kittencupCtrl', ['navList', '$scope', '$sce', '$cookieStore','$routeParams',function (navList, $scope, $sce, $cookieStore,$routeParams) {

    var converter = new Showdown.converter();

    $scope.navList = navList;
    $scope.fontSize = 17.5;
    $scope.editMarkdown = $cookieStore.get('editMarkdown');
    $scope.editPreviewHtml = $sce.trustAsHtml($cookieStore.get('editPreviewHtml'));
    $scope.$parent.title = $routeParams.title;
    $scope.titleKey = 'teacher';
    $scope.$parent.hiddenKey = $routeParams.title === 'markdown 可视化编辑器' || $routeParams.title === undefined;

    $scope.transformMarkdown = function (target) {
        var markdownHtml = angular.element(target).val();
        var html = converter.makeHtml(markdownHtml);
        $scope.editPreviewHtml = $sce.trustAsHtml(html);

        $cookieStore.put('editMarkdown', markdownHtml);
        $cookieStore.put('editPreviewHtml', html);
    }


    $scope.reduceFontsize = function(){
        angular.element('#content-view p,#content-view a,#content-view li').css({fontSize:--$scope.fontSize});
    }

    $scope.addFontsize = function(){
        angular.element('#content-view p,#content-view a,#content-view li').css({fontSize:++$scope.fontSize});
    }

    $scope.search = function(target){
        var searchVal = angular.element(target).val();

        $scope.searchCount = 0;
        angular.element('#content-view').find('*').css({background:'',color:'',fontSize:''});

        if(!searchVal.length){
            return ;
        }

        angular.forEach(angular.element('#content-view').find('*'),function(ele){
            ele = angular.element(ele);

            var html = ele.html();

            if(html.indexOf(searchVal) !== -1){
                ele.css({background:'#e74c3c',color:'#fff',fontSize:20,padding:5});
            }

        })
    }

}]);