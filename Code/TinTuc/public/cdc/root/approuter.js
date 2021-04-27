var app = angular.module("myApp", ["ngRoute"]);
app.config(function ($routeProvider) {
    $routeProvider
            .when("/", {
                templateUrl: "template/app/home/home.html"
            })
            .when("/home", {
                templateUrl: "template/app/home/home.html"
            })
            .when("/taoform", {
                templateUrl: "template/app/form/taoform.html"
            })
            .when("/mail/inbox", {
                templateUrl: "template/app/mail/inbox.html"
            })
            .when("/form/forms", {
                templateUrl: "template/app/form/forms.html"
            })
            .when("/form/formdetail/", {
                templateUrl: "template/app/form/formdetail.html"
            })
            .when("/editor", {
                templateUrl: "template/app/form/editor.html"
            })
            .when("/blog/detail", {
                templateUrl: "template/app/blog/detail.html"
            })
            .when("/event/detail", {
                templateUrl: "template/app/event/detail.html"
            })
            .when("/event/events", {
                templateUrl: "template/app/event/events.html"
            });
});