<section class="text-light">

    <div class="pt-5 pb-5 d-none d-sm-block text-light ">
    <table class="table bg-color1 text-light" >
    <?=PRODUCTDAO::getAllOrderbyUserId($_SESSION['user_id'])?>
    </div>

</section>