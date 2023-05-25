document.addEventListener('DOMContentLoaded', () => {
    goToTop();
  //  sliderCards();
    // toglDetails()
    btnLink();
    depositeCalculator();
    burgerToggle();
    burgerOff();
    listToggle();
})
function depositeCalculator(){
    var depcalc = document.querySelector("#deposit-count");
    if(depcalc){
        depcalc.addEventListener("change", function () {
            let depSumm=this.value;
            document.querySelector('#bonus-count').value=(depSumm*multiplyingFactor/100);
            document.querySelector('#sum-count').value=Number(depSumm)+(depSumm*multiplyingFactor/100);
        });
    }

}

function toglDetails(){
    //togle list
    var details = document.querySelectorAll("details");
    if(details){

        for(var i=0;i<details.length;i++) {

            details[i].addEventListener("toggle", accordion);
        }

        function accordion(event) {

            console.log((!event.target.open));

            if (!event.target.open) return;
            var details = event.target.parentNode.children;
            for(i=0;i<details.length;i++) {

                if (details[i].tagName != "DETAILS" ||
                    !details[i].hasAttribute('open') ||
                    event.target == details[i]) {
                    continue;
                }


                details[i].removeAttribute("open");
            }
        }
    }

}

function mobileMenu() {
    let mobileSubMenu = document.querySelectorAll('.menu-item-has-children');

    if(window.innerWidth < 769) {
        mobileSubMenu.forEach(function (menu) {
            menu.onclick = function () {
                menu.classList.value.includes('open') ? menu.classList.remove('open') : menu.classList.add('open');
            };
        })
    }

    let mobileMenu = document.querySelector('.header__mobile-navbar');

    if(mobileMenu != null && mobileMenu.classList.contains('second') && window.innerWidth < 769) {
        let secondMenu = document.querySelector('.header__second-navbar nav');
        document.querySelector('.header__mobile-navbar').append(secondMenu);
    }
}

function moveAboutPage() {
    if(document.querySelector("aside") != null) {
        if(document.querySelector(".about-page") != null) {

            let div = document.querySelector(".about-page");
            let pageContent = document.querySelector(".main-content");
            pageContent.prepend(div);
        }
    }
}

function svgProgressCircle() {
    let progressBar = document.querySelectorAll(".js-progress-bar");
    progressBar.forEach(function (svg, index) {
        if(progressBar.length === index + 1) {
            setTimeout(() => {svg.classList.add('svg-overall')}, 100);
        } else {
            setTimeout(() => {svg.classList.add('svg-' + index)}, 100);
        }

    })

}

function goToTop() {

    const scrollToTopButton = document.querySelector('.go-top');
    const scrollDownloadButton = document.querySelector('.fixed-download');
    const scrollFunc = () => {
        let y = window.scrollY;

        if (y > 1000) {
            scrollToTopButton.className = "go-top show";
            scrollDownloadButton.className = "fixed-download show";
        } else {
            scrollToTopButton.className = "go-top hide";
            scrollDownloadButton.className = "fixed-download";
        }
    };

    window.addEventListener("scroll", scrollFunc);

    const scrollToTop = () => {
        const c = document.documentElement.scrollTop || document.body.scrollTop;

        if (c > 0) {
            window.requestAnimationFrame(scrollToTop);
            window.scrollTo(0, c - c / 10);
        }
    };

    scrollToTopButton.onclick = function(e) {
        e.preventDefault();
        scrollToTop();
    }
}

function sliderCards() {
    let widthItem = document.querySelector("div.slider__item");
    let btnNext = document.querySelectorAll(".slider-arrow.next");
    let btnPrev = document.querySelectorAll(".slider-arrow.prev");
    let slider = document.querySelectorAll("div.slider__wrap");
    let wrapSlider = document.querySelectorAll("div.slider");
    let slCount = document.querySelectorAll("div.slider .count");
    let viewSlide = 0;
    let countChildren = [];
    let viewSlideActive = [];
    function displayArrow(btn, index) {
        if(slider[index].offsetWidth < wrapSlider[index].offsetWidth) {
            //btn.style.display = 'none';
        }
    }


    slider.forEach(function (sl, index) {
        let clientX, deltaX;

        countChildren[index] = sl.childElementCount;
        wrapSlider[index].style.paddingBottom = 120 + 'px';
        sl.addEventListener('touchstart', function (e) {
            clientX = e.touches[0].clientX;
        }, {passive: true})
        sl.addEventListener('touchend', function (e) {
            deltaX = e.changedTouches[0].clientX - clientX;
            if (viewSlide < countChildren[index] - viewSlideActive[index] && deltaX < 0) { // Если верно то
                viewSlide++;
            } else if (viewSlide > 0 && deltaX > 0) {
                viewSlide--;
            }
            sl.style.left = -viewSlide * (widthItem.offsetWidth + 30) + "px";
            slCount[index].innerHTML = (viewSlide + 1) + ' / ' + countChildren[index];
        }, {passive: true})

        slCount[index].innerHTML = '1 / ' + countChildren[index];
    })

    wrapSlider.forEach(function (wrSl, index) {
        viewSlideActive[index] = Math.round(wrSl.offsetWidth / widthItem.offsetWidth - 0.5);
    })

    btnNext.forEach(function (btn, index) {
        displayArrow(btn, index);
        btn.addEventListener("click", function () {
            if (viewSlide < countChildren[index] - viewSlideActive[index]) { // Если верно то
                viewSlide++;
            } else {
                viewSlide = 0;
            }
            slider[index].style.left = -viewSlide * (widthItem.offsetWidth + 30) + "px";
            slCount[index].innerHTML = (viewSlide + 1) + ' / ' + countChildren[index];
        });
    })

    btnPrev.forEach(function (btn, index) {
        displayArrow(btn, index);
        btn.addEventListener("click", function () {
            if (viewSlide > 0) {
                viewSlide--;
            } else {
                viewSlide = countChildren[index] - viewSlideActive[index];
            }
            slider[index].style.left = -viewSlide * (widthItem.offsetWidth + 30) + "px";
            slCount[index].innerHTML = (viewSlide + 1) + ' / ' + countChildren[index];
        });
    })
}

function btnLink() {
    const $siteButtons = document.querySelectorAll('.link-button')
    if ($siteButtons) {
        $siteButtons.forEach(($button) => {
            $button.addEventListener('click', (e) => {
                const $this = e.currentTarget
                const $linkDecoded = $this.dataset.decoded
                let $linkURL = $this.dataset.decodedText
                if ($linkDecoded === 'true') {
                    $linkURL = atob($linkURL)
                }
                document.location.href = $linkURL
            })
        })
    }
}

function copyPromocode() {
    let promocode = document.querySelector('.promocode-copy');
    let btn = document.querySelector('.promo-code a');
    let label = document.querySelector('.promo-code div > span')

    if (btn !== null) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            promocode.select();
            promocode.setSelectionRange(0, 99999); /* For mobile devices */
            document.execCommand("copy");

            label.style.opacity = '1';
            setTimeout(() => {label.style.opacity = '0'}, 3000);
        })
    }
}

function sliderFullscreen() {
    let widthItem = document.querySelector("div.sl-item");
    let allItem = document.querySelectorAll("div.sl-item");
    let btnNext = document.querySelectorAll(".sliderFull__arrow.next");
    let btnPrev = document.querySelectorAll(".sliderFull__arrow.prev");
    let sliderFull = document.querySelectorAll("div.sliderFull__wrap");
    let wrapSlider = document.querySelectorAll("div.sliderFull");
    let countItems = document.querySelectorAll(".sliderFull__count span");
    let viewSlide = 0;
    let countChildren = [];
    let viewSlideActive = [];

    allItem.forEach(function (item) { // Ширина слайдера на ширину экранаы
        item.style.width = wrapSlider[0].offsetWidth + 'px';
        window.addEventListener('resize', function () {
            item.style.width = wrapSlider[0].offsetWidth + 'px';
        })
    });

    sliderFull.forEach(function (sl, index) {
        let clientX, deltaX, heightSlider = 0;
        let items = sl.querySelectorAll(".sliderFull__item > div > div");
        countChildren[index] = sl.childElementCount;

        items.forEach(function (item) { // рассчитываем высоту Слайдера
            if (heightSlider < item.clientHeight) {
                heightSlider = item.clientHeight;
            }
        })
        wrapSlider[index].style.height = heightSlider + 80 + 'px';

        sl.addEventListener('touchstart', function (e) { // Определяем начальную точку нажатия
            clientX = e.touches[0].clientX;
        }, {passive: true})
        sl.addEventListener('touchend', function (e) {
            deltaX = e.changedTouches[0].clientX - clientX;           // Рассчитываем расстояние от начальной до конечной точки прикосновения
            if (viewSlide < countChildren[index] - 1 && deltaX < 0) { // Если верно то
                viewSlide++;
            } else if (viewSlide > 0 && deltaX > 0) {
                viewSlide--;
            }
            sl.style.left = -viewSlide * (widthItem.offsetWidth) + "px";

            countItems[index].innerHTML = viewSlide + 1;
        }, {passive: true})
    })

    btnNext.forEach(function (btn, index) {
        btn.addEventListener("click", function () {
            if (viewSlide < countChildren[index] - 1) {
                viewSlide++;
            } else {
                viewSlide = 0;
            }
            sliderFull[index].style.left = -viewSlide * (widthItem.offsetWidth) + "px";
            countItems[index].innerHTML = viewSlide + 1;
        });
    })

    btnPrev.forEach(function (btn, index) {
        btn.addEventListener("click", function () {
            if (viewSlide > 0) {
                viewSlide--;
            } else {
                viewSlide = countChildren[index] -1;
            }
            sliderFull[index].style.left = -viewSlide * (widthItem.offsetWidth) + "px";
            countItems[index].innerHTML = viewSlide + 1;
        });
    })
}

function tocSlow() {
    let smoothLinks = document.querySelectorAll('a[href^="#"]');
    for (let smoothLink of smoothLinks) {
        smoothLink.addEventListener('click', function (e) {
            e.preventDefault();
            const id = smoothLink.getAttribute('href');

            document.querySelector(id).scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    };

    if (document.querySelector('.list-anchor') != null) {
        let tocSec = document.querySelectorAll('.tag-block[id]');
        let arrayLi = document.querySelectorAll('.list-anchor ul li');
        let list = document.querySelector('.list-anchor ul');
        let arraySec = [];
        let arrayFinally = [];

        tocSec.forEach(function (section, index) {
            arraySec.push(section.getAttribute('id'));
        })

        arrayLi.forEach(function (link) {
            let textLink = link.querySelector('a').getAttribute('href').substring(1);
            let position = arraySec.indexOf(textLink);
            arrayFinally[position] = link;
        })

        arrayFinally.forEach(function (li){
            list.append(li);
        })
    }
}

function videoPlay() {
    const videos = document.querySelectorAll('.video');
    if (videos) {
        videos.forEach((video) => {
            video.addEventListener('click', (e) => {
                const video = e.currentTarget
                const target = e.target
                const videoPreview = video.querySelector('.video__img')
                const videoButton = video.querySelector('.video__play')
                const videoContainer = video.querySelector('.video__wrap')
                const videoUrl = video.dataset.url
                let iframe = document.createElement('div');
                const iframeElement = `
                <iframe allowfullscreen allow="autoplay" src="${videoUrl}?rel=0&showinfo=0&autoplay=1" class="video__media">
                </iframe>
                `;
                iframe.innerHTML = iframeElement;

                videoPreview.remove()
                videoButton.remove()
                videoContainer.appendChild(iframe.firstElementChild)
            })
        })
    }
}

function burgerToggle() {
    document.getElementById('burger').onclick = function() {
        document.querySelector('.header-container').classList.toggle('mobile-menu');
        document.querySelector('body').classList.toggle('no_scroll');
    }
}

function burgerOff() {
    window.addEventListener('resize',function(e){
        let vieportWidth = document.documentElement.clientWidth;
        vieportWidth > 1024 ? document.querySelector('.header-container').classList.remove('mobile-menu') : false;
    });
}

function listToggle() {
    document.querySelector('.list__header').onclick = function() {
        document.querySelector('.list').classList.toggle('list-open');
    }
}
