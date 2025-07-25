jQuery(document).ready(function () {
  // Add state change to header on scroll  ****************************** //

  if (jQuery("#masthead").length) {
    var header = jQuery("#masthead");
    jQuery(window).scroll(function () {
      var scroll = jQuery(window).scrollTop();
      if (scroll >= 20) {
        header.addClass("header-scroll");
      } else {
        header.removeClass("header-scroll");
      }
    });
  }

  //Tabbed Content  ****************************** //

  if (jQuery(".tab-wrapper").length) {
    var jQuerywrapper = jQuery(".tab-wrapper"),
      jQueryallTabs = jQuerywrapper.find(
        ".tab-content > div.tab-content__wrapper"
      ),
      jQuerytabMenu = jQuerywrapper.find(".tab-menu li");

    jQueryallTabs.not(":first-of-type").hide();
    jQuerytabMenu.filter(":first-of-type").addClass("active");
    jQuerytabMenu.filter(":first-of-type").find(":first").width("100%");

    jQuerytabMenu.each(function (i) {
      jQuery(this).attr("data-tab", "tab" + i);
    });

    jQueryallTabs.each(function (i) {
      jQuery(this).attr("data-tab", "tab" + i);
    });

    jQuerytabMenu.on("click", function () {
      var dataTab = jQuery(this).data("tab"),
        jQuerygetWrapper = jQuery(this).closest(jQuerywrapper);

      jQuerygetWrapper.find(jQuerytabMenu).removeClass("active");
      jQuery(this).addClass("active");

      jQuerygetWrapper.find(jQueryallTabs).hide();
      jQuerygetWrapper
        .find(jQueryallTabs)
        .filter("[data-tab=" + dataTab + "]")
        .show();
    });
  }

  // Tabbed Content Mobile - Optional  ****************************** //

  if (jQuery(".tab-content-mobile").length) {
    jQuery(".tab-mobile-single-wrap:first-of-type").addClass("active");
    jQuery(
      ".tab-mobile-single-wrap:first-of-type .tab-information"
    ).slideDown();

    jQuery(".tab-topic").on("click", function () {
      if (jQuery(this).parent(".tab-mobile-single-wrap").hasClass("active")) {
        jQuery(this).siblings(".tab-information").slideToggle();
      } else {
        jQuery(".tab-mobile-single-wrap").removeClass("active");
        jQuery("tab-information").slideUp();
        jQuery(this).parent(".tab-mobile-single-wrap").addClass("active");
        jQuery(this).siblings(".tab-information").slideToggle();
      }
    });
  }

  // Reviews Tiny Slider  ****************************** //

  if (jQuery(".reviews__slider").length) {
    if (document.getElementsByClassName(".reviews__slider")) {
      let reviews_slider = tns({
        container: ".reviews__slider",
        loop: true,
        mouseDrag: true,
        items: 3,
        slideBy: 1,
        edgePadding: 0,
        gutter: 30,
        autoplay: true,
        autoplayButtonOutput: false,
        nav: false,
        controls: false,
        speed: 600,
        responsive: {
          375: {
            items: 1,
            edgePadding: 32,
          },
          768: {
            items: 2,
          },
          992: {
            items: 3,
            edgePadding: 0,
          },
        },
      });
    }
  }

  // Trust Factor Tiny Slider For Hero Component  ****************************** //

  if (jQuery(".trust-factors__slider").length) {
    if (document.getElementsByClassName(".trust-factors__slider")) {
      let tf_slider = tns({
        container: ".trust-factors__slider",
        autoWidth: true,
        items: 5,
        slideBy: 1,
        gutter: 30,
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        nav: false,
        controls: false,
        speed: 600,
        responsive: {
          375: {
            items: 1,
          },
          768: {
            items: 3,
          },
          992: {
            items: 5,
          },
        },
      });
    }
  }

  // Trust Factor Tiny Slider For PB Layout  ****************************** //

  if (jQuery(".section-trust-factors__slider").length) {
    if (document.getElementsByClassName(".section-trust-factors__slider")) {
      let tf_section_slider = tns({
        container: ".section-trust-factors__slider",
        //autoWidth: true,
        items: 2,
        slideBy: 1,
        gutter: 30,
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        nav: false,
        controls: false,
        speed: 600,
        responsive: {
          375: {
            items: 2,
          },
          768: {
            items: 4,
          },
          992: {
            items: 4,
          },
        },
      });
    }
  }

  // Corevalue Factor Tiny Slider For PB Layout  ****************************** //

  if (jQuery(".core_value_slider").length) {
    if (document.getElementsByClassName(".core_value_slider")) {
      let core_vaue_slider = tns({
        container: ".core_value_slider",
        //autoWidth: true,
        items: 1,
        slideBy: 1,
        gutter: 30,
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        nav: false,
        controls: false,
        speed: 600,
        responsive: {
          375: {
            items: 2,
          },
          768: {
            items: 4,
          },
          992: {
            items: 4,
          },
        },
      });
    }
  }

  if (jQuery(".faqs__wrapper").length) {
    jQuery(".faq-single:first-of-type").addClass("active");
    jQuery(".faq-single:first-of-type .faq-content").slideDown();

    jQuery(".faq-single").click(function () {
      if (jQuery(this).hasClass("active")) {
        jQuery(".faq-single").removeClass("active");
        jQuery(".faq-content").slideUp();
      } else {
        jQuery(".faq-single").removeClass("active");
        jQuery(this).addClass("active");
        jQuery(".faq-content").slideUp();
        jQuery(this).find(".faq-content").slideDown();
      }
    });
  }

  // Magnifi Pop-up  ****************************** //

  if (jQuery(".yt-video").length) {
    jQuery(document).ready(function (jQuery) {
      jQuery(".yt-video").magnificPopup({
        type: "iframe",
      });
    });
  }
  if (jQuery(".image-popup").length) {
    jQuery(document).ready(function (jQuery) {
      jQuery(".image-popup").magnificPopup({
        type: "image",
      });
    });
  }
  if (jQuery(".content-popup").length) {
    jQuery(document).ready(function (jQuery) {
      jQuery(".content-popup").magnificPopup({
        type: "inline",
        preloader: false,
        focus: "#name",
      });
    });
  }
  if (jQuery(".popup").length) {
    jQuery(document).ready(function (jQuery) {
      jQuery(".popup").magnificPopup({
        type: "iframe",
      });
    });
  }

  jQuery(".team-member-popup").magnificPopup({
    type: "inline",
  });
  // Single post scroll progress  ****************************** //

  if (jQuery(".post-progress").length) {
    window.onscroll = function () {
      blogProgress();
    };
    function blogProgress() {
      var winScroll =
        document.body.scrollTop || document.documentElement.scrollTop;
      var height =
        document.documentElement.scrollHeight -
        document.documentElement.clientHeight;
      var scrolled = (winScroll / height) * 100;
      document.getElementById("scroll-progress").style.width = scrolled + "%";
    }
  }

  // Removes Card Links on PPC Page  ****************************** //

  jQuery(".page-template-page-ppc .card--block-link").on("click", function (e) {
    e.preventDefault();
  });
  jQuery(".page-template-page-ppc .ppc-no-link").on("click", function (e) {
    e.preventDefault();
  });

  console.log("All Scrips Loaded");
}); // End Document.Ready
