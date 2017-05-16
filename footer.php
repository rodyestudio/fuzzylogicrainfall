<footer id="footer" class="dark" style="background: #000; background-size: 100% 100%;">

    <div class="container">

        <!-- Footer Widgets
        ============================================= -->
        <div class="footer-widgets-wrap clearfix">

            <div class="col_full">

                <div class="widget clearfix">

                 
                    <div class="col_half">
                        <h4>Prediksi Curah Hujan Menggunakan Logika Fuzzy</h4>
                        <p>Peramalan dengan metode logika fuzzy didasarkan dari data – data meteorologi yang diperoleh dari Stasiun Meteorologi Kelas I Serang dengan koordinat pengambilan data adalah 06º06’698’’ LS dan 106º07’915’’ BT.</p>
                        <hr>
                        <p>Copyrights &copy; prediksihujan.bantenhost.com</p>
                    </div>

                    <div class="col_half col_last">
                    <div class="widget clearfix">
<div class="divider divider-center"><i class="icon-graph"></i></div>
                            <div class="hidden-xs hidden-sm"><div class="clear" style="padding-top: 10px;"></div></div>

                            <div class="col-md-6 bottommargin-sm center">
                                <?php
                                require_once "koneksi.php";
                                $query_ft1 = mysqli_query($con, "SELECT * FROM `data`");
                                $query_ft2 = mysqli_query($con, "SELECT * FROM `rule`");
                                if($data_ft1 = mysqli_num_rows($query_ft1)){
                                    if($data_ft2= mysqli_num_rows($query_ft2)){
                                    }
                                }
                                ?>
                                <div class="counter counter-small" style="color: #fff;"><span data-from="4" data-to="<?php echo $data_ft1; ?>" data-refresh-interval="80" data-speed="1000" data-comma="true"></span></div>
                                <h5 class="nobottommargin">Prediksi Curah Hujan Berhasil</h5>
                            </div>

                            <div class="col-md-6 bottommargin-sm center col_last">
                                <div class="counter counter-small" style="color: #fff;"><span data-from="4" data-to="<?php echo $data_ft2; ?>" data-refresh-interval="50" data-speed="1500" data-comma="true"></span></div>
                                <h5 class="nobottommargin">Rule Curah Hujan</h5>
                            </div>

                        </div>
                        
                    </div>

                </div>

            </div>

        </div><!-- .footer-widgets-wrap end -->

    </div>
</footer>