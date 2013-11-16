<!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?= $site_name ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?= HTML::menu_item('home', 'index', 'Home') ?> 
            <?= HTML::menu_item('home', 'about', 'About') ?> 
            <?= HTML::menu_item('home', 'contact', 'Contact') ?> 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
