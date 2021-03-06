                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <!DOCTYPE html>
<html lang="fr">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $this->fetch('title'); ?>
        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="theme-color" content="#333">

        <?php
        echo $this->Html->meta('description', 'Sport Manager application');
        echo $this->Html->meta('icon');
        echo $this->Html->css(array(    
            'bootstrap',
            'font-awesome',
            'bootstrap-social',
            'jquery.datetimepicker',
            'style',
            'notifications',
            'navigation'
        ));
        echo $this->Html->script(array(
            'jquery-1.12.1',
            'bootstrap',
            'facebook',
            'script',
            'build/jquery.datetimepicker.full.js',
            'http://maps.googleapis.com/maps/api/js?key=AIzaSyCBnBNTOOWw17oKYbmxVYmRW4L13ooMTqw'
        ));
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>

    <body>
        <ul class="navigation">
            <li class="<?php echo (!empty($this->params['action']) && ($this->params['controller'] == 'pages') && ($this->params['action'] == 'home') ) ? 'active' : 'inactive' ?>">
                <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('controller' => 'pages', 'action' => 'home'), array('escape' => false, 'class' => 'homeButton')); ?>
            </li>
            <li class="<?php echo (!empty($this->params['action']) && ($this->params['controller'] == 'pages') && ($this->params['action'] == 'rankings') ) ? 'active' : 'inactive' ?>">
                <?php echo $this->Html->link('Rankings', array('controller' => 'pages', 'action' => 'rankings')); ?>
            </li>
            <li class="<?php echo (!empty($this->params['action']) && ($this->params['controller'] == 'pages') && ($this->params['action'] == 'stickers') ) ? 'active' : 'inactive' ?>">
                <?php echo $this->Html->link('Stickers', array('controller' => 'pages', 'action' => 'stickers')); ?>
            </li>
            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action'] == 'help') ) ? 'active' : 'inactive' ?>">
                <?php echo $this->Html->link('Help', array('controller' => 'pages', 'action' => 'help')); ?>
            </li>
            <li class="<?php echo ($this->params['action'] == 'about') ? 'active' : 'inactive' ?>">
                <?php echo $this->Html->link('About', array('controller' => 'pages', 'action' => 'about')); ?>
            </li>
            <li class="<?php echo ($this->params['action'] == 'contact') ? 'active' : 'inactive' ?>">
                <?php echo $this->Html->link('Contact Us', array('controller' => 'pages', 'action' => 'contact')); ?>
            </li>

            <ul class="pull-right">
                <?php if ($loggedIn == true) { ?>
                <li class="dropdown-list <?php echo ($this->params['controller'] == 'members') ? 'active' : 'inactive' ?>">
                    <a href="<?php echo $this->Html->url(array('controller' => 'members', 'action' => 'profile')); ?>">
                            <?php
                            if ($this->Session->read('picture')) {
                                echo $this->Html->image($picture, array('style' => 'height: 18px; margin-right: 10px'));
                            }
                            if ($googleLogin) {
                                echo $givenName . ' ' . $familyName;
                            } else if ($facebookLogin) {
                                echo $firstName . ' ' . $lastName;
                            } else {
                                echo $username;
                            }
                            ?> 
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-content">
                        <div class="<?php echo ($this->params['action'] == 'profile') ? 'active' : 'inactive' ?>">
                                <?php
                                echo $this->Html->link('<i class="fa fa-user"></i> My profile', array('controller' => 'members', 'action' => 'profile'), array('escape' => false));
                                ?>
                        </div>
                        <div class="<?php echo ($this->params['action'] == 'myWorkouts') ? 'active' : 'inactive' ?>">
                                <?php echo $this->Html->link('<i class="fa fa-calendar"></i> My workouts', array('controller' => 'members', 'action' => 'myWorkouts'), array('escape' => false));
                                ?>
                        </div>
                        <div class="<?php echo ($this->params['action'] == 'myDevices') ? 'active' : 'inactive' ?>">
                                <?php echo $this->Html->link('<i class="fa fa-tablet"></i> My devices', array('controller' => 'members', 'action' => 'myDevices'), array('escape' => false));
                                ?>
                        </div>
                        <hr class="dropdown-separator">
                        <div class="<?php echo ($this->params['action'] == 'account') ? 'active' : 'inactive' ?>">
                                <?php
                                echo $this->Html->link('<i class="fa fa-cogs"></i> My account', array('controller' => 'members', 'action' => 'account'), array('escape' => false));
                                ?>
                        </div>
                        <hr class="dropdown-separator">
                        <div class="logout <?php
                            if ($facebookLogin) {
                                echo 'fbLogout';
                            } elseif ($googleLogin) {
                                echo 'googleLogout';
                            }
                            ?>">
                                     <?php
                                     echo $this->Html->link('<i class="fa fa-sign-out"></i> Log out', array('controller' => 'members', 'action' => 'logout'), array('escape' => false));
                                     ?>
                        </div>
                    </div>
                </li>
                    <?php
                } else {
                    ?>
                <li id="signin" class="<?php echo (!empty($this->params['action']) && ($this->params['action'] == 'signin') ) ? 'active' : 'inactive' ?>">
                        <?php echo $this->Html->link('<i class="fa fa-sign-in"></i> Log in', array('controller' => 'members', 'action' => 'signin'), array('escape' => false)); ?>
                </li>
                <li id="signup" class="<?php echo (!empty($this->params['action']) && ($this->params['action'] == 'signup') ) ? 'active' : 'inactive' ?>">
                        <?php echo $this->Html->link('<i class="fa fa-user-plus"></i> Sign up', array('controller' => 'members', 'action' => 'signup'), array('escape' => false)); ?>
                </li>
                <?php } ?>
            </ul>
            <li class="icon <?php echo ($this->params['action'] == 'home') ? 'inactive' : 'active' ?>">
                <a href="#" id="nav-icon"><i class="fa fa-navicon"></i></a>
            </li>
        </ul>


        <div class="container">
            <div>
                <?php
                echo $this->Flash->render();
                echo $this->fetch('content');
                ?>
                <a href="#" class="back-to-top"><i class="fa fa-arrow-circle-up"></i></a>
            </div>
        </div> <!-- End container -->

        <footer>
            <div class="container">
                <div class="pull-right">
                    <a href="http://s627959079.onlinehome.fr/">Sportmanager</a>
                    <p>Besançon - Fauquenot - Filhastre - Schulz</p>
                    <small id="copyright">Copyright &copy; Sport Manager 2016</small>
                </div>
            </div>
        </footer>
    </body>
</html>