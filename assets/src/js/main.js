document.addEventListener('DOMContentLoaded', () => {
     burgerr();
});


let burger = document.querySelector('.header-burger');


    window.addEventListener('resize',function(e){
        let vieportWidth = document.documentElement.clientWidth;
        vieportWidth > 1024 ? document.querySelector('.header__body').classList.remove('mobile-menu') : false;
        console.log(vieportWidth);
    });



   function burgerr() {
    document.querySelector('.header-burger').onclick = function() {
        console.log('1212');
        document.querySelector('.header__body').classList.toggle('mobile-menu');
        document.querySelector('body').classList.toggle('no_scroll');
    }
   }

    document.addEventListener('DOMContentLoaded', () => {
     
    })

    // document.querySelectorAll(".main-tabs__item").forEach(item => {
    //     // console.log("work")
    //     item.addEventListener('click', function(e) {
    //         e.preventDefault();
    //         // console.log("work_1")
    //         const id = e.target.getAttribute('href').replace('#','');

    //         document.querySelectorAll('.main-tabs__item').forEach(child => {
    //             child.classList.remove('main-tabs__item-active')
    //         });

    //         document.querySelectorAll('.main-tabs__block').forEach(child => {
    //             child.classList.remove('main-tabs__block-active')
    //         });

    //         item.classList.add("main-tabs__item-active");

    //         document.getElementById(id).classList.add("main-tabs__block-active");
    //     })
    // })


    // document.querySelectorAll(".main-faq__item").forEach(item => {
    //     item.addEventListener('click', function() {
    //         this.classList.toggle("answer-open");
    //     })
    // });



    let promocodes = document.querySelectorAll('.promocode');
    // console.log(promocodes);
    //promocode-block-copy
    promocodes.forEach(promocode => {

        promocode.addEventListener('click', (e) => {

            let promocodeInput = promocode.querySelector('.main-promocode');
            let promocodeCopy = promocode.querySelector('.promocode-block-copy');
            let promocodeRef = promocode.querySelector('.promocode-block-ref');

            console.log(promocodeInput);

            promocodeInput.removeAttribute('disabled');
            promocodeInput.select();
            document.execCommand("copy");
            promocodeInput.value = "Copied!";
            setTimeout(() => promocodeInput.value = promocodeInput.getAttribute("data-promocode"), 2500);
            console.log(promocodeInput.value);

            promocodeInput.setAttribute("disabled", "disabled");
            promocodeRef.style.display = 'flex';
            promocodeCopy.style.display = 'none';

        });

        let btn = promocode.querySelector('.promo-code a');
        let label = promocode.querySelector('.promo-code div > span')
        if (btn !== null) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();

                promocode.select();
                promocode.setSelectionRange(0, 99999); /* For mobile devices */
                document.execCommand("copy");

                label.style.opacity = '1';
                setTimeout(() => {
                    label.style.opacity = '0'
                }, 3000);
            })
        }
    });