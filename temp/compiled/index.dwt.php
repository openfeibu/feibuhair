<?php echo $this->fetch('library/header.lbi'); ?>
<body>
<!-- <div class="noo-spinner">
    <div class="sk-rotating-plane"></div>
</div> -->
<div class="site">
    <?php echo $this->fetch('library/index_header.lbi'); ?>

    <div id="main">
        <div class="section">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img class="cover-image" src="themes/default/images/slider/banner3.jpg" /></div>
                    <div class="swiper-slide"><img class="cover-image" src="themes/default/images/slider/banner2.jpg" /></div>
                </div>
                
                <div class="swiper-pagination"></div>
                <div class="swiper-banner-prev hidden-xs"></div>
                <div class="swiper-banner-next hidden-xs"></div>
            </div>
            <!-- <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 p-0">
                        <div id="rev_slider" class="rev_slider " style="height: auto !important;">
                            <ul>
                                <li data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="themes/default/images/slider/banner2.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide">
                                    <img src="themes/default/images/slider/banner2.jpg" alt="" data-bgposition="center center" data-bgfit="100% auto" data-bgrepeat="no-repeat" class="rev-slidebg" />

                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="section pt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="features">
                        <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
                        <div class="type-item col-md-2 col-sm-3 mb-1 col-xs-3">
                            <a href="<?php echo $this->_var['cat']['url']; ?>" class="image-zoom">
                                <div class="imgbox">
                                    <img src="<?php echo $this->_var['cat']['thumb']; ?>" alt="" class="" />
                                </div>
                                <p><?php echo htmlspecialchars($this->_var['cat']['name']); ?></p>
                            </a>
                        </div>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="section pt-6">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="noo-section-title">
                            <h3><span>Featured Products</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section pb-9">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tabbable noo-product-filter text-center">
                            <ul class="nav nav-tabs">
                                <?php $_from = $this->_var['categories_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('categories_goods_key', 'categories_goods_item');$this->_foreach['categories_goods_name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['categories_goods_name']['total'] > 0):
    foreach ($_from AS $this->_var['categories_goods_key'] => $this->_var['categories_goods_item']):
        $this->_foreach['categories_goods_name']['iteration']++;
?>
                                <li
                                    <?php if (($this->_foreach['categories_goods_name']['iteration'] <= 1)): ?>
                                    class="active"
                                    <?php endif; ?>
                                >
                                    <a href="#tab-<?php echo $this->_foreach['categories_goods_name']['iteration']; ?>" data-toggle="tab"><?php echo $this->_var['categories_goods_item']['name']; ?></a>
                                </li>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </ul>
                            <div class="tab-content">
                                <?php $_from = $this->_var['categories_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('categories_goods_key', 'categories_goods_item');$this->_foreach['categories_goods_name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['categories_goods_name']['total'] > 0):
    foreach ($_from AS $this->_var['categories_goods_key'] => $this->_var['categories_goods_item']):
        $this->_foreach['categories_goods_name']['iteration']++;
?>
                                <div class="tab-pane fade <?php if (($this->_foreach['categories_goods_name']['iteration'] <= 1)): ?>
                                   active
                                <?php endif; ?> in" id="tab-<?php echo $this->_foreach['categories_goods_name']['iteration']; ?>">
                                    <div class="noo-product-grid">
                                    <?php $_from = $this->_var['categories_goods_item']['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('goods_key', 'goods_item');$this->_foreach['goods_name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_name']['total'] > 0):
    foreach ($_from AS $this->_var['goods_key'] => $this->_var['goods_item']):
        $this->_foreach['goods_name']['iteration']++;
?>
                                        <div class="noo-product-item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                            <div class="noo-product-inner">
                                                <a href="<?php echo $this->_var['goods_item']['url']; ?>">
                                                    <div class="noo-product-thumbnail">
                                                        <img src="<?php echo $this->_var['goods_item']['goods_img']; ?>" alt="<?php echo $this->_var['goods_item']['name']; ?>" />
                                                    </div>
                                                    <h3><?php echo $this->_var['goods_item']['name']; ?></h3>
                                                    <div class="price">
                                                        <del><?php echo $this->_var['goods_item']['market_price']; ?></del>
                                                        <ins><?php echo $this->_var['goods_item']['shop_price']; ?></ins>
                                                    </div>
                                                    <div class="noo-loop-cart">
                                                        <span class="button add-to-cart"></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </div>
                                </div>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section section-testimonial pt-8 pb-8">
            <div class="section pb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="noo-section-title">
                                <h3><span style="color: #fff;">Sale Team</span></h3>
                                <!-- <p>hottest products of month</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="white">
                        <div class="col-md-3 col-sm-6 col-xs-12 text-center sale-item" style="padding:10px 0;">
                            <img src="themes/default/images/avatar/nvren.png" alt="" style="background: #fff;border-radius: 50%;max-width: 100px;padding:10px;margin-bottom:20px;"/>
                            <div class="noo-testimonial-content">
												<span class="testimonial-author">
													<strong>Allen</strong>
												</span>
                                <p>whatApp:+8615920541738</p>
                                <p>Instagram:+8615920541738</p>
                                <p>email:595642191@qq.com</p>
                                <div class="tell-button text-center" style="padding:0 10%;">
                                    <a href="https://api.whatsapp.com/send?phone=8615920541739" class="col-sm-4 col-xs-2 col-xs-offset-3 col-sm-offset-0"><img width="100%" src="themes/default/images/whatapp.png" alt="" /></a>
                                    <a href="https://api.whatsapp.com/send?phone=86手机号码；" class="col-sm-4 col-xs-2 "><img width="100%" src="themes/default/images/ins.png" alt="" /></a>
                                    <a href="mailto:595642191@qq.com"  class="col-sm-4 col-xs-2"><img width="100%" src="themes/default/images/email.png" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 text-center sale-item" style="padding:10px 0;">
                            <img src="themes/default/images/avatar/nanren.png" alt="" style="background: #fff;border-radius: 50%;max-width: 100px;padding:10px;margin-bottom:20px;"/>
                            <div class="noo-testimonial-content">
												<span class="testimonial-author">
													<strong>Allen</strong>
												</span>
                                <p>whatApp:+8615920541738</p>
                                <p>Instagram:+8615920541738</p>
                                <p>email:595642191@qq.com</p>
                                <div class="tell-button text-center" style="padding:0 10%;">
                                    <a href="" class="col-sm-4 col-xs-2 col-xs-offset-3 col-sm-offset-0"><img width="100%" src="themes/default/images/whatapp.png" alt="" /></a>
                                    <a href="" class="col-sm-4 col-xs-2"><img width="100%" src="themes/default/images/ins.png" alt="" /></a>
                                    <a href="" class="col-sm-4 col-xs-2"><img width="100%" src="themes/default/images/email.png" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 text-center sale-item" style="padding:10px 0;">
                            <img src="themes/default/images/avatar/nvren.png" alt="" style="background: #fff;border-radius: 50%;max-width: 100px;padding:10px;margin-bottom:20px;"/>
                            <div class="noo-testimonial-content">
												<span class="testimonial-author">
													<strong>Allen</strong>
												</span>
                                <p>whatApp:+8615920541738</p>
                                <p>Instagram:+8615920541738</p>
                                <p>email:595642191@qq.com</p>
                                <div class="tell-button text-center" style="padding:0 10%;">
                                    <a href="" class="col-sm-4 col-xs-2 col-xs-offset-3 col-sm-offset-0"><img width="100%" src="themes/default/images/whatapp.png" alt="" /></a>
                                    <a href="" class="col-sm-4 col-xs-2"><img width="100%" src="themes/default/images/ins.png" alt="" /></a>
                                    <a href="" class="col-sm-4 col-xs-2"><img width="100%" src="themes/default/images/email.png" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 text-center sale-item" style="padding:10px 0;">
                            <img src="themes/default/images/avatar/nvren.png" alt="" style="background: #fff;border-radius: 50%;max-width: 100px;padding:10px;margin-bottom:20px;"/>
                            <div class="noo-testimonial-content">
												<span class="testimonial-author">
													<strong>Allen</strong>
												</span>
                                <p>whatApp:+8615920541738</p>
                                <p>Instagram:+8615920541738</p>
                                <p>email:595642191@qq.com</p>
                                <div class="tell-button text-center" style="padding:0 10%;">
                                    <a href="" class="col-sm-4 col-xs-2 col-xs-offset-3 col-sm-offset-0"><img width="100%" src="themes/default/images/whatapp.png" alt="" /></a>
                                    <a href="" class="col-sm-4 col-xs-2"><img width="100%" src="themes/default/images/ins.png" alt="" /></a>
                                    <a href="" class="col-sm-4 col-xs-2"><img width="100%" src="themes/default/images/email.png" alt="" /></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <div class="section pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="noo-section-title mb-7">
                            <h3><span>FeibuHair News</span></h3>
                            <p>Lastest News of Week</p>
                        </div>
                        <div class="noo-blog">
                            <div class="noo-blog-item style-2 clearfix">
                                <a class="noo-blog-thumbnail" href="blog-detail.html" data-image="themes/default/images/product/bundles.jpg">
                                    <span class="view-link"></span>
                                </a>
                                <div class="noo-blog-entry">
                                    <h3><a href="blog-detail.html">Summer is Calling: Sophie Hulme Citrus Fruit Tote</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi malesuada malesuada feugiat. Aenean magna enim, scelerisque quis augue vulputate, accumsan pharetra diam. Sed vehicula nibh quis mi venenatis scelerisque. Nullam...</p>
                                    <a class="view_link" href="blog-detail.html">
                                        read more<i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="news-list clearfix ">
                            <ul>
                                <li><a href="#">FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair</a></li>
                                <li><a href="#">FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair</a></li>
                                <li><a href="#">FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair</a></li>
                                <li><a href="#">FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair</a></li>
                                <li><a href="#">FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair</a></li>
                                <li><a href="#">FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair</a></li>
                                <li><a href="#">FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair</a></li>
                                <li><a href="#">FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair</a></li>
                                <li><a href="#">FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair</a></li>
                                <li><a href="#">FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair FeibuHair</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section pt-5 pb-10 bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="noo-services text-center pt-5">
                            <div class="noo-service-icon">
                                <i class="fa fa-paper-plane-o"></i>
                                <i class="fa fa-paper-plane-o"></i>
                            </div>
                            <div class="noo-service-content">
                                <h3>International express</h3>
                                <p>The soonest shipment will be on the same day, and the goods will arrive in 2-3 days</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="noo-services text-center pt-5">
                            <div class="noo-service-icon">
                                <i class="fa fa-shield"></i>
                                <i class="fa fa-shield"></i>
                            </div>
                            <div class="noo-service-content">
                                <h3>security</h3>
                                <p>Support PayPal, wire transfer. Safe mode of payment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="noo-services text-center pt-5">
                            <div class="noo-service-icon">
                                <i class="fa fa-gift"></i>
                                <i class="fa fa-gift"></i>
                            </div>
                            <div class="noo-service-content">
                                <h3>Gift giving</h3>
                                <p>Every order will have a gift</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section section-simplenews">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="noo-simplenews style-2 text-center">
                            <h3 class="noo-mail-title white">FeibuHair You're worth it.</h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->fetch('library/footer.lbi'); ?>
</body>
</html>