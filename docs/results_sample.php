<!DOCTYPE html>

<html lang="en">

    <?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "minamina123";
        $database = "mina";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "connected";
        }
        catch(PDOException $e) {
            echo "failed" . $e->getMessage();
        }
    ?>

    <head>

        <meta charset="UTF-8"/>

        <meta name="description" content="some html examples"/>

        <meta name="keywords" content="examples"/>

        <link rel="stylesheet" href="styles.css"/>

        <!-- used for icons such as the 5 star ratings-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta name="viewport" content="width=device-width">

        <link rel="shortcut icon" href="favicon.png" type="image/png" />

        <title>Search Results</title>

    </head>

    <body>
        <!-- Header with mobile scaling -->
        <div class="header">
            <a id="headerTitle" href="index.html" class="logo">Gas Station Reviews</a>
            <div class="headerRight">
                <a href="index.html">Search</a>
                <a href="registration.html">Register</a>
                <a href="submission.html">Submit a Review</a>
            </div>
        </div>

        <div class="results_title">
            <!-- this will be replaced with a search variables -->
            <strong>Search Results for Warsaw:</strong>
        </div>

        <!-- Starting a main body container -->
        <div class="results_container">

        <div class="map_div" id="map">
            <!--<img src="images/gas_map.png" alt="BEST POLAND GAS MAP" style="margin:auto;">-->
            <!-- Call the google maps API-->

            <!--<script src="maps.js"></script>-->
        </div>
        
        <!-- call the js script to display the map -->
        <script src="maps.js"></script>
      
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYWt_DkIlWbveDMzC_m7eZ8t4jKtmzxcQ&callback=show_results_map" async defer>
        </script>

        <div class="results_main">
            <ol>
                <?php

                $searchInput = $_SESSION["searchKey"];

                $stmt = $conn->query("SELECT * FROM `gasStations` WHERE (name like '$searchInput') OR (address like '$searchInput')");
                while ($row = $stmt->fetch()) {
                    //echo $row[4];
                    $name = $row[1];
                    $addr = $row[2];
                    $rate = (int)$row[4];
                    echo '<li>';
                        echo '<div>';
                            echo '<a href="individual_sample.php">' . $name . '</a>';
                            //getting images from s3 bucket still TO DO
                            echo '<img class="results_imgs" src="images/poland1.jpg" alt="BEST POLAND GAS">';
                            echo '<br/>';
                            for ($x = 0; $x < $rate; $x++) {
                                echo '<span class="fa fa-star checked"></span>';
                            }
                            echo '<br/>';
                            echo '<div class="address_text">'. $addr . '</div>';
                        echo '</div>';
                    echo '</li>';
                }
                ?>
            </ol>

        </div>

        <!-- Column of results, pictures names and addresses -->
        <!-- <div class="results_main">
            <ol>

                <li>
                    <div id="gas_result1">
                        <a href="individual_sample.html"> Petro Poland</a> 
                        <img class="results_imgs" src="images/poland1.jpg" alt="BEST POLAND GAS"> 
                        <br/>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <br/>
                        <div class="address_text" id="gas_addr1">ul. Grzybowska 73 <br/>Mirów</div>
                    </div>
                </li>

                <li>
                    <div id="gas_result2">
                        Poland Esso 
                        <img class="results_imgs" src="images/poland2.jpg" alt="BEST POLAND GAS"> 
                        <br/>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <br/>
                        <div class="address_text" id="gas_addr2">ul. Grzybowska 74 <br/>Mirów</div>
                    </div> 
                </li>

                <li>
                    <div id="gas_result3">
                        Poland Shell 
                        <img class="results_imgs" src="images/poland3.jpg" alt="BEST POLAND GAS">
                        <br/>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <br/>
                        <div class="address_text" id="gas_addr3">ul. Grzybowska 75 <br/>Mirów</div>
                    </div>
                </li>

                <li>
                    <div id="gas_result4">
                        Tylers Gas
                        <img class="results_imgs" src="images/poland4.jpg" alt="BEST POLAND GAS">
                        <br/>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <br/>
                        <div class="address_text" id="gas_addr4">ul. Grzybowska 76 <br/>Mirów</div>
                    </div>
                </li>

                <li>
                    <div id="gas_result5">
                        Poland Esso 
                        <img class="results_imgs" src="images/poland2.jpg" alt="BEST POLAND GAS"> 
                        <br/>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <br/>
                        <div class="address_text" id="gas_addr5">ul. Grzybowska 77 <br/>Mirów</div>
                    </div> 
                </li>

                <li>
                    <div id="gas_result6">
                        Poland Shell 
                        <img class="results_imgs" src="images/poland3.jpg" alt="BEST POLAND GAS">
                        <br/>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <br/>
                        <div class="address_text" id="gas_addr6">ul. Grzybowska 78 <br/>Mirów</div>
                    </div>
                </li>
                
                <li>
                    <div id="gas_result7">
                        Tylers Gas
                        <img class="results_imgs" src="images/poland4.jpg" alt="BEST POLAND GAS">
                        <br/>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <br/>
                        <div class="address_text" id="gas_addr7">ul. Grzybowska 79 <br/>Mirów</div>
                    </div>
                </li>
            </ol>
        </div> -->
        <!-- Next and previous buttons-->
            <div class="results_nav" >
                <a class="red_button" >&laquo; Previous</a>
                <a class="red_next_button" >Next &raquo;</a>
            </div>

    </div>
    <!-- End of main container -->

    <footer>
        <p>Gas Station Reviews - 4WW3</p>
    </footer>
    </body>
</html>