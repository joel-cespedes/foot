
(function($) {"use strict";

    var nextId = 0;

    var Filestyle = function(element, options) {
        this.options = options;
        this.$elementFilestyle = [];
        this.$element = $(element);
    };

    Filestyle.prototype = {
        clear : function() {
            this.$element.val('');
            this.$elementFilestyle.find(':text').val('');
            this.$elementFilestyle.find('.badge').remove();
        },

        destroy : function() {
            this.$element.removeAttr('style').removeData('filestyle');
            this.$elementFilestyle.remove();
        },

        disabled : function(value) {
            if (value === true) {
                if (!this.options.disabled) {
                    this.$element.attr('disabled', 'true');
                    this.$elementFilestyle.find('label').attr('disabled', 'true');
                    this.options.disabled = true;
                }
            } else if (value === false) {
                if (this.options.disabled) {
                    this.$element.removeAttr('disabled');
                    this.$elementFilestyle.find('label').removeAttr('disabled');
                    this.options.disabled = false;
                }
            } else {
                return this.options.disabled;
            }
        },

        buttonBefore : function(value) {
            if (value === true) {
                if (!this.options.buttonBefore) {
                    this.options.buttonBefore = true;
                    if (this.options.input) {
                        this.$elementFilestyle.remove();
                        this.constructor();
                        this.pushNameFiles();
                    }
                }
            } else if (value === false) {
                if (this.options.buttonBefore) {
                    this.options.buttonBefore = false;
                    if (this.options.input) {
                        this.$elementFilestyle.remove();
                        this.constructor();
                        this.pushNameFiles();
                    }
                }
            } else {
                return this.options.buttonBefore;
            }
        },

        icon : function(value) {
            if (value === true) {
                if (!this.options.icon) {
                    this.options.icon = true;
                    this.$elementFilestyle.find('label').prepend(this.htmlIcon());
                }
            } else if (value === false) {
                if (this.options.icon) {
                    this.options.icon = false;
                    this.$elementFilestyle.find('.icon-span-filestyle').remove();
                }
            } else {
                return this.options.icon;
            }
        },

        input : function(value) {
            if (value === true) {
                if (!this.options.input) {
                    this.options.input = true;

                    if (this.options.buttonBefore) {
                        this.$elementFilestyle.append(this.htmlInput());
                    } else {
                        this.$elementFilestyle.prepend(this.htmlInput());
                    }

                    this.$elementFilestyle.find('.badge').remove();

                    this.pushNameFiles();

                    this.$elementFilestyle.find('.group-span-filestyle').addClass('input-group-btn');
                }
            } else if (value === false) {
                if (this.options.input) {
                    this.options.input = false;
                    this.$elementFilestyle.find(':text').remove();
                    var files = this.pushNameFiles();
                    if (files.length > 0 && this.options.badge) {
                        this.$elementFilestyle.find('label').append(' <span class="badge">' + files.length + '</span>');
                    }
                    this.$elementFilestyle.find('.group-span-filestyle').removeClass('input-group-btn');
                }
            } else {
                return this.options.input;
            }
        },

        size : function(value) {
            if (value !== undefined) {
                var btn = this.$elementFilestyle.find('label'), input = this.$elementFilestyle.find('input');

                btn.removeClass('btn-lg btn-sm');
                input.removeClass('input-lg input-sm');
                if (value != 'nr') {
                    btn.addClass('btn-' + value);
                    input.addClass('input-' + value);
                }
            } else {
                return this.options.size;
            }
        },

        placeholder : function(value) {
            if (value !== undefined) {
                this.options.placeholder = value;
                this.$elementFilestyle.find('input').attr('placeholder', value);
            } else {
                return this.options.placeholder;
            }
        },

        buttonText : function(value) {
            if (value !== undefined) {
                this.options.buttonText = value;
                this.$elementFilestyle.find('label .buttonText').html(this.options.buttonText);
            } else {
                return this.options.buttonText;
            }
        },

        buttonName : function(value) {
            if (value !== undefined) {
                this.options.buttonName = value;
                this.$elementFilestyle.find('label').attr({
                    'class' : 'btn ' + this.options.buttonName
                });
            } else {
                return this.options.buttonName;
            }
        },

        iconName : function(value) {
            if (value !== undefined) {
                this.$elementFilestyle.find('.icon-span-filestyle').attr({
                    'class' : 'icon-span-filestyle ' + this.options.iconName
                });
            } else {
                return this.options.iconName;
            }
        },

        htmlIcon : function() {
            if (this.options.icon) {
                return '<span class="icon-span-filestyle ' + this.options.iconName + '"></span> ';
            } else {
                return '';
            }
        },

        htmlInput : function() {
            if (this.options.input) {
                return '<input type="text" class="form-control ' + (this.options.size == 'nr' ? '' : 'input-' + this.options.size) + '" placeholder="'+ this.options.placeholder +'" disabled> ';
            } else {
                return '';
            }
        },

        // puts the name of the input files
        // return files
        pushNameFiles : function() {
            var content = '', files = [];
            if (this.$element[0].files === undefined) {
                files[0] = {
                    'name' : this.$element[0] && this.$element[0].value
                };
            } else {
                files = this.$element[0].files;
            }

            for (var i = 0; i < files.length; i++) {
                content += files[i].name.split("\\").pop() + ', ';
            }

            if (content !== '') {
                this.$elementFilestyle.find(':text').val(content.replace(/\, $/g, ''));
            } else {
                this.$elementFilestyle.find(':text').val('');
            }

            return files;
        },

        constructor : function() {
            var _self = this,
                html = '',
                id = _self.$element.attr('id'),
                files = [],
                btn = '',
                $label;

            if (id === '' || !id) {
                id = 'filestyle-' + nextId;
                _self.$element.attr({
                    'id' : id
                });
                nextId++;
            }

            btn = '<span class="group-span-filestyle ' + (_self.options.input ? 'input-group-btn' : '') + '">' +
                '<label for="' + id + '" class="btn ' + _self.options.buttonName + ' ' +
                (_self.options.size == 'nr' ? '' : 'btn-' + _self.options.size) + '" ' +
                (_self.options.disabled ? 'disabled="true"' : '') + '>' +
                _self.htmlIcon() + '<span class="buttonText">' + _self.options.buttonText + '</span>' +
                '</label>' +
                '</span>';

            html = _self.options.buttonBefore ? btn + _self.htmlInput() : _self.htmlInput() + btn;

            _self.$elementFilestyle = $('<div class="bootstrap-filestyle input-group">' + html + '</div>');
            _self.$elementFilestyle.find('.group-span-filestyle').attr('tabindex', "0").keypress(function(e) {
                if (e.keyCode === 13 || e.charCode === 32) {
                    _self.$elementFilestyle.find('label').click();
                    return false;
                }
            });

            // hidding input file and add filestyle
            _self.$element.css({
                'position' : 'absolute',
                'clip' : 'rect(0px 0px 0px 0px)' // using 0px for work in IE8
            }).attr('tabindex', "-1").after(_self.$elementFilestyle);

            if (_self.options.disabled) {
                _self.$element.attr('disabled', 'true');
            }

            // Getting input file value
            _self.$element.change(function() {
                var files = _self.pushNameFiles();

                if (_self.options.input == false && _self.options.badge) {
                    if (_self.$elementFilestyle.find('.badge').length == 0) {
                        _self.$elementFilestyle.find('label').append(' <span class="badge">' + files.length + '</span>');
                    } else if (files.length == 0) {
                        _self.$elementFilestyle.find('.badge').remove();
                    } else {
                        _self.$elementFilestyle.find('.badge').html(files.length);
                    }
                } else {
                    _self.$elementFilestyle.find('.badge').remove();
                }
            });

            // Check if browser is Firefox
            if (window.navigator.userAgent.search(/firefox/i) > -1) {
                // Simulating choose file for firefox
                _self.$elementFilestyle.find('label').click(function() {
                    _self.$element.click();
                    return false;
                });
            }
        }
    };

    var old = $.fn.filestyle;

    $.fn.filestyle = function(option, value) {
        var get = '', element = this.each(function() {
            if ($(this).attr('type') === 'file') {
                var $this = $(this), data = $this.data('filestyle'), options = $.extend({}, $.fn.filestyle.defaults, option, typeof option === 'object' && option);

                if (!data) {
                    $this.data('filestyle', ( data = new Filestyle(this, options)));
                    data.constructor();
                }

                if ( typeof option === 'string') {
                    get = data[option](value);
                }
            }
        });

        if ( typeof get !== undefined) {
            return get;
        } else {
            return element;
        }
    };

    $.fn.filestyle.defaults = {
        'buttonText' : 'Choose file',
        'iconName' : 'glyphicon glyphicon-folder-open',
        'buttonName' : 'btn-default',
        'size' : 'nr',
        'input' : true,
        'badge' : true,
        'icon' : true,
        'buttonBefore' : false,
        'disabled' : false,
        'placeholder': ''
    };

    $.fn.filestyle.noConflict = function() {
        $.fn.filestyle = old;
        return this;
    };

    $(function() {
        $('.filestyle').each(function() {
            var $this = $(this), options = {

                'input' : $this.attr('data-input') === 'false' ? false : true,
                'icon' : $this.attr('data-icon') === 'false' ? false : true,
                'buttonBefore' : $this.attr('data-buttonBefore') === 'true' ? true : false,
                'disabled' : $this.attr('data-disabled') === 'true' ? true : false,
                'size' : $this.attr('data-size'),
                'buttonText' : $this.attr('data-buttonText'),
                'buttonName' : $this.attr('data-buttonName'),
                'iconName' : $this.attr('data-iconName'),
                'badge' : $this.attr('data-badge') === 'false' ? false : true,
                'placeholder': $this.attr('data-placeholder')
            };

            $this.filestyle(options);
        });
    });
})(window.jQuery);













(function($,sr){
    // debouncing function from John Hann
    // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
    var debounce = function (func, threshold, execAsap) {
      var timeout;

        return function debounced () {
            var obj = this, args = arguments;
            function delayed () {
                if (!execAsap)
                    func.apply(obj, args); 
                timeout = null; 
            }

            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 100); 
        };
    };

    // smartresize 
    jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

})(jQuery,'smartresize');
/**
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var CURRENT_URL = window.location.href.split('#')[0].split('?')[0],

    $BODY = $('body'),
    $MENU_TOGGLE = $('#menu_toggle'),
    $SIDEBAR_MENU = $('#sidebar-menu'),
    $SIDEBAR_FOOTER = $('.sidebar-footer'),
    $LEFT_COL = $('.left_col'),
    $RIGHT_COL = $('.right_col'),
    $NAV_MENU = $('.nav_menu'),
    $FOOTER = $('footer');

// Sidebar
$(document).ready(function() {
    // TODO: This is some kind of easy fix, maybe we can improve this
    var setContentHeight = function () {
        // reset height
        $RIGHT_COL.css('min-height', $(window).height());

        var bodyHeight = $BODY.outerHeight(),
            footerHeight = $BODY.hasClass('footer_fixed') ? -10 : $FOOTER.height(),
            leftColHeight = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height(),
            contentHeight = bodyHeight < leftColHeight ? leftColHeight : bodyHeight;

        // normalize content
        contentHeight -= $NAV_MENU.height() + footerHeight;

        $RIGHT_COL.css('min-height', contentHeight);
    };

    $SIDEBAR_MENU.find('a').on('click', function(ev) {
        var $li = $(this).parent();

        if ($li.is('.active')) {
            $li.removeClass('active active-sm');
            $('ul:first', $li).slideUp(function() {
                setContentHeight();
            });
        } else {
            // prevent closing menu if we are on child menu
            if (!$li.parent().is('.child_menu')) {
                $SIDEBAR_MENU.find('li').removeClass('active active-sm');
                $SIDEBAR_MENU.find('li ul').slideUp();
            }
            
            $li.addClass('active');

            $('ul:first', $li).slideDown(function() {
                setContentHeight();
            });
        }
    });

    // toggle small or large menu
    $MENU_TOGGLE.on('click', function() {
        if ($BODY.hasClass('nav-md')) {
            $SIDEBAR_MENU.find('li.active ul').hide();
            $SIDEBAR_MENU.find('li.active').addClass('active-sm').removeClass('active');
        } else {
            $SIDEBAR_MENU.find('li.active-sm ul').show();
            $SIDEBAR_MENU.find('li.active-sm').addClass('active').removeClass('active-sm');
        }

        $BODY.toggleClass('nav-md nav-sm');

        setContentHeight();
    });

    // check active menu
    $SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('current-page');

    $SIDEBAR_MENU.find('a').filter(function () {
        return this.href == CURRENT_URL;
    }).parent('li').addClass('current-page').parents('ul').slideDown(function() {
        setContentHeight();
    }).parent().addClass('active');

    // recompute content when resizing
    $(window).smartresize(function(){  
        setContentHeight();
    });

    setContentHeight();

    // fixed sidebar
    if ($.fn.mCustomScrollbar) {
        $('.menu_fixed').mCustomScrollbar({
            autoHideScrollbar: true,
            theme: 'minimal',
            mouseWheel:{ preventDefault: true }
        });
    }
});
// /Sidebar

// Panel toolbox
$(document).ready(function() {
    $('.collapse-link').on('click', function() {
        var $BOX_PANEL = $(this).closest('.x_panel'),
            $ICON = $(this).find('i'),
            $BOX_CONTENT = $BOX_PANEL.find('.x_content');
        
        // fix for some div with hardcoded fix class
        if ($BOX_PANEL.attr('style')) {
            $BOX_CONTENT.slideToggle(200, function(){
                $BOX_PANEL.removeAttr('style');
            });
        } else {
            $BOX_CONTENT.slideToggle(200); 
            $BOX_PANEL.css('height', 'auto');  
        }

        $ICON.toggleClass('fa-chevron-up fa-chevron-down');
    });

    $('.close-link').click(function () {
        var $BOX_PANEL = $(this).closest('.x_panel');

        $BOX_PANEL.remove();
    });
});
// /Panel toolbox

// Tooltip
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });
});
// /Tooltip

// Progressbar
if ($(".progress .progress-bar")[0]) {
    $('.progress .progress-bar').progressbar();
}
// /Progressbar

// Switchery
$(document).ready(function() {
    if ($(".js-switch")[0]) {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function (html) {
            var switchery = new Switchery(html, {
                color: '#26B99A'
            });
        });
    }
});
// /Switchery

// iCheck
$(document).ready(function() {
    if ($("input.flat")[0]) {
        $(document).ready(function () {
            $('input.flat').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
        });
    }
});
// /iCheck

// Table
$('table input').on('ifChecked', function () {
    checkState = '';
    $(this).parent().parent().parent().addClass('selected');
    countChecked();
});
$('table input').on('ifUnchecked', function () {
    checkState = '';
    $(this).parent().parent().parent().removeClass('selected');
    countChecked();
});

var checkState = '';

$('.bulk_action input').on('ifChecked', function () {
    checkState = '';
    $(this).parent().parent().parent().addClass('selected');
    countChecked();
});
$('.bulk_action input').on('ifUnchecked', function () {
    checkState = '';
    $(this).parent().parent().parent().removeClass('selected');
    countChecked();
});
$('.bulk_action input#check-all').on('ifChecked', function () {
    checkState = 'all';
    countChecked();
});
$('.bulk_action input#check-all').on('ifUnchecked', function () {
    checkState = 'none';
    countChecked();
});

function countChecked() {
    if (checkState === 'all') {
        $(".bulk_action input[name='table_records']").iCheck('check');
    }
    if (checkState === 'none') {
        $(".bulk_action input[name='table_records']").iCheck('uncheck');
    }

    var checkCount = $(".bulk_action input[name='table_records']:checked").length;

    if (checkCount) {
        $('.column-title').hide();
        $('.bulk-actions').show();
        $('.action-cnt').html(checkCount + ' Records Selected');
    } else {
        $('.column-title').show();
        $('.bulk-actions').hide();
    }
}

// Accordion
$(document).ready(function() {
    $(".expand").on("click", function () {
        $(this).next().slideToggle(200);
        $expand = $(this).find(">:first-child");

        if ($expand.text() == "+") {
            $expand.text("-");
        } else {
            $expand.text("+");
        }
    });
});

// NProgress
if (typeof NProgress != 'undefined') {
    $(document).ready(function () {
        NProgress.start();
    });

    $(window).load(function () {
        NProgress.done();
    });
}
