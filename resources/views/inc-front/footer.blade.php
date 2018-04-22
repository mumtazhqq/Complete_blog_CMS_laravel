<footer class="footer">
    <div class="container container-footer">
        <div class="col-lg-6 col-lg-push-3 col-md-6 col-md-push-3 col-sm-10 col-xs-10 column-footer">
            <div class="wrap-logo">
                <img src="https://avatars3.githubusercontent.com/u/26042050?s=400&v=4" class="logo-footer">
            </div>
            <h1 class="description-site desc-footer">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.
            </h1>
            <div class="s-social">
                <a href="#" class="url-social">
                    <i class="fa fa-facebook"></i></a>
                <a href="#" class="url-social">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="#" class="url-social"><i class="fa fa-dribbble"></i></a><a href="#" class="url-social"><i class="fa fa-linkedin"></i></a>
                <a
                        href="#" class="url-social"><i class="fa fa-vk"></i></a>
            </div>
            <br>
            <p class="text-copyright">Copyright ©&nbsp;moktar-br. 2018. All rights reserved </p>
        </div>
    </div>

</footer>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bs-animation.js') }}"></script>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>

<script>
    var items = document.querySelectorAll('.menuItem');

    for(var i = 0, l = items.length; i < l; i++) {if (window.CP.shouldStopExecution(1)){break;}
        items[i].style.left = (50 - 35*Math.cos(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";

        items[i].style.top = (50 + 35*Math.sin(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
    }
    window.CP.exitedLoop(1);


    document.querySelector('.center').onclick = function(e) {
        e.preventDefault(); document.querySelector('.circle').classList.toggle('open');
    }

    //# sourceURL=pen.js
</script>
</body>

</html>