



<?php
error_reporting(0);
/* gets the data from a URL /
function get_data($url) {
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}*/
require 'dbcon.php';
require 'simple_html_dom.php';

            $qry = "SELECT * FROM articles WHERE id = 1";
            $rs = mysql_query($qry);
            if($rs) {
                if(mysql_num_rows($rs) > 0) {
                    $result = mysql_fetch_array($rs);               
                }
            }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RIL-Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <e style="color: orange">
                        R-I-L
                    </e>
                </li>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a data-toggle="modal" data-target="#save">Save a link</a>
                </li>
                <li>
                    <a href="#">My saved links</a>
                </li>
                <li>
                    <a data-toggle="modal" data-target="#search">Search</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Simple Sidebar</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                        <?php
                        for ($i = 0; $i < 7; $i++) {
                        
                        ?>
                        <div class="col-lg-6">
                        <div class="panel panel-info">
                              <div class="panel-heading">
                                <h3 class="panel-title">

                                <?php 
                                $dom = new domDocument('1.0', 'utf-8'); 
                                $html1 = file_get_contents("http://www.bbc.com/news/world-europe-38016557");
                                     // load the html into the object ***/ 
                                     $dom->loadHTML($html1); 
                                     //discard white space 
                                     $dom->preserveWhiteSpace = false; 
                                $html = $dom->getElementsByTagName('title');
                                echo $html->item(0)->textContent;
                                ?></h3>
                              </div>
                              <div class="panel-body">
                              <?php

                              $ptag = $dom->getElementsByTagName('p');
                              //echo $ptag->length;
                              for ($i = 0; $i < $ptag->length; $i++) {
                                  echo $ptag->item($i)->textContent;
                                  echo "<p>";
                              }
                                
                                ?>
                              </div>
                            </div>
                            </div>
                            <?php
                            }
                            ?>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    </div>
                </div>
            </div>
            <!-- MODAL -->
        <div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="save-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="save-label">Save a link!</h3>
                        <p>Type or paste a link here to save the content</p>
                    </div>
                    
                    <div class="modal-body">
                        
                        <form role="form" action="" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-username">Save a link</label>
                                <input type="text" name="form-username" placeholder="type or paste a link eg www.ashesi.edu.gh/stories" class="form-username form-control" id="form-username">
                            </div>
                            <a href="home.html" class="btn btn-primary"> Save! </a>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- MODAL -->
        <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="search-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="search-label">Search from saved links</h3>
                        <p>Enter a key word or phrase to search your saved links</p>
                    </div>
                    
                    <div class="modal-body">
                        
                        <form role="form" action="" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-username">Search</label>
                                <input type="text" name="form-username" placeholder="Type a key word or phrase" class="form-username form-control" id="form-username">
                            </div>
                            <a href="home.html" class="btn btn-primary">Search!</a>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
