var stickyHeader = document.querySelector('.sticky-header');
function widgetSticky() {
    var sh_offsetHeight = stickyHeader.offsetHeight;
    var lastWidget = document.querySelector('.widget-sticky .widget-area .widget:last-child');
    if (null !== lastWidget) {
        document.querySelector('.widget-sticky .widget-area .widget:last-child').style.top = sh_offsetHeight + 50 + "px";
    }
}

if (null !== stickyHeader) {
    stickyHeader.length !== 0 && widgetSticky();
}

// fadein fadeout

function fadeIn(element, duration) {
    element.style.opacity = 0;
    element.style.display = "block";

    (function fade() {
        var val = parseFloat(element.style.opacity);
        if (!((val += 0.1) > 1)) {
            element.style.opacity = val;
            requestAnimationFrame(fade);
        }
    })(duration);
}
function fadeOut(element, duration) {
    element.style.opacity = 1;
    (function fade() {
        if ((element.style.opacity -= 0.1) <= 0) {
            element.style.display = "none";
        } else {
            requestAnimationFrame(fade);
        }
    })(duration);
}

// back to top

const backToTop = document.querySelector('.back-to-top');
if (null !== backToTop) {
    document.addEventListener('scroll', () => {
        window.scrollY > 200
            ? backToTop.classList.add('active')
            : backToTop.classList.remove('active');
    });

    backToTop.addEventListener('click', () => {
        setTimeout(() => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }, 300);

    });
}

// Header Search toggle
const headerSearch = {
    init: function () {
        const searchOpenBtns = document.querySelectorAll('.header-search .search-toggle');
        searchOpenBtns.forEach(searchOpenBtn => {
            searchOpenBtn.addEventListener('click', () => {
                this.showSearch(searchOpenBtn);
            });

        });

        const searchCloseBtns = document.querySelectorAll('.header-search-wrap .header-search-inner .close');
        searchCloseBtns.forEach(searchCloseBtn => {
            searchCloseBtn.addEventListener('click', () => {
                this.closeSearch(searchCloseBtn);
            });
        });

        const searchModels = document.querySelectorAll('.header-search .header-search-wrap');
        searchModels.forEach(searchModel => {
            searchModel.addEventListener('keydown', (e) => {
                if (e.key === "Escape") {
                    fadeOut(searchModel, 600)
                }
            })

        })

        const closeSearchModels = document.querySelectorAll('.header-search .header-search-wrap');
        if (null != closeSearchModels) {
            closeSearchModels.forEach(closeSearchModel => {
                closeSearchModel.addEventListener('click', function (e) {
                    fadeOut(closeSearchModel, 300);
                })
            })
        }

        const stopPropagation = document.querySelectorAll('.header-search .header-search-inner .search-form')
        if (null != stopPropagation) {
            stopPropagation.forEach(searchFormElement => {
                searchFormElement.addEventListener('click', function (e) {
                    e.stopPropagation();
                })
            })

        }
    },
    showSearch: function (searchOpenBtn) {
        const toggle_elem = searchOpenBtn.nextElementSibling;
        fadeIn(toggle_elem, 300);
    },
    closeSearch: function (searchCloseBtn) {
        const toggle_elem = searchCloseBtn.parentNode.closest('.header-search-wrap');
        fadeOut(toggle_elem, 300);
    }
}
headerSearch.init();

// desktop navigation 
const menuItems = document.querySelectorAll('.site-header .menu-item-has-children:not(.mobile-header .menu-item-has-children), .footer-navigation .menu-item-has-children:not(.mobile-header .menu-item-has-children');
if (null !== menuItems) {
    menuItems.forEach(menuItem => {
        const iconAdd = menuItem.querySelector('a');

        const icon = '<span tabindex="-1" class="submenu-toggle-btn"><svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.978478 0.313439C1.15599 0.135928 1.43376 0.11979 1.62951 0.265027L1.68558 0.313439L5.9987 4.62632L10.3118 0.313439C10.4893 0.135928 10.7671 0.11979 10.9628 0.265027L11.0189 0.313439C11.1964 0.49095 11.2126 0.768726 11.0673 0.964466L11.0189 1.02055L6.35225 5.68721C6.17474 5.86472 5.89697 5.88086 5.70122 5.73562L5.64514 5.68721L0.978478 1.02055C0.783216 0.825283 0.783216 0.508701 0.978478 0.313439Z" fill="currentColor"/></svg></span>'
        iconAdd.insertAdjacentHTML("afterend", icon)

    })
}


const mobileMenuItems = document.querySelectorAll('.mobile-header .menu-item-has-children');
if (null !== mobileMenuItems) {
    mobileMenuItems.forEach(mobileMenuItem => {
        const iconAdd = mobileMenuItem.querySelector('a');

        const icon = '<button aria-label="Sub Menu Toggle" class="submenu-toggle-btn"><svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.978478 0.313439C1.15599 0.135928 1.43376 0.11979 1.62951 0.265027L1.68558 0.313439L5.9987 4.62632L10.3118 0.313439C10.4893 0.135928 10.7671 0.11979 10.9628 0.265027L11.0189 0.313439C11.1964 0.49095 11.2126 0.768726 11.0673 0.964466L11.0189 1.02055L6.35225 5.68721C6.17474 5.86472 5.89697 5.88086 5.70122 5.73562L5.64514 5.68721L0.978478 1.02055C0.783216 0.825283 0.783216 0.508701 0.978478 0.313439Z" fill="currentColor"/></svg></button>'
        iconAdd.insertAdjacentHTML('afterend', icon)
    })
}

const toggleBtns = document.querySelectorAll('.submenu-toggle-btn');
toggleBtns.forEach(toggleBtn => {
    const next = toggleBtn.nextElementSibling;
    toggleBtn.addEventListener('click', function () {
        next.classList.toggle('active')
    });
})

// mobile navigation

const adminbarHeight = document.querySelector('#wpadminbar');
const siteHeader = document.querySelector('.site-header .mobile-header .header-bottom-slide .header-bottom-slide-inner');
if (adminbarHeight && null !== siteHeader ) {
    siteHeader.style.top = adminbarHeight.offsetHeight + "px";
} else if( null !== siteHeader ) {
    siteHeader.style.top = "0";
}

const mobButtons = document.querySelectorAll('.sticky-header .toggle-btn,.site-header .mobile-header .toggle-btn-wrap .toggle-btn');
if (null !== mobButtons && null !== siteHeader) {
    mobButtons.forEach(function (mobButton) {
        mobButton.addEventListener('click', () => {
            document.body.classList.add('mobile-menu-active');
            siteHeader.style.transform = "translate(0,0)";
        });
    })
}

const mobCloseButton = document.querySelector('.site-header .mobile-header .header-bottom-slide .header-bottom-slide-inner .container .mobile-header-wrap  > .close');
if (null !== mobCloseButton && null !== siteHeader ) {
    mobCloseButton.addEventListener('click', function () {
        document.body.classList.remove('mobile-menu-active');
        siteHeader.style.transform = "translate(-100%,0)";
    })
}

// navigation accessibility

document.body.addEventListener('keydown', function (e) {
    if (e.key === 'Tab') {
        document.body.classList.add('keyboard-nav-on');
    }
});
document.body.addEventListener('mousemove', function (e) {
    if (document.body.classList.contains('keyboard-nav-on')) {
        document.body.classList.remove('keyboard-nav-on');
    }
});

const navitems = document.querySelectorAll('.nav-menu li')
if (null !== navitems) {
    navitems.forEach(function (navitem) {
        navitem.addEventListener('focusin', function () {
            this.classList.add("focus");
        });
        navitem.addEventListener('focusout', function () {
            this.classList.remove("focus");
        });
    })
}

// animation intersection observer
const animationClasses = ['.slide-up-fade-in', '.slide-down-fade-in', '.slide-left-fade-in', '.slide-right-fade-in', '.clipIn'];

function scrollTrigger(selector, options = {}) {
    const elements = [];
    selector.forEach(selector => {
        const els = document.querySelectorAll(selector);
        elements.push(...Array.from(els));
    });

    elements.forEach(el => {
        addObserver(el, options);
    });
}

function addObserver(el, options) {
    if (!('IntersectionObserver' in window)) {
        entry.target.classList.add('animate');
        return;
    }
    let observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
                observer.unobserve(entry.target);
            }
        })
    }, options)
    observer.observe(el)
}

scrollTrigger(animationClasses, {
    rootMargin: '0px'
});