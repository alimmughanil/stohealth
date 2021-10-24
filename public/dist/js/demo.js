/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */

/* eslint-disable camelcase */

(function ($) {
    "use strict";

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    function createSkinBlock(colors, callback, noneSelected) {
        var $block = $("<select />", {
            class: noneSelected
                ? "custom-select mb-3 border-0"
                : "custom-select mb-3 text-light border-0 " +
                  colors[0].replace(/accent-|navbar-/, "bg-"),
        });

        if (noneSelected) {
            var $default = $("<option />", {
                text: "None Selected",
            });
            if (callback) {
                $default.on("click", callback);
            }

            $block.append($default);
        }
    }

    var $sidebar = $(".control-sidebar");
    var $container = $("<div />", {
        class: "p-3 control-sidebar-content",
    });

    $sidebar.append($container);

    // Checkboxes

    var $dark_mode_checkbox = $("<input />", {
        type: "checkbox",
        value: 1,
        checked: $("body").hasClass("dark-mode"),
        class: "mr-1",
    }).on("click", function () {
        if ($(this).is(":checked")) {
            $("body").addClass("dark-mode");
        } else {
            $("body").removeClass("dark-mode");
        }
    });
    var $dark_mode_container = $("<div />", { class: "mb-4" })
        .append($dark_mode_checkbox)
        .append("<span>Dark Mode</span>");
    $container.append($dark_mode_container);
})(jQuery);
