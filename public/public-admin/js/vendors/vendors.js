/* PrismJS 1.17.1
https://prismjs.com/download.html?#themes=prism&languages=markup+css+clike+javascript&plugins=line-highlight+line-numbers+file-highlight+show-invisibles */
var _self = "undefined" != typeof window ? window : "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? self : {},
    Prism = (function (u) {
        var c = /\blang(?:uage)?-([\w-]+)\b/i,
            a = 0;
        var _ = {
            manual: u.Prism && u.Prism.manual,
            disableWorkerMessageHandler: u.Prism && u.Prism.disableWorkerMessageHandler,
            util: {
                encode: function (e) {
                    return e instanceof L
                        ? new L(e.type, _.util.encode(e.content), e.alias)
                        : Array.isArray(e)
                            ? e.map(_.util.encode)
                            : e
                                .replace(/&/g, "&amp;")
                                .replace(/</g, "&lt;")
                                .replace(/\u00a0/g, " ");
                },
                type: function (e) {
                    return Object.prototype.toString.call(e).slice(8, -1);
                },
                objId: function (e) {
                    return e.__id || Object.defineProperty(e, "__id", { value: ++a }), e.__id;
                },
                clone: function n(e, r) {
                    var t,
                        a,
                        i = _.util.type(e);
                    switch (((r = r || {}), i)) {
                        case "Object":
                            if (((a = _.util.objId(e)), r[a])) return r[a];
                            for (var o in ((t = {}), (r[a] = t), e)) e.hasOwnProperty(o) && (t[o] = n(e[o], r));
                            return t;
                        case "Array":
                            return (
                                (a = _.util.objId(e)),
                                    r[a]
                                        ? r[a]
                                        : ((t = []),
                                            (r[a] = t),
                                            e.forEach(function (e, a) {
                                                t[a] = n(e, r);
                                            }),
                                            t)
                            );
                        default:
                            return e;
                    }
                },
            },
            languages: {
                extend: function (e, a) {
                    var n = _.util.clone(_.languages[e]);
                    for (var r in a) n[r] = a[r];
                    return n;
                },
                insertBefore: function (n, e, a, r) {
                    var t = (r = r || _.languages)[n],
                        i = {};
                    for (var o in t)
                        if (t.hasOwnProperty(o)) {
                            if (o == e) for (var l in a) a.hasOwnProperty(l) && (i[l] = a[l]);
                            a.hasOwnProperty(o) || (i[o] = t[o]);
                        }
                    var s = r[n];
                    return (
                        (r[n] = i),
                            _.languages.DFS(_.languages, function (e, a) {
                                a === s && e != n && (this[e] = i);
                            }),
                            i
                    );
                },
                DFS: function e(a, n, r, t) {
                    t = t || {};
                    var i = _.util.objId;
                    for (var o in a)
                        if (a.hasOwnProperty(o)) {
                            n.call(a, o, a[o], r || o);
                            var l = a[o],
                                s = _.util.type(l);
                            "Object" !== s || t[i(l)] ? "Array" !== s || t[i(l)] || ((t[i(l)] = !0), e(l, n, o, t)) : ((t[i(l)] = !0), e(l, n, null, t));
                        }
                },
            },
            plugins: {},
            highlightAll: function (e, a) {
                _.highlightAllUnder(document, e, a);
            },
            highlightAllUnder: function (e, a, n) {
                var r = { callback: n, selector: 'code[class*="language-"], [class*="language-"] code, code[class*="lang-"], [class*="lang-"] code' };
                _.hooks.run("before-highlightall", r);
                for (var t, i = e.querySelectorAll(r.selector), o = 0; (t = i[o++]); ) _.highlightElement(t, !0 === a, r.callback);
            },
            highlightElement: function (e, a, n) {
                var r = (function (e) {
                        for (; e && !c.test(e.className); ) e = e.parentNode;
                        return e ? (e.className.match(c) || [, "none"])[1].toLowerCase() : "none";
                    })(e),
                    t = _.languages[r];
                e.className = e.className.replace(c, "").replace(/\s+/g, " ") + " language-" + r;
                var i = e.parentNode;
                i && "pre" === i.nodeName.toLowerCase() && (i.className = i.className.replace(c, "").replace(/\s+/g, " ") + " language-" + r);
                var o = { element: e, language: r, grammar: t, code: e.textContent };
                function l(e) {
                    (o.highlightedCode = e), _.hooks.run("before-insert", o), (o.element.innerHTML = o.highlightedCode), _.hooks.run("after-highlight", o), _.hooks.run("complete", o), n && n.call(o.element);
                }
                if ((_.hooks.run("before-sanity-check", o), !o.code)) return _.hooks.run("complete", o), void (n && n.call(o.element));
                if ((_.hooks.run("before-highlight", o), o.grammar))
                    if (a && u.Worker) {
                        var s = new Worker(_.filename);
                        (s.onmessage = function (e) {
                            l(e.data);
                        }),
                            s.postMessage(JSON.stringify({ language: o.language, code: o.code, immediateClose: !0 }));
                    } else l(_.highlight(o.code, o.grammar, o.language));
                else l(_.util.encode(o.code));
            },
            highlight: function (e, a, n) {
                var r = { code: e, grammar: a, language: n };
                return _.hooks.run("before-tokenize", r), (r.tokens = _.tokenize(r.code, r.grammar)), _.hooks.run("after-tokenize", r), L.stringify(_.util.encode(r.tokens), r.language);
            },
            matchGrammar: function (e, a, n, r, t, i, o) {
                for (var l in n)
                    if (n.hasOwnProperty(l) && n[l]) {
                        var s = n[l];
                        s = Array.isArray(s) ? s : [s];
                        for (var u = 0; u < s.length; ++u) {
                            if (o && o == l + "," + u) return;
                            var c = s[u],
                                g = c.inside,
                                f = !!c.lookbehind,
                                h = !!c.greedy,
                                d = 0,
                                m = c.alias;
                            if (h && !c.pattern.global) {
                                var p = c.pattern.toString().match(/[imsuy]*$/)[0];
                                c.pattern = RegExp(c.pattern.source, p + "g");
                            }
                            c = c.pattern || c;
                            for (var y = r, v = t; y < a.length; v += a[y].length, ++y) {
                                var k = a[y];
                                if (a.length > e.length) return;
                                if (!(k instanceof L)) {
                                    if (h && y != a.length - 1) {
                                        if (((c.lastIndex = v), !(x = c.exec(e)))) break;
                                        for (var b = x.index + (f && x[1] ? x[1].length : 0), w = x.index + x[0].length, A = y, P = v, O = a.length; A < O && (P < w || (!a[A].type && !a[A - 1].greedy)); ++A)
                                            (P += a[A].length) <= b && (++y, (v = P));
                                        if (a[y] instanceof L) continue;
                                        (j = A - y), (k = e.slice(v, P)), (x.index -= v);
                                    } else {
                                        c.lastIndex = 0;
                                        var x = c.exec(k),
                                            j = 1;
                                    }
                                    if (x) {
                                        f && (d = x[1] ? x[1].length : 0);
                                        w = (b = x.index + d) + (x = x[0].slice(d)).length;
                                        var N = k.slice(0, b),
                                            S = k.slice(w),
                                            C = [y, j];
                                        N && (++y, (v += N.length), C.push(N));
                                        var E = new L(l, g ? _.tokenize(x, g) : x, m, x, h);
                                        if ((C.push(E), S && C.push(S), Array.prototype.splice.apply(a, C), 1 != j && _.matchGrammar(e, a, n, y, v, !0, l + "," + u), i)) break;
                                    } else if (i) break;
                                }
                            }
                        }
                    }
            },
            tokenize: function (e, a) {
                var n = [e],
                    r = a.rest;
                if (r) {
                    for (var t in r) a[t] = r[t];
                    delete a.rest;
                }
                return _.matchGrammar(e, n, a, 0, 0, !1), n;
            },
            hooks: {
                all: {},
                add: function (e, a) {
                    var n = _.hooks.all;
                    (n[e] = n[e] || []), n[e].push(a);
                },
                run: function (e, a) {
                    var n = _.hooks.all[e];
                    if (n && n.length) for (var r, t = 0; (r = n[t++]); ) r(a);
                },
            },
            Token: L,
        };
        function L(e, a, n, r, t) {
            (this.type = e), (this.content = a), (this.alias = n), (this.length = 0 | (r || "").length), (this.greedy = !!t);
        }
        if (
            ((u.Prism = _),
                (L.stringify = function (e, a) {
                    if ("string" == typeof e) return e;
                    if (Array.isArray(e))
                        return e
                            .map(function (e) {
                                return L.stringify(e, a);
                            })
                            .join("");
                    var n = { type: e.type, content: L.stringify(e.content, a), tag: "span", classes: ["token", e.type], attributes: {}, language: a };
                    if (e.alias) {
                        var r = Array.isArray(e.alias) ? e.alias : [e.alias];
                        Array.prototype.push.apply(n.classes, r);
                    }
                    _.hooks.run("wrap", n);
                    var t = Object.keys(n.attributes)
                        .map(function (e) {
                            return e + '="' + (n.attributes[e] || "").replace(/"/g, "&quot;") + '"';
                        })
                        .join(" ");
                    return "<" + n.tag + ' class="' + n.classes.join(" ") + '"' + (t ? " " + t : "") + ">" + n.content + "</" + n.tag + ">";
                }),
                !u.document)
        )
            return (
                u.addEventListener &&
                (_.disableWorkerMessageHandler ||
                    u.addEventListener(
                        "message",
                        function (e) {
                            var a = JSON.parse(e.data),
                                n = a.language,
                                r = a.code,
                                t = a.immediateClose;
                            u.postMessage(_.highlight(r, _.languages[n], n)), t && u.close();
                        },
                        !1
                    )),
                    _
            );
        var e = document.currentScript || [].slice.call(document.getElementsByTagName("script")).pop();
        if ((e && ((_.filename = e.src), e.hasAttribute("data-manual") && (_.manual = !0)), !_.manual)) {
            function n() {
                _.manual || _.highlightAll();
            }
            "loading" !== document.readyState ? (window.requestAnimationFrame ? window.requestAnimationFrame(n) : window.setTimeout(n, 16)) : document.addEventListener("DOMContentLoaded", n);
        }
        return _;
    })(_self);
"undefined" != typeof module && module.exports && (module.exports = Prism), "undefined" != typeof global && (global.Prism = Prism);
(Prism.languages.markup = {
    comment: /<!--[\s\S]*?-->/,
    prolog: /<\?[\s\S]+?\?>/,
    doctype: { pattern: /<!DOCTYPE(?:[^>"'[\]]|"[^"]*"|'[^']*')+(?:\[(?:(?!<!--)[^"'\]]|"[^"]*"|'[^']*'|<!--[\s\S]*?-->)*\]\s*)?>/i, greedy: !0 },
    cdata: /<!\[CDATA\[[\s\S]*?]]>/i,
    tag: {
        pattern: /<\/?(?!\d)[^\s>\/=$<%]+(?:\s(?:\s*[^\s>\/=]+(?:\s*=\s*(?:"[^"]*"|'[^']*'|[^\s'">=]+(?=[\s>]))|(?=[\s/>])))+)?\s*\/?>/i,
        greedy: !0,
        inside: {
            tag: { pattern: /^<\/?[^\s>\/]+/i, inside: { punctuation: /^<\/?/, namespace: /^[^\s>\/:]+:/ } },
            "attr-value": { pattern: /=\s*(?:"[^"]*"|'[^']*'|[^\s'">=]+)/i, inside: { punctuation: [/^=/, { pattern: /^(\s*)["']|["']$/, lookbehind: !0 }] } },
            punctuation: /\/?>/,
            "attr-name": { pattern: /[^\s>\/]+/, inside: { namespace: /^[^\s>\/:]+:/ } },
        },
    },
    entity: /&#?[\da-z]{1,8};/i,
}),
    (Prism.languages.markup.tag.inside["attr-value"].inside.entity = Prism.languages.markup.entity),
    Prism.hooks.add("wrap", function (a) {
        "entity" === a.type && (a.attributes.title = a.content.replace(/&amp;/, "&"));
    }),
    Object.defineProperty(Prism.languages.markup.tag, "addInlined", {
        value: function (a, e) {
            var s = {};
            (s["language-" + e] = { pattern: /(^<!\[CDATA\[)[\s\S]+?(?=\]\]>$)/i, lookbehind: !0, inside: Prism.languages[e] }), (s.cdata = /^<!\[CDATA\[|\]\]>$/i);
            var n = { "included-cdata": { pattern: /<!\[CDATA\[[\s\S]*?\]\]>/i, inside: s } };
            n["language-" + e] = { pattern: /[\s\S]+/, inside: Prism.languages[e] };
            var t = {};
            (t[a] = { pattern: RegExp("(<__[\\s\\S]*?>)(?:<!\\[CDATA\\[[\\s\\S]*?\\]\\]>\\s*|[\\s\\S])*?(?=<\\/__>)".replace(/__/g, a), "i"), lookbehind: !0, greedy: !0, inside: n }), Prism.languages.insertBefore("markup", "cdata", t);
        },
    }),
    (Prism.languages.xml = Prism.languages.extend("markup", {})),
    (Prism.languages.html = Prism.languages.markup),
    (Prism.languages.mathml = Prism.languages.markup),
    (Prism.languages.svg = Prism.languages.markup);
!(function (s) {
    var t = /("|')(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/;
    (s.languages.css = {
        comment: /\/\*[\s\S]*?\*\//,
        atrule: { pattern: /@[\w-]+[\s\S]*?(?:;|(?=\s*\{))/, inside: { rule: /@[\w-]+/ } },
        url: { pattern: RegExp("url\\((?:" + t.source + "|[^\n\r()]*)\\)", "i"), inside: { function: /^url/i, punctuation: /^\(|\)$/ } },
        selector: RegExp("[^{}\\s](?:[^{};\"']|" + t.source + ")*?(?=\\s*\\{)"),
        string: { pattern: t, greedy: !0 },
        property: /[-_a-z\xA0-\uFFFF][-\w\xA0-\uFFFF]*(?=\s*:)/i,
        important: /!important\b/i,
        function: /[-a-z0-9]+(?=\()/i,
        punctuation: /[(){};:,]/,
    }),
        (s.languages.css.atrule.inside.rest = s.languages.css);
    var e = s.languages.markup;
    e &&
    (e.tag.addInlined("style", "css"),
        s.languages.insertBefore(
            "inside",
            "attr-value",
            {
                "style-attr": {
                    pattern: /\s*style=("|')(?:\\[\s\S]|(?!\1)[^\\])*\1/i,
                    inside: { "attr-name": { pattern: /^\s*style/i, inside: e.tag.inside }, punctuation: /^\s*=\s*['"]|['"]\s*$/, "attr-value": { pattern: /.+/i, inside: s.languages.css } },
                    alias: "language-css",
                },
            },
            e.tag
        ));
})(Prism);
Prism.languages.clike = {
    comment: [
        { pattern: /(^|[^\\])\/\*[\s\S]*?(?:\*\/|$)/, lookbehind: !0 },
        { pattern: /(^|[^\\:])\/\/.*/, lookbehind: !0, greedy: !0 },
    ],
    string: { pattern: /(["'])(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/, greedy: !0 },
    "class-name": { pattern: /(\b(?:class|interface|extends|implements|trait|instanceof|new)\s+|\bcatch\s+\()[\w.\\]+/i, lookbehind: !0, inside: { punctuation: /[.\\]/ } },
    keyword: /\b(?:if|else|while|do|for|return|in|instanceof|function|new|try|throw|catch|finally|null|break|continue)\b/,
    boolean: /\b(?:true|false)\b/,
    function: /\w+(?=\()/,
    number: /\b0x[\da-f]+\b|(?:\b\d+\.?\d*|\B\.\d+)(?:e[+-]?\d+)?/i,
    operator: /[<>]=?|[!=]=?=?|--?|\+\+?|&&?|\|\|?|[?*/~^%]/,
    punctuation: /[{}[\];(),.:]/,
};
(Prism.languages.javascript = Prism.languages.extend("clike", {
    "class-name": [Prism.languages.clike["class-name"], { pattern: /(^|[^$\w\xA0-\uFFFF])[_$A-Z\xA0-\uFFFF][$\w\xA0-\uFFFF]*(?=\.(?:prototype|constructor))/, lookbehind: !0 }],
    keyword: [
        { pattern: /((?:^|})\s*)(?:catch|finally)\b/, lookbehind: !0 },
        {
            pattern: /(^|[^.])\b(?:as|async(?=\s*(?:function\b|\(|[$\w\xA0-\uFFFF]|$))|await|break|case|class|const|continue|debugger|default|delete|do|else|enum|export|extends|for|from|function|get|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|set|static|super|switch|this|throw|try|typeof|undefined|var|void|while|with|yield)\b/,
            lookbehind: !0,
        },
    ],
    number: /\b(?:(?:0[xX](?:[\dA-Fa-f](?:_[\dA-Fa-f])?)+|0[bB](?:[01](?:_[01])?)+|0[oO](?:[0-7](?:_[0-7])?)+)n?|(?:\d(?:_\d)?)+n|NaN|Infinity)\b|(?:\b(?:\d(?:_\d)?)+\.?(?:\d(?:_\d)?)*|\B\.(?:\d(?:_\d)?)+)(?:[Ee][+-]?(?:\d(?:_\d)?)+)?/,
    function: /#?[_$a-zA-Z\xA0-\uFFFF][$\w\xA0-\uFFFF]*(?=\s*(?:\.\s*(?:apply|bind|call)\s*)?\()/,
    operator: /--|\+\+|\*\*=?|=>|&&|\|\||[!=]==|<<=?|>>>?=?|[-+*/%&|^!=<>]=?|\.{3}|\?[.?]?|[~:]/,
})),
    (Prism.languages.javascript["class-name"][0].pattern = /(\b(?:class|interface|extends|implements|instanceof|new)\s+)[\w.\\]+/),
    Prism.languages.insertBefore("javascript", "keyword", {
        regex: { pattern: /((?:^|[^$\w\xA0-\uFFFF."'\])\s])\s*)\/(?:\[(?:[^\]\\\r\n]|\\.)*]|\\.|[^/\\\[\r\n])+\/[gimyus]{0,6}(?=\s*(?:$|[\r\n,.;})\]]))/, lookbehind: !0, greedy: !0 },
        "function-variable": { pattern: /#?[_$a-zA-Z\xA0-\uFFFF][$\w\xA0-\uFFFF]*(?=\s*[=:]\s*(?:async\s*)?(?:\bfunction\b|(?:\((?:[^()]|\([^()]*\))*\)|[_$a-zA-Z\xA0-\uFFFF][$\w\xA0-\uFFFF]*)\s*=>))/, alias: "function" },
        parameter: [
            { pattern: /(function(?:\s+[_$A-Za-z\xA0-\uFFFF][$\w\xA0-\uFFFF]*)?\s*\(\s*)(?!\s)(?:[^()]|\([^()]*\))+?(?=\s*\))/, lookbehind: !0, inside: Prism.languages.javascript },
            { pattern: /[_$a-z\xA0-\uFFFF][$\w\xA0-\uFFFF]*(?=\s*=>)/i, inside: Prism.languages.javascript },
            { pattern: /(\(\s*)(?!\s)(?:[^()]|\([^()]*\))+?(?=\s*\)\s*=>)/, lookbehind: !0, inside: Prism.languages.javascript },
            {
                pattern: /((?:\b|\s|^)(?!(?:as|async|await|break|case|catch|class|const|continue|debugger|default|delete|do|else|enum|export|extends|finally|for|from|function|get|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|set|static|super|switch|this|throw|try|typeof|undefined|var|void|while|with|yield)(?![$\w\xA0-\uFFFF]))(?:[_$A-Za-z\xA0-\uFFFF][$\w\xA0-\uFFFF]*\s*)\(\s*)(?!\s)(?:[^()]|\([^()]*\))+?(?=\s*\)\s*\{)/,
                lookbehind: !0,
                inside: Prism.languages.javascript,
            },
        ],
        constant: /\b[A-Z](?:[A-Z_]|\dx?)*\b/,
    }),
    Prism.languages.insertBefore("javascript", "string", {
        "template-string": {
            pattern: /`(?:\\[\s\S]|\${(?:[^{}]|{(?:[^{}]|{[^}]*})*})+}|(?!\${)[^\\`])*`/,
            greedy: !0,
            inside: {
                "template-punctuation": { pattern: /^`|`$/, alias: "string" },
                interpolation: {
                    pattern: /((?:^|[^\\])(?:\\{2})*)\${(?:[^{}]|{(?:[^{}]|{[^}]*})*})+}/,
                    lookbehind: !0,
                    inside: { "interpolation-punctuation": { pattern: /^\${|}$/, alias: "punctuation" }, rest: Prism.languages.javascript },
                },
                string: /[\s\S]+/,
            },
        },
    }),
Prism.languages.markup && Prism.languages.markup.tag.addInlined("script", "javascript"),
    (Prism.languages.js = Prism.languages.javascript);
!(function () {
    if ("undefined" != typeof self && self.Prism && self.document && document.querySelector) {
        var t,
            n = function () {
                if (void 0 === t) {
                    var e = document.createElement("div");
                    (e.style.fontSize = "13px"),
                        (e.style.lineHeight = "1.5"),
                        (e.style.padding = 0),
                        (e.style.border = 0),
                        (e.innerHTML = "&nbsp;<br />&nbsp;"),
                        document.body.appendChild(e),
                        (t = 38 === e.offsetHeight),
                        document.body.removeChild(e);
                }
                return t;
            },
            a = 0;
        Prism.hooks.add("before-sanity-check", function (e) {
            var t = e.element.parentNode,
                n = t && t.getAttribute("data-line");
            if (t && n && /pre/i.test(t.nodeName)) {
                var i = 0;
                r(".line-highlight", t).forEach(function (e) {
                    (i += e.textContent.length), e.parentNode.removeChild(e);
                }),
                i && /^( \n)+$/.test(e.code.slice(-i)) && (e.code = e.code.slice(0, -i));
            }
        }),
            Prism.hooks.add("complete", function e(t) {
                var n = t.element.parentNode,
                    i = n && n.getAttribute("data-line");
                if (n && i && /pre/i.test(n.nodeName)) {
                    clearTimeout(a);
                    var r = Prism.plugins.lineNumbers,
                        o = t.plugins && t.plugins.lineNumbers;
                    if (l(n, "line-numbers") && r && !o) Prism.hooks.add("line-numbers", e);
                    else s(n, i)(), (a = setTimeout(u, 1));
                }
            }),
            window.addEventListener("hashchange", u),
            window.addEventListener("resize", function () {
                var t = [];
                r("pre[data-line]").forEach(function (e) {
                    t.push(s(e));
                }),
                    t.forEach(i);
            });
    }
    function r(e, t) {
        return Array.prototype.slice.call((t || document).querySelectorAll(e));
    }
    function l(e, t) {
        return (t = " " + t + " "), -1 < (" " + e.className + " ").replace(/[\n\t]/g, " ").indexOf(t);
    }
    function i(e) {
        e();
    }
    function s(u, e, d) {
        var t = (e = "string" == typeof e ? e : u.getAttribute("data-line")).replace(/\s+/g, "").split(","),
            c = +u.getAttribute("data-line-offset") || 0,
            f = (n() ? parseInt : parseFloat)(getComputedStyle(u).lineHeight),
            h = l(u, "line-numbers"),
            p = h ? u : u.querySelector("code") || u,
            m = [];
        return (
            t.forEach(function (e) {
                var t = e.split("-"),
                    n = +t[0],
                    i = +t[1] || n,
                    r = u.querySelector('.line-highlight[data-range="' + e + '"]') || document.createElement("div");
                if (
                    (m.push(function () {
                        r.setAttribute("aria-hidden", "true"), r.setAttribute("data-range", e), (r.className = (d || "") + " line-highlight");
                    }),
                    h && Prism.plugins.lineNumbers)
                ) {
                    var o = Prism.plugins.lineNumbers.getLine(u, n),
                        a = Prism.plugins.lineNumbers.getLine(u, i);
                    if (o) {
                        var l = o.offsetTop + "px";
                        m.push(function () {
                            r.style.top = l;
                        });
                    }
                    if (a) {
                        var s = a.offsetTop - o.offsetTop + a.offsetHeight + "px";
                        m.push(function () {
                            r.style.height = s;
                        });
                    }
                } else
                    m.push(function () {
                        r.setAttribute("data-start", n), n < i && r.setAttribute("data-end", i), (r.style.top = (n - c - 1) * f + "px"), (r.textContent = new Array(i - n + 2).join(" \n"));
                    });
                m.push(function () {
                    p.appendChild(r);
                });
            }),
                function () {
                    m.forEach(i);
                }
        );
    }
    function u() {
        var e = location.hash.slice(1);
        r(".temporary.line-highlight").forEach(function (e) {
            e.parentNode.removeChild(e);
        });
        var t = (e.match(/\.([\d,-]+)$/) || [, ""])[1];
        if (t && !document.getElementById(e)) {
            var n = e.slice(0, e.lastIndexOf(".")),
                i = document.getElementById(n);
            if (i) i.hasAttribute("data-line") || i.setAttribute("data-line", ""), s(i, t, "temporary ")(), document.querySelector(".temporary.line-highlight").scrollIntoView();
        }
    }
})();
!(function () {
    if ("undefined" != typeof self && self.Prism && self.document) {
        var l = "line-numbers",
            c = /\n(?!$)/g,
            m = function (e) {
                var t = a(e)["white-space"];
                if ("pre-wrap" === t || "pre-line" === t) {
                    var n = e.querySelector("code"),
                        r = e.querySelector(".line-numbers-rows"),
                        s = e.querySelector(".line-numbers-sizer"),
                        i = n.textContent.split(c);
                    s || (((s = document.createElement("span")).className = "line-numbers-sizer"), n.appendChild(s)),
                        (s.style.display = "block"),
                        i.forEach(function (e, t) {
                            s.textContent = e || "\n";
                            var n = s.getBoundingClientRect().height;
                            r.children[t].style.height = n + "px";
                        }),
                        (s.textContent = ""),
                        (s.style.display = "none");
                }
            },
            a = function (e) {
                return e ? (window.getComputedStyle ? getComputedStyle(e) : e.currentStyle || null) : null;
            };
        window.addEventListener("resize", function () {
            Array.prototype.forEach.call(document.querySelectorAll("pre." + l), m);
        }),
            Prism.hooks.add("complete", function (e) {
                if (e.code) {
                    var t = e.element,
                        n = t.parentNode;
                    if (n && /pre/i.test(n.nodeName) && !t.querySelector(".line-numbers-rows")) {
                        for (var r = !1, s = /(?:^|\s)line-numbers(?:\s|$)/, i = t; i; i = i.parentNode)
                            if (s.test(i.className)) {
                                r = !0;
                                break;
                            }
                        if (r) {
                            (t.className = t.className.replace(s, " ")), s.test(n.className) || (n.className += " line-numbers");
                            var l,
                                a = e.code.match(c),
                                o = a ? a.length + 1 : 1,
                                u = new Array(o + 1).join("<span></span>");
                            (l = document.createElement("span")).setAttribute("aria-hidden", "true"),
                                (l.className = "line-numbers-rows"),
                                (l.innerHTML = u),
                            n.hasAttribute("data-start") && (n.style.counterReset = "linenumber " + (parseInt(n.getAttribute("data-start"), 10) - 1)),
                                e.element.appendChild(l),
                                m(n),
                                Prism.hooks.run("line-numbers", e);
                        }
                    }
                }
            }),
            Prism.hooks.add("line-numbers", function (e) {
                (e.plugins = e.plugins || {}), (e.plugins.lineNumbers = !0);
            }),
            (Prism.plugins.lineNumbers = {
                getLine: function (e, t) {
                    if ("PRE" === e.tagName && e.classList.contains(l)) {
                        var n = e.querySelector(".line-numbers-rows"),
                            r = parseInt(e.getAttribute("data-start"), 10) || 1,
                            s = r + (n.children.length - 1);
                        t < r && (t = r), s < t && (t = s);
                        var i = t - r;
                        return n.children[i];
                    }
                },
            });
    }
})();
"undefined" != typeof self &&
self.Prism &&
self.document &&
document.querySelector &&
((self.Prism.fileHighlight = function (e) {
    e = e || document;
    var i = { js: "javascript", py: "python", rb: "ruby", ps1: "powershell", psm1: "powershell", sh: "bash", bat: "batch", h: "c", tex: "latex" };
    Array.prototype.slice.call(e.querySelectorAll("pre[data-src]")).forEach(function (e) {
        if (!e.hasAttribute("data-src-loaded")) {
            for (var t, a = e.getAttribute("data-src"), s = e, n = /\blang(?:uage)?-([\w-]+)\b/i; s && !n.test(s.className); ) s = s.parentNode;
            if ((s && (t = (e.className.match(n) || [, ""])[1]), !t)) {
                var r = (a.match(/\.(\w+)$/) || [, ""])[1];
                t = i[r] || r;
            }
            var o = document.createElement("code");
            (o.className = "language-" + t), (e.textContent = ""), (o.textContent = "Loading…"), e.appendChild(o);
            var l = new XMLHttpRequest();
            l.open("GET", a, !0),
                (l.onreadystatechange = function () {
                    4 == l.readyState &&
                    (l.status < 400 && l.responseText
                        ? ((o.textContent = l.responseText), Prism.highlightElement(o), e.setAttribute("data-src-loaded", ""))
                        : 400 <= l.status
                            ? (o.textContent = "✖ Error " + l.status + " while fetching file: " + l.statusText)
                            : (o.textContent = "✖ Error: File does not exist or is empty"));
                }),
                l.send(null);
        }
    });
}),
    document.addEventListener("DOMContentLoaded", function () {
        self.Prism.fileHighlight();
    }));
!(function () {
    if (("undefined" == typeof self || self.Prism) && ("undefined" == typeof global || global.Prism)) {
        var i = { tab: /\t/, crlf: /\r\n/, lf: /\n/, cr: /\r/, space: / / };
        Prism.hooks.add("before-highlight", function (r) {
            s(r.grammar);
        });
    }
    function f(r, e) {
        var i = r[e];
        switch (Prism.util.type(i)) {
            case "RegExp":
                var a = {};
                (r[e] = { pattern: i, inside: a }), s(a);
                break;
            case "Array":
                for (var n = 0, t = i.length; n < t; n++) f(i, n);
                break;
            default:
                s((a = i.inside || (i.inside = {})));
        }
    }
    function s(r) {
        if (r && !r.tab) {
            for (var e in i) i.hasOwnProperty(e) && (r[e] = i[e]);
            for (var e in r) r.hasOwnProperty(e) && !i[e] && ("rest" === e ? s(r.rest) : f(r, e));
        }
    }
})();

/*!
 * perfect-scrollbar v1.4.0
 * (c) 2018 Hyunje Jun
 * @license MIT
 */
!(function (t, e) {
    "object" == typeof exports && "undefined" != typeof module ? (module.exports = e()) : "function" == typeof define && define.amd ? define(e) : (t.PerfectScrollbar = e());
})(this, function () {
    "use strict";
    function t(t) {
        return getComputedStyle(t);
    }
    function e(t, e) {
        for (var i in e) {
            var r = e[i];
            "number" == typeof r && (r += "px"), (t.style[i] = r);
        }
        return t;
    }
    function i(t) {
        var e = document.createElement("div");
        return (e.className = t), e;
    }
    function r(t, e) {
        if (!v) throw new Error("No element matching method supported");
        return v.call(t, e);
    }
    function l(t) {
        t.remove ? t.remove() : t.parentNode && t.parentNode.removeChild(t);
    }
    function n(t, e) {
        return Array.prototype.filter.call(t.children, function (t) {
            return r(t, e);
        });
    }
    function o(t, e) {
        var i = t.element.classList,
            r = m.state.scrolling(e);
        i.contains(r) ? clearTimeout(Y[e]) : i.add(r);
    }
    function s(t, e) {
        Y[e] = setTimeout(function () {
            return t.isAlive && t.element.classList.remove(m.state.scrolling(e));
        }, t.settings.scrollingThreshold);
    }
    function a(t, e) {
        o(t, e), s(t, e);
    }
    function c(t) {
        if ("function" == typeof window.CustomEvent) return new CustomEvent(t);
        var e = document.createEvent("CustomEvent");
        return e.initCustomEvent(t, !1, !1, void 0), e;
    }
    function h(t, e, i, r, l) {
        var n = i[0],
            o = i[1],
            s = i[2],
            h = i[3],
            u = i[4],
            d = i[5];
        void 0 === r && (r = !0), void 0 === l && (l = !1);
        var f = t.element;
        (t.reach[h] = null),
        f[s] < 1 && (t.reach[h] = "start"),
        f[s] > t[n] - t[o] - 1 && (t.reach[h] = "end"),
        e && (f.dispatchEvent(c("ps-scroll-" + h)), e < 0 ? f.dispatchEvent(c("ps-scroll-" + u)) : e > 0 && f.dispatchEvent(c("ps-scroll-" + d)), r && a(t, h)),
        t.reach[h] && (e || l) && f.dispatchEvent(c("ps-" + h + "-reach-" + t.reach[h]));
    }
    function u(t) {
        return parseInt(t, 10) || 0;
    }
    function d(t) {
        return r(t, "input,[contenteditable]") || r(t, "select,[contenteditable]") || r(t, "textarea,[contenteditable]") || r(t, "button,[contenteditable]");
    }
    function f(e) {
        var i = t(e);
        return u(i.width) + u(i.paddingLeft) + u(i.paddingRight) + u(i.borderLeftWidth) + u(i.borderRightWidth);
    }
    function p(t, e) {
        return t.settings.minScrollbarLength && (e = Math.max(e, t.settings.minScrollbarLength)), t.settings.maxScrollbarLength && (e = Math.min(e, t.settings.maxScrollbarLength)), e;
    }
    function b(t, i) {
        var r = { width: i.railXWidth },
            l = Math.floor(t.scrollTop);
        i.isRtl ? (r.left = i.negativeScrollAdjustment + t.scrollLeft + i.containerWidth - i.contentWidth) : (r.left = t.scrollLeft),
            i.isScrollbarXUsingBottom ? (r.bottom = i.scrollbarXBottom - l) : (r.top = i.scrollbarXTop + l),
            e(i.scrollbarXRail, r);
        var n = { top: l, height: i.railYHeight };
        i.isScrollbarYUsingRight
            ? i.isRtl
                ? (n.right = i.contentWidth - (i.negativeScrollAdjustment + t.scrollLeft) - i.scrollbarYRight - i.scrollbarYOuterWidth)
                : (n.right = i.scrollbarYRight - t.scrollLeft)
            : i.isRtl
                ? (n.left = i.negativeScrollAdjustment + t.scrollLeft + 2 * i.containerWidth - i.contentWidth - i.scrollbarYLeft - i.scrollbarYOuterWidth)
                : (n.left = i.scrollbarYLeft + t.scrollLeft),
            e(i.scrollbarYRail, n),
            e(i.scrollbarX, { left: i.scrollbarXLeft, width: i.scrollbarXWidth - i.railBorderXWidth }),
            e(i.scrollbarY, { top: i.scrollbarYTop, height: i.scrollbarYHeight - i.railBorderYWidth });
    }
    function g(t, e) {
        function i(e) {
            (b[d] = g + Y * (e[a] - v)), o(t, f), R(t), e.stopPropagation(), e.preventDefault();
        }
        function r() {
            s(t, f), t[p].classList.remove(m.state.clicking), t.event.unbind(t.ownerDocument, "mousemove", i);
        }
        var l = e[0],
            n = e[1],
            a = e[2],
            c = e[3],
            h = e[4],
            u = e[5],
            d = e[6],
            f = e[7],
            p = e[8],
            b = t.element,
            g = null,
            v = null,
            Y = null;
        t.event.bind(t[h], "mousedown", function (e) {
            (g = b[d]),
                (v = e[a]),
                (Y = (t[n] - t[l]) / (t[c] - t[u])),
                t.event.bind(t.ownerDocument, "mousemove", i),
                t.event.once(t.ownerDocument, "mouseup", r),
                t[p].classList.add(m.state.clicking),
                e.stopPropagation(),
                e.preventDefault();
        });
    }
    var v = "undefined" != typeof Element && (Element.prototype.matches || Element.prototype.webkitMatchesSelector || Element.prototype.mozMatchesSelector || Element.prototype.msMatchesSelector),
        m = {
            main: "ps",
            element: {
                thumb: function (t) {
                    return "ps__thumb-" + t;
                },
                rail: function (t) {
                    return "ps__rail-" + t;
                },
                consuming: "ps__child--consume",
            },
            state: {
                focus: "ps--focus",
                clicking: "ps--clicking",
                active: function (t) {
                    return "ps--active-" + t;
                },
                scrolling: function (t) {
                    return "ps--scrolling-" + t;
                },
            },
        },
        Y = { x: null, y: null },
        X = function (t) {
            (this.element = t), (this.handlers = {});
        },
        w = { isEmpty: { configurable: !0 } };
    (X.prototype.bind = function (t, e) {
        void 0 === this.handlers[t] && (this.handlers[t] = []), this.handlers[t].push(e), this.element.addEventListener(t, e, !1);
    }),
        (X.prototype.unbind = function (t, e) {
            var i = this;
            this.handlers[t] = this.handlers[t].filter(function (r) {
                return !(!e || r === e) || (i.element.removeEventListener(t, r, !1), !1);
            });
        }),
        (X.prototype.unbindAll = function () {
            var t = this;
            for (var e in t.handlers) t.unbind(e);
        }),
        (w.isEmpty.get = function () {
            var t = this;
            return Object.keys(this.handlers).every(function (e) {
                return 0 === t.handlers[e].length;
            });
        }),
        Object.defineProperties(X.prototype, w);
    var y = function () {
        this.eventElements = [];
    };
    (y.prototype.eventElement = function (t) {
        var e = this.eventElements.filter(function (e) {
            return e.element === t;
        })[0];
        return e || ((e = new X(t)), this.eventElements.push(e)), e;
    }),
        (y.prototype.bind = function (t, e, i) {
            this.eventElement(t).bind(e, i);
        }),
        (y.prototype.unbind = function (t, e, i) {
            var r = this.eventElement(t);
            r.unbind(e, i), r.isEmpty && this.eventElements.splice(this.eventElements.indexOf(r), 1);
        }),
        (y.prototype.unbindAll = function () {
            this.eventElements.forEach(function (t) {
                return t.unbindAll();
            }),
                (this.eventElements = []);
        }),
        (y.prototype.once = function (t, e, i) {
            var r = this.eventElement(t),
                l = function (t) {
                    r.unbind(e, l), i(t);
                };
            r.bind(e, l);
        });
    var W = function (t, e, i, r, l) {
            void 0 === r && (r = !0), void 0 === l && (l = !1);
            var n;
            if ("top" === e) n = ["contentHeight", "containerHeight", "scrollTop", "y", "up", "down"];
            else {
                if ("left" !== e) throw new Error("A proper axis should be provided");
                n = ["contentWidth", "containerWidth", "scrollLeft", "x", "left", "right"];
            }
            h(t, i, n, r, l);
        },
        L = {
            isWebKit: "undefined" != typeof document && "WebkitAppearance" in document.documentElement.style,
            supportsTouch: "undefined" != typeof window && ("ontouchstart" in window || (window.DocumentTouch && document instanceof window.DocumentTouch)),
            supportsIePointer: "undefined" != typeof navigator && navigator.msMaxTouchPoints,
            isChrome: "undefined" != typeof navigator && /Chrome/i.test(navigator && navigator.userAgent),
        },
        R = function (t) {
            var e = t.element,
                i = Math.floor(e.scrollTop);
            (t.containerWidth = e.clientWidth),
                (t.containerHeight = e.clientHeight),
                (t.contentWidth = e.scrollWidth),
                (t.contentHeight = e.scrollHeight),
            e.contains(t.scrollbarXRail) ||
            (n(e, m.element.rail("x")).forEach(function (t) {
                return l(t);
            }),
                e.appendChild(t.scrollbarXRail)),
            e.contains(t.scrollbarYRail) ||
            (n(e, m.element.rail("y")).forEach(function (t) {
                return l(t);
            }),
                e.appendChild(t.scrollbarYRail)),
                !t.settings.suppressScrollX && t.containerWidth + t.settings.scrollXMarginOffset < t.contentWidth
                    ? ((t.scrollbarXActive = !0),
                        (t.railXWidth = t.containerWidth - t.railXMarginWidth),
                        (t.railXRatio = t.containerWidth / t.railXWidth),
                        (t.scrollbarXWidth = p(t, u((t.railXWidth * t.containerWidth) / t.contentWidth))),
                        (t.scrollbarXLeft = u(((t.negativeScrollAdjustment + e.scrollLeft) * (t.railXWidth - t.scrollbarXWidth)) / (t.contentWidth - t.containerWidth))))
                    : (t.scrollbarXActive = !1),
                !t.settings.suppressScrollY && t.containerHeight + t.settings.scrollYMarginOffset < t.contentHeight
                    ? ((t.scrollbarYActive = !0),
                        (t.railYHeight = t.containerHeight - t.railYMarginHeight),
                        (t.railYRatio = t.containerHeight / t.railYHeight),
                        (t.scrollbarYHeight = p(t, u((t.railYHeight * t.containerHeight) / t.contentHeight))),
                        (t.scrollbarYTop = u((i * (t.railYHeight - t.scrollbarYHeight)) / (t.contentHeight - t.containerHeight))))
                    : (t.scrollbarYActive = !1),
            t.scrollbarXLeft >= t.railXWidth - t.scrollbarXWidth && (t.scrollbarXLeft = t.railXWidth - t.scrollbarXWidth),
            t.scrollbarYTop >= t.railYHeight - t.scrollbarYHeight && (t.scrollbarYTop = t.railYHeight - t.scrollbarYHeight),
                b(e, t),
                t.scrollbarXActive ? e.classList.add(m.state.active("x")) : (e.classList.remove(m.state.active("x")), (t.scrollbarXWidth = 0), (t.scrollbarXLeft = 0), (e.scrollLeft = 0)),
                t.scrollbarYActive ? e.classList.add(m.state.active("y")) : (e.classList.remove(m.state.active("y")), (t.scrollbarYHeight = 0), (t.scrollbarYTop = 0), (e.scrollTop = 0));
        },
        T = {
            "click-rail": function (t) {
                t.event.bind(t.scrollbarY, "mousedown", function (t) {
                    return t.stopPropagation();
                }),
                    t.event.bind(t.scrollbarYRail, "mousedown", function (e) {
                        var i = e.pageY - window.pageYOffset - t.scrollbarYRail.getBoundingClientRect().top > t.scrollbarYTop ? 1 : -1;
                        (t.element.scrollTop += i * t.containerHeight), R(t), e.stopPropagation();
                    }),
                    t.event.bind(t.scrollbarX, "mousedown", function (t) {
                        return t.stopPropagation();
                    }),
                    t.event.bind(t.scrollbarXRail, "mousedown", function (e) {
                        var i = e.pageX - window.pageXOffset - t.scrollbarXRail.getBoundingClientRect().left > t.scrollbarXLeft ? 1 : -1;
                        (t.element.scrollLeft += i * t.containerWidth), R(t), e.stopPropagation();
                    });
            },
            "drag-thumb": function (t) {
                g(t, ["containerWidth", "contentWidth", "pageX", "railXWidth", "scrollbarX", "scrollbarXWidth", "scrollLeft", "x", "scrollbarXRail"]),
                    g(t, ["containerHeight", "contentHeight", "pageY", "railYHeight", "scrollbarY", "scrollbarYHeight", "scrollTop", "y", "scrollbarYRail"]);
            },
            keyboard: function (t) {
                function e(e, r) {
                    var l = Math.floor(i.scrollTop);
                    if (0 === e) {
                        if (!t.scrollbarYActive) return !1;
                        if ((0 === l && r > 0) || (l >= t.contentHeight - t.containerHeight && r < 0)) return !t.settings.wheelPropagation;
                    }
                    var n = i.scrollLeft;
                    if (0 === r) {
                        if (!t.scrollbarXActive) return !1;
                        if ((0 === n && e < 0) || (n >= t.contentWidth - t.containerWidth && e > 0)) return !t.settings.wheelPropagation;
                    }
                    return !0;
                }
                var i = t.element,
                    l = function () {
                        return r(i, ":hover");
                    },
                    n = function () {
                        return r(t.scrollbarX, ":focus") || r(t.scrollbarY, ":focus");
                    };
                t.event.bind(t.ownerDocument, "keydown", function (r) {
                    if (!((r.isDefaultPrevented && r.isDefaultPrevented()) || r.defaultPrevented) && (l() || n())) {
                        var o = document.activeElement ? document.activeElement : t.ownerDocument.activeElement;
                        if (o) {
                            if ("IFRAME" === o.tagName) o = o.contentDocument.activeElement;
                            else for (; o.shadowRoot; ) o = o.shadowRoot.activeElement;
                            if (d(o)) return;
                        }
                        var s = 0,
                            a = 0;
                        switch (r.which) {
                            case 37:
                                s = r.metaKey ? -t.contentWidth : r.altKey ? -t.containerWidth : -30;
                                break;
                            case 38:
                                a = r.metaKey ? t.contentHeight : r.altKey ? t.containerHeight : 30;
                                break;
                            case 39:
                                s = r.metaKey ? t.contentWidth : r.altKey ? t.containerWidth : 30;
                                break;
                            case 40:
                                a = r.metaKey ? -t.contentHeight : r.altKey ? -t.containerHeight : -30;
                                break;
                            case 32:
                                a = r.shiftKey ? t.containerHeight : -t.containerHeight;
                                break;
                            case 33:
                                a = t.containerHeight;
                                break;
                            case 34:
                                a = -t.containerHeight;
                                break;
                            case 36:
                                a = t.contentHeight;
                                break;
                            case 35:
                                a = -t.contentHeight;
                                break;
                            default:
                                return;
                        }
                        (t.settings.suppressScrollX && 0 !== s) || (t.settings.suppressScrollY && 0 !== a) || ((i.scrollTop -= a), (i.scrollLeft += s), R(t), e(s, a) && r.preventDefault());
                    }
                });
            },
            wheel: function (e) {
                function i(t, i) {
                    var r = Math.floor(o.scrollTop),
                        l = 0 === o.scrollTop,
                        n = r + o.offsetHeight === o.scrollHeight,
                        s = 0 === o.scrollLeft,
                        a = o.scrollLeft + o.offsetWidth === o.scrollWidth;
                    return !(Math.abs(i) > Math.abs(t) ? l || n : s || a) || !e.settings.wheelPropagation;
                }
                function r(t) {
                    var e = t.deltaX,
                        i = -1 * t.deltaY;
                    return (
                        (void 0 !== e && void 0 !== i) || ((e = (-1 * t.wheelDeltaX) / 6), (i = t.wheelDeltaY / 6)),
                        t.deltaMode && 1 === t.deltaMode && ((e *= 10), (i *= 10)),
                        e !== e && i !== i && ((e = 0), (i = t.wheelDelta)),
                            t.shiftKey ? [-i, -e] : [e, i]
                    );
                }
                function l(e, i, r) {
                    if (!L.isWebKit && o.querySelector("select:focus")) return !0;
                    if (!o.contains(e)) return !1;
                    for (var l = e; l && l !== o; ) {
                        if (l.classList.contains(m.element.consuming)) return !0;
                        var n = t(l);
                        if ([n.overflow, n.overflowX, n.overflowY].join("").match(/(scroll|auto)/)) {
                            var s = l.scrollHeight - l.clientHeight;
                            if (s > 0 && !((0 === l.scrollTop && r > 0) || (l.scrollTop === s && r < 0))) return !0;
                            var a = l.scrollWidth - l.clientWidth;
                            if (a > 0 && !((0 === l.scrollLeft && i < 0) || (l.scrollLeft === a && i > 0))) return !0;
                        }
                        l = l.parentNode;
                    }
                    return !1;
                }
                function n(t) {
                    var n = r(t),
                        s = n[0],
                        a = n[1];
                    if (!l(t.target, s, a)) {
                        var c = !1;
                        e.settings.useBothWheelAxes
                            ? e.scrollbarYActive && !e.scrollbarXActive
                                ? (a ? (o.scrollTop -= a * e.settings.wheelSpeed) : (o.scrollTop += s * e.settings.wheelSpeed), (c = !0))
                                : e.scrollbarXActive && !e.scrollbarYActive && (s ? (o.scrollLeft += s * e.settings.wheelSpeed) : (o.scrollLeft -= a * e.settings.wheelSpeed), (c = !0))
                            : ((o.scrollTop -= a * e.settings.wheelSpeed), (o.scrollLeft += s * e.settings.wheelSpeed)),
                            R(e),
                        (c = c || i(s, a)) && !t.ctrlKey && (t.stopPropagation(), t.preventDefault());
                    }
                }
                var o = e.element;
                void 0 !== window.onwheel ? e.event.bind(o, "wheel", n) : void 0 !== window.onmousewheel && e.event.bind(o, "mousewheel", n);
            },
            touch: function (e) {
                function i(t, i) {
                    var r = Math.floor(h.scrollTop),
                        l = h.scrollLeft,
                        n = Math.abs(t),
                        o = Math.abs(i);
                    if (o > n) {
                        if ((i < 0 && r === e.contentHeight - e.containerHeight) || (i > 0 && 0 === r)) return 0 === window.scrollY && i > 0 && L.isChrome;
                    } else if (n > o && ((t < 0 && l === e.contentWidth - e.containerWidth) || (t > 0 && 0 === l))) return !0;
                    return !0;
                }
                function r(t, i) {
                    (h.scrollTop -= i), (h.scrollLeft -= t), R(e);
                }
                function l(t) {
                    return t.targetTouches ? t.targetTouches[0] : t;
                }
                function n(t) {
                    return !(
                        (t.pointerType && "pen" === t.pointerType && 0 === t.buttons) ||
                        ((!t.targetTouches || 1 !== t.targetTouches.length) && (!t.pointerType || "mouse" === t.pointerType || t.pointerType === t.MSPOINTER_TYPE_MOUSE))
                    );
                }
                function o(t) {
                    if (n(t)) {
                        var e = l(t);
                        (u.pageX = e.pageX), (u.pageY = e.pageY), (d = new Date().getTime()), null !== p && clearInterval(p);
                    }
                }
                function s(e, i, r) {
                    if (!h.contains(e)) return !1;
                    for (var l = e; l && l !== h; ) {
                        if (l.classList.contains(m.element.consuming)) return !0;
                        var n = t(l);
                        if ([n.overflow, n.overflowX, n.overflowY].join("").match(/(scroll|auto)/)) {
                            var o = l.scrollHeight - l.clientHeight;
                            if (o > 0 && !((0 === l.scrollTop && r > 0) || (l.scrollTop === o && r < 0))) return !0;
                            var s = l.scrollLeft - l.clientWidth;
                            if (s > 0 && !((0 === l.scrollLeft && i < 0) || (l.scrollLeft === s && i > 0))) return !0;
                        }
                        l = l.parentNode;
                    }
                    return !1;
                }
                function a(t) {
                    if (n(t)) {
                        var e = l(t),
                            o = { pageX: e.pageX, pageY: e.pageY },
                            a = o.pageX - u.pageX,
                            c = o.pageY - u.pageY;
                        if (s(t.target, a, c)) return;
                        r(a, c), (u = o);
                        var h = new Date().getTime(),
                            p = h - d;
                        p > 0 && ((f.x = a / p), (f.y = c / p), (d = h)), i(a, c) && t.preventDefault();
                    }
                }
                function c() {
                    e.settings.swipeEasing &&
                    (clearInterval(p),
                        (p = setInterval(function () {
                            e.isInitialized ? clearInterval(p) : f.x || f.y ? (Math.abs(f.x) < 0.01 && Math.abs(f.y) < 0.01 ? clearInterval(p) : (r(30 * f.x, 30 * f.y), (f.x *= 0.8), (f.y *= 0.8))) : clearInterval(p);
                        }, 10)));
                }
                if (L.supportsTouch || L.supportsIePointer) {
                    var h = e.element,
                        u = {},
                        d = 0,
                        f = {},
                        p = null;
                    L.supportsTouch
                        ? (e.event.bind(h, "touchstart", o), e.event.bind(h, "touchmove", a), e.event.bind(h, "touchend", c))
                        : L.supportsIePointer &&
                        (window.PointerEvent
                            ? (e.event.bind(h, "pointerdown", o), e.event.bind(h, "pointermove", a), e.event.bind(h, "pointerup", c))
                            : window.MSPointerEvent && (e.event.bind(h, "MSPointerDown", o), e.event.bind(h, "MSPointerMove", a), e.event.bind(h, "MSPointerUp", c)));
                }
            },
        },
        H = function (r, l) {
            var n = this;
            if ((void 0 === l && (l = {}), "string" == typeof r && (r = document.querySelector(r)), !r || !r.nodeName)) throw new Error("no element is specified to initialize PerfectScrollbar");
            (this.element = r),
                r.classList.add(m.main),
                (this.settings = {
                    handlers: ["click-rail", "drag-thumb", "keyboard", "wheel", "touch"],
                    maxScrollbarLength: null,
                    minScrollbarLength: null,
                    scrollingThreshold: 1e3,
                    scrollXMarginOffset: 0,
                    scrollYMarginOffset: 0,
                    suppressScrollX: !1,
                    suppressScrollY: !1,
                    swipeEasing: !0,
                    useBothWheelAxes: !1,
                    wheelPropagation: !0,
                    wheelSpeed: 1,
                });
            for (var o in l) n.settings[o] = l[o];
            (this.containerWidth = null), (this.containerHeight = null), (this.contentWidth = null), (this.contentHeight = null);
            var s = function () {
                    return r.classList.add(m.state.focus);
                },
                a = function () {
                    return r.classList.remove(m.state.focus);
                };
            (this.isRtl = "rtl" === t(r).direction),
                (this.isNegativeScroll = (function () {
                    var t = r.scrollLeft,
                        e = null;
                    return (r.scrollLeft = -1), (e = r.scrollLeft < 0), (r.scrollLeft = t), e;
                })()),
                (this.negativeScrollAdjustment = this.isNegativeScroll ? r.scrollWidth - r.clientWidth : 0),
                (this.event = new y()),
                (this.ownerDocument = r.ownerDocument || document),
                (this.scrollbarXRail = i(m.element.rail("x"))),
                r.appendChild(this.scrollbarXRail),
                (this.scrollbarX = i(m.element.thumb("x"))),
                this.scrollbarXRail.appendChild(this.scrollbarX),
                this.scrollbarX.setAttribute("tabindex", 0),
                this.event.bind(this.scrollbarX, "focus", s),
                this.event.bind(this.scrollbarX, "blur", a),
                (this.scrollbarXActive = null),
                (this.scrollbarXWidth = null),
                (this.scrollbarXLeft = null);
            var c = t(this.scrollbarXRail);
            (this.scrollbarXBottom = parseInt(c.bottom, 10)),
                isNaN(this.scrollbarXBottom) ? ((this.isScrollbarXUsingBottom = !1), (this.scrollbarXTop = u(c.top))) : (this.isScrollbarXUsingBottom = !0),
                (this.railBorderXWidth = u(c.borderLeftWidth) + u(c.borderRightWidth)),
                e(this.scrollbarXRail, { display: "block" }),
                (this.railXMarginWidth = u(c.marginLeft) + u(c.marginRight)),
                e(this.scrollbarXRail, { display: "" }),
                (this.railXWidth = null),
                (this.railXRatio = null),
                (this.scrollbarYRail = i(m.element.rail("y"))),
                r.appendChild(this.scrollbarYRail),
                (this.scrollbarY = i(m.element.thumb("y"))),
                this.scrollbarYRail.appendChild(this.scrollbarY),
                this.scrollbarY.setAttribute("tabindex", 0),
                this.event.bind(this.scrollbarY, "focus", s),
                this.event.bind(this.scrollbarY, "blur", a),
                (this.scrollbarYActive = null),
                (this.scrollbarYHeight = null),
                (this.scrollbarYTop = null);
            var h = t(this.scrollbarYRail);
            (this.scrollbarYRight = parseInt(h.right, 10)),
                isNaN(this.scrollbarYRight) ? ((this.isScrollbarYUsingRight = !1), (this.scrollbarYLeft = u(h.left))) : (this.isScrollbarYUsingRight = !0),
                (this.scrollbarYOuterWidth = this.isRtl ? f(this.scrollbarY) : null),
                (this.railBorderYWidth = u(h.borderTopWidth) + u(h.borderBottomWidth)),
                e(this.scrollbarYRail, { display: "block" }),
                (this.railYMarginHeight = u(h.marginTop) + u(h.marginBottom)),
                e(this.scrollbarYRail, { display: "" }),
                (this.railYHeight = null),
                (this.railYRatio = null),
                (this.reach = {
                    x: r.scrollLeft <= 0 ? "start" : r.scrollLeft >= this.contentWidth - this.containerWidth ? "end" : null,
                    y: r.scrollTop <= 0 ? "start" : r.scrollTop >= this.contentHeight - this.containerHeight ? "end" : null,
                }),
                (this.isAlive = !0),
                this.settings.handlers.forEach(function (t) {
                    return T[t](n);
                }),
                (this.lastScrollTop = Math.floor(r.scrollTop)),
                (this.lastScrollLeft = r.scrollLeft),
                this.event.bind(this.element, "scroll", function (t) {
                    return n.onScroll(t);
                }),
                R(this);
        };
    return (
        (H.prototype.update = function () {
            this.isAlive &&
            ((this.negativeScrollAdjustment = this.isNegativeScroll ? this.element.scrollWidth - this.element.clientWidth : 0),
                e(this.scrollbarXRail, { display: "block" }),
                e(this.scrollbarYRail, { display: "block" }),
                (this.railXMarginWidth = u(t(this.scrollbarXRail).marginLeft) + u(t(this.scrollbarXRail).marginRight)),
                (this.railYMarginHeight = u(t(this.scrollbarYRail).marginTop) + u(t(this.scrollbarYRail).marginBottom)),
                e(this.scrollbarXRail, { display: "none" }),
                e(this.scrollbarYRail, { display: "none" }),
                R(this),
                W(this, "top", 0, !1, !0),
                W(this, "left", 0, !1, !0),
                e(this.scrollbarXRail, { display: "" }),
                e(this.scrollbarYRail, { display: "" }));
        }),
            (H.prototype.onScroll = function (t) {
                this.isAlive &&
                (R(this),
                    W(this, "top", this.element.scrollTop - this.lastScrollTop),
                    W(this, "left", this.element.scrollLeft - this.lastScrollLeft),
                    (this.lastScrollTop = Math.floor(this.element.scrollTop)),
                    (this.lastScrollLeft = this.element.scrollLeft));
            }),
            (H.prototype.destroy = function () {
                this.isAlive &&
                (this.event.unbindAll(),
                    l(this.scrollbarX),
                    l(this.scrollbarY),
                    l(this.scrollbarXRail),
                    l(this.scrollbarYRail),
                    this.removePsClasses(),
                    (this.element = null),
                    (this.scrollbarX = null),
                    (this.scrollbarY = null),
                    (this.scrollbarXRail = null),
                    (this.scrollbarYRail = null),
                    (this.isAlive = !1));
            }),
            (H.prototype.removePsClasses = function () {
                this.element.className = this.element.className
                    .split(" ")
                    .filter(function (t) {
                        return !t.match(/^ps([-_].+|)$/);
                    })
                    .join(" ");
            }),
            H
    );
});

// Internalization
!(function (e, t) {
    "object" == typeof exports && "undefined" != typeof module ? (module.exports = t()) : "function" == typeof define && define.amd ? define(t) : ((e = e || self).i18next = t());
})(this, function () {
    "use strict";
    function e(t) {
        return (e =
            "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
                ? function (e) {
                    return typeof e;
                }
                : function (e) {
                    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e;
                })(t);
    }
    function t(n) {
        return (t =
            "function" == typeof Symbol && "symbol" === e(Symbol.iterator)
                ? function (t) {
                    return e(t);
                }
                : function (t) {
                    return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : e(t);
                })(n);
    }
    function n(e, t, n) {
        return t in e ? Object.defineProperty(e, t, { value: n, enumerable: !0, configurable: !0, writable: !0 }) : (e[t] = n), e;
    }
    function r(e) {
        for (var t = 1; t < arguments.length; t++) {
            var r = null != arguments[t] ? arguments[t] : {},
                o = Object.keys(r);
            "function" == typeof Object.getOwnPropertySymbols &&
            (o = o.concat(
                Object.getOwnPropertySymbols(r).filter(function (e) {
                    return Object.getOwnPropertyDescriptor(r, e).enumerable;
                })
            )),
                o.forEach(function (t) {
                    n(e, t, r[t]);
                });
        }
        return e;
    }
    function o(e, t) {
        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function");
    }
    function i(e, t) {
        for (var n = 0; n < t.length; n++) {
            var r = t[n];
            (r.enumerable = r.enumerable || !1), (r.configurable = !0), "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r);
        }
    }
    function a(e, t, n) {
        return t && i(e.prototype, t), n && i(e, n), e;
    }
    function s(e) {
        if (void 0 === e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
        return e;
    }
    function u(e, n) {
        return !n || ("object" !== t(n) && "function" != typeof n) ? s(e) : n;
    }
    function l(e) {
        return (l = Object.setPrototypeOf
            ? Object.getPrototypeOf
            : function (e) {
                return e.__proto__ || Object.getPrototypeOf(e);
            })(e);
    }
    function c(e, t) {
        return (c =
            Object.setPrototypeOf ||
            function (e, t) {
                return (e.__proto__ = t), e;
            })(e, t);
    }
    function f(e, t) {
        if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function");
        (e.prototype = Object.create(t && t.prototype, { constructor: { value: e, writable: !0, configurable: !0 } })), t && c(e, t);
    }
    function p(e) {
        return (
            (function (e) {
                if (Array.isArray(e)) {
                    for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                    return n;
                }
            })(e) ||
            (function (e) {
                if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e);
            })(e) ||
            (function () {
                throw new TypeError("Invalid attempt to spread non-iterable instance");
            })()
        );
    }
    var g = {
            type: "logger",
            log: function (e) {
                this.output("log", e);
            },
            warn: function (e) {
                this.output("warn", e);
            },
            error: function (e) {
                this.output("error", e);
            },
            output: function (e, t) {
                var n;
                console && console[e] && (n = console)[e].apply(n, p(t));
            },
        },
        h = new ((function () {
            function e(t) {
                var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                o(this, e), this.init(t, n);
            }
            return (
                a(e, [
                    {
                        key: "init",
                        value: function (e) {
                            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                            (this.prefix = t.prefix || "i18next:"), (this.logger = e || g), (this.options = t), (this.debug = t.debug);
                        },
                    },
                    {
                        key: "setDebug",
                        value: function (e) {
                            this.debug = e;
                        },
                    },
                    {
                        key: "log",
                        value: function () {
                            for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                            return this.forward(t, "log", "", !0);
                        },
                    },
                    {
                        key: "warn",
                        value: function () {
                            for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                            return this.forward(t, "warn", "", !0);
                        },
                    },
                    {
                        key: "error",
                        value: function () {
                            for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                            return this.forward(t, "error", "");
                        },
                    },
                    {
                        key: "deprecate",
                        value: function () {
                            for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                            return this.forward(t, "warn", "WARNING DEPRECATED: ", !0);
                        },
                    },
                    {
                        key: "forward",
                        value: function (e, t, n, r) {
                            return r && !this.debug ? null : ("string" == typeof e[0] && (e[0] = "".concat(n).concat(this.prefix, " ").concat(e[0])), this.logger[t](e));
                        },
                    },
                    {
                        key: "create",
                        value: function (t) {
                            return new e(this.logger, r({}, { prefix: "".concat(this.prefix, ":").concat(t, ":") }, this.options));
                        },
                    },
                ]),
                    e
            );
        })())(),
        d = (function () {
            function e() {
                o(this, e), (this.observers = {});
            }
            return (
                a(e, [
                    {
                        key: "on",
                        value: function (e, t) {
                            var n = this;
                            return (
                                e.split(" ").forEach(function (e) {
                                    (n.observers[e] = n.observers[e] || []), n.observers[e].push(t);
                                }),
                                    this
                            );
                        },
                    },
                    {
                        key: "off",
                        value: function (e, t) {
                            var n = this;
                            this.observers[e] &&
                            this.observers[e].forEach(function () {
                                if (t) {
                                    var r = n.observers[e].indexOf(t);
                                    r > -1 && n.observers[e].splice(r, 1);
                                } else delete n.observers[e];
                            });
                        },
                    },
                    {
                        key: "emit",
                        value: function (e) {
                            for (var t = arguments.length, n = new Array(t > 1 ? t - 1 : 0), r = 1; r < t; r++) n[r - 1] = arguments[r];
                            this.observers[e] &&
                            [].concat(this.observers[e]).forEach(function (e) {
                                e.apply(void 0, n);
                            });
                            this.observers["*"] &&
                            [].concat(this.observers["*"]).forEach(function (t) {
                                t.apply(t, [e].concat(n));
                            });
                        },
                    },
                ]),
                    e
            );
        })();
    function v() {
        var e,
            t,
            n = new Promise(function (n, r) {
                (e = n), (t = r);
            });
        return (n.resolve = e), (n.reject = t), n;
    }
    function y(e) {
        return null == e ? "" : "" + e;
    }
    function m(e, t, n) {
        function r(e) {
            return e && e.indexOf("###") > -1 ? e.replace(/###/g, ".") : e;
        }
        function o() {
            return !e || "string" == typeof e;
        }
        for (var i = "string" != typeof t ? [].concat(t) : t.split("."); i.length > 1; ) {
            if (o()) return {};
            var a = r(i.shift());
            !e[a] && n && (e[a] = new n()), (e = e[a]);
        }
        return o() ? {} : { obj: e, k: r(i.shift()) };
    }
    function b(e, t, n) {
        var r = m(e, t, Object);
        r.obj[r.k] = n;
    }
    function k(e, t) {
        var n = m(e, t),
            r = n.obj,
            o = n.k;
        if (r) return r[o];
    }
    function x(e) {
        return e.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
    }
    var S = { "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;", "/": "&#x2F;" };
    function w(e) {
        return "string" == typeof e
            ? e.replace(/[&<>"'\/]/g, function (e) {
                return S[e];
            })
            : e;
    }
    var O = (function (e) {
            function t(e) {
                var n,
                    r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : { ns: ["translation"], defaultNS: "translation" };
                return o(this, t), (n = u(this, l(t).call(this))), d.call(s(n)), (n.data = e || {}), (n.options = r), void 0 === n.options.keySeparator && (n.options.keySeparator = "."), n;
            }
            return (
                f(t, d),
                    a(t, [
                        {
                            key: "addNamespaces",
                            value: function (e) {
                                this.options.ns.indexOf(e) < 0 && this.options.ns.push(e);
                            },
                        },
                        {
                            key: "removeNamespaces",
                            value: function (e) {
                                var t = this.options.ns.indexOf(e);
                                t > -1 && this.options.ns.splice(t, 1);
                            },
                        },
                        {
                            key: "getResource",
                            value: function (e, t, n) {
                                var r = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : {},
                                    o = void 0 !== r.keySeparator ? r.keySeparator : this.options.keySeparator,
                                    i = [e, t];
                                return n && "string" != typeof n && (i = i.concat(n)), n && "string" == typeof n && (i = i.concat(o ? n.split(o) : n)), e.indexOf(".") > -1 && (i = e.split(".")), k(this.data, i);
                            },
                        },
                        {
                            key: "addResource",
                            value: function (e, t, n, r) {
                                var o = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : { silent: !1 },
                                    i = this.options.keySeparator;
                                void 0 === i && (i = ".");
                                var a = [e, t];
                                n && (a = a.concat(i ? n.split(i) : n)), e.indexOf(".") > -1 && ((r = t), (t = (a = e.split("."))[1])), this.addNamespaces(t), b(this.data, a, r), o.silent || this.emit("added", e, t, n, r);
                            },
                        },
                        {
                            key: "addResources",
                            value: function (e, t, n) {
                                var r = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : { silent: !1 };
                                for (var o in n) ("string" != typeof n[o] && "[object Array]" !== Object.prototype.toString.apply(n[o])) || this.addResource(e, t, o, n[o], { silent: !0 });
                                r.silent || this.emit("added", e, t, n);
                            },
                        },
                        {
                            key: "addResourceBundle",
                            value: function (e, t, n, o, i) {
                                var a = arguments.length > 5 && void 0 !== arguments[5] ? arguments[5] : { silent: !1 },
                                    s = [e, t];
                                e.indexOf(".") > -1 && ((o = n), (n = t), (t = (s = e.split("."))[1])), this.addNamespaces(t);
                                var u = k(this.data, s) || {};
                                o
                                    ? (function e(t, n, r) {
                                        for (var o in n) o in t ? ("string" == typeof t[o] || t[o] instanceof String || "string" == typeof n[o] || n[o] instanceof String ? r && (t[o] = n[o]) : e(t[o], n[o], r)) : (t[o] = n[o]);
                                        return t;
                                    })(u, n, i)
                                    : (u = r({}, u, n)),
                                    b(this.data, s, u),
                                a.silent || this.emit("added", e, t, n);
                            },
                        },
                        {
                            key: "removeResourceBundle",
                            value: function (e, t) {
                                this.hasResourceBundle(e, t) && delete this.data[e][t], this.removeNamespaces(t), this.emit("removed", e, t);
                            },
                        },
                        {
                            key: "hasResourceBundle",
                            value: function (e, t) {
                                return void 0 !== this.getResource(e, t);
                            },
                        },
                        {
                            key: "getResourceBundle",
                            value: function (e, t) {
                                return t || (t = this.options.defaultNS), "v1" === this.options.compatibilityAPI ? r({}, {}, this.getResource(e, t)) : this.getResource(e, t);
                            },
                        },
                        {
                            key: "getDataByLanguage",
                            value: function (e) {
                                return this.data[e];
                            },
                        },
                        {
                            key: "toJSON",
                            value: function () {
                                return this.data;
                            },
                        },
                    ]),
                    t
            );
        })(),
        R = {
            processors: {},
            addPostProcessor: function (e) {
                this.processors[e.name] = e;
            },
            handle: function (e, t, n, r, o) {
                var i = this;
                return (
                    e.forEach(function (e) {
                        i.processors[e] && (t = i.processors[e].process(t, n, r, o));
                    }),
                        t
                );
            },
        },
        j = (function (e) {
            function n(e) {
                var t,
                    r,
                    i,
                    a,
                    c = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                return (
                    o(this, n),
                        (t = u(this, l(n).call(this))),
                        d.call(s(t)),
                        (r = ["resourceStore", "languageUtils", "pluralResolver", "interpolator", "backendConnector", "i18nFormat"]),
                        (i = e),
                        (a = s(t)),
                        r.forEach(function (e) {
                            i[e] && (a[e] = i[e]);
                        }),
                        (t.options = c),
                    void 0 === t.options.keySeparator && (t.options.keySeparator = "."),
                        (t.logger = h.create("translator")),
                        t
                );
            }
            return (
                f(n, d),
                    a(n, [
                        {
                            key: "changeLanguage",
                            value: function (e) {
                                e && (this.language = e);
                            },
                        },
                        {
                            key: "exists",
                            value: function (e) {
                                var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : { interpolation: {} },
                                    n = this.resolve(e, t);
                                return n && void 0 !== n.res;
                            },
                        },
                        {
                            key: "extractFromKey",
                            value: function (e, t) {
                                var n = t.nsSeparator || this.options.nsSeparator;
                                void 0 === n && (n = ":");
                                var r = void 0 !== t.keySeparator ? t.keySeparator : this.options.keySeparator,
                                    o = t.ns || this.options.defaultNS;
                                if (n && e.indexOf(n) > -1) {
                                    var i = e.split(n);
                                    (n !== r || (n === r && this.options.ns.indexOf(i[0]) > -1)) && (o = i.shift()), (e = i.join(r));
                                }
                                return "string" == typeof o && (o = [o]), { key: e, namespaces: o };
                            },
                        },
                        {
                            key: "translate",
                            value: function (e, n) {
                                var o = this;
                                if (("object" !== t(n) && this.options.overloadTranslationOptionHandler && (n = this.options.overloadTranslationOptionHandler(arguments)), n || (n = {}), null == e)) return "";
                                Array.isArray(e) || (e = [String(e)]);
                                var i = void 0 !== n.keySeparator ? n.keySeparator : this.options.keySeparator,
                                    a = this.extractFromKey(e[e.length - 1], n),
                                    s = a.key,
                                    u = a.namespaces,
                                    l = u[u.length - 1],
                                    c = n.lng || this.language,
                                    f = n.appendNamespaceToCIMode || this.options.appendNamespaceToCIMode;
                                if (c && "cimode" === c.toLowerCase()) {
                                    if (f) {
                                        var p = n.nsSeparator || this.options.nsSeparator;
                                        return l + p + s;
                                    }
                                    return s;
                                }
                                var g = this.resolve(e, n),
                                    h = g && g.res,
                                    d = (g && g.usedKey) || s,
                                    v = (g && g.exactUsedKey) || s,
                                    y = Object.prototype.toString.apply(h),
                                    m = void 0 !== n.joinArrays ? n.joinArrays : this.options.joinArrays,
                                    b = !this.i18nFormat || this.i18nFormat.handleAsObject;
                                if (
                                    b &&
                                    h &&
                                    "string" != typeof h &&
                                    "boolean" != typeof h &&
                                    "number" != typeof h &&
                                    ["[object Number]", "[object Function]", "[object RegExp]"].indexOf(y) < 0 &&
                                    ("string" != typeof m || "[object Array]" !== y)
                                ) {
                                    if (!n.returnObjects && !this.options.returnObjects)
                                        return (
                                            this.logger.warn("accessing an object - but returnObjects options is not enabled!"),
                                                this.options.returnedObjectHandler ? this.options.returnedObjectHandler(d, h, n) : "key '".concat(s, " (").concat(this.language, ")' returned an object instead of string.")
                                        );
                                    if (i) {
                                        var k = "[object Array]" === y,
                                            x = k ? [] : {},
                                            S = k ? v : d;
                                        for (var w in h)
                                            if (Object.prototype.hasOwnProperty.call(h, w)) {
                                                var O = "".concat(S).concat(i).concat(w);
                                                (x[w] = this.translate(O, r({}, n, { joinArrays: !1, ns: u }))), x[w] === O && (x[w] = h[w]);
                                            }
                                        h = x;
                                    }
                                } else if (b && "string" == typeof m && "[object Array]" === y) (h = h.join(m)) && (h = this.extendTranslation(h, e, n));
                                else {
                                    var R = !1,
                                        j = !1;
                                    if (!this.isValidLookup(h) && void 0 !== n.defaultValue) {
                                        if (((R = !0), void 0 !== n.count)) {
                                            var L = this.pluralResolver.getSuffix(c, n.count);
                                            h = n["defaultValue".concat(L)];
                                        }
                                        h || (h = n.defaultValue);
                                    }
                                    this.isValidLookup(h) || ((j = !0), (h = s));
                                    var N = n.defaultValue && n.defaultValue !== h && this.options.updateMissing;
                                    if (j || R || N) {
                                        this.logger.log(N ? "updateKey" : "missingKey", c, l, s, N ? n.defaultValue : h);
                                        var C = [],
                                            E = this.languageUtils.getFallbackCodes(this.options.fallbackLng, n.lng || this.language);
                                        if ("fallback" === this.options.saveMissingTo && E && E[0]) for (var P = 0; P < E.length; P++) C.push(E[P]);
                                        else "all" === this.options.saveMissingTo ? (C = this.languageUtils.toResolveHierarchy(n.lng || this.language)) : C.push(n.lng || this.language);
                                        var F = function (e, t) {
                                            o.options.missingKeyHandler
                                                ? o.options.missingKeyHandler(e, l, t, N ? n.defaultValue : h, N, n)
                                                : o.backendConnector && o.backendConnector.saveMissing && o.backendConnector.saveMissing(e, l, t, N ? n.defaultValue : h, N, n),
                                                o.emit("missingKey", e, l, t, h);
                                        };
                                        if (this.options.saveMissing) {
                                            var A = void 0 !== n.count && "string" != typeof n.count;
                                            this.options.saveMissingPlurals && A
                                                ? C.forEach(function (e) {
                                                    o.pluralResolver.getPluralFormsOfKey(e, s).forEach(function (t) {
                                                        return F([e], t);
                                                    });
                                                })
                                                : F(C, s);
                                        }
                                    }
                                    (h = this.extendTranslation(h, e, n, g)),
                                    j && h === s && this.options.appendNamespaceToMissingKey && (h = "".concat(l, ":").concat(s)),
                                    j && this.options.parseMissingKeyHandler && (h = this.options.parseMissingKeyHandler(h));
                                }
                                return h;
                            },
                        },
                        {
                            key: "extendTranslation",
                            value: function (e, t, n, o) {
                                var i = this;
                                if (this.i18nFormat && this.i18nFormat.parse) e = this.i18nFormat.parse(e, n, o.usedLng, o.usedNS, o.usedKey, { resolved: o });
                                else if (!n.skipInterpolation) {
                                    n.interpolation && this.interpolator.init(r({}, n, { interpolation: r({}, this.options.interpolation, n.interpolation) }));
                                    var a = n.replace && "string" != typeof n.replace ? n.replace : n;
                                    this.options.interpolation.defaultVariables && (a = r({}, this.options.interpolation.defaultVariables, a)),
                                        (e = this.interpolator.interpolate(e, a, n.lng || this.language, n)),
                                    !1 !== n.nest &&
                                    (e = this.interpolator.nest(
                                        e,
                                        function () {
                                            return i.translate.apply(i, arguments);
                                        },
                                        n
                                    )),
                                    n.interpolation && this.interpolator.reset();
                                }
                                var s = n.postProcess || this.options.postProcess,
                                    u = "string" == typeof s ? [s] : s;
                                return null != e && u && u.length && !1 !== n.applyPostProcessor && (e = R.handle(u, e, t, n, this)), e;
                            },
                        },
                        {
                            key: "resolve",
                            value: function (e) {
                                var t,
                                    n,
                                    r,
                                    o,
                                    i,
                                    a = this,
                                    s = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                                return (
                                    "string" == typeof e && (e = [e]),
                                        e.forEach(function (e) {
                                            if (!a.isValidLookup(t)) {
                                                var u = a.extractFromKey(e, s),
                                                    l = u.key;
                                                n = l;
                                                var c = u.namespaces;
                                                a.options.fallbackNS && (c = c.concat(a.options.fallbackNS));
                                                var f = void 0 !== s.count && "string" != typeof s.count,
                                                    p = void 0 !== s.context && "string" == typeof s.context && "" !== s.context,
                                                    g = s.lngs ? s.lngs : a.languageUtils.toResolveHierarchy(s.lng || a.language, s.fallbackLng);
                                                c.forEach(function (e) {
                                                    a.isValidLookup(t) ||
                                                    ((i = e),
                                                        g.forEach(function (n) {
                                                            if (!a.isValidLookup(t)) {
                                                                o = n;
                                                                var i,
                                                                    u,
                                                                    c = l,
                                                                    g = [c];
                                                                if (a.i18nFormat && a.i18nFormat.addLookupKeys) a.i18nFormat.addLookupKeys(g, l, n, e, s);
                                                                else f && (i = a.pluralResolver.getSuffix(n, s.count)), f && p && g.push(c + i), p && g.push((c += "".concat(a.options.contextSeparator).concat(s.context))), f && g.push((c += i));
                                                                for (; (u = g.pop()); ) a.isValidLookup(t) || ((r = u), (t = a.getResource(n, e, u, s)));
                                                            }
                                                        }));
                                                });
                                            }
                                        }),
                                        { res: t, usedKey: n, exactUsedKey: r, usedLng: o, usedNS: i }
                                );
                            },
                        },
                        {
                            key: "isValidLookup",
                            value: function (e) {
                                return !(void 0 === e || (!this.options.returnNull && null === e) || (!this.options.returnEmptyString && "" === e));
                            },
                        },
                        {
                            key: "getResource",
                            value: function (e, t, n) {
                                var r = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : {};
                                return this.i18nFormat && this.i18nFormat.getResource ? this.i18nFormat.getResource(e, t, n, r) : this.resourceStore.getResource(e, t, n, r);
                            },
                        },
                    ]),
                    n
            );
        })();
    function L(e) {
        return e.charAt(0).toUpperCase() + e.slice(1);
    }
    var N = (function () {
            function e(t) {
                o(this, e), (this.options = t), (this.whitelist = this.options.whitelist || !1), (this.logger = h.create("languageUtils"));
            }
            return (
                a(e, [
                    {
                        key: "getScriptPartFromCode",
                        value: function (e) {
                            if (!e || e.indexOf("-") < 0) return null;
                            var t = e.split("-");
                            return 2 === t.length ? null : (t.pop(), this.formatLanguageCode(t.join("-")));
                        },
                    },
                    {
                        key: "getLanguagePartFromCode",
                        value: function (e) {
                            if (!e || e.indexOf("-") < 0) return e;
                            var t = e.split("-");
                            return this.formatLanguageCode(t[0]);
                        },
                    },
                    {
                        key: "formatLanguageCode",
                        value: function (e) {
                            if ("string" == typeof e && e.indexOf("-") > -1) {
                                var t = ["hans", "hant", "latn", "cyrl", "cans", "mong", "arab"],
                                    n = e.split("-");
                                return (
                                    this.options.lowerCaseLng
                                        ? (n = n.map(function (e) {
                                            return e.toLowerCase();
                                        }))
                                        : 2 === n.length
                                            ? ((n[0] = n[0].toLowerCase()), (n[1] = n[1].toUpperCase()), t.indexOf(n[1].toLowerCase()) > -1 && (n[1] = L(n[1].toLowerCase())))
                                            : 3 === n.length &&
                                            ((n[0] = n[0].toLowerCase()),
                                            2 === n[1].length && (n[1] = n[1].toUpperCase()),
                                            "sgn" !== n[0] && 2 === n[2].length && (n[2] = n[2].toUpperCase()),
                                            t.indexOf(n[1].toLowerCase()) > -1 && (n[1] = L(n[1].toLowerCase())),
                                            t.indexOf(n[2].toLowerCase()) > -1 && (n[2] = L(n[2].toLowerCase()))),
                                        n.join("-")
                                );
                            }
                            return this.options.cleanCode || this.options.lowerCaseLng ? e.toLowerCase() : e;
                        },
                    },
                    {
                        key: "isWhitelisted",
                        value: function (e) {
                            return ("languageOnly" === this.options.load || this.options.nonExplicitWhitelist) && (e = this.getLanguagePartFromCode(e)), !this.whitelist || !this.whitelist.length || this.whitelist.indexOf(e) > -1;
                        },
                    },
                    {
                        key: "getFallbackCodes",
                        value: function (e, t) {
                            if (!e) return [];
                            if (("string" == typeof e && (e = [e]), "[object Array]" === Object.prototype.toString.apply(e))) return e;
                            if (!t) return e.default || [];
                            var n = e[t];
                            return n || (n = e[this.getScriptPartFromCode(t)]), n || (n = e[this.formatLanguageCode(t)]), n || (n = e.default), n || [];
                        },
                    },
                    {
                        key: "toResolveHierarchy",
                        value: function (e, t) {
                            var n = this,
                                r = this.getFallbackCodes(t || this.options.fallbackLng || [], e),
                                o = [],
                                i = function (e) {
                                    e && (n.isWhitelisted(e) ? o.push(e) : n.logger.warn("rejecting non-whitelisted language code: ".concat(e)));
                                };
                            return (
                                "string" == typeof e && e.indexOf("-") > -1
                                    ? ("languageOnly" !== this.options.load && i(this.formatLanguageCode(e)),
                                    "languageOnly" !== this.options.load && "currentOnly" !== this.options.load && i(this.getScriptPartFromCode(e)),
                                    "currentOnly" !== this.options.load && i(this.getLanguagePartFromCode(e)))
                                    : "string" == typeof e && i(this.formatLanguageCode(e)),
                                    r.forEach(function (e) {
                                        o.indexOf(e) < 0 && i(n.formatLanguageCode(e));
                                    }),
                                    o
                            );
                        },
                    },
                ]),
                    e
            );
        })(),
        C = [
            { lngs: ["ach", "ak", "am", "arn", "br", "fil", "gun", "ln", "mfe", "mg", "mi", "oc", "pt", "pt-BR", "tg", "ti", "tr", "uz", "wa"], nr: [1, 2], fc: 1 },
            {
                lngs: [
                    "af",
                    "an",
                    "ast",
                    "az",
                    "bg",
                    "bn",
                    "ca",
                    "da",
                    "de",
                    "dev",
                    "el",
                    "en",
                    "eo",
                    "es",
                    "et",
                    "eu",
                    "fi",
                    "fo",
                    "fur",
                    "fy",
                    "gl",
                    "gu",
                    "ha",
                    "hi",
                    "hu",
                    "hy",
                    "ia",
                    "it",
                    "kn",
                    "ku",
                    "lb",
                    "mai",
                    "ml",
                    "mn",
                    "mr",
                    "nah",
                    "nap",
                    "nb",
                    "ne",
                    "nl",
                    "nn",
                    "no",
                    "nso",
                    "pa",
                    "pap",
                    "pms",
                    "ps",
                    "pt-PT",
                    "rm",
                    "sco",
                    "se",
                    "si",
                    "so",
                    "son",
                    "sq",
                    "sv",
                    "sw",
                    "ta",
                    "te",
                    "tk",
                    "ur",
                    "yo",
                ],
                nr: [1, 2],
                fc: 2,
            },
            { lngs: ["ay", "bo", "cgg", "fa", "id", "ja", "jbo", "ka", "kk", "km", "ko", "ky", "lo", "ms", "sah", "su", "th", "tt", "ug", "vi", "wo", "zh"], nr: [1], fc: 3 },
            { lngs: ["be", "bs", "cnr", "dz", "hr", "ru", "sr", "uk"], nr: [1, 2, 5], fc: 4 },
            { lngs: ["ar"], nr: [0, 1, 2, 3, 11, 100], fc: 5 },
            { lngs: ["cs", "sk"], nr: [1, 2, 5], fc: 6 },
            { lngs: ["csb", "pl"], nr: [1, 2, 5], fc: 7 },
            { lngs: ["cy"], nr: [1, 2, 3, 8], fc: 8 },
            { lngs: ["fr"], nr: [1, 2], fc: 9 },
            { lngs: ["ga"], nr: [1, 2, 3, 7, 11], fc: 10 },
            { lngs: ["gd"], nr: [1, 2, 3, 20], fc: 11 },
            { lngs: ["is"], nr: [1, 2], fc: 12 },
            { lngs: ["jv"], nr: [0, 1], fc: 13 },
            { lngs: ["kw"], nr: [1, 2, 3, 4], fc: 14 },
            { lngs: ["lt"], nr: [1, 2, 10], fc: 15 },
            { lngs: ["lv"], nr: [1, 2, 0], fc: 16 },
            { lngs: ["mk"], nr: [1, 2], fc: 17 },
            { lngs: ["mnk"], nr: [0, 1, 2], fc: 18 },
            { lngs: ["mt"], nr: [1, 2, 11, 20], fc: 19 },
            { lngs: ["or"], nr: [2, 1], fc: 2 },
            { lngs: ["ro"], nr: [1, 2, 20], fc: 20 },
            { lngs: ["sl"], nr: [5, 1, 2, 3], fc: 21 },
            { lngs: ["he"], nr: [1, 2, 20, 21], fc: 22 },
        ],
        E = {
            1: function (e) {
                return Number(e > 1);
            },
            2: function (e) {
                return Number(1 != e);
            },
            3: function (e) {
                return 0;
            },
            4: function (e) {
                return Number(e % 10 == 1 && e % 100 != 11 ? 0 : e % 10 >= 2 && e % 10 <= 4 && (e % 100 < 10 || e % 100 >= 20) ? 1 : 2);
            },
            5: function (e) {
                return Number(0 === e ? 0 : 1 == e ? 1 : 2 == e ? 2 : e % 100 >= 3 && e % 100 <= 10 ? 3 : e % 100 >= 11 ? 4 : 5);
            },
            6: function (e) {
                return Number(1 == e ? 0 : e >= 2 && e <= 4 ? 1 : 2);
            },
            7: function (e) {
                return Number(1 == e ? 0 : e % 10 >= 2 && e % 10 <= 4 && (e % 100 < 10 || e % 100 >= 20) ? 1 : 2);
            },
            8: function (e) {
                return Number(1 == e ? 0 : 2 == e ? 1 : 8 != e && 11 != e ? 2 : 3);
            },
            9: function (e) {
                return Number(e >= 2);
            },
            10: function (e) {
                return Number(1 == e ? 0 : 2 == e ? 1 : e < 7 ? 2 : e < 11 ? 3 : 4);
            },
            11: function (e) {
                return Number(1 == e || 11 == e ? 0 : 2 == e || 12 == e ? 1 : e > 2 && e < 20 ? 2 : 3);
            },
            12: function (e) {
                return Number(e % 10 != 1 || e % 100 == 11);
            },
            13: function (e) {
                return Number(0 !== e);
            },
            14: function (e) {
                return Number(1 == e ? 0 : 2 == e ? 1 : 3 == e ? 2 : 3);
            },
            15: function (e) {
                return Number(e % 10 == 1 && e % 100 != 11 ? 0 : e % 10 >= 2 && (e % 100 < 10 || e % 100 >= 20) ? 1 : 2);
            },
            16: function (e) {
                return Number(e % 10 == 1 && e % 100 != 11 ? 0 : 0 !== e ? 1 : 2);
            },
            17: function (e) {
                return Number(1 == e || e % 10 == 1 ? 0 : 1);
            },
            18: function (e) {
                return Number(0 == e ? 0 : 1 == e ? 1 : 2);
            },
            19: function (e) {
                return Number(1 == e ? 0 : 0 === e || (e % 100 > 1 && e % 100 < 11) ? 1 : e % 100 > 10 && e % 100 < 20 ? 2 : 3);
            },
            20: function (e) {
                return Number(1 == e ? 0 : 0 === e || (e % 100 > 0 && e % 100 < 20) ? 1 : 2);
            },
            21: function (e) {
                return Number(e % 100 == 1 ? 1 : e % 100 == 2 ? 2 : e % 100 == 3 || e % 100 == 4 ? 3 : 0);
            },
            22: function (e) {
                return Number(1 === e ? 0 : 2 === e ? 1 : (e < 0 || e > 10) && e % 10 == 0 ? 2 : 3);
            },
        };
    var P = (function () {
            function e(t) {
                var n,
                    r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                o(this, e),
                    (this.languageUtils = t),
                    (this.options = r),
                    (this.logger = h.create("pluralResolver")),
                    (this.rules =
                        ((n = {}),
                            C.forEach(function (e) {
                                e.lngs.forEach(function (t) {
                                    n[t] = { numbers: e.nr, plurals: E[e.fc] };
                                });
                            }),
                            n));
            }
            return (
                a(e, [
                    {
                        key: "addRule",
                        value: function (e, t) {
                            this.rules[e] = t;
                        },
                    },
                    {
                        key: "getRule",
                        value: function (e) {
                            return this.rules[e] || this.rules[this.languageUtils.getLanguagePartFromCode(e)];
                        },
                    },
                    {
                        key: "needsPlural",
                        value: function (e) {
                            var t = this.getRule(e);
                            return t && t.numbers.length > 1;
                        },
                    },
                    {
                        key: "getPluralFormsOfKey",
                        value: function (e, t) {
                            var n = this,
                                r = [],
                                o = this.getRule(e);
                            return o
                                ? (o.numbers.forEach(function (o) {
                                    var i = n.getSuffix(e, o);
                                    r.push("".concat(t).concat(i));
                                }),
                                    r)
                                : r;
                        },
                    },
                    {
                        key: "getSuffix",
                        value: function (e, t) {
                            var n = this,
                                r = this.getRule(e);
                            if (r) {
                                var o = r.noAbs ? r.plurals(t) : r.plurals(Math.abs(t)),
                                    i = r.numbers[o];
                                this.options.simplifyPluralSuffix && 2 === r.numbers.length && 1 === r.numbers[0] && (2 === i ? (i = "plural") : 1 === i && (i = ""));
                                var a = function () {
                                    return n.options.prepend && i.toString() ? n.options.prepend + i.toString() : i.toString();
                                };
                                return "v1" === this.options.compatibilityJSON
                                    ? 1 === i
                                        ? ""
                                        : "number" == typeof i
                                            ? "_plural_".concat(i.toString())
                                            : a()
                                    : "v2" === this.options.compatibilityJSON
                                        ? a()
                                        : this.options.simplifyPluralSuffix && 2 === r.numbers.length && 1 === r.numbers[0]
                                            ? a()
                                            : this.options.prepend && o.toString()
                                                ? this.options.prepend + o.toString()
                                                : o.toString();
                            }
                            return this.logger.warn("no plural rule found for: ".concat(e)), "";
                        },
                    },
                ]),
                    e
            );
        })(),
        F = (function () {
            function e() {
                var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                o(this, e),
                    (this.logger = h.create("interpolator")),
                    (this.options = t),
                    (this.format =
                        (t.interpolation && t.interpolation.format) ||
                        function (e) {
                            return e;
                        }),
                    this.init(t);
            }
            return (
                a(e, [
                    {
                        key: "init",
                        value: function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                            e.interpolation || (e.interpolation = { escapeValue: !0 });
                            var t = e.interpolation;
                            (this.escape = void 0 !== t.escape ? t.escape : w),
                                (this.escapeValue = void 0 === t.escapeValue || t.escapeValue),
                                (this.useRawValueToEscape = void 0 !== t.useRawValueToEscape && t.useRawValueToEscape),
                                (this.prefix = t.prefix ? x(t.prefix) : t.prefixEscaped || "{{"),
                                (this.suffix = t.suffix ? x(t.suffix) : t.suffixEscaped || "}}"),
                                (this.formatSeparator = t.formatSeparator ? t.formatSeparator : t.formatSeparator || ","),
                                (this.unescapePrefix = t.unescapeSuffix ? "" : t.unescapePrefix || "-"),
                                (this.unescapeSuffix = this.unescapePrefix ? "" : t.unescapeSuffix || ""),
                                (this.nestingPrefix = t.nestingPrefix ? x(t.nestingPrefix) : t.nestingPrefixEscaped || x("$t(")),
                                (this.nestingSuffix = t.nestingSuffix ? x(t.nestingSuffix) : t.nestingSuffixEscaped || x(")")),
                                (this.maxReplaces = t.maxReplaces ? t.maxReplaces : 1e3),
                                this.resetRegExp();
                        },
                    },
                    {
                        key: "reset",
                        value: function () {
                            this.options && this.init(this.options);
                        },
                    },
                    {
                        key: "resetRegExp",
                        value: function () {
                            var e = "".concat(this.prefix, "(.+?)").concat(this.suffix);
                            this.regexp = new RegExp(e, "g");
                            var t = "".concat(this.prefix).concat(this.unescapePrefix, "(.+?)").concat(this.unescapeSuffix).concat(this.suffix);
                            this.regexpUnescape = new RegExp(t, "g");
                            var n = "".concat(this.nestingPrefix, "(.+?)").concat(this.nestingSuffix);
                            this.nestingRegexp = new RegExp(n, "g");
                        },
                    },
                    {
                        key: "interpolate",
                        value: function (e, t, n, o) {
                            var i,
                                a,
                                s,
                                u = this,
                                l = r({}, (this.options && this.options.interpolation && this.options.interpolation.defaultVariables) || {}, t);
                            function c(e) {
                                return e.replace(/\$/g, "$$$$");
                            }
                            var f = function (e) {
                                if (e.indexOf(u.formatSeparator) < 0) return k(l, e);
                                var t = e.split(u.formatSeparator),
                                    r = t.shift().trim(),
                                    o = t.join(u.formatSeparator).trim();
                                return u.format(k(l, r), o, n);
                            };
                            this.resetRegExp();
                            var p = (o && o.missingInterpolationHandler) || this.options.missingInterpolationHandler;
                            for (s = 0; (i = this.regexpUnescape.exec(e)); ) {
                                if (void 0 === (a = f(i[1].trim())))
                                    if ("function" == typeof p) {
                                        var g = p(e, i, o);
                                        a = "string" == typeof g ? g : "";
                                    } else this.logger.warn("missed to pass in variable ".concat(i[1], " for interpolating ").concat(e)), (a = "");
                                else "string" == typeof a || this.useRawValueToEscape || (a = y(a));
                                if (((e = e.replace(i[0], c(a))), (this.regexpUnescape.lastIndex = 0), ++s >= this.maxReplaces)) break;
                            }
                            for (s = 0; (i = this.regexp.exec(e)); ) {
                                if (void 0 === (a = f(i[1].trim())))
                                    if ("function" == typeof p) {
                                        var h = p(e, i, o);
                                        a = "string" == typeof h ? h : "";
                                    } else this.logger.warn("missed to pass in variable ".concat(i[1], " for interpolating ").concat(e)), (a = "");
                                else "string" == typeof a || this.useRawValueToEscape || (a = y(a));
                                if (((a = this.escapeValue ? c(this.escape(a)) : c(a)), (e = e.replace(i[0], a)), (this.regexp.lastIndex = 0), ++s >= this.maxReplaces)) break;
                            }
                            return e;
                        },
                    },
                    {
                        key: "nest",
                        value: function (e, t) {
                            var n,
                                o,
                                i = r({}, arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {});
                            function a(e, t) {
                                if (e.indexOf(",") < 0) return e;
                                var n = e.split(",");
                                e = n.shift();
                                var o = n.join(",");
                                o = (o = this.interpolate(o, i)).replace(/'/g, '"');
                                try {
                                    (i = JSON.parse(o)), t && (i = r({}, t, i));
                                } catch (t) {
                                    this.logger.error("failed parsing options string in nesting for key ".concat(e), t);
                                }
                                return e;
                            }
                            for (i.applyPostProcessor = !1; (n = this.nestingRegexp.exec(e)); ) {
                                if ((o = t(a.call(this, n[1].trim(), i), i)) && n[0] === e && "string" != typeof o) return o;
                                "string" != typeof o && (o = y(o)), o || (this.logger.warn("missed to resolve ".concat(n[1], " for nesting ").concat(e)), (o = "")), (e = e.replace(n[0], o)), (this.regexp.lastIndex = 0);
                            }
                            return e;
                        },
                    },
                ]),
                    e
            );
        })();
    function A(e, t) {
        return (
            (function (e) {
                if (Array.isArray(e)) return e;
            })(e) ||
            (function (e, t) {
                var n = [],
                    r = !0,
                    o = !1,
                    i = void 0;
                try {
                    for (var a, s = e[Symbol.iterator](); !(r = (a = s.next()).done) && (n.push(a.value), !t || n.length !== t); r = !0);
                } catch (e) {
                    (o = !0), (i = e);
                } finally {
                    try {
                        r || null == s.return || s.return();
                    } finally {
                        if (o) throw i;
                    }
                }
                return n;
            })(e, t) ||
            (function () {
                throw new TypeError("Invalid attempt to destructure non-iterable instance");
            })()
        );
    }
    var T = (function (e) {
        function t(e, n, r) {
            var i,
                a = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : {};
            return (
                o(this, t),
                    (i = u(this, l(t).call(this))),
                    d.call(s(i)),
                    (i.backend = e),
                    (i.store = n),
                    (i.languageUtils = r.languageUtils),
                    (i.options = a),
                    (i.logger = h.create("backendConnector")),
                    (i.state = {}),
                    (i.queue = []),
                i.backend && i.backend.init && i.backend.init(r, a.backend, a),
                    i
            );
        }
        return (
            f(t, d),
                a(t, [
                    {
                        key: "queueLoad",
                        value: function (e, t, n, r) {
                            var o = this,
                                i = [],
                                a = [],
                                s = [],
                                u = [];
                            return (
                                e.forEach(function (e) {
                                    var r = !0;
                                    t.forEach(function (t) {
                                        var s = "".concat(e, "|").concat(t);
                                        !n.reload && o.store.hasResourceBundle(e, t)
                                            ? (o.state[s] = 2)
                                            : o.state[s] < 0 || (1 === o.state[s] ? a.indexOf(s) < 0 && a.push(s) : ((o.state[s] = 1), (r = !1), a.indexOf(s) < 0 && a.push(s), i.indexOf(s) < 0 && i.push(s), u.indexOf(t) < 0 && u.push(t)));
                                    }),
                                    r || s.push(e);
                                }),
                                (i.length || a.length) && this.queue.push({ pending: a, loaded: {}, errors: [], callback: r }),
                                    { toLoad: i, pending: a, toLoadLanguages: s, toLoadNamespaces: u }
                            );
                        },
                    },
                    {
                        key: "loaded",
                        value: function (e, t, n) {
                            var r = A(e.split("|"), 2),
                                o = r[0],
                                i = r[1];
                            t && this.emit("failedLoading", o, i, t), n && this.store.addResourceBundle(o, i, n), (this.state[e] = t ? -1 : 2);
                            var a = {};
                            this.queue.forEach(function (n) {
                                var r, s, u, l, c, f;
                                (r = n.loaded),
                                    (s = i),
                                    (l = m(r, [o], Object)),
                                    (c = l.obj),
                                    (f = l.k),
                                    (c[f] = c[f] || []),
                                u && (c[f] = c[f].concat(s)),
                                u || c[f].push(s),
                                    (function (e, t) {
                                        for (var n = e.indexOf(t); -1 !== n; ) e.splice(n, 1), (n = e.indexOf(t));
                                    })(n.pending, e),
                                t && n.errors.push(t),
                                0 !== n.pending.length ||
                                n.done ||
                                (Object.keys(n.loaded).forEach(function (e) {
                                    a[e] || (a[e] = []),
                                    n.loaded[e].length &&
                                    n.loaded[e].forEach(function (t) {
                                        a[e].indexOf(t) < 0 && a[e].push(t);
                                    });
                                }),
                                    (n.done = !0),
                                    n.errors.length ? n.callback(n.errors) : n.callback());
                            }),
                                this.emit("loaded", a),
                                (this.queue = this.queue.filter(function (e) {
                                    return !e.done;
                                }));
                        },
                    },
                    {
                        key: "read",
                        value: function (e, t, n) {
                            var r = this,
                                o = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : 0,
                                i = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : 250,
                                a = arguments.length > 5 ? arguments[5] : void 0;
                            return e.length
                                ? this.backend[n](e, t, function (s, u) {
                                    s && u && o < 5
                                        ? setTimeout(function () {
                                            r.read.call(r, e, t, n, o + 1, 2 * i, a);
                                        }, i)
                                        : a(s, u);
                                })
                                : a(null, {});
                        },
                    },
                    {
                        key: "prepareLoading",
                        value: function (e, t) {
                            var n = this,
                                r = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {},
                                o = arguments.length > 3 ? arguments[3] : void 0;
                            if (!this.backend) return this.logger.warn("No backend was added via i18next.use. Will not load resources."), o && o();
                            "string" == typeof e && (e = this.languageUtils.toResolveHierarchy(e)), "string" == typeof t && (t = [t]);
                            var i = this.queueLoad(e, t, r, o);
                            if (!i.toLoad.length) return i.pending.length || o(), null;
                            i.toLoad.forEach(function (e) {
                                n.loadOne(e);
                            });
                        },
                    },
                    {
                        key: "load",
                        value: function (e, t, n) {
                            this.prepareLoading(e, t, {}, n);
                        },
                    },
                    {
                        key: "reload",
                        value: function (e, t, n) {
                            this.prepareLoading(e, t, { reload: !0 }, n);
                        },
                    },
                    {
                        key: "loadOne",
                        value: function (e) {
                            var t = this,
                                n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "",
                                r = A(e.split("|"), 2),
                                o = r[0],
                                i = r[1];
                            this.read(o, i, "read", null, null, function (r, a) {
                                r && t.logger.warn("".concat(n, "loading namespace ").concat(i, " for language ").concat(o, " failed"), r),
                                !r && a && t.logger.log("".concat(n, "loaded namespace ").concat(i, " for language ").concat(o), a),
                                    t.loaded(e, r, a);
                            });
                        },
                    },
                    {
                        key: "saveMissing",
                        value: function (e, t, n, o, i) {
                            var a = arguments.length > 5 && void 0 !== arguments[5] ? arguments[5] : {};
                            this.backend && this.backend.create && this.backend.create(e, t, n, o, null, r({}, a, { isUpdate: i })), e && e[0] && this.store.addResource(e[0], t, n, o);
                        },
                    },
                ]),
                t
        );
    })();
    function V(e) {
        return (
            "string" == typeof e.ns && (e.ns = [e.ns]),
            "string" == typeof e.fallbackLng && (e.fallbackLng = [e.fallbackLng]),
            "string" == typeof e.fallbackNS && (e.fallbackNS = [e.fallbackNS]),
            e.whitelist && e.whitelist.indexOf("cimode") < 0 && (e.whitelist = e.whitelist.concat(["cimode"])),
                e
        );
    }
    function U() {}
    return new ((function (e) {
        function n() {
            var e,
                t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                r = arguments.length > 1 ? arguments[1] : void 0;
            if ((o(this, n), (e = u(this, l(n).call(this))), d.call(s(e)), (e.options = V(t)), (e.services = {}), (e.logger = h), (e.modules = { external: [] }), r && !e.isInitialized && !t.isClone)) {
                if (!e.options.initImmediate) return e.init(t, r), u(e, s(e));
                setTimeout(function () {
                    e.init(t, r);
                }, 0);
            }
            return e;
        }
        return (
            f(n, d),
                a(n, [
                    {
                        key: "init",
                        value: function () {
                            var e = this,
                                n = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                o = arguments.length > 1 ? arguments[1] : void 0;
                            function i(e) {
                                return e ? ("function" == typeof e ? new e() : e) : null;
                            }
                            if (
                                ("function" == typeof n && ((o = n), (n = {})),
                                    (this.options = r(
                                        {},
                                        {
                                            debug: !1,
                                            initImmediate: !0,
                                            ns: ["translation"],
                                            defaultNS: ["translation"],
                                            fallbackLng: ["dev"],
                                            fallbackNS: !1,
                                            whitelist: !1,
                                            nonExplicitWhitelist: !1,
                                            load: "all",
                                            preload: !1,
                                            simplifyPluralSuffix: !0,
                                            keySeparator: ".",
                                            nsSeparator: ":",
                                            pluralSeparator: "_",
                                            contextSeparator: "_",
                                            partialBundledLanguages: !1,
                                            saveMissing: !1,
                                            updateMissing: !1,
                                            saveMissingTo: "fallback",
                                            saveMissingPlurals: !0,
                                            missingKeyHandler: !1,
                                            missingInterpolationHandler: !1,
                                            postProcess: !1,
                                            returnNull: !0,
                                            returnEmptyString: !0,
                                            returnObjects: !1,
                                            joinArrays: !1,
                                            returnedObjectHandler: !1,
                                            parseMissingKeyHandler: !1,
                                            appendNamespaceToMissingKey: !1,
                                            appendNamespaceToCIMode: !1,
                                            overloadTranslationOptionHandler: function (e) {
                                                var n = {};
                                                if (("object" === t(e[1]) && (n = e[1]), "string" == typeof e[1] && (n.defaultValue = e[1]), "string" == typeof e[2] && (n.tDescription = e[2]), "object" === t(e[2]) || "object" === t(e[3]))) {
                                                    var r = e[3] || e[2];
                                                    Object.keys(r).forEach(function (e) {
                                                        n[e] = r[e];
                                                    });
                                                }
                                                return n;
                                            },
                                            interpolation: {
                                                escapeValue: !0,
                                                format: function (e, t, n) {
                                                    return e;
                                                },
                                                prefix: "{{",
                                                suffix: "}}",
                                                formatSeparator: ",",
                                                unescapePrefix: "-",
                                                nestingPrefix: "$t(",
                                                nestingSuffix: ")",
                                                maxReplaces: 1e3,
                                            },
                                        },
                                        this.options,
                                        V(n)
                                    )),
                                    (this.format = this.options.interpolation.format),
                                o || (o = U),
                                    !this.options.isClone)
                            ) {
                                this.modules.logger ? h.init(i(this.modules.logger), this.options) : h.init(null, this.options);
                                var a = new N(this.options);
                                this.store = new O(this.options.resources, this.options);
                                var s = this.services;
                                (s.logger = h),
                                    (s.resourceStore = this.store),
                                    (s.languageUtils = a),
                                    (s.pluralResolver = new P(a, { prepend: this.options.pluralSeparator, compatibilityJSON: this.options.compatibilityJSON, simplifyPluralSuffix: this.options.simplifyPluralSuffix })),
                                    (s.interpolator = new F(this.options)),
                                    (s.backendConnector = new T(i(this.modules.backend), s.resourceStore, s, this.options)),
                                    s.backendConnector.on("*", function (t) {
                                        for (var n = arguments.length, r = new Array(n > 1 ? n - 1 : 0), o = 1; o < n; o++) r[o - 1] = arguments[o];
                                        e.emit.apply(e, [t].concat(r));
                                    }),
                                this.modules.languageDetector && ((s.languageDetector = i(this.modules.languageDetector)), s.languageDetector.init(s, this.options.detection, this.options)),
                                this.modules.i18nFormat && ((s.i18nFormat = i(this.modules.i18nFormat)), s.i18nFormat.init && s.i18nFormat.init(this)),
                                    (this.translator = new j(this.services, this.options)),
                                    this.translator.on("*", function (t) {
                                        for (var n = arguments.length, r = new Array(n > 1 ? n - 1 : 0), o = 1; o < n; o++) r[o - 1] = arguments[o];
                                        e.emit.apply(e, [t].concat(r));
                                    }),
                                    this.modules.external.forEach(function (t) {
                                        t.init && t.init(e);
                                    });
                            }
                            ["getResource", "addResource", "addResources", "addResourceBundle", "removeResourceBundle", "hasResourceBundle", "getResourceBundle", "getDataByLanguage"].forEach(function (t) {
                                e[t] = function () {
                                    var n;
                                    return (n = e.store)[t].apply(n, arguments);
                                };
                            });
                            var u = v(),
                                l = function () {
                                    e.changeLanguage(e.options.lng, function (t, n) {
                                        (e.isInitialized = !0), e.logger.log("initialized", e.options), e.emit("initialized", e.options), u.resolve(n), o(t, n);
                                    });
                                };
                            return this.options.resources || !this.options.initImmediate ? l() : setTimeout(l, 0), u;
                        },
                    },
                    {
                        key: "loadResources",
                        value: function () {
                            var e = this,
                                t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : U;
                            if (!this.options.resources || this.options.partialBundledLanguages) {
                                if (this.language && "cimode" === this.language.toLowerCase()) return t();
                                var n = [],
                                    r = function (t) {
                                        t &&
                                        e.services.languageUtils.toResolveHierarchy(t).forEach(function (e) {
                                            n.indexOf(e) < 0 && n.push(e);
                                        });
                                    };
                                if (this.language) r(this.language);
                                else
                                    this.services.languageUtils.getFallbackCodes(this.options.fallbackLng).forEach(function (e) {
                                        return r(e);
                                    });
                                this.options.preload &&
                                this.options.preload.forEach(function (e) {
                                    return r(e);
                                }),
                                    this.services.backendConnector.load(n, this.options.ns, t);
                            } else t(null);
                        },
                    },
                    {
                        key: "reloadResources",
                        value: function (e, t, n) {
                            var r = v();
                            return (
                                e || (e = this.languages),
                                t || (t = this.options.ns),
                                n || (n = U),
                                    this.services.backendConnector.reload(e, t, function (e) {
                                        r.resolve(), n(e);
                                    }),
                                    r
                            );
                        },
                    },
                    {
                        key: "use",
                        value: function (e) {
                            return (
                                "backend" === e.type && (this.modules.backend = e),
                                ("logger" === e.type || (e.log && e.warn && e.error)) && (this.modules.logger = e),
                                "languageDetector" === e.type && (this.modules.languageDetector = e),
                                "i18nFormat" === e.type && (this.modules.i18nFormat = e),
                                "postProcessor" === e.type && R.addPostProcessor(e),
                                "3rdParty" === e.type && this.modules.external.push(e),
                                    this
                            );
                        },
                    },
                    {
                        key: "changeLanguage",
                        value: function (e, t) {
                            var n = this,
                                r = v();
                            this.emit("languageChanging", e);
                            var o = function (e) {
                                e &&
                                ((n.language = e),
                                    (n.languages = n.services.languageUtils.toResolveHierarchy(e)),
                                n.translator.language || n.translator.changeLanguage(e),
                                n.services.languageDetector && n.services.languageDetector.cacheUserLanguage(e)),
                                    n.loadResources(function (o) {
                                        !(function (e, o) {
                                            n.translator.changeLanguage(o),
                                            o && (n.emit("languageChanged", o), n.logger.log("languageChanged", o)),
                                                r.resolve(function () {
                                                    return n.t.apply(n, arguments);
                                                }),
                                            t &&
                                            t(e, function () {
                                                return n.t.apply(n, arguments);
                                            });
                                        })(o, e);
                                    });
                            };
                            return (
                                e || !this.services.languageDetector || this.services.languageDetector.async
                                    ? !e && this.services.languageDetector && this.services.languageDetector.async
                                        ? this.services.languageDetector.detect(o)
                                        : o(e)
                                    : o(this.services.languageDetector.detect()),
                                    r
                            );
                        },
                    },
                    {
                        key: "getFixedT",
                        value: function (e, n) {
                            var o = this,
                                i = function e(n, i) {
                                    var a;
                                    if ("object" !== t(i)) {
                                        for (var s = arguments.length, u = new Array(s > 2 ? s - 2 : 0), l = 2; l < s; l++) u[l - 2] = arguments[l];
                                        a = o.options.overloadTranslationOptionHandler([n, i].concat(u));
                                    } else a = r({}, i);
                                    return (a.lng = a.lng || e.lng), (a.lngs = a.lngs || e.lngs), (a.ns = a.ns || e.ns), o.t(n, a);
                                };
                            return "string" == typeof e ? (i.lng = e) : (i.lngs = e), (i.ns = n), i;
                        },
                    },
                    {
                        key: "t",
                        value: function () {
                            var e;
                            return this.translator && (e = this.translator).translate.apply(e, arguments);
                        },
                    },
                    {
                        key: "exists",
                        value: function () {
                            var e;
                            return this.translator && (e = this.translator).exists.apply(e, arguments);
                        },
                    },
                    {
                        key: "setDefaultNamespace",
                        value: function (e) {
                            this.options.defaultNS = e;
                        },
                    },
                    {
                        key: "loadNamespaces",
                        value: function (e, t) {
                            var n = this,
                                r = v();
                            return this.options.ns
                                ? ("string" == typeof e && (e = [e]),
                                    e.forEach(function (e) {
                                        n.options.ns.indexOf(e) < 0 && n.options.ns.push(e);
                                    }),
                                    this.loadResources(function (e) {
                                        r.resolve(), t && t(e);
                                    }),
                                    r)
                                : (t && t(), Promise.resolve());
                        },
                    },
                    {
                        key: "loadLanguages",
                        value: function (e, t) {
                            var n = v();
                            "string" == typeof e && (e = [e]);
                            var r = this.options.preload || [],
                                o = e.filter(function (e) {
                                    return r.indexOf(e) < 0;
                                });
                            return o.length
                                ? ((this.options.preload = r.concat(o)),
                                    this.loadResources(function (e) {
                                        n.resolve(), t && t(e);
                                    }),
                                    n)
                                : (t && t(), Promise.resolve());
                        },
                    },
                    {
                        key: "dir",
                        value: function (e) {
                            if ((e || (e = this.languages && this.languages.length > 0 ? this.languages[0] : this.language), !e)) return "rtl";
                            return [
                                "ar",
                                "shu",
                                "sqr",
                                "ssh",
                                "xaa",
                                "yhd",
                                "yud",
                                "aao",
                                "abh",
                                "abv",
                                "acm",
                                "acq",
                                "acw",
                                "acx",
                                "acy",
                                "adf",
                                "ads",
                                "aeb",
                                "aec",
                                "afb",
                                "ajp",
                                "apc",
                                "apd",
                                "arb",
                                "arq",
                                "ars",
                                "ary",
                                "arz",
                                "auz",
                                "avl",
                                "ayh",
                                "ayl",
                                "ayn",
                                "ayp",
                                "bbz",
                                "pga",
                                "he",
                                "iw",
                                "ps",
                                "pbt",
                                "pbu",
                                "pst",
                                "prp",
                                "prd",
                                "ur",
                                "ydd",
                                "yds",
                                "yih",
                                "ji",
                                "yi",
                                "hbo",
                                "men",
                                "xmn",
                                "fa",
                                "jpr",
                                "peo",
                                "pes",
                                "prs",
                                "dv",
                                "sam",
                            ].indexOf(this.services.languageUtils.getLanguagePartFromCode(e)) >= 0
                                ? "rtl"
                                : "ltr";
                        },
                    },
                    {
                        key: "createInstance",
                        value: function () {
                            return new n(arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}, arguments.length > 1 ? arguments[1] : void 0);
                        },
                    },
                    {
                        key: "cloneInstance",
                        value: function () {
                            var e = this,
                                t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                o = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : U,
                                i = r({}, this.options, t, { isClone: !0 }),
                                a = new n(i);
                            return (
                                ["store", "services", "language"].forEach(function (t) {
                                    a[t] = e[t];
                                }),
                                    (a.translator = new j(a.services, a.options)),
                                    a.translator.on("*", function (e) {
                                        for (var t = arguments.length, n = new Array(t > 1 ? t - 1 : 0), r = 1; r < t; r++) n[r - 1] = arguments[r];
                                        a.emit.apply(a, [e].concat(n));
                                    }),
                                    a.init(i, o),
                                    (a.translator.options = a.options),
                                    a
                            );
                        },
                    },
                ]),
                n
        );
    })())();
});

// i18next-xhr-backend
!(function (t, e) {
    "object" == typeof exports && "undefined" != typeof module ? (module.exports = e()) : "function" == typeof define && define.amd ? define(e) : ((t = t || self).i18nextXHRBackend = e());
})(this, function () {
    "use strict";
    function t(t, e) {
        for (var n = 0; n < e.length; n++) {
            var o = e[n];
            (o.enumerable = o.enumerable || !1), (o.configurable = !0), "value" in o && (o.writable = !0), Object.defineProperty(t, o.key, o);
        }
    }
    var e = [],
        n = e.forEach,
        o = e.slice;
    function i(t) {
        return (
            n.call(o.call(arguments, 1), function (e) {
                if (e) for (var n in e) void 0 === t[n] && (t[n] = e[n]);
            }),
                t
        );
    }
    function r(t) {
        return (r =
            "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
                ? function (t) {
                    return typeof t;
                }
                : function (t) {
                    return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t;
                })(t);
    }
    function a(t) {
        return (a =
            "function" == typeof Symbol && "symbol" === r(Symbol.iterator)
                ? function (t) {
                    return r(t);
                }
                : function (t) {
                    return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : r(t);
                })(t);
    }
    function s(t, e) {
        if (e && "object" === a(e)) {
            var n = "",
                o = encodeURIComponent;
            for (var i in e) n += "&" + o(i) + "=" + o(e[i]);
            if (!n) return t;
            t = t + (-1 !== t.indexOf("?") ? "&" : "?") + n.slice(1);
        }
        return t;
    }
    function l(t, e, n, o, i) {
        o && "object" === a(o) && (i || (o._t = new Date()), (o = s("", o).slice(1))), e.queryStringParams && (t = s(t, e.queryStringParams));
        try {
            var r;
            (r = XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("MSXML2.XMLHTTP.3.0")).open(o ? "POST" : "GET", t, 1),
            e.crossDomain || r.setRequestHeader("X-Requested-With", "XMLHttpRequest"),
                (r.withCredentials = !!e.withCredentials),
            o && r.setRequestHeader("Content-type", "application/x-www-form-urlencoded"),
            r.overrideMimeType && r.overrideMimeType("application/json");
            var l = e.customHeaders;
            if ((l = "function" == typeof l ? l() : l)) for (var u in l) r.setRequestHeader(u, l[u]);
            (r.onreadystatechange = function () {
                r.readyState > 3 && n && n(r.responseText, r);
            }),
                r.send(o);
        } catch (t) {
            console && console.log(t);
        }
    }
    function u() {
        return {
            loadPath: "/locales/{{lng}}/{{ns}}.json",
            addPath: "/locales/add/{{lng}}/{{ns}}",
            allowMultiLoading: !1,
            parse: JSON.parse,
            parsePayload: function (t, e, n) {
                return (function (t, e, n) {
                    return e in t ? Object.defineProperty(t, e, { value: n, enumerable: !0, configurable: !0, writable: !0 }) : (t[e] = n), t;
                })({}, e, n || "");
            },
            crossDomain: !1,
            ajax: l,
        };
    }
    var c = (function () {
        function e(t) {
            var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
            !(function (t, e) {
                if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function");
            })(this, e),
                this.init(t, n),
                (this.type = "backend");
        }
        var n, o, r;
        return (
            (n = e),
            (o = [
                {
                    key: "init",
                    value: function (t) {
                        var e = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                        (this.services = t), (this.options = i(e, this.options || {}, u()));
                    },
                },
                {
                    key: "readMulti",
                    value: function (t, e, n) {
                        var o = this.options.loadPath;
                        "function" == typeof this.options.loadPath && (o = this.options.loadPath(t, e));
                        var i = this.services.interpolator.interpolate(o, { lng: t.join("+"), ns: e.join("+") });
                        this.loadUrl(i, n);
                    },
                },
                {
                    key: "read",
                    value: function (t, e, n) {
                        var o = this.options.loadPath;
                        "function" == typeof this.options.loadPath && (o = this.options.loadPath([t], [e]));
                        var i = this.services.interpolator.interpolate(o, { lng: t, ns: e });
                        this.loadUrl(i, n);
                    },
                },
                {
                    key: "loadUrl",
                    value: function (t, e) {
                        var n = this;
                        this.options.ajax(t, this.options, function (o, i) {
                            if (i.status >= 500 && i.status < 600) return e("failed loading " + t, !0);
                            if (i.status >= 400 && i.status < 500) return e("failed loading " + t, !1);
                            var r, a;
                            try {
                                r = n.options.parse(o, t);
                            } catch (e) {
                                a = "failed parsing " + t + " to json";
                            }
                            if (a) return e(a, !1);
                            e(null, r);
                        });
                    },
                },
                {
                    key: "create",
                    value: function (t, e, n, o) {
                        var i = this;
                        "string" == typeof t && (t = [t]);
                        var r = this.options.parsePayload(e, n, o);
                        t.forEach(function (t) {
                            var n = i.services.interpolator.interpolate(i.options.addPath, { lng: t, ns: e });
                            i.options.ajax(n, i.options, function (t, e) {}, r);
                        });
                    },
                },
            ]) && t(n.prototype, o),
            r && t(n, r),
                e
        );
    })();
    return (c.type = "backend"), c;
});

// Language detector i18n
!(function (e, o) {
    "object" == typeof exports && "undefined" != typeof module ? (module.exports = o()) : "function" == typeof define && define.amd ? define(o) : (e.i18nextBrowserLanguageDetector = o());
})(this, function () {
    "use strict";
    function e(e) {
        return (
            a.call(i.call(arguments, 1), function (o) {
                if (o) for (var t in o) void 0 === e[t] && (e[t] = o[t]);
            }),
                e
        );
    }
    function o(e, o) {
        if (!(e instanceof o)) throw new TypeError("Cannot call a class as a function");
    }
    function t() {
        return { order: ["querystring", "cookie", "localStorage", "navigator", "htmlTag"], lookupQuerystring: "lng", lookupCookie: "i18next", lookupLocalStorage: "i18nextLng", caches: ["localStorage"], excludeCacheFor: ["cimode"] };
    }
    var n = [],
        a = n.forEach,
        i = n.slice,
        r = {
            create: function (e, o, t, n) {
                var a = void 0;
                if (t) {
                    var i = new Date();
                    i.setTime(i.getTime() + 60 * t * 1e3), (a = "; expires=" + i.toGMTString());
                } else a = "";
                (n = n ? "domain=" + n + ";" : ""), (document.cookie = e + "=" + o + a + ";" + n + "path=/");
            },
            read: function (e) {
                for (var o = e + "=", t = document.cookie.split(";"), n = 0; n < t.length; n++) {
                    for (var a = t[n]; " " === a.charAt(0); ) a = a.substring(1, a.length);
                    if (0 === a.indexOf(o)) return a.substring(o.length, a.length);
                }
                return null;
            },
            remove: function (e) {
                this.create(e, "", -1);
            },
        },
        u = {
            name: "cookie",
            lookup: function (e) {
                var o = void 0;
                if (e.lookupCookie && "undefined" != typeof document) {
                    var t = r.read(e.lookupCookie);
                    t && (o = t);
                }
                return o;
            },
            cacheUserLanguage: function (e, o) {
                o.lookupCookie && "undefined" != typeof document && r.create(o.lookupCookie, e, o.cookieMinutes, o.cookieDomain);
            },
        },
        c = {
            name: "querystring",
            lookup: function (e) {
                var o = void 0;
                if ("undefined" != typeof window)
                    for (var t = window.location.search.substring(1), n = t.split("&"), a = 0; a < n.length; a++) {
                        var i = n[a].indexOf("=");
                        if (i > 0) {
                            var r = n[a].substring(0, i);
                            r === e.lookupQuerystring && (o = n[a].substring(i + 1));
                        }
                    }
                return o;
            },
        },
        l = void 0;
    try {
        l = "undefined" !== window && null !== window.localStorage;
        window.localStorage.setItem("i18next.translate.boo", "foo"), window.localStorage.removeItem("i18next.translate.boo");
    } catch (e) {
        l = !1;
    }
    var s = {
            name: "localStorage",
            lookup: function (e) {
                var o = void 0;
                if (e.lookupLocalStorage && l) {
                    var t = window.localStorage.getItem(e.lookupLocalStorage);
                    t && (o = t);
                }
                return o;
            },
            cacheUserLanguage: function (e, o) {
                o.lookupLocalStorage && l && window.localStorage.setItem(o.lookupLocalStorage, e);
            },
        },
        d = {
            name: "navigator",
            lookup: function (e) {
                var o = [];
                if ("undefined" != typeof navigator) {
                    if (navigator.languages) for (var t = 0; t < navigator.languages.length; t++) o.push(navigator.languages[t]);
                    navigator.userLanguage && o.push(navigator.userLanguage), navigator.language && o.push(navigator.language);
                }
                return o.length > 0 ? o : void 0;
            },
        },
        f = {
            name: "htmlTag",
            lookup: function (e) {
                var o = void 0,
                    t = e.htmlTag || ("undefined" != typeof document ? document.documentElement : null);
                return t && "function" == typeof t.getAttribute && (o = t.getAttribute("lang")), o;
            },
        },
        g = {
            name: "path",
            lookup: function (e) {
                var o = void 0;
                if ("undefined" != typeof window) {
                    var t = window.location.pathname.match(/\/([a-zA-Z-]*)/g);
                    if (t instanceof Array)
                        if ("number" == typeof e.lookupFromPathIndex) {
                            if ("string" != typeof t[e.lookupFromPathIndex]) return;
                            o = t[e.lookupFromPathIndex].replace("/", "");
                        } else o = t[0].replace("/", "");
                }
                return o;
            },
        },
        p = {
            name: "subdomain",
            lookup: function (e) {
                var o = void 0;
                if ("undefined" != typeof window) {
                    var t = window.location.href.match(/(?:http[s]*\:\/\/)*(.*?)\.(?=[^\/]*\..{2,5})/gi);
                    t instanceof Array &&
                    (o =
                        "number" == typeof e.lookupFromSubdomainIndex
                            ? t[e.lookupFromSubdomainIndex].replace("http://", "").replace("https://", "").replace(".", "")
                            : t[0].replace("http://", "").replace("https://", "").replace(".", ""));
                }
                return o;
            },
        },
        h = (function () {
            function e(e, o) {
                for (var t = 0; t < o.length; t++) {
                    var n = o[t];
                    (n.enumerable = n.enumerable || !1), (n.configurable = !0), "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n);
                }
            }
            return function (o, t, n) {
                return t && e(o.prototype, t), n && e(o, n), o;
            };
        })(),
        v = (function () {
            function n(e) {
                var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                o(this, n), (this.type = "languageDetector"), (this.detectors = {}), this.init(e, t);
            }
            return (
                h(n, [
                    {
                        key: "init",
                        value: function (o) {
                            var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                                a = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {};
                            (this.services = o),
                                (this.options = e(n, this.options || {}, t())),
                            this.options.lookupFromUrlIndex && (this.options.lookupFromPathIndex = this.options.lookupFromUrlIndex),
                                (this.i18nOptions = a),
                                this.addDetector(u),
                                this.addDetector(c),
                                this.addDetector(s),
                                this.addDetector(d),
                                this.addDetector(f),
                                this.addDetector(g),
                                this.addDetector(p);
                        },
                    },
                    {
                        key: "addDetector",
                        value: function (e) {
                            this.detectors[e.name] = e;
                        },
                    },
                    {
                        key: "detect",
                        value: function (e) {
                            var o = this;
                            e || (e = this.options.order);
                            var t = [];
                            e.forEach(function (e) {
                                if (o.detectors[e]) {
                                    var n = o.detectors[e].lookup(o.options);
                                    n && "string" == typeof n && (n = [n]), n && (t = t.concat(n));
                                }
                            });
                            var n = void 0;
                            if (
                                (t.forEach(function (e) {
                                    if (!n) {
                                        var t = o.services.languageUtils.formatLanguageCode(e);
                                        o.services.languageUtils.isWhitelisted(t) && (n = t);
                                    }
                                }),
                                    !n)
                            ) {
                                var a = this.i18nOptions.fallbackLng;
                                "string" == typeof a && (a = [a]), a || (a = []), (n = "[object Array]" === Object.prototype.toString.apply(a) ? a[0] : a[0] || (a.default && a.default[0]));
                            }
                            return n;
                        },
                    },
                    {
                        key: "cacheUserLanguage",
                        value: function (e, o) {
                            var t = this;
                            o || (o = this.options.caches),
                            o &&
                            ((this.options.excludeCacheFor && this.options.excludeCacheFor.indexOf(e) > -1) ||
                                o.forEach(function (o) {
                                    t.detectors[o] && t.detectors[o].cacheUserLanguage(e, t.options);
                                }));
                        },
                    },
                ]),
                    n
            );
        })();
    return (v.type = "languageDetector"), v;
});

// I18n Jquery
!(function (t, e) {
    "object" == typeof exports && "undefined" != typeof module ? (module.exports = e()) : "function" == typeof define && define.amd ? define(e) : (t.jqueryI18next = e());
})(this, function () {
    "use strict";
    function t(t, a) {
        function i(n, a, i) {
            function r(t, n) {
                return f.parseDefaultValueFromContent ? e({}, t, { defaultValue: n }) : t;
            }
            if (0 !== a.length) {
                var o = "text";
                if (0 === a.indexOf("[")) {
                    var l = a.split("]");
                    (a = l[1]), (o = l[0].substr(1, l[0].length - 1));
                }
                if ((a.indexOf(";") === a.length - 1 && (a = a.substr(0, a.length - 2)), "html" === o)) n.html(t.t(a, r(i, n.html())));
                else if ("text" === o) n.text(t.t(a, r(i, n.text())));
                else if ("prepend" === o) n.prepend(t.t(a, r(i, n.html())));
                else if ("append" === o) n.append(t.t(a, r(i, n.html())));
                else if (0 === o.indexOf("data-")) {
                    var s = o.substr("data-".length),
                        d = t.t(a, r(i, n.data(s)));
                    n.data(s, d), n.attr(o, d);
                } else n.attr(o, t.t(a, r(i, n.attr(o))));
            }
        }
        function r(t, n) {
            var r = t.attr(f.selectorAttr);
            if ((r || void 0 === r || !1 === r || (r = t.text() || t.val()), r)) {
                var o = t,
                    l = t.data(f.targetAttr);
                if ((l && (o = t.find(l) || t), n || !0 !== f.useOptionsAttr || (n = t.data(f.optionsAttr)), (n = n || {}), r.indexOf(";") >= 0)) {
                    var s = r.split(";");
                    a.each(s, function (t, e) {
                        "" !== e && i(o, e.trim(), n);
                    });
                } else i(o, r, n);
                if (!0 === f.useOptionsAttr) {
                    var d = {};
                    (d = e({ clone: d }, n)), delete d.lng, t.data(f.optionsAttr, d);
                }
            }
        }
        function o(t) {
            return this.each(function () {
                r(a(this), t),
                    a(this)
                        .find("[" + f.selectorAttr + "]")
                        .each(function () {
                            r(a(this), t);
                        });
            });
        }
        var f = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {};
        (f = e({}, n, f)), (a[f.tName] = t.t.bind(t)), (a[f.i18nName] = t), (a.fn[f.handleName] = o);
    }
    var e =
            Object.assign ||
            function (t) {
                for (var e = 1; e < arguments.length; e++) {
                    var n = arguments[e];
                    for (var a in n) Object.prototype.hasOwnProperty.call(n, a) && (t[a] = n[a]);
                }
                return t;
            },
        n = { tName: "t", i18nName: "i18n", handleName: "localize", selectorAttr: "data-i18n", targetAttr: "i18n-target", optionsAttr: "i18n-options", useOptionsAttr: !1, parseDefaultValueFromContent: !0 };
    return { init: t };
});

//
