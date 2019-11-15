<?php echo $this->fetch('library/header.lbi'); ?>
<body>
<div class="noo-spinner">
    <div class="sk-rotating-plane"></div>
</div>
<div class="site">
  <?php echo $this->fetch('library/page_header.lbi'); ?>
    <div id="main">
        <div class="section mb-10">
            <div class="container shopList">
                <div class="noo-container-catalog">
                    <div class="noo-catalog">
                        <p class="commerce-result-count hidden-xs hidden-sm">Showing all 9 results</p>

                        <div class="commerce-catalog pull-left">
                            <select class="orderby pull-left">
                                <option value="" selected="selected">Default sorting</option>
                                <option value="">Sort by popularity</option>
                                <option value="">Sort by average rating</option>
                                <option value="">Sort by newness</option>
                                <option value="">Sort by price: low to high</option>
                                <option value="">Sort by price: high to low</option>
                            </select>
                            <select class="noo-woo-filter">
                                <option value="">Filter type</option>
                                <option value="">all</option>
                                <option value="">bundles</option>
                                <option value="">Wigs</option>
                                <option value="">Lace</option>
                                <option value="">Pins</option>
                            </select>
                            <select class="noo-woo-filter">
                                <option value="">Filter Texture</option>
                                <option value="">all</option>
                                <option value="">13*4</option>
                                <option value="">Wigs</option>
                                <option value="">Lace</option>
                                <option value="">Pins</option>
                            </select>
                            <select class="noo-woo-filter">
                                <option value="">Filter color</option>
                                <option value="">all</option>
                                <option value="">1B</option>
                                <option value="">613</option>
                                <option value="">1B-613</option>
                            </select>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="noo-product-grid">
                            <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?>
                            <div class="noo-product-item col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                <div class="noo-product-inner">
                                    <a href="<?php echo $this->_var['goods']['url']; ?>">
                                        <div class="noo-product-thumbnail">
                                            <img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" />
                                        </div>
                                        <h3><?php echo $this->_var['goods']['goods_name']; ?></h3>
                                        <div class="price">
                                            <del><?php echo $this->_var['goods']['market_price']; ?></del>
                                            <ins> <?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?>
                                              <?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></ins>
                                        </div>
                                        <div class="noo-loop-cart">
                                            <span class="button add-to-cart"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </div>
                        <div class="pagination list-center">
                            <a class="prev page-numbers" href="#">
                                <i class="fa fa-long-arrow-left"></i>
                            </a>
                            <a class="page-numbers" href="#">1</a>
                            <span class="page-numbers current">2</span>
                            <a class="page-numbers" href="#">3</a>
                            <a class="page-numbers" href="#">4</a>
                            <a class="next page-numbers" href="#">
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3" style="float: left;">
                        <div class="noo-sidebar-wrap">
                            <div class="widget widget_search">
                                <h4 class="widget-title">Search</h4>
                                <form>
                                    <input type="search" name="s" class="form-control" value="" placeholder="Enter keyword to search..." />
                                    <button type="submit" class="noo-search-submit"><i class="icon_search"></i></button>
                                </form>
                            </div>
                            <div class="widget widget_categories">
                                <h4 class="widget-title">Blog Categories</h4>
                                <ul>
                                    <li><a href="#">Bag Trend Alert</a> (3)</li>
                                    <li><a href="#">Furniture Tips</a> (3)</li>
                                    <li><a href="#">Inspired Ideas</a> (3)</li>
                                    <li><a href="#">Interior Trends</a> (3)</li>
                                </ul>
                            </div>
                            <div class="widget widget_recent_entries">
                                <h4 class="widget-title">Recent Posts</h4>
                                <ul>
                                    <li>
                                        <a href="#">Summer is Calling: Sophie Hulme Citrus Fruit Tote</a>
                                    </li>
                                    <li>
                                        <a href="#">The New Marc Jacobs Gotham Saddle Bag Black</a>
                                    </li>
                                    <li>
                                        <a href="#">Spring Color Bag Trends Summer 2016</a>
                                    </li>
                                    <li>
                                        <a href="#">Freshen The Bed in a Beautiful Way</a>
                                    </li>
                                    <li>
                                        <a href="#">Create Gallery Walls in 3 Fun Steps</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->fetch('library/footer.lbi'); ?>
</div>


</body>
</html>