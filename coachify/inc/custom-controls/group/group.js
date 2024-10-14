/**
 * File group.js.
 *
 * Theme Group customizer.
 * 
 * @package Coachify
 */

(function ($) {
    "use strict";
    $(document).on("click", ".coachify-customizer-group-collapsible .head-label", (function () {
        var container = $(this).closest(".coachify-customizer-group");
        container.find(" > .group-content").slideToggle(200);
        container.toggleClass("is-active");
        return false;
    }));

})(jQuery);