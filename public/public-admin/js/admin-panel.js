$(document).ready(function () {

    let items = $('.item');
    let rootSingleItems = $('.root-single-item');
    let levelOneParent = $('.level-one-parent');
    let levelTwoParent = $('.level-two-parent');
    let submenuItem = $('.submenu-item');
    let levelTwoSingleItem = $('.level-two-single-item');

    //
    function closeAllLevelOneSubmenus() {
        levelOneParent.each(function (index, element) {
            let _this = $(element);
            //
            let icon = undefined;
            let levelOneItemLink = $(_this.find('a').first());
            let submenuLevelOne = $(_this.find('ul').first());
            //
            _this.removeClass('open').addClass('close');
            submenuLevelOne.css('max-height', '').addClass('max-h-0');
            icon = $(levelOneItemLink.children()[2]);
            //
            // icon.removeClass('-rotate-90');
            icon.css('transform', 'rotate(0deg)');
        });
    }


    function closeAllLevelTowSubmenu() {
        levelTwoParent.each(function (index, element) {
            let _this = $(element);
            //
            let icon = undefined;
            let levelTwoItemLink = $(_this.find('a').first());
            let submenuLevelTwo = $(_this.find('ul').first());
            //
            _this.removeClass('open').addClass('close');
            submenuLevelTwo.css('max-height', '').addClass('max-h-0');
            $('.submenu-level-one').each(function (index, element) {
                $(element).addClass('overflow-hidden');
            });

            icon = $(levelTwoItemLink.children()[2]);
            //
            // icon.removeClass('-rotate-90');
            icon.css('transform', 'rotate(0deg)');
        });
    }


    function removeActiveClassFormAllItems() {
        items.each(function (index, element) {
            $(element).removeClass('_active');
        });
    }


    rootSingleItems.on('click', null, null, function () {
        removeActiveClassFormAllItems();
        closeAllLevelOneSubmenus();
        closeAllLevelTowSubmenu();
        //
        $(this).addClass('_active');
    });


    levelOneParent.on('click', null, null, function () {
        removeActiveClassFormAllItems();
        closeAllLevelTowSubmenu();
        //
        let icon = undefined;
        let _this = $(this);
        let levelOneItemLink = $(_this.find('a').first()); // tag <a>
        let submenuLevelOne = $(_this.find('ul').first()); //tag <ul>
        let submenuLevelOneScrollHeight = submenuLevelOne[0].scrollHeight;
        //
        _this.addClass('_active');
        //
        if (_this.hasClass('close')) {
            closeAllLevelOneSubmenus();
            _this.removeClass('close').addClass('open');
            icon = $(levelOneItemLink.children()[2]);
            submenuLevelOne.removeClass('max-h-0').css('max-height', `${submenuLevelOneScrollHeight}px`);
            icon.css('transform', 'rotate(-90deg)');
        } else { //revers
            closeAllLevelOneSubmenus();
            $('.submenu-level-two').each(function (index, element) {
                $(element).css('max-height', '').addClass('max-h-0');
            });

            $('.level-two-parent').each(function (index, element) {
                $(element).removeClass('open').removeClass('_active').addClass('close');
                $($($(element).children()[0]).children()[2]).css('transform', 'rotate(0deg)');
            });

            $('.submenu-level-one').each(function (index, element) {
                $(element).addClass('overflow-hidden');
            });

            _this.removeClass('open').addClass('close');
            submenuLevelOne.css('max-height', '').addClass('max-h-0');
            icon = $(levelOneItemLink.children()[2]);
            icon.css('transform', 'rotate(0deg)');
        }
    });


    submenuItem.on('click', function (event) {
        event.stopPropagation();
        //
        removeActiveClassFormAllItems();
        $(this).addClass('_active');
        $(this).closest('.level-one-parent').addClass('_active');
    });


    levelTwoParent.on('click', function (event) {
        event.stopPropagation();
        //
        let icon = undefined;
        let parentSubmenu = undefined;
        let _this = $(this);
        let levelTwoItemLink = $(_this.find('a').first()); // tag <a>
        let submenuLevelTwo = $(_this.find('ul').first()); //tag <ul>
        let submenuLevelTwoScrollHeight = submenuLevelTwo[0].scrollHeight;
        //
        _this.closest('.level-one-parent').addClass('_active');
        //
        if (_this.hasClass('close')) {
            _this.removeClass('close').addClass('open');
            icon = $(levelTwoItemLink.children()[2]);
            icon.css('transform', 'rotate(-90deg)');
            parentSubmenu = _this.closest('.submenu-level-one');
            parentSubmenu.removeClass('overflow-hidden');
            submenuLevelTwo.removeClass('max-h-0').css('max-height', `${submenuLevelTwoScrollHeight}px`);
            parentSubmenu.css('max-height', `${parentSubmenu[0].scrollHeight + submenuLevelTwoScrollHeight}px`);
        } else { //revers
            _this.removeClass('open').addClass('close');
            submenuLevelTwo.css('max-height', '').addClass('max-h-0');
            parentSubmenu = _this.closest('.submenu-level-one');
            parentSubmenu.css('max-height', `${parentSubmenu[0].scrollHeight - submenuLevelTwoScrollHeight}px`);
            parentSubmenu = _this.closest('.submenu-level-one');
            parentSubmenu.addClass('overflow-hidden');
            icon = $(levelTwoItemLink.children()[2]);
            icon.css('transform', 'rotate(0deg)');
        }
    });


    levelTwoSingleItem.on('click', null, null, function () {
        let _this = $(this);
        //
        _this.closest('.level-one-parent').addClass('_active');
    });


    /***** Toggle admin menu *****/
    $('#open-admin-menu').on('click', null, null, function () {
        $('#body-cover').removeClass('hidden').removeClass('opacity-0').addClass('opacity-100');
        $('#admin-navbar').removeClass('translate-x-[100%]').addClass('translate-x-0');
    });


    $('#close-admin-menu').on('click', null, null, function () {
        $('#admin-navbar').removeClass('translate-x-0').addClass('translate-x-[100%]');
        setTimeout(function () {
            $('#body-cover').add('opacity-0').removeClass('opacity-100').addClass('hidden');
        }, 200);
    });


    $('.router').on('click', null, null, function () {
        let _this = $(this);
        let route = _this.attr('href');
        //
        if ('javascript:void(0)' !== route) {
            sessionStorage.setItem('currentRouter', route);
        }
    });


    /**** Re-active selected route, after page reload ****/
    (function () {
        let lastVisitedRout = sessionStorage.getItem('currentRouter');

        if (lastVisitedRout) {
            let levelOne, levelTwo;
            let route = $(`a[href="${lastVisitedRout}"]`)[0];
            //
            levelOne = $(route.closest('.level-one-parent'));
            levelTwo = $(route.closest('.level-two-parent'));
            //
            levelOne.addClass('_active').removeClass('close').addClass('open');
            levelTwo.addClass('_active').removeClass('close').addClass('open');

            /*---- Icon ----*/
            let levelOneItemLink = $(levelOne.find('a').first()); // tag <a>
            let icon = $(levelOneItemLink.children()[2]);
            icon.css('transform', 'rotate(-90deg)');
            /*---- /Icon ----*/

            let submenuLevelOne = $(route.closest('.submenu-level-one')); //tag <ul>
            let submenuLevelTwo = $(route.closest('.submenu-level-two')); //tag <ul>

            let submenuLevelOneScrollHeight = submenuLevelOne[0].scrollHeight;
            submenuLevelOne.removeClass('max-h-0').css('max-height', `${submenuLevelOneScrollHeight}px`);

            if (undefined !== submenuLevelTwo[0]) {
                levelTwo.removeClass('_active');

                /*---- Icon ----*/
                let levelTwoItemLink = $(levelTwo.find('a').first()); // tag <a>
                let icon = $(levelTwoItemLink.children()[2]);
                icon.css('transform', 'rotate(-90deg)');
                /*---- /Icon ----*/

                let submenuLevelTwoScrollHeight = submenuLevelTwo[0].scrollHeight;
                submenuLevelTwo.removeClass('max-h-0').css('max-height', `${submenuLevelTwoScrollHeight}px`);
                submenuLevelOne.removeClass('overflow-hidden').removeClass('max-h-0').css('max-height', `${submenuLevelTwoScrollHeight}px`);
                submenuLevelOne.css('max-height', `${submenuLevelOne[0].scrollHeight + submenuLevelTwoScrollHeight}px`);
            }

            $(route).addClass('_active');
        }
    })();

});
