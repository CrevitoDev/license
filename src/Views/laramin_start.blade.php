<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@lang('Easy Activator by Crevito')</title>
    <link rel="shortcut icon" type="image/png" href="https://license.crevito.com/external/favicon.png">
    <link rel="stylesheet" href="https://license.crevito.com/external/css/lib/bootstrap.min.css">
    <link rel="stylesheet" href="https://license.crevito.com/external/css/line-awesome.min.css"> 
    <link rel="stylesheet" href="https://license.crevito.com/external/css/main.css">
</head> 
<body>
    <header class="header">
        <div class="header-bottom">
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-4 text-lg-start text-center">
                        <img src="https://license.crevito.com/external/logo.png" alt="main logo" class="site-logo">
                    </div>
                    <div class="col-lg-8 text-lg-end text-center mt-lg-0 mt-3">
                        <h4 class="header-text">Verify Portal</h4>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main-wrapper">
        <section class="pt-100 pb-100">
            <div class="container">
                <div class="custom--card  ">
                    <div class="card-header text-center">
                        <h2>Verify License</h2>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <form class="verForm">
                                  <div class="row gy-4">
                                        <div class="col-lg-9 col-md-12">
                                            <input type="text" name="purchase_code" class="form--control"  placeholder="Your Purchase Code" required>
                                        </div>
                                        <div class="col-lg-3 col-md-12">
                                            <button type="submit" class="btn btn--base w-100 sbmBtn" style="height: 55px;"> Verify <i class="las la-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                                 <div class="row gy-4 mt-5">
                                    <h2 class="text--danger text-center resp-msg" style="display: none;"></h2>
                                </div>
                                         </div>
                               </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="footer">
        <p><i class="lar la-copyright"></i> 2023 <a href="https://crevito.com/" target="_blank" class="text--base">Crevito</a>. All Rights Reserved.</p>
    </footer>
    <script src="https://license.crevito.com/external/js/app.js"></script>
    <script src="https://license.crevito.com/external/js/bootstrap.bundle.min.js"></script>
    <script src="https://license.crevito.com/external/js/jquery-3.6.0.min.js"></script>
    @include('partials.notify')
    <script>
        (function($){
            "use strict"
            $('.verForm').submit(function (e) {
                e.preventDefault();
                $('.sbmBtn').text('Processing...');
                var url = '{{ route(Laramin\Utility\VugiChugi::acRouterSbm()) }}';
                var data = {
                    "purchase_code":$(this).find('[name=purchase_code]').val(),
                };
                var respMsg = $('.resp-msg');
                respMsg.hide().text('');
                $.post(url, data,function (response) {
                    if (response.type == 'error') {
                        $('.sbmBtn').text('Submit');
                        $('.verForm').trigger("reset");
                        $('.resp-msg').text(response.message).show();
                    }else{
                        location.reload();
                    }
                });
            });
            $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip({
                    animated: 'fade',
                    trigger: 'click'
                })
            })
        })(jQuery);
    </script>
</body>
</html>