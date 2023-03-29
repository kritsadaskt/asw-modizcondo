<?php
    if (isset($_GET['utm_source']) === false) {
        $ref = 'Direct';
    } else {
        $ref = $_GET['utm_source'];
    }
    $p = get_the_ID();
?>

<iframe src="http://203.146.251.229/digipon/smck.php?b=mkt00250" width="10" height="2" frameborder="0"></iframe>
<div style="display:none;">
    <!-- Google Code for Remarketing Tag -->
    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 902338991;
        var google_conversion_label = "LwvACNupoG8Qr7OirgM";
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/902338991/?value=1.00&amp;currency_code=THB&amp;label=LwvACNupoG8Qr7OirgM&amp;guid=ON&amp;script=0"/>
        </div>
    </noscript>

    <!-- Facebook Pixel Code -->
    <script type="text/javascript">!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '734860609955637');
        fbq('addPixelId', '386398128470760');
        fbq('addPixelId', '1860828004186371');
        fbq('track', 'PageView');
    </script> <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=734860609955637&amp;ev=PageView&amp;noscript=1"></noscript> <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-85057478-19"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-85057478-19');
    </script>

    <!-- Global site tag (gtag.js) - Google AdWords: 902338991 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-902338991"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-902338991');
    </script>
</div>

<!-- --------------------------------------------------- -->
<!-- ------------------- Data Saving ------------------- -->
<!-- --------------------------------------------------- -->
<div class="loading">
    <div class="white-box">
        <img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/Loading_icon.gif"><br>
        <b>กำลังบันทึกข้อมูล</b>
    </div>
</div>


<!-- --------------------------------------------------- -->
<!-- ------------------ Section Hero ------------------- -->
<!-- --------------------------------------------------- -->
<div class="container-fluid nopadding sec-hero" id="sec-hero" style="overflow: hidden;">
    <img class="sec1-bg hidden-xs" src="<?php the_field('hero_banner_desktop', $p); ?>" />
    <img class="sec1-bg-m visible-xs" src="<?php the_field('hero_banner_mobile', $p); ?>" />

    <div class="regis-box">
        <img class="visible-xs" src="<?php the_field('form_header', $p); ?>">
        <img class="hidden-xs" src="<?php the_field('form_header_mobile', $p); ?>">
        <form id="reg-form" class="regis-form" method="post">
            <div class="row">
                <div class="col-sm-6">
                    <input id="name" name="name" type="text" placeholder="ชื่อ" value="<?php echo $_GET['name']; ?>" required="">
                </div>
                <div class="col-sm-6">
                    <input id="surname" name="surname" type="text" placeholder="นามสกุล" value="<?php echo $_GET['surname']; ?>" required="">
                </div>
                <div class="col-sm-12">
                    <input id="tel" name="tel" type="tel" placeholder="เบอร์โทรศัพท์" value="<?php echo $_GET['tel']; ?>" minlength="10" required="">
                </div>
                <div class="col-sm-12">
                    <input id="email" name="email" type="email" placeholder="อีเมล" value="<?php echo $_GET['email']; ?>" required="">
                </div>
                <input type="hidden" id="ref" name="ref" value="<?php echo $ref; ?>">
                <input type="hidden" id="property" name="property" value="glam_ladprao">
                <input type="hidden" id="propertyName" name="property-name" value="<?php the_title(); ?>">
                <input type="hidden" id="mailingList" name="mailing-list" value="<?php the_field('mailing_list'); ?>">
                <?php if (isset($_GET['captcha'])) { ?>
                    <div class="col-sm-12 alert alert-danger" style="margin-top: 10px; margin-bottom: 3px;">
                        โปรดคลิกทำเครื่องหมายข้างบนนี้
                    </div>
                <?php } ?>
                <div class="col-sm-12">
                    <button id="submit">ลงทะเบียน</button>
                    <a href="tel:021680000" class="telbox">
                        <i class="fa fa-phone" aria-hidden="true"></i> 02-168-0000
                    </a>
                </div>
            </div>
        </form>
    </div>

</div>

<div class="sec-gallery nopadding" id="sec-detail">
    <div class="container nopadding">
        <div class="sec-gallery-header text-center">
            <h1>GALLERY</h1>
        </div>
        <!-- <div class="tab-bar" id="myTabs">
            <ul>
                <li class="active"><a href="#gallery1">Exterior & Facilities</a></li>/
                <li><a href="#gallery2" class="to-gallery2">Unit</a></li>
            </ul>
        </div> -->

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="gallery1">
                <div class="slider-container">
                  <?php $project_gallery = acf_photo_gallery('main_gallery_images', $p); ?>
                    <div id="slider" class="flexslider">
                        <div class="render-img">ภาพและบรรยากาศจำลอง</div>
                        <ul class="slides">
                        <?php
                            foreach ($project_gallery as $proj_gallery_item) {
                              echo "<li><img src='" . $proj_gallery_item['full_image_url'] . "' alt=''></li>";
                            }
                        ?>
                        </ul>
                        </div>
                    <div id="carousel" class="flexslider hidden-xs">
                        <ul class="slides">
                        <?php
                            foreach ($project_gallery as $proj_gallery_item) {
                              echo "<li><img src='" . $proj_gallery_item['full_image_url'] . "' alt=''></li>";
                            }
                        ?>
                        </ul>
                    </div>
                    <div id="carousel-mobile" class="flexslider visible-xs">
                        <ul class="slides">
                        <?php
                            foreach ($project_gallery as $proj_gallery_item) {
                              echo "<li><img src='" . $proj_gallery_item['full_image_url'] . "' alt=''></li>";
                            }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="gallery2">
                <div class="slider-container">
                    <div id="slider2" class="flexslider">
                        <div class="render-img">ภาพและบรรยากาศจำลอง</div>
                        <ul class="slides">
                            <li><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/gallery/gallery4.jpg" /></li>
                            <li><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/gallery/gallery5.jpg" /></li>
                            <li><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/gallery/gallery6.jpg" /></li>
                            <li><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/gallery/gallery7.jpg" /></li>
                        </ul>
                    </div>
                    <div id="carousel2" class="flexslider hidden-xs">
                        <ul class="slides">

                            <li><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/gallery/gallery4.jpg" /></li>
                            <li><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/gallery/gallery5.jpg" /></li>
                            <li><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/gallery/gallery6.jpg" /></li>
                            <li><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/gallery/gallery7.jpg" /></li>
                        </ul>
                    </div>
                    <div id="carousel-mobile2" class="flexslider visible-xs">
                        <ul class="slides">

                            <li><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/gallery/gallery4.jpg" /></li>
                            <li><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/gallery/gallery5.jpg" /></li>
                            <li><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/gallery/gallery6.jpg" /></li>
                            <li><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/gallery/gallery7.jpg" /></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- --------------------------------------------------- -->
    <!-- ---------------- Section Detail ------------------- -->
    <!-- --------------------------------------------------- -->

    <div class="sec-detail" id="sec-detail">
        <div class="container nopadding">
            <div class="tab-bar" id="myTabs">
                <ul>
                    <li class="active"><a href="#tab1">แนวคิดโครงการ</a></li>
                    <li><a href="#tab2">ข้อมูลโครงการ</a></li>
                    <!-- <li><a href="#tab3">สิ่งอำนวยความสะดวก</a></li> -->
                </ul>
            </div>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tab1">
                    <img class="hidden-xs img-responsive" src="<?php echo get_template_directory_uri() ?>/images/house/glam-ladprao/concept.jpg" />
                    <img class="visible-xs img-responsive" src="<?php echo get_template_directory_uri() ?>/images/house/glam-ladprao/concept-m.jpg" />
                </div>
                <div role="tabpanel" class="tab-pane" id="tab2">
                    <div class="factsheet-container" style="background:url('<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/gallery/gallery1.jpg')no-repeat center;background-size: cover;">
                        <div class="detail-box">
                            <div class="col-xs-12 nopadding">
                                <p class="land-detail">
                                    <span class="heading">พื้นที่โครงการ</span>
                                    4-0-15.1 ไร่
                                </p>
                                <p class="project-detail">
                                    <span class="heading">ลักษณะโครงการ</span><br/>
                                    อาคารชุดพักอาศัยรูปทราง I – Shape 1 อาคาร และ L – Shape 2  อาคาร สูง 8 ชั้น 3 อาคาร 570 ยูนิต
                                    <br/>- อาคาร A 185 ยูนิต
                                    <br/>- อาคาร B 182 ยูนิต
                                    <br/>- อาคาร C 203 ยูนิต
                                    <br/>ที่จอดรถ 45 %
                                </p>
                                <p class="room-detail">
                                    <span class="heading">ลักษณะห้องชุด</span><br/><br/>
                                    One-Bedroom จำนวน 299 ยูนิต<br/>
                                    ขนาดพื้นที่ประมาณ 25 – 26 ตารางเมตร
                                    <br/><br/>
                                    One-Bedroom Exclusive จำนวน 150 ยูนิต<br/>
                                    ขนาดพื้นที่ประมาณ 27 - 28 ตารางเมตร
                                    <br/><br/>
                                    One-Bedroom Plus  จำนวน 121 ยูนิต<br/>
                                    ขนาดพื้นที่ประมาณ 35 - 36 ตารางเมตร
                                </p>


                            </div>

                        </div>
                    </div>
                </div>
                <!-- <div role="tabpanel" class="tab-pane fade" id="tab3">
                    <div class="facility-container" style="background:url('<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/gallery/gallery3.jpg')no-repeat center;background-size: cover;">
                        <div class="detail-box">
                            <div class="detail-inner col-xs-12">
                                <h1>Project facilities</h1>
                                <ul>
                                    <li>Double Ceiling Lobby</li>
                                    <li>Panoramic Sky Pool (Rooftop)</li>
                                    <li>Foyer Parking</li>
                                    <li>Co – Working Space</li>
                                    <li>Co-Living Lounge (& Pantry)</li>
                                    <li>Cinema Lounge</li>
                                    <li>Game Room (VR)</li>
                                    <li>Party Zone</li>
                                    <li>Unwind Space Area</li>
                                    <li>Serenity Courtyard</li>
                                    <li>Yoga Deck</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>


        <!-- --------------------------------------------------- -->
        <!-- --------------- Section hilight ------------------- -->
        <!-- --------------------------------------------------- -->
        <div class="sec-hilight" id="section-plan">
            <div class="container">
                <img class="hidden-xs img-responsive" src="<?php echo get_template_directory_uri() ?>/images/house/glam-ladprao/hilight.jpg" />
                <img class="visible-xs img-responsive" src="<?php echo get_template_directory_uri() ?>/images/house/glam-ladprao/hilight-m.jpg" />
            </div>
        </div>

        <!-- --------------------------------------------------- -->
        <!-- ----------------- Section Video ------------------- -->
        <!-- --------------------------------------------------- -->
        <!-- <div class="sec-video" id="sec-video">
            <div class="container nopadding text-center">
                <div class="video-header">
                    <h1>VIDEO</h1>
                </div>
                <div class="col-xs-12">
                    <iframe class="youtube-video" src="https://www.youtube.com/embed/L4C67xyUtC8?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div> -->


        <!-- --------------------------------------------------- -->
        <!-- ------------------ Section Plan ------------------- -->
        <!-- --------------------------------------------------- -->
        <div class="sec-plan container-fluid" id="section-plan">
            <div class="container nopadding">
                <div class="sec-plan-header">
                    <h1>HOUSE PLAN</h1>
                </div>
                <div class="plan-choose" id="planBut">
                    <!-- <ul>
                        <li style="left:5px;" class="active"><a href="#plan1">FLOOR PLAN</a></li>
                        <li style="left:-5px;"><a href="#plan2">UNIT PLAN</a></li>
                    </ul> -->
                    <select class="fl-select">
                        <option value="fl1">GLAM Option 9 : (370 sq.m)</option>
                    </select>
                    s
                </div>

                <div class="tab-content plan-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="plan1">
                        <div class="clearfix"></div>
                        <div class="plan-img" id="fl1">
                            <img src="<?php echo get_template_directory_uri() ?>/images/house/glam-ladprao/plan1.jpg">
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="plan2">
                        <div class="clearfix"></div>


                        <div class="u-img" id="A1B"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1B.jpg"/></div>
                        <div class="u-img hide" id="A1E"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1E.jpg"/></div>
                        <div class="u-img hide" id="A1H"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1H.jpg"/></div>
                        <div class="u-img hide" id="A1I"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1I.jpg"/></div>
                        <div class="u-img hide" id="A1L"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1L.jpg"/></div>
                        <div class="u-img hide" id="A1P"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1P.jpg"/></div>
                        <div class="u-img hide" id="C1A"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/C1A.jpg"/></div>
                        <div class="u-img hide" id="C1B"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/C1B.jpg"/></div>
                        <div class="u-img hide" id="C1C"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/C1C.jpg"/></div>
                        <div class="u-img hide" id="C1H"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/C1H.jpg"/></div>
                        <div class="u-img hide" id="C1O"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/C1O.jpg"/></div>
                        <div class="u-img hide" id="D1E"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/D1E.jpg"/></div>
                        <div class="u-img hide" id="D1F"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/D1F.jpg"/></div>
                        <div class="u-img hide" id="A1C"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1C.jpg"/></div>
                        <div class="u-img hide" id="A1F"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1F.jpg"/></div>
                        <div class="u-img hide" id="A1J"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1J.jpg"/></div>
                        <div class="u-img hide" id="A1M"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1M.jpg"/></div>
                        <div class="u-img hide" id="A1N"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1N.jpg"/></div>
                        <div class="u-img hide" id="A1Q"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1Q.jpg"/></div>
                        <div class="u-img hide" id="A1S"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1S.jpg"/></div>
                        <div class="u-img hide" id="A1T"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1T.jpg"/></div>
                        <div class="u-img hide" id="A1U"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1U.jpg"/></div>
                        <div class="u-img hide" id="C1E"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/C1E.jpg"/></div>
                        <div class="u-img hide" id="C1G"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/C1G.jpg"/></div>
                        <div class="u-img hide" id="C1J"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/C1J.jpg"/></div>
                        <div class="u-img hide" id="C1L"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/C1L.jpg"/></div>
                        <div class="u-img hide" id="D1A"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/D1A.jpg"/></div>
                        <div class="u-img hide" id="D1B"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/D1B.jpg"/></div>
                        <div class="u-img hide" id="D1I"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/D1I.jpg"/></div>
                        <div class="u-img hide" id="D1J"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/D1J.jpg"/></div>
                        <div class="u-img hide" id="A1A"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1A.jpg"/></div>
                        <div class="u-img hide" id="A1D"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1D.jpg"/></div>
                        <div class="u-img hide" id="A1G"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1G.jpg"/></div>
                        <div class="u-img hide" id="A1K"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/A1K.jpg"/></div>
                        <div class="u-img hide" id="C1D"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/C1D.jpg"/></div>
                        <div class="u-img hide" id="C1F"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/C1F.jpg"/></div>
                        <div class="u-img hide" id="C1K"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/C1K.jpg"/></div>
                        <div class="u-img hide" id="C1N"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/C1N.jpg"/></div>
                        <div class="u-img hide" id="D1C"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/D1C.jpg"/></div>
                        <div class="u-img hide" id="D1D"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/D1D.jpg"/></div>
                        <div class="u-img hide" id="D1G"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/D1G.jpg"/></div>
                        <div class="u-img hide" id="D1H"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/D1H.jpg"/></div>
                        <div class="u-img hide" id="D1K"><img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/room/D1K.jpg"/></div>



                    </div>
                </div>
            </div>
        </div>

        <!-- --------------------------------------------------- -->
        <!-- --------------- Section Contact ------------------- -->
        <!-- --------------------------------------------------- -->
        <div class="sec-contact" id="sec-contact">
            <div class="container nopadding text-center">
                <div class="contact-header">
                    <h1>ติดต่อโครงการ</h1>
                </div>
                <div class="contact-content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 contact-side contact-right-side add-border-right">
                            <div class="contact-info">
                                <img class="contact-logo" src="<?php echo get_template_directory_uri() ?>/images/house/glam-ladprao/contact-logo.png">
                                <p>
                                    บจก. แอสเซทไวส์ (สำนักงานใหญ่)<br>
                                    ซอยรามอินทรา 5 แยก 23 แขวงอนุสาวรีย์<br>
                                    เขตบางเขน กทม. 10220
                                </p>
                                <!-- <i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:sales-wynnch4@wynn-condo.com">sales-wynnch4@wynn-condo.com</a>
                                <br> -->
                                <a href="tel:021680000" class="telbox"><i class="fa fa-phone" aria-hidden="true"></i> 02-168-0000</a>
                                <div class="social-btn-container">
                                    <!-- <a class="social-btn" target="_blank" href="https://goo.gl/maps/Zaj8q4xTqkQ2">
                                        <img src="<?php echo get_template_directory_uri() ?>/images/condominium/atmoz-ladprao15/contact-sgallery.png" />
                                    </a> -->

                                    <a class="social-btn" target="_blank" href="">
                                        <img src="<?php echo get_template_directory_uri() ?>/images/house/glam-ladprao/contact-gmap.png" />
                                    </a>
                                    <a class="social-btn" style="margin-top:10px;" target="_blank" href="">
                                        <img src="<?php echo get_template_directory_uri() ?>/images/house/glam-ladprao/contact-line.png" />
                                    </a>
                                    <a class="social-btn" style="margin-top:0px;" target="_blank" href="https://www.facebook.com/AssetWiseThailand/">
                                        <img src="<?php echo get_template_directory_uri() ?>/images/house/glam-ladprao/contact-fb.png" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 contact-side">
                            <h4 class="text-center" style="font-weight: 600;margin-top: 0px;"></h4>
                            <div id="showmap">
                                <a class="map-container" href="<?php echo get_template_directory_uri() ?>/images/house/glam-ladprao/map.jpg">
                                    <img class="contact-map" src="<?php echo get_template_directory_uri() ?>/images/house/glam-ladprao/map-thumb.jpg">
                                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                                    คลิกที่ภาพเพื่อขยาย
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!-- #primary -->

    <?php
        $tpl_dir = get_template_directory_uri();
        get_sidebar();
    ?>

    </div><!-- #content -->

    </div><!-- #page -->

    <?php wp_footer(); ?>

    <script>
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }
        $(document).ready(function () {

            $("#reg-form").submit(function(){
                $(".loading").fadeIn(200);
            });

            $( "#submit" ).click(function() {
                $("#submit").css('pointer-events','none');
                $("#submit").css('opacity','0.5');
                $("#submit").html('กำลังบันทึกข้อมูล');
                $(this).delay(5000).queue(function() {
                    $("#submit").css('pointer-events','inherit');
                    $("#submit").css('opacity','1');
                    $("#submit").html('ลงทะเบียน');
                    $(this).dequeue();
                });

            });

            if (getParameterByName('required') == 'name') {
                alert('กรุณากรอกชื่อของท่าน');
            }
            if (getParameterByName('required') == 'surname') {
                alert('กรุณากรอกนามสกุลของท่าน');
            }
            if (getParameterByName('required') == 'tel') {
                alert('กรุณากรอกหมายเลขโทรศัพท์ของท่าน');
            }
            if (getParameterByName('required') == 'email') {
                alert('กรุณากรอกอีเมลของท่าน');
            }
        });
    </script>
</div>
