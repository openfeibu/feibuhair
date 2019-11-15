<nav class="noo-main-menu">
    <ul class="nav-collapse navbar-nav">

        <li class="menu-item-has-children">
            <a href="index.php">Home</a>

        </li>
        <li class="menu-item-has-children">
            <a href="shopList.html">Product</a>
            <ul class="sub-menu">
                <?php $_from = $this->_var['navigator_list']['top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_top_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_top_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_top_list']['iteration']++;
?>
                <?php if (($this->_foreach['nav_top_list']['iteration'] == $this->_foreach['nav_top_list']['total'])): ?>
                <li><a href="<?php echo $this->_var['nav']['url']; ?>"

                    <?php if ($this->_var['nav']['opennew'] == 1): ?>
                    target="_blank"
                    <?php endif; ?>
                    ><?php echo $this->_var['nav']['name']; ?></a></li>
                <?php else: ?>
                <li><a href="<?php echo $this->_var['nav']['url']; ?>"

                    <?php if ($this->_var['nav']['opennew'] == 1): ?>
                    target="_blank"
                    <?php endif; ?>
                    ><?php echo $this->_var['nav']['name']; ?></a></li>
                <?php endif; ?>
                <?php if ($this->_var['nav']['active'] == 1): ?>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

            </ul>
        </li>
        <li><a href="blog-alternate.html">News</a></li>
        <li><a href="contact-us.html">Contact</a></li>
    </ul>
</nav>
<div class="navbar-meta">
    <ul>
        <li > <a class="login" href="my-account.html">Login</a></li>
    </ul>
</div>