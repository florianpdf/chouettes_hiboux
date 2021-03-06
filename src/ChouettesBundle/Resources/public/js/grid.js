var contactRoute;
var $event = $.event,
    $special, resizeTimeout;
$special = $event.special.debouncedresize = {
    setup: function() {
        $(this).on("resize", $special.handler)
    },
    teardown: function() {
        $(this).off("resize", $special.handler)
    },
    handler: function(i, e) {
        var t = this,
            s = arguments,
            n = function() {
                i.type = "debouncedresize", $event.dispatch.apply(t, s)
            };
        resizeTimeout && clearTimeout(resizeTimeout), e ? n() : resizeTimeout = setTimeout(n, $special.threshold)
    },
    threshold: 250
};
var BLANK = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
$.fn.imagesLoaded = function(i) {
    function e() {
        var e = $(r),
            t = $(d);
        n && (d.length ? n.reject(h, e, t) : n.resolve(h)), $.isFunction(i) && i.call(s, h, e, t)
    }

    function t(i, t) {
        i.src !== BLANK && -1 === $.inArray(i, o) && (o.push(i), t ? d.push(i) : r.push(i), $.data(i, "imagesLoaded", {
            isBroken: t,
            src: i.src
        }), a && n.notifyWith($(i), [t, h, $(r), $(d)]), h.length === o.length && (setTimeout(e), h.unbind(".imagesLoaded")))
    }
    var s = this,
        n = $.isFunction($.Deferred) ? $.Deferred() : 0,
        a = $.isFunction(n.notify),
        h = s.find("img").add(s.filter("img")),
        o = [],
        r = [],
        d = [];
    return $.isPlainObject(i) && $.each(i, function(e, t) {
        "callback" === e ? i = t : n && n[e](t)
    }), h.length ? h.bind("load.imagesLoaded error.imagesLoaded", function(i) {
        t(i.target, "error" === i.type)
    }).each(function(i, e) {
        var s = e.src,
            n = $.data(e, "imagesLoaded");
        n && n.src === s ? t(e, n.isBroken) : e.complete && void 0 !== e.naturalWidth ? t(e, 0 === e.naturalWidth || 0 === e.naturalHeight) : (e.readyState || e.complete) && (e.src = BLANK, e.src = s)
    }) : e(), n ? n.promise(s) : s
};
var Grid = function() {
    function i(i) {
        A = $.extend(!0, {}, A, i), c.imagesLoaded(function() {
            t(!0), a(), s()
        })
    }

    function e(i) {
        l = l.add(i), i.each(function() {
            var i = $(this);
            i.data({
                offsetTop: i.offset().top,
                height: i.height()
            })
        }), n(i)
    }

    function t(i) {
        l.each(function() {
            var e = $(this);
            e.data("offsetTop", e.offset().top), i && e.data("height", e.height())
        })
    }

    function s() {
        n(l), u.on("debouncedresize", function() {
            p = 0, f = -1, t(), a(), void 0 !== $.data(this, "preview") && o()
        })
    }

    function n(i) {
        i.on("click", "span.og-close", function() {
            return o(), !1
        }).children("a").on("click", function(i) {
            contactRoute = $(this).data('path');
            var e = $(this).parent();
            return g === e.index() ? o() : h(e), !1
        })
    }

    function a() {
        d = {
            width: u.width(),
            height: u.height()
        }
    }

    function h(i) {
        var e = $.data(this, "preview"),
            t = i.data("offsetTop");
        if (p = 0, void 0 !== e) {
            if (f === t) return e.update(i), !1;
            t > f && (p = e.height), o()
        }
        f = t, (e = $.data(this, "preview", new r(i))).open()
    }

    function o() {
        g = -1, $.data(this, "preview").close(), $.removeData(this, "preview")
    }

    function r(i) {
        this.$item = i, this.expandedIdx = this.$item.index(), this.create(), this.update()
    }
    var d, c = $("#og-grid"),
        l = c.children("li"),
        g = -1,
        f = -1,
        p = 0,
        u = $(window),
        m = $("html, body"),
        v = {
            WebkitTransition: "webkitTransitionEnd",
            MozTransition: "transitionend",
            OTransition: "oTransitionEnd",
            msTransition: "MSTransitionEnd",
            transition: "transitionend"
        }[Modernizr.prefixed("transition")],
        w = Modernizr.csstransitions,
        A = {
            minHeight: 500,
            speed: 350,
            easing: "ease"
        };
    return r.prototype = {
        create: function() {
            this.$item.children("a").context.dataset.link;
            this.$title = $("<h3></h3>"), this.$description = $("<p></p>"), this.$href = $('<a href="' + contactRoute + '">Je le veux</a>'), this.$details = $('<div class="og-details"></div>').append(this.$title, this.$description, this.$href), this.$loading = $('<div class="og-loading"></div>'), this.$fullimage = $('<div class="og-fullimg"></div>').append(this.$loading), this.$closePreview = $('<span class="og-close"></span>'), this.$previewInner = $('<div class="og-expander-inner"></div>').append(this.$closePreview, this.$fullimage, this.$details), this.$previewEl = $('<div class="og-expander"></div>').append(this.$previewInner), this.$item.append(this.getEl()), w && this.setTransition()
        },
        update: function(i) {
            i && (this.$item = i), -1 !== g && (l.eq(g).removeClass("og-expanded"), this.$item.addClass("og-expanded"), this.positionPreview()), g = this.$item.index();
            var e = this.$item.children("a"),
                t = {
                    href: e.data("href"),
                    largesrc: e.data("largesrc"),
                    title: e.data("title"),
                    description: e.data("description")
                };
            this.$title.html(t.title), this.$description.html(t.description), this.$href.attr("href", t.href);
            var s = this;
            void 0 !== s.$largeImg && s.$largeImg.remove(), s.$fullimage.is(":visible") && (this.$loading.show(), $("<img/>").load(function() {
                var i = $(this);
                i.attr("src") === s.$item.children("a").data("largesrc") && (s.$loading.hide(), s.$fullimage.find("img").remove(), s.$largeImg = i.fadeIn(350), s.$fullimage.append(s.$largeImg))
            }).attr("src", t.largesrc))
        },
        open: function() {
            setTimeout($.proxy(function() {
                this.setHeights(), this.positionPreview()
            }, this), 25)
        },
        close: function() {
            var i = this,
                e = function() {
                    w && $(this).off(v), i.$item.removeClass("og-expanded"), i.$previewEl.remove()
                };
            return setTimeout($.proxy(function() {
                void 0 !== this.$largeImg && this.$largeImg.fadeOut("fast"), this.$previewEl.css("height", 0);
                var i = l.eq(this.expandedIdx);
                i.css("height", i.data("height")).on(v, e), w || e.call()
            }, this), 25), !1
        },
        calcHeight: function() {
            var i = d.height - this.$item.data("height") - 10,
                e = d.height;
            i < A.minHeight && (i = A.minHeight, e = A.minHeight + this.$item.data("height") + 10), this.height = i, this.itemHeight = e
        },
        setHeights: function() {
            var i = this,
                e = function() {
                    w && i.$item.off(v), i.$item.addClass("og-expanded")
                };
            this.calcHeight(), this.$previewEl.css("height", this.height), this.$item.css("height", this.itemHeight).on(v, e), w || e.call()
        },
        positionPreview: function() {
            var i = this.$item.data("offsetTop"),
                e = this.$previewEl.offset().top - p,
                t = this.height + this.$item.data("height") + 10 <= d.height ? i : this.height < d.height ? e - (d.height - this.height) : e;
            m.animate({
                scrollTop: t
            }, A.speed)
        },
        setTransition: function() {
            this.$previewEl.css("transition", "height " + A.speed + "ms " + A.easing), this.$item.css("transition", "height " + A.speed + "ms " + A.easing)
        },
        getEl: function() {
            return this.$previewEl
        }
    }, {
        init: i,
        addItems: e
    }
}();