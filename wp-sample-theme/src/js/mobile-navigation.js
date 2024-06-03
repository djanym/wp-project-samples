(function ($) {
    const ThemeMobileNav = function (options) {
        this.options = $.extend(
            {
                container: null,
                hideOnClickOutside: false,
                menuActiveClass: 'nav-active',
                menuOpener: '.bar-opener',
                menuCloser: '.bar-closer',
                // If navbar toggler is not inside the navbar, set this to true.
                menuOpenerOutside: false,
                menuDrop: '.nav-drop',
                hasChildrenSelector: '.dropdown',
                toggleEvent: 'click',
                outsideClickEvent: 'click touchstart pointerdown MSPointerDown'
            },
            options
        );
        this.initStructure();
        this.attachEvents();
    };

    ThemeMobileNav.prototype = {
        initStructure() {
            // this.page = $('html')
            this.page = $(document);
            this.container = $(this.options.container);

            if (this.options.menuOpenerOutside) {
                this.opener = $(this.options.menuOpener);
            } else {
                this.opener = this.container.find(this.options.menuOpener);
            }

            this.closer = $(this.options.menuCloser);
            this.drop = this.container.find(this.options.menuDrop);
            this.itemsWithChilds = this.container.find(this.options.hasChildrenSelector + ' > a');
        },
        attachEvents() {
            const self = this;

            this.outsideClickHandler = function (e) {
                if (self.isOpened()) {
                    const target = $(e.target);
                    // If not clicked inside the menu or the opener, hide the menu.
                    if (!target.closest(self.container).length && !target.closest(self.opener).length) {
                        // if (!target.closest(self.opener).length && !target.closest(self.drop).length) {
                        self.hide();
                    }
                }
            };

            this.openerClickHandler = function (e) {
                e.preventDefault();
                e.stopPropagation();
                self.toggle();
            };

            this.closer.on(this.options.toggleEvent, function (e) {
                e.preventDefault();
                e.stopPropagation();
                self.hide();
            });

            this.opener.on(this.options.toggleEvent, this.openerClickHandler);

            this.itemsWithChilds.on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).parent(self.options.hasChildrenSelector).toggleClass('active');
            });
        },
        isOpened() {
            return this.container.hasClass(this.options.menuActiveClass);
        },
        show() {
            this.container.addClass(this.options.menuActiveClass);
            if (this.options.hideOnClickOutside) {
                this.page.on(this.options.outsideClickEvent, this.outsideClickHandler);
            }
        },
        hide() {
            this.container.removeClass(this.options.menuActiveClass);
            if (this.options.hideOnClickOutside) {
                // Remove the event listener if menu is off.
                this.page.off(this.options.outsideClickEvent, this.outsideClickHandler);
            }
        },
        toggle() {
            if (this.isOpened()) {
                this.hide();
            } else {
                this.show();
            }
        },
        destroy() {
            this.container.removeClass(this.options.menuActiveClass);
            this.opener.off(this.options.toggleEvent, this.clickHandler);
            this.page.off(this.options.outsideClickEvent, this.outsideClickHandler);
        }
    };

    $.fn.ThemeMobileNav = function (options) {
        return this.each(function () {
            const instance = new ThemeMobileNav($.extend({}, { container: this }, options));
            $.data(this, 'ThemeMobileNav', instance);
        });
    };
})(jQuery);
