<head>
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/adminLte/dist/css/bgye.min.css?t=<?php echo time();?>">
    <style>
        .bg1{
            z-index: 0;
        }
        .bg2{
            z-index: 0;
        }
        .bg3{
            z-index: 0;
        }
        .login-box{
            position: relative;
            z-index: 99;
        }
    </style>
</head>
<body class="hold-transition layout-fixed loading1">
    <div class="loading2">
        <img id="loading-image" src="<?php echo base_url() . 'assets/image/tenor.gif?t='.time() ?>" alt="Loading..." />
    </div>
    <div class="bg1"></div>
<div class="bg1 bg2"></div>
<div class="bg1 bg3"></div>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light py-3 bg-gradient-dark">
            <div class="container">
                <!-- Navbar Brand -->
                <a href="<?php echo base_url() ?>login">
                    <h3 class="text-success shine-me">PA<b>SMANTA</b>P</h3>
                </a>
            </div>
        </nav>
    </header>
    <div class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo base_url() ?>">PA<b>SMANTA</b>P</a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Silahkan masuk</p>
                    <form class="form-signin" action="<?php echo base_url().'login/auth'?>" method="post">
                        <?php echo $this->session->flashdata('#error-msg');?>
                        <div class="input-group mb-3">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username"
                                required autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-success effect01 btn-block"><span>Sign In</span></button>
                            </div>
                        </div>
                    </form>
                    <p class="mb-1">
                        <a href="mailto:smanta.pontianak@ac.id?subject=LupaPassword_PASMANTAP">Saya lupa Username /
                            Password</a>
                    </p>
                    <p class="mb-1 zoomPilih"> Belum Punya Akun?
                        <a href="<?php echo base_url().'login/toRegister'?>" method="post">Register</a>
                    </p>
                </div>
            </div>
            <div class="card">
            <footer class="card-footer float-right text-sm">
            <strong>Copyright &copy; 2021 <a href="https://sman3ptk.sch.id/" target="_blank" style="color: #28a745"> SMA
                    Negeri 3 Pontianak </a>&<a href="https://www.instagram.com/egyijaa_/" target="_blank"
                    style="color: #28a745"> Egy Ijaa</a> | Theme by : <a href="https://adminlte.io/" target="_blank"
                    style="color: #28a745">AdminLTE</a></strong>. All rights
            reserved.
        </footer>
    </div>
        </div>
    </div>
</body>
<script>
    $(window).on('load', function () {
        $(".loading2").fadeOut("slow", function () {
            $('body').removeClass('loading1');
        });
    });
</script>