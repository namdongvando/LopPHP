
(function($) {


    "use strict";
    var $window = $(window);
    var $windowWidth = 0;
    var VideoControl = function() {
        this.idStorge = null;
        var self = this;
        this.int = function(id) {
            self.idStorge = id;
            $(".video-item").click(function() {
                var $this = $(this);
                self.idStorge = $this.data("target");
                var Videos = $($this.data("target"));
                Videos.attr("src", $this.data("link"));
                self.saveLink($this.data("link"));
                self.resetLinkVideo($this.data("link"));
            });
            if (self.getLinkCurent()) {
                self.setLinkVideo();
            }
        }

        this.setLinkVideo = function() {
            var Videos = $(self.idStorge);
            var curentLink = self.getLinkCurent();
            Videos.attr("src", curentLink);
            self.resetLinkVideo(curentLink);
        }
        this.resetLinkVideo = function(link) {
            $(".video-item").removeClass("active");
            $(".video-item[data-link='" + link + "']").addClass("active");
        }

        this.saveLink = function(link) {
            window.localStorage.setItem(self.idStorge, link);
        }
        this.getLinkCurent = function() {
            return  window.localStorage.getItem(self.idStorge);
        }
    }

    try {
        $(".VideoControl").each(function() {
            var VideoC = new VideoControl();
            var self = $(this);
            VideoC.int("#" + self.attr("id"));
        });
    } catch (e) {
        console.log(e.message);
    }


    $window.on('load', function() {
        $windowWidth = $window.innerWidth();
        $window.trigger("resize");
    });
    $window.resize(function() {
//        console.log($windowWidth);
//        console.log($window.innerWidth());
        if ($windowWidth != $window.innerWidth()) {
//            location.reload();
        }
    });
//    $("#Mainslide").hover(function() {
//        $(this).css({"min-height": "300px"});
//    });
//    $("#Mainslide").mouseover(function() {
//        $(this).css({"min-height": "450px"});
//    });

    $("#phongToThuNhoVideo").click(function() {
        var h = $("#Mainslide").css("min-height");
        if (h == "300px")
        {
            $("#Mainslide").css({"min-height": "450px"});
        } else {

            $("#Mainslide").css({"min-height": "300px"});
        }

    });
    // Preloader
    $('.loader').fadeOut();
    $('.loader-mask').delay(350).fadeOut('slow');
    // Init
    initOwlCarousel();
    $window.on('resize', function() {
        hideSidenav();
    });
    $(".btn-target").click(function() {
        var target = $($(this).data("target"));
        var position = $($(this).data("target")).data("position");
//        console.log(position);
//        console.log(target.css("left"));
        if (position == "left") {
            if (target.css("left") == "0px") {
                target.css({"left": "-100%"});
            } else {
                target.css({"left": "0px"});
            }
        } else {
            if (target.css("right") == "0px") {
                target.css({"right": "-100%"});
            } else {
                target.css({"right": "0px"});
            }
        }
    });
    /* Detect Browser Size
     -------------------------------------------------------*/
    var minWidth;
    if (Modernizr.mq('(min-width: 0px)')) {
// Browsers that support media queries
        minWidth = function(width) {
            return Modernizr.mq('(min-width: ' + width + 'px)');
        };
    } else {
// Fallback for browsers that does not support media queries
        minWidth = function(width) {
            return $window.width() >= width;
        };
    }


    /* Mobile Detect
     -------------------------------------------------------*/
    if (/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i.test(navigator.userAgent || navigator.vendor || window.opera)) {
        $("html").addClass("mobile");
        $('.dropdown-toggle').attr('data-toggle', 'dropdown');
    } else {
        $("html").removeClass("mobile");
    }

    /* IE Detect
     -------------------------------------------------------*/
    if (Function('/*@cc_on return document.documentMode===10@*/')()) {
        $("html").addClass("ie");
    }


    /* Sticky Navigation
     -------------------------------------------------------*/
    $window.scroll(function() {
        scrollToTop();
        stickyNav();
    });
    var $stickyNav = $('.nav--sticky');
    var $nav = $('.nav');
    function stickyNav() {
        if ($window.scrollTop() > 2) {
            $stickyNav.addClass('sticky');
            $nav.addClass('sticky');
        } else {
            $stickyNav.removeClass('sticky');
            $nav.removeClass('sticky');
        }
    }


    /* Mobile Navigation
     -------------------------------------------------------*/
    var $sidenav = $('#sidenav'),
            $mainContainer = $('#main-container'),
            $navIconToggle = $('.nav-icon-toggle'),
            $navHolder = $('.nav__holder'),
            $contentOverlay = $('.content-overlay'),
            $htmlContainer = $('html'),
            $sidenavCloseButton = $('#sidenav__close-button');
    $navIconToggle.on('click', function(e) {
        e.stopPropagation();
        $(this).toggleClass('nav-icon-toggle--is-open');
        $sidenav.toggleClass('sidenav--is-open');
        $contentOverlay.toggleClass('content-overlay--is-visible');
        // $htmlContainer.toggleClass('oh');
    });
    function resetNav() {
        $navIconToggle.removeClass('nav-icon-toggle--is-open');
        $sidenav.removeClass('sidenav--is-open');
        $contentOverlay.removeClass('content-overlay--is-visible');
        // $htmlContainer.removeClass('oh');
    }

    function hideSidenav() {
        if (minWidth(992)) {
            resetNav();
        }
    }

    $contentOverlay.on('click', function() {
        resetNav();
    });
    $sidenavCloseButton.on('click', function() {
        resetNav();
    });
    var $dropdownTrigger = $('.nav__dropdown-trigger'),
            $navDropdownMenu = $('.nav__dropdown-menu'),
            $navDropdown = $('.nav__dropdown');
    if ($('html').hasClass('mobile')) {

        $('body').on('click', function() {
            $navDropdownMenu.addClass('hide-dropdown');
        });
        $navDropdown.on('click', '> a', function(e) {
            e.preventDefault();
        });
        $navDropdown.on('click', function(e) {
            e.stopPropagation();
            $navDropdownMenu.removeClass('hide-dropdown');
        });
    }


    /* Sidenav Menu
     -------------------------------------------------------*/
    $('.sidenav__menu-toggle').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        $this.parent().siblings().removeClass('sidenav__menu--is-open');
        $this.parent().siblings().find('li').removeClass('sidenav__menu--is-open');
        $this.parent().find('li').removeClass('sidenav__menu--is-open');
        $this.parent().toggleClass('sidenav__menu--is-open');
        if ($this.next().hasClass('show')) {
            $this.next().removeClass('show').slideUp(350);
        } else {
            $this.parent().parent().find('li .sidenav__menu-dropdown').removeClass('show').slideUp(350);
            $this.next().toggleClass('show').slideToggle(350);
        }
    });
    /* Nav Seacrh
     -------------------------------------------------------*/
    (function() {
        var navSearchTrigger = $('.nav__search-trigger'),
                navSearchTriggerIcon = navSearchTrigger.find('i'),
                navSearchBox = $('.nav__search-box'),
                navSearchInput = $('.nav__search-input');
        navSearchTrigger.on('click', function(e) {
            e.preventDefault();
            navSearchTriggerIcon.toggleClass('ui-close');
            navSearchBox.slideToggle();
        });
    })();
    /* News Ticker
     -------------------------------------------------------*/

    var $newsTicker = $('.newsticker');
    if ($newsTicker.length) {
        $newsTicker.newsTicker({
            row_height: 26,
            max_rows: 1,
            prevButton: $('#newsticker-button--prev'),
            nextButton: $('#newsticker-button--next')
        });
    }

    $(".newsTicker1").each(function() {
        var self = $(this);
        var id = self.attr("id");
        var $newsTicker1 = $("#" + id);
        if ($newsTicker1.length) {
            $newsTicker1.newsTicker({
                row_height: 66,
                max_rows: 6,
                duration: 99000,
                displayType: 'reveal',
                controls: true,
                fadeInSpeed: 300000,
                nextButton: $('.newstickerbuttonprev[target=' + id + ']'),
                prevButton: $('.newstickerbuttonnext[target=' + id + ']')
            });
        }
    });
    /* Progress Bars
     -------------------------------------------------------*/
    var $animatedBars = $('#animated-bars');
    if ($animatedBars.length) {
        $('#animated-bars').appear(function() {
            function loadDaBars() {
                $('.progress-bars__base').each(function(index) {
                    var $this = $(this),
                            bar = $this.find('.progress-bars__bar'),
                            barWidth = bar.attr('aria-valuenow');
                    setTimeout(function() {
                        bar.css({"width": barWidth + '%'});
                    }, index * 200);
                });
            }
            ;
            loadDaBars();
        });
    }


    /* Tabs
     -------------------------------------------------------*/
    $('.tabs__trigger').on('click', function(e) {
        var currentAttrValue = $(this).attr('href');
        $('.tabs__content-trigger ' + currentAttrValue).stop().fadeIn(1000).siblings().hide();
        $(this).parent('li').addClass('tabs__item--active').siblings().removeClass('tabs__item--active');
        e.preventDefault();
    });
    /* Owl Carousel
     -------------------------------------------------------*/

    function initOwlCarousel() {

        $(".owl-carouselRows").each(function() {
            var options = $(this).data();
            var self = $(this);
            var id = $("#" + self.attr("id"));
            options.navText = ['<i class="ui-arrow-left">', '<i class="ui-arrow-right">'];
            options.lazyLoad = true;
//            console.log(options);
            id.owlCarousel(options);
        });

        $(".owldata").each(function() {
            var options = $(this).data();
            var self = $(this);
            var id = $("#" + self.attr("id"));
            options.navText = ['<i class="ui-arrow-left">', '<i class="ui-arrow-right">'];
            options.lazyLoad = true;
//            console.log(options);
            id.owlCarousel(options);
        });
        $("#owl-hero-grid").owlCarousel({
            center: false,
            items: 1,
            loop: true,
            nav: true,
            dots: false,
            margin: 0,
            lazyLoad: true,
            navSpeed: 500,
            navText: ['<i class="ui-arrow-left">', '<i class="ui-arrow-right">']
        });
        // Posts Carousel
        $("#owl-posts").owlCarousel({
            center: false,
            items: 2,
            loop: true,
            nav: true,
            dots: false,
            margin: 16,
            lazyLoad: true,
            navSpeed: 500,
            navText: ['<i class="ui-arrow-left">', '<i class="ui-arrow-right">'],
            responsive: {
                768: {
                    items: 3
                }
            }
        });
        // Single Image
        $("#owl-single").owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            dots: false,
            lazyLoad: true,
            navSpeed: 500,
            navText: ['<i class="ui-arrow-left">', '<i class="ui-arrow-right">']
        });
        // Single Post Gallery
        $("#owl-single-post-gallery").owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            dots: true,
            lazyLoad: true,
            navSpeed: 500,
            navText: ['<i class="ui-arrow-left">', '<i class="ui-arrow-right">']
        });
        // Custom nav
        var owlNav = $('#owl-posts').owlCarousel();
        $(".carousel-nav__btn--prev").on('click', function() {
            owlNav.trigger('prev.owl.carousel');
        });
        $(".carousel-nav__btn--next").on('click', function() {
            owlNav.trigger('next.owl.carousel');
        });
        try {

            $(".owlcdc").each(function() {
                var id = "#" + $(this).attr("id");
                $(id).owlCarousel({
                    center: true,
                    items: 2,
                    loop: true,
                    nav: true,
                    dots: false,
                    margin: 15,
                    lazyLoad: true,
                    navSpeed: 1000,
                    onTranslated: function() {
                        console.log("onTranslated");
                    },
                    onDragged: function() {
                        console.log("onDragged");
                    },
                    onChanged: function() {
                        console.log("onChanged");
                    },
                    onInitialized: function() {
                        console.log("onInitialized");
                    },
                    navText: ['<i class="ui-arrow-left">', '<i class="ui-arrow-right">'],
                    responsive: {
                        0: {
                            items: 2
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }

                }).on("initialized.owl.carousel changed.owl.carousel translated.owl.carousel destroy.owl.carousel changed.owl.carousel dragged.owl.carousel", function() {
                    $(id + " .owl-nav").removeClass("disabled");
                }).ready(function() {

                    $(id + " .owl-nav").removeClass("disabled");
                });
            });
        } catch (e) {
            console.log(e);
        }


        $("#MainSlide11").owlCarousel({
            center: true,
            items: 1,
            loop: true,
            nav: false,
            dots: false,
            margin: 0,
            lazyLoad: true,
            navSpeed: 1000,
            onTranslated: function() {
                console.log("onTranslated");
            },
            onDragged: function() {
                console.log("onDragged");
            },
            onChanged: function() {
                console.log("onChanged");
            },
            onInitialized: function() {
                console.log("onInitialized");
            },
            navText: ['<i class="ui-arrow-left">', '<i class="ui-arrow-right">'],
            responsive: {

                768: {
                    items: 1
                }
            }

        });
    }

    function Dropdown() {
        $(".btn-Dropdown").click(function() {
            var id = $(this).data("target");
            $(id + " .mobieDropdown-Content").toggle();
        });
    }
    Dropdown();
    /* ---------------------------------------------------------------------- */
    /*  Contact Form
     /* ---------------------------------------------------------------------- */

    /* Scroll to Top
     -------------------------------------------------------*/
    function scrollToTop() {
        var scroll = $window.scrollTop();
        var $backToTop = $("#back-to-top");
        if (scroll >= 50) {
            $backToTop.addClass("show");
        } else {
            $backToTop.removeClass("show");
        }
    }

    $('a[href="#top"]').on('click', function() {
        $('html, body').animate({scrollTop: 0}, 1000, "easeInOutQuint");
        return false;
    });
})(jQuery);