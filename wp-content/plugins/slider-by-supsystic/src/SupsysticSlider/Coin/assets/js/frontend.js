/*global jQuery*/

/**
 * Slider by Supsystic Wordpress Plugin
 * Coin-Slider module.
 */
(function ($, app) {

    /**
     * Converts string true or false to the real boolean values.
     * If value isn't equals to true or false then returns raw value.
     * @param value
     * @returns {*}
     */
    var stringToBoolean = function (value) {
        if (value == 'true') {
            return true;
        } else if (value == 'false') {
            return false;
        } else if(parseFloat(value)) {
            return parseFloat(value);
        } else {
            return value;
        }
    };

    var loadFont = function(fontName) {
        if(fontName) {
            if(fontName.indexOf(',') + 1) {
                fontName = fontName.split(',')[0];
            }
            WebFont.load({
                google: {
                    families: [fontName.split(' ').join('+')]
                }
            });
        }
    };

    var initSlider = function() {
        var $sliders = $('.supsystic-slider.supsystic-slider-coin');

        if ($sliders.length < 1) {
            return false;
        }

        $.each($sliders, function (index, slider) {
            var $slider  = $(slider),
                settings = $slider.data('settings'),
                config   = {};

            $.each(settings, function (category, opts) {
                if(opts && typeof opts == 'object') {
                    $.each(opts, function (key, value) {
                        config[key] = stringToBoolean(value);
                    });
                }
            });

            $.each(settings, function (category, opts) {
                if(category != '__veditor__' && typeof opts == 'object') {
                    $.each(opts, function (key, value) {
                        if (key !== 'enabled') {
                            config[key] = stringToBoolean(value);
                        }
                    });
                }
            });

            $slider.coinslider(config);

            $slider.parent().css('float', config['position']);

            if(settings.caption && settings.caption['font-family']) {
                loadFont(settings.caption['font-family']);
            }

            $slider.css('visibility', 'visible');
        });
    };

    /*$(document).ready(function () {
        initSlider();
        console.log('Yes');
    });

    $(document).ajaxComplete(function() {
        initSlider();
        console.log('Yes');
    });*/

    app.plugins = app.plugins || {};
    app.plugins.coin = initSlider;

}(jQuery, window.SupsysticSlider = window.SupsysticSlider || {}));