    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php?">Meat Suite</a>
          <div class="nav-collapse">
            <ul class="nav">
                <?php foreach($pages as $page => $values) : ?>
                    <?php if(!isset($values['showInMenu']) || $values['showInMenu']) : ?>
                        <li class= "<?php if($page == $currentPage) echo 'active'; ?>">
                            <a 
                            href="index.php?page=<?php echo $page; if ($page == 'learnmore'){ echo '&tab=0';} ?>"><?php echo $values["header"]; ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>