
<header class="noo-header fixed_top header-1">
    <div class="navbar-wrapper">
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-logo">
                    <a href="./" class="custom-logo-link">
                        <img src="themes/default/images/logo.png" alt="Logo"/>
                    </a>
                    <button data-target=".nav-collapse" class="btn-navbar noo_icon_menu icon_menu"></button>
                </div>
                <?php echo $this->fetch('library/nav.lbi'); ?>
            </div>
        </div>
    </div>
    <div class="search-header">
        <div class="remove-form"></div>
        <div class="container">
            <form class="form-horizontal noo-umbra-searchform" id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()">
                <label class="note-search">Type and Press Enter to Search</label>
                <input type="search" name="keywords" id="keyword" class="form-control" value="<?php echo htmlspecialchars($this->_var['search_keywords']); ?>" placeholder="Enter keyword to search..."/>
                <button type="submit" class="noo-search-submit"><i class="icon_search"></i></button>
            </form>
        </div>
    </div>
</header>

<div class="noo-page-heading shop-heading">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="noo-heading-content">
                    <h1 class="page-title">Feibu Hair</h1>
                    <p></p>

                </div>
            </div>
        </div>
    </div>
</div>