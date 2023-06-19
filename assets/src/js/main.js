document.addEventListener('DOMContentLoaded', () => {
     burgerr();
     copyPromo();
     btnLink();
});


let burger = document.querySelector('.header-burger');


    window.addEventListener('resize',function(e){
        let vieportWidth = document.documentElement.clientWidth;
        vieportWidth > 1024 ? document.querySelector('.header__body').classList.remove('mobile-menu') : false;
        console.log(vieportWidth);
    });



   function burgerr() {
    document.querySelector('.header-burger').onclick = function() {
        document.querySelector('.header__body').classList.toggle('mobile-menu');
        document.querySelector('body').classList.toggle('no_scroll');
    }
   }

    document.addEventListener('DOMContentLoaded', () => {
     
    })

  



   function copyPromo() {
    let promocodes = document.querySelectorAll('.promocode');

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
   }

function btnLink() {
    const siteButtons = document.querySelectorAll('.link-button');
    if (siteButtons) {
      siteButtons.forEach((button) => {
        button.addEventListener('click', (e) => {
          const thisButton = e.currentTarget;
          const linkDecoded = thisButton.dataset.decoded;
          let linkURL = thisButton.dataset.decodedText;
          if (linkDecoded === 'true') {
            linkURL = atob(linkURL);
          }
          window.location.href = linkURL;
        });
      });
    }
  }