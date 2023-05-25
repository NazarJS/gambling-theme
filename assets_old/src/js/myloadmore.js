document.addEventListener('DOMContentLoaded', () => {
    //loadPostsAjax();
})

function loadPostsAjax() {
    let btnLoad = document.querySelector('.btn-loadmore-c');

    btnLoad.addEventListener('click', function (e) {
        e.preventDefault();

        btnLoad.innerHTML = 'Loading...';

        let data = {
            'action': 'loadmore',
            'query': btnLoad.getAttribute('data-param-posts'),
            'page': this_page
        }
        let xhr = new XMLHttpRequest();
        let url = '/wp-admin/admin-ajax.php';

        xhr.open('POST', url, true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.send(JSON.stringify(data));
        xhr.onload = function () {
            let text = xhr.response;
            if(text) {
                btnLoad.innerHTML = 'More loading';
                console.log(text);
            }
        }




    })
}

jQuery(function($){

    // AJAX загрузка страниц/записей WP
    $('.btn-loadmore').on('click', function(e){
        e.preventDefault();
        let _this = $(this);
        _this.html('Loading...');

        let data = {
            'action': 'loadmore',
            'query': window.atob(_this.attr('data-param-posts')),
            'page': this_page
        }

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            type: 'POST',
            success:function(data){

                if (data) {
                    _this.html('Load more');
                    _this.prevAll('.posts-archive').find('.posts-archive__wrap').append(data); // где вставить данные
                    this_page++;                      // увелич. номер страницы +1
                    if (this_page == _this.attr('data-max-pages')) {
                        _this.remove();               // удаляем кнопку, если последняя стр.
                    }
                } else {                              // если закончились посты
                    _this.remove();
                }
            }
        });
    });
});