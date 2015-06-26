<?php
    ob_start();
session_start();

include("includes/header.php");
include("includes/left_menu.php");

$get_dealer_id  = "SELECT dealer_id FROM userlogindetails WHERE id='".$_SESSION['id']."'";
$get_dealer_res = mysql_query($get_dealer_id);
$get_dealer_rec = mysql_fetch_array($get_dealer_res);

$get_inv_count = "SELECT DISTINCT VIN FROM inventory_details WHERE id='".$get_dealer_rec['dealer_id']."' AND is_inv='1'"; 
$get_inv_res   = mysql_query($get_inv_count);
$get_count     = mysql_num_rows($get_inv_res);

$get_last_date = "SELECT add_date FROM inventory_details WHERE id='".$get_dealer_rec['dealer_id']."' AND is_inv='1' ORDER BY add_date DESC"; 
$get_last_date_res   = mysql_query($get_last_date);
$get_last_date_rec   = mysql_fetch_array($get_last_date_res);

$get_make = "SELECT DISTINCT Make FROM inventory_details WHERE id='".$get_dealer_rec['dealer_id']."' AND is_inv='1' ORDER BY Make"; 

$get_make_res = mysql_query($get_make);

while ($get_make_arr = mysql_fetch_array($get_make_res))
{
  $get_make_count = "SELECT VIN FROM inventory_details WHERE id='".$get_dealer_rec['dealer_id']."' AND Make='".$get_make_arr['Make']."' AND is_inv='1'"; 
  
  $get_make_count_res = mysql_query($get_make_count);
  $get_make_count_arr[$get_make_arr['Make']] = mysql_num_rows($get_make_count_res); 
 
   
}
 
@arsort($get_make_count_arr);

?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>       
<script src="js_graph/highcharts.js"></script>
<script src="js_graph/modules/exporting.js"></script>

<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Monthly Average Temperature',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: WorldClimate.com',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'New York',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
        }, {
            name: 'Berlin',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
});


</script>

<script type="text/javascript">
$(function () {
    $('#container1').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false
        },
        title: {
            text: 'Browser market shares at a specific website, 2014'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['Firefox',   45.0],
                ['IE',       26.8],
                {
                    name: 'Chrome',
                    y: 12.8,
                    sliced: true,
                    selected: true
                },
                ['Safari',    8.5],
                ['Opera',     6.2],
                ['Others',   0.7]
            ]
        }]
    });
});

</script>


			        

        <!--<div id="div-mid">
            
    <div class="cont">
    <div class="div-panel round-corner gap-bot align-left" style="width: 49.2%;">
        <h4>
            Inventory Management
</h4>
        <div class="panel-body" id="container"  style="height: 400px;">
		
		
        </div>
    </div>
    
    <div class="div-panel round-corner gap-bot align-right" style="width: 49.2%;">
        <h4>
            SEO SEM
</h4>
        <div class="panel-body" id="container1" style="height: 400px;">
		

        </div>
    </div>
    </div>
    <div class="cont">
    <div class="div-panel round-corner gap-bot align-center" style="width: 70%;">
        <h4>
            Online Performance Center

</h4>
        <div class="panel-body">
		
		<img id="imgMap" src="http://vodastra.com/admin/images/map_usa.gif" border="0" alt="Map" usemap="#mapUSAMap" height="383" width="792"/>
		
		<map name="mapUSAMap">
                        <area shape="poly" id="alabama" onMouseOver="swapImages('imgMap', 'map_alabama')" onMouseOut="swapImages('imgMap', 'map_image')" coords="541,277, 546,277, 548,273, 552,277, 555,277, 553,273, 551,270, 578,266, 577,261, 576,254, 577,251, 577,249, 574,246, 570,235, 565,219, 541,221" href="job_order_display.php?action=search&st=AL">
                        <area shape="poly" id="alaska" onMouseOver="swapImages('imgMap', 'map_alaska')" onMouseOut="swapImages('imgMap', 'map_image')" coords="100,89, 113,89, 111,96, 114,97, 118,96, 118,93, 116,89, 116,79, 116,74, 124,77, 129,73, 137,73, 147,74, 170,91, 172,96, 161,156, 169,161, 172,168, 179,161, 196,187, 196,196, 188,190, 193,216, 188,212, 185,202, 183,192, 183,189, 179,185, 174,180, 171,172, 166,168, 161,161, 150,156, 142,147, 139,147, 139,153, 136,154, 123,153, 116,161, 112,165, 105,165, 104,159, 94,161, 83,161, 72,161, 59,161, 47,161, 39,161, 32,154, 31,153, 47,156, 58,159, 77,159, 94,153, 100,148, 90,143, 87,138, 89,133, 84,127, 75,120, 86,114, 93,110, 79,93, 101,89" href="job_order_display.php?action=search&st=AK">
                        <area shape="poly" id="arizona" onMouseOver="swapImages('imgMap', 'map_arizona')" onMouseOut="swapImages('imgMap', 'map_image')" coords="291,196, 338,200, 334,270, 313,265, 276,246, 282,243, 280,237, 287,227, 284,222, 283,216, 284,212, 287,205, 291,205, 291,200" href="job_order_display.php?action=search&st=AZ">
                        <area shape="poly" id="arkansas" onMouseOver="swapImages('imgMap', 'map_arkansas')" onMouseOut="swapImages('imgMap', 'map_image')" coords="476,209, 519,205, 518,212, 524,212, 521,220, 521,224, 518,226, 517,233, 514,235, 512,241, 512,246, 512,248, 486,249, 486,243, 479,243, 479,220" href="job_order_display.php?action=search&st=AR">
                        <area shape="poly" id="california" onMouseOver="swapImages('imgMap', 'map_california')" onMouseOut="swapImages('imgMap', 'map_image')" coords="287,226, 284,230, 282,234, 279,237, 281,243, 277,246, 253,244, 254,238, 245,225, 238,221, 235,216, 228,215, 223,212, 225,205, 221,201, 217,192, 216,185, 217,183, 215,176, 213,173, 207,150, 205,133, 208,126, 213,114, 250,124, 240,161, 283,217, 284,223" href="job_order_display.php?action=search&st=CA">
                        <area shape="poly" id="colorado" onMouseOver="swapImages('imgMap', 'map_colorado')" onMouseOut="swapImages('imgMap', 'map_image')" coords="347,156, 407,159, 407,205, 339,200, 344,156" href="job_order_display.php?action=search&st=CO">

                        <area shape="poly" id="connecticut" onMouseOver="swapImages('imgMap', 'map_connecticut')" onMouseOut="swapImages('imgMap', 'map_image')" coords="659,107, 660,110, 660,113, 661,114, 665,114, 668,113, 672,110, 674,110, 674,107, 673,107, 673,104, 673,102, 670,102, 667,104, 665,104, 661,107" href="job_order_display.php?action=search&st=CT">
                        <area shape="circle" id="dc" onMouseOver="swapImages('imgMap', 'map_dc')" onMouseOut="swapImages('imgMap', 'map_image')" coords="665,178,6" href="job_order_display.php?action=search&st=DC">
                        <area shape="circle" id="dc1" onMouseOver="swapImages('imgMap', 'map_dc')" onMouseOut="swapImages('imgMap', 'map_image')" coords="634,156,5" href="job_order_display.php?action=search&st=DC">
                        <area shape="poly" id="delaware" onMouseOver="swapImages('imgMap', 'map_delaware')" onMouseOut="swapImages('imgMap', 'map_image')" coords="648,143, 652,150, 672,150, 672,159, 659,159, 657,156, 652,156, 650,151" href="job_order_display.php?action=search&st=DE">
                        <area shape="poly" id="florida" onMouseOver="swapImages('imgMap', 'map_florida')" onMouseOut="swapImages('imgMap', 'map_image')" coords="616,263, 620,277, 626,285, 631,289, 631,296, 638,305, 639,313, 639,319, 638,324, 638,328, 631,329, 629,324, 625,321, 623,320, 619,318, 618,314, 615,310, 612,308, 609,303, 607,296, 607,288, 604,283, 597,277, 593,277, 588,275, 585,277, 580,277, 578,279, 572,277, 567,273, 559,273, 556,275, 554,271, 578,267, 587,267, 605,267, 608,267, 611,265, 612,263" href="job_order_display.php?action=search&st=Florida">
                        <area shape="poly" id="georgia" onMouseOver="swapImages('imgMap', 'map_georgia')" onMouseOut="swapImages('imgMap', 'map_image')" coords="566,219, 578,216, 588,216, 589,219, 592,221, 602,229, 608,233, 613,238, 614,243, 616,246, 617,246, 617,251, 615,252, 615,258, 614,261, 611,263, 608,266, 580,267, 578,254, 578,248" href="job_order_display.php?action=search&st=GA">
                        <area shape="poly" id="hawaii" onMouseOver="swapImages('imgMap', 'map_hawaii')" onMouseOut="swapImages('imgMap', 'map_image')" coords="3,200, 8,198, 13,198, 41,209, 49,216, 60,216, 72,224, 94,249, 76,259, 70,246, 59,231, 45,239, 37,239, 38,230, 37,216, 31,216, 31,212, 3,205" href="job_order_display.php?action=search&st=HI">
                        <area shape="poly" id="idaho" onMouseOver="swapImages('imgMap', 'map_idaho')" onMouseOut="swapImages('imgMap', 'map_image')" coords="291,49, 300,50, 297,55, 297,65, 306,80, 305,93, 310,93, 314,108, 331,108, 327,138, 276,130, 281,107, 283,105, 281,103, 287,91, 287,83, 287,72" href="job_order_display.php?action=search&st=ID">
                        <area shape="poly" id="illinois" onMouseOver="swapImages('imgMap', 'map_illinois')" onMouseOut="swapImages('imgMap', 'map_image')" coords="508,136, 530,133, 534,140, 535,151, 538,170, 538,174, 541,178, 538,185, 535,192, 534,196, 527,198, 524,192, 519,187, 514,185, 516,178, 512,176, 509,170, 504,164, 506,156, 508,153, 506,149, 512,143, 509,138" href="job_order_display.php?action=search&st=IL">

                        <area shape="poly" id="indiana" onMouseOver="swapImages('imgMap', 'map_indiana')" onMouseOut="swapImages('imgMap', 'map_image')" coords="536,141, 559,136, 564,168, 564,172, 562,172, 560,176, 557,180, 556,183, 552,180, 549,185, 544,185, 541,187, 538,187, 541,178, 541,174, 538,163" href="job_order_display.php?action=search&st=IN">
                        <area shape="poly" id="iowa" onMouseOver="swapImages('imgMap', 'map_iowa')" onMouseOut="swapImages('imgMap', 'map_image')" coords="455,130, 455,133, 455,136, 464,161, 501,158, 502,161, 504,156, 506,156, 506,153, 503,149, 512,143, 506,133, 503,133, 500,125, 455,127" href="job_order_display.php?action=search&st=Iowa">
                        <area shape="poly" id="kansas" onMouseOver="swapImages('imgMap', 'map_kansas')" onMouseOut="swapImages('imgMap', 'map_image')" coords="407,205, 407,170, 468,170, 468,173, 475,180, 475,205" href="job_order_display.php?action=search&st=KS">
                        <area shape="poly" id="kentucky" onMouseOver="swapImages('imgMap', 'map_kentucky')" onMouseOut="swapImages('imgMap', 'map_image')" coords="529,205, 529,198, 536,196, 538,187, 545,187, 550,185, 554,182, 558,185, 559,178, 564,174, 564,170, 566,168, 568,168, 573,170, 578,170, 582,170, 583,170, 588,172, 589,177, 594,180, 594,183, 589,187, 582,194, 548,200, 541,200, 538,200, 536,203" href="job_order_display.php?action=search&st=KY">
                        <area shape="poly" id="louisiana" onMouseOver="swapImages('imgMap', 'map_louisiana')" onMouseOut="swapImages('imgMap', 'map_image')" coords="486,249, 486,263, 491,270, 491,288, 493,287, 506,289, 508,287, 512,287, 520,294, 522,293, 524,292, 528,291, 528,293, 532,290, 537,292, 538,292, 538,291, 533,288, 533,284, 534,282, 531,281, 528,283, 526,282, 524,281, 526,278, 532,279, 531,277, 530,273, 530,270, 512,270, 514,260, 516,256, 512,249" href="job_order_display.php?action=search&st=LA">
                        <area shape="poly" id="maine" onMouseOver="swapImages('imgMap', 'map_maine')" onMouseOut="swapImages('imgMap', 'map_image')" coords="666,59, 668,54, 668,49, 666,39, 668,30, 672,31, 676,26, 682,28, 686,40, 688,43, 691,44, 694,47, 699,49, 699,51, 697,56, 694,59, 691,62, 688,62, 686,67, 684,71, 680,73, 676,84, 670,71" href="job_order_display.php?action=search&st=ME">
                        <area shape="poly" id="maryland" onMouseOver="swapImages('imgMap', 'map_maryland')" onMouseOut="swapImages('imgMap', 'map_image')" coords="613,150, 615,153, 624,150, 629,153, 634,150, 639,153, 641,161, 645,161, 652,168, 672,168, 672,161, 655,161, 655,156, 652,156, 648,151, 647,145, 647,141, 647,140, 639,143, 629,145" href="job_order_display.php?action=search&st=MD">
                        <area shape="poly" id="massachusetts" onMouseOver="swapImages('imgMap', 'map_massachusetts')" onMouseOut="swapImages('imgMap', 'map_image')" coords="659,97, 670,93, 677,89, 680,93, 681,86, 693,87, 694,93, 691,95, 691,100, 693,104, 691,104, 685,107, 680,104, 679,103, 676,99, 673,100, 669,100, 666,102, 661,104, 659,104" href="job_order_display.php?action=search&st=MA">
                        <area shape="poly" id="michigan" onMouseOver="swapImages('imgMap', 'map_michigan')" onMouseOut="swapImages('imgMap', 'map_image')" coords="550,89, 560,93, 564,95, 566,104, 560,107, 560,110, 562,114, 566,110, 566,107, 570,107, 576,119, 571,133, 541,138, 546,127, 541,114, 541,97, 546,101, 547,97, 547,95, 504,86, 512,79, 520,71, 517,81, 524,79, 528,83, 541,79, 554,83, 545,86, 528,97, 524,93, 524,91, 506,87" href="job_order_display.php?action=search&st=MI">

                        <area shape="poly" id="minnesota" onMouseOver="swapImages('imgMap', 'map_minnesota')" onMouseOut="swapImages('imgMap', 'map_image')" coords="447,62, 461,62, 462,59, 465,62, 468,65, 475,65, 483,67, 488,68, 491,70, 495,70, 498,69, 502,70, 506,70, 498,73, 495,76, 493,79, 491,81, 488,83, 488,85, 486,87, 488,86, 483,97, 483,102, 484,104, 484,110, 495,117, 499,125, 455,127, 455,106, 450,100, 452,85" href="job_order_display.php?action=search&st=MN">
                        <area shape="poly" id="mississippi" onMouseOver="swapImages('imgMap', 'map_mississippi')" onMouseOut="swapImages('imgMap', 'map_image')" coords="532,277, 541,277, 541,254, 541,221, 528,222, 522,222, 522,224, 518,227, 518,233, 516,235, 515,237, 514,241, 514,249, 514,252, 518,257, 517,258, 515,261, 514,266, 514,267, 514,270, 531,270" href="job_order_display.php?action=search&st=MS">
                        <area shape="poly" id="missouri" onMouseOver="swapImages('imgMap', 'map_missouri')" onMouseOut="swapImages('imgMap', 'map_image')" coords="464,161, 468,170, 470,170, 470,173, 476,180, 476,208, 520,205, 518,210, 524,212, 525,205, 527,202, 528,200, 527,200, 525,198, 523,191, 514,187, 515,180, 509,176, 509,172, 506,170, 500,161, 499,159, 466,161" href="job_order_display.php?action=search&st=MO">
                        <area shape="poly" id="montana" onMouseOver="swapImages('imgMap', 'map_montana')" onMouseOut="swapImages('imgMap', 'map_image')" coords="300,49, 342,59, 392,62, 390,110, 331,103, 331,106, 320,108, 315,107, 310,93, 306,91, 308,80, 300,65" href="job_order_display.php?action=search&st=MT">
                        <area shape="poly" id="nebraska" onMouseOver="swapImages('imgMap', 'map_nebraska')" onMouseOut="swapImages('imgMap', 'map_image')" coords="392,136, 390,156, 407,156, 407,170, 468,170, 462,160, 459,150, 455,138, 450,136, 442,138, 436,136" href="job_order_display.php?action=search&st=NE">
                        <area shape="poly" id="north_dakota" onMouseOver="swapImages('imgMap', 'map_north_dakota')" onMouseOut="swapImages('imgMap', 'map_image')" coords="392,65, 392,97, 450,97, 450,89, 445,62, 392,62" href="job_order_display.php?action=search&st=ND">
                        <area shape="poly" id="nevada" onMouseOver="swapImages('imgMap', 'map_nevada')" onMouseOut="swapImages('imgMap', 'map_image')" coords="251,125, 300,136, 290,205, 286,205, 285,205, 283,216, 241,161" href="job_order_display.php?action=search&st=NV">
                        <area shape="poly" id="new_hampshire" onMouseOver="swapImages('imgMap', 'map_new_hampshire')" onMouseOut="swapImages('imgMap', 'map_image')" coords="661,62, 665,62, 669,73, 674,83, 676,89, 665,93, 661,77, 663,71" href="job_order_display.php?action=search&st=NH">
                        <area shape="poly" id="new_jersey" onMouseOver="swapImages('imgMap', 'map_new_jersey')" onMouseOut="swapImages('imgMap', 'map_image')" coords="652,145, 657,145, 659,140, 660,138, 675,138, 675,130, 662,130, 660,127, 657,125, 659,120, 650,117, 650,120, 648,122, 648,125, 652,130, 655,133, 648,140" href="job_order_display.php?action=search&st=NJ">

                        <area shape="poly" id="new_mexico" onMouseOver="swapImages('imgMap', 'map_new_mexico')" onMouseOut="swapImages('imgMap', 'map_image')" coords="338,200, 397,205, 395,263, 358,262, 358,263, 343,263, 343,270, 335,267" href="job_order_display.php?action=search&st=NM">
                        <area shape="poly" id="new_york" onMouseOver="swapImages('imgMap', 'map_new_york')" onMouseOut="swapImages('imgMap', 'map_image')" coords="603,120, 606,113, 606,107, 620,102, 626,97, 629,93, 626,89, 629,86, 629,81, 632,77, 636,75, 646,71, 648,76, 650,84, 652,89, 655,95, 657,97, 657,104, 659,114, 660,117, 660,117, 665,117, 673,114, 668,120, 665,120, 659,125, 660,120, 657,119, 652,117, 650,117, 648,117, 644,114, 643,112, 603,122" href="job_order_display.php?action=search&st=NY">
                        <area shape="poly" id="north_carolina" onMouseOver="swapImages('imgMap', 'map_north_carolina')" onMouseOut="swapImages('imgMap', 'map_image')" coords="580,216, 583,209, 588,205, 596,200, 602,196, 602,192, 656,180, 650,187, 659,189, 656,194, 647,196, 653,200, 656,200, 655,203, 648,205, 643,216, 636,216, 626,209, 613,212, 608,209, 596,209, 588,216, 582,216" href="job_order_display.php?action=search&st=NC">
                        <area shape="poly" id="ohio" onMouseOver="swapImages('imgMap', 'map_ohio')" onMouseOut="swapImages('imgMap', 'map_image')" coords="560,136, 572,136, 583,136, 596,130, 599,143, 599,151, 596,159, 594,161, 589,168, 586,170, 572,168, 566,165" href="job_order_display.php?action=search&st=OH">
                        <area shape="poly" id="oklahoma" onMouseOver="swapImages('imgMap', 'map_oklahoma')" onMouseOut="swapImages('imgMap', 'map_image')" coords="397,205, 397,210, 426,211, 426,233, 429,235, 433,233, 434,235, 437,238, 441,238, 445,239, 450,241, 455,242, 459,240, 461,242, 462,243, 468,241, 475,240, 479,243, 479,221, 475,205" href="job_order_display.php?action=search&st=OK">
                        <area shape="poly" id="oregon" onMouseOver="swapImages('imgMap', 'map_oregon')" onMouseOut="swapImages('imgMap', 'map_image')" coords="212,114, 213,108, 213,104, 220,93, 229,65, 235,69, 238,77, 246,77, 255,80, 267,81, 277,81, 284,84, 287,89, 282,98, 280,103, 281,106, 278,110, 275,130" href="job_order_display.php?action=search&st=OR">
                        <area shape="poly" id="pennsylvania" onMouseOver="swapImages('imgMap', 'map_pennsylvania')" onMouseOut="swapImages('imgMap', 'map_image')" coords="596,125, 601,119, 603,123, 642,113, 647,117, 648,117, 648,123, 648,127, 650,130, 652,133, 648,138, 636,143, 613,148, 602,150" href="job_order_display.php?action=search&st=PA">
                        <area shape="poly" id="rhode_island" onMouseOver="swapImages('imgMap', 'map_rhode_island')" onMouseOut="swapImages('imgMap', 'map_image')" coords="674,101, 676,100, 677,101, 677,103, 678,103, 679,106, 691,113, 691,120, 679,120, 679,113, 674,106" href="job_order_display.php?action=search&st=RI">
                        <area shape="poly" id="south_carolina" onMouseOver="swapImages('imgMap', 'map_south_carolina')" onMouseOut="swapImages('imgMap', 'map_image')" coords="617,246, 621,241, 621,238, 625,238, 627,235, 628,233, 630,230, 631,227, 633,221, 636,216, 625,210, 617,212, 612,212, 608,209, 601,210, 596,210, 591,212, 591,216, 596,221, 603,227, 608,231, 613,237, 617,243" href="job_order_display.php?action=search&st=SC">

                        <area shape="poly" id="south_dakota" onMouseOver="swapImages('imgMap', 'map_south_dakota')" onMouseOut="swapImages('imgMap', 'map_image')" coords="392,97, 450,97, 450,101, 454,104, 455,125, 453,125, 454,130, 454,138, 448,134, 443,136, 437,133, 432,133, 421,133, 407,133, 392,133" href="job_order_display.php?action=search&st=SD">
                        <area shape="poly" id="tennessee" onMouseOver="swapImages('imgMap', 'map_tennessee')" onMouseOut="swapImages('imgMap', 'map_image')" coords="527,205, 538,203, 541,200, 550,200, 599,192, 599,196, 596,198, 591,200, 581,209, 578,216, 559,219, 522,221" href="job_order_display.php?action=search&st=TN">
                        <area shape="poly" id="texas" onMouseOver="swapImages('imgMap', 'map_texas')" onMouseOut="swapImages('imgMap', 'map_image')" coords="397,212, 397,263, 358,263, 366,270, 373,279, 378,289, 392,297, 401,290, 402,289, 413,290, 421,302, 432,316, 438,331, 455,334, 450,322, 455,314, 458,307, 463,303, 468,300, 479,296, 482,291, 488,289, 488,281, 491,270, 483,263, 485,246, 479,243, 475,240, 468,240, 462,243, 460,243, 455,243, 441,239, 438,239, 438,238, 433,235, 429,235, 426,233, 426,212" href="job_order_display.php?action=search&st=TX">
                        <area shape="poly" id="utah" onMouseOver="swapImages('imgMap', 'map_utah')" onMouseOut="swapImages('imgMap', 'map_image')" coords="300,136, 294,194, 339,200, 343,156, 327,153, 327,150, 327,138" href="job_order_display.php?action=search&st=UT">
                        <area shape="poly" id="vermont" onMouseOver="swapImages('imgMap', 'map_vermont')" onMouseOut="swapImages('imgMap', 'map_image')" coords="648,71, 661,67, 661,71, 661,79, 663,93, 659,96, 655,93, 652,84" href="job_order_display.php?action=search&st=VT">
                        <area shape="poly" id="virginia" onMouseOver="swapImages('imgMap', 'map_virginia')" onMouseOut="swapImages('imgMap', 'map_image')" coords="596,183, 601,185, 603,183, 610,180, 613,172, 613,165, 615,163, 619,165, 619,161, 622,156, 624,153, 624,151, 627,153, 629,153, 628,156, 629,159, 629,161, 632,163, 639,161, 647,165, 655,180, 611,189, 599,192, 591,192, 586,194, 586,192" href="job_order_display.php?action=search&st=VA">
                        <area shape="poly" id="washington" onMouseOver="swapImages('imgMap', 'map_washington')" onMouseOut="swapImages('imgMap', 'map_image')" coords="229,65, 232,41, 241,45, 246,47, 246,51, 249,50, 249,47, 249,43, 246,38, 246,35, 291,48, 287,69, 284,82, 282,83, 276,80, 266,79, 256,80, 246,77, 238,76, 235,68" href="job_order_display.php?action=search&st=WA">
                        <area shape="poly" id="west_virginia" onMouseOver="swapImages('imgMap', 'map_west_virginia')" onMouseOut="swapImages('imgMap', 'map_image')" coords="601,145, 599,156, 596,161, 591,165, 589,170, 589,175, 594,180, 596,182, 601,183, 606,182, 609,180, 613,170, 613,165, 613,163, 615,161, 617,165, 619,159, 620,156, 623,151, 624,150, 615,153, 613,150, 602,153" href="job_order_display.php?action=search&st=WV">
                        <area shape="poly" id="wisconsin" onMouseOver="swapImages('imgMap', 'map_wisconsin')" onMouseOut="swapImages('imgMap', 'map_image')" coords="488,86, 494,86, 500,81, 500,86, 512,91, 524,93, 527,100, 524,106, 524,108, 530,104, 528,120, 530,130, 508,133, 502,132, 500,125, 498,117, 486,110, 483,97, 486,95" href="job_order_display.php?action=search&st=WI">

                        <area shape="poly" id="wyoming" onMouseOver="swapImages('imgMap', 'map_wyoming')" onMouseOut="swapImages('imgMap', 'map_image')" coords="331,104, 390,110, 389,156, 327,151" href="job_order_display.php?action=search&st=WY">
      </map>
        </div>
    </div>
    
<div class="div-panel round-corner gap-bot align-right" style="width: 49.2%;">
        <h4>
            Marketing Manager</h4>
        <div class="panel-body" style="height: 400px;">
        </div>
    </div>
    </div>

        </div>-->
		<div class="riht-side-ha-portion">
		    <div class="working-area-in-svshf">
			    <div class="new-traffic margin-set-in-first-two">
				    <h2 class="heading-same">New traffic</h2>
					<div class="search-icon-n">
					    <a href="#"><img src="Images_new/search-img.png"/></a>
					</div>
					<p class="down-up-frequency">35.2k</p>
					<div class="percantage-frequency">
					    <span>19.72%</span>
					</div>
				</div>
				<div class="new-traffic margin-set-in-first-two">
				    <h2 class="heading-same">Page Views</h2>
					<div class="search-icon-n">
					    <a href="#"><img src="Images_new/search-img.png"/></a>
					</div>
					<p class="down-up-frequency">35.2k</p>
					<div class="percantage-frequency">
					    <span>19.72%</span>
					</div>
				</div>
				
				<div class="right-part-inner-saction">
						
						
						<div class="new-traffic traffic_5 table-5">
				            <h2 class="heading-same">latest inventory</h2>
							<div class="search-icon-n">
					            <a href="#"><img src="Images_new/search-img.png"/></a>
				     	    </div>
							<div class="info-mation-di">
							    <p>update <span><?php echo date("jS M Y",strtotime($get_last_date_rec['add_date'])); ?></span></p>
								<p>total vehicle <?php echo $get_count; ?></p>
								<!--p>2010 honda accord<span>987</span></p>
								<p>2009 bmw 3281<span>982</span></p-->
							</div>
				        </div>
						<div class="new-traffic traffic_5 table-5">
				            <h2 class="heading-same">top 5 performers</h2>
							<div class="search-icon-n">
					            <a href="#"><img src="Images_new/search-img.png"/></a>
				     	    </div>
							<div class="data-in-most-viewed">
							    <div class="ifo-rel-ed-cars-etc"><p>2010 honda accord </p><span>987 views</span></div>
								<div class="ifo-rel-ed-cars-etc"><p>2009  bmw 3281 </p><span>987 views</span></div>
								<div class="ifo-rel-ed-cars-etc"><p>2008 audi a4 </p><span>987 views</span></div>
								<div class="ifo-rel-ed-cars-etc"><p>2008 ford f150 </p><span>987 views</span></div>
								<div class="ifo-rel-ed-cars-etc"><p>2007 Chevy Silverado</p><span>787 views</span></div>
								
							</div>
				        </div>
						<div class="clr"></div>
				</div>
				
				<div class="clr"></div>
			</div>
<div class="working-area-in-svshf">
<?php //@include 'owa/index.php'; ?>
					<div class="new-traffic traffic_4">
<h2 class="heading-same">traffic by</h2>
<div class="navigation-in-login">
<ul>
<li><a href="#">world</a></li>
<li><a href="#">country</a></li>
<li><a href="#">state</a></li>
<li><a href="#">zip code</a></li>
<li><a href="#">city</a></li>
</ul>
</div>
<div class="search-icon-n">
<a href="#"><img src="Images_new/search-img.png"/></a>
</div>
<img src="Images_new/map.png"/>
</div>
<div class="right-part-inner-saction">
<div class="new-traffic traffic_2">
<h2 class="heading-same">Unique Visitors</h2>
<div class="search-icon-n">
<a href="#"><img src="Images_new/search-img.png"/></a>
</div>
<img src="Images_new/sensex.png"/>
</div>
<div class="new-traffic traffic_2">
<h2 class="heading-same">conversion rate</h2>
<p class="rate-ing">24.45</p>
<div class="percantage-frequency">
<img src="Images_new/sensex-2.png"/>
</div>
</div>
<div class="clr"></div>
<div class="new-traffic traffic_5">
<h2 class="heading-same">time on site</h2>
<div class="search-icon-n">
<a href="#"><img src="Images_new/search-img.png"/></a>
</div>
<p class="rate-ing">2m 15s</p>
<div class="percantage-frequency time-relat">
<span>3.29%</span>
</div>
</div>

<!--div class="new-traffic traffic_5">
<h2 class="heading-same">social media</h2>
<div class="search-icon-n">
<a href="#"><img src="Images_new/search-img.png"/></a>
</div>
<div class="social-icons">
<p><a href="#"><img src="Images_new/google.png"></a></p>
<p><a href="#"><img src="Images_new/facebook.png"></a></p>
<p><a href="#"><img src="Images_new/twitter.png"></a></p>
</div>


</div-->

<div class="new-traffic traffic_5">
<h2 class="heading-same">Clock</h2>
<div class="search-icon-n">
<a href="#"><img src="Images_new/search-img.png"/></a>
</div>
<div class="social-icons">
<script src="http://www.clocklink.com/embed.js"></script> <script type="text/javascript" language="JavaScript">obj=new Object;obj.clockfile="0004-blue.swf";obj.TimeZone="GMT0530"; obj.width=150;obj.height=150;obj.wmode="transparent";showClock(obj);</script>
</div>
<div class="date"><?php echo date('l jS \of F Y h:i:s A'); ?></div>
</div>
<div class="clr"></div>
</div>
<div class="clr"></div>
</div>
				<div class="working-area-in-svshf">
				    <div class="footer-in-div-lig-in-page">
					    <div class="new-traffic traffic_5 table-6">
				            <h2 class="heading-same">top lead source</h2>
							<div class="search-icon-n">
					            <a href="#"><img src="Images_new/search-img.png"/></a>
				     	    </div>
							<div class="data-in-most-viewed">
							    <div class="ifo-rel-ed-cars-etc"><p>cRAIGSLIST </p><span>1701</span></div>
								<div class="ifo-rel-ed-cars-etc"><p>YOUTUBE </p><span>1690</span></div>
								<div class="ifo-rel-ed-cars-etc"><p>GOOGLE </p><span>1680</span></div>
								<div class="ifo-rel-ed-cars-etc"><p>VAST </p><span><?php echo $get_count; ?></span></div>
								<div class="ifo-rel-ed-cars-etc"><p>Oodle</p><span><?php echo $get_count; ?></span></div>
								
							</div>
				        </div>
						
						<div class="new-traffic traffic_5 table-6">
				            <h2 class="heading-same">top brands</h2>
							<div class="search-icon-n">
					            <a href="#"><img src="Images_new/search-img.png"/></a>
				     	    </div>
							<div class="data-in-most-ghh">
							    <?php 
								$car_count = 0;							
								foreach($get_make_count_arr as $key => $value)
								 
								{
								
								  if($car_count<3)
								  {
								?>
								 <div class="ifo-rel-ed-cars-etc"><a href="#"><?php echo $key; ?></a></div>
								<?php 
								  $car_count++; 
								  }
								}
  
							    ?>
								
								
							</div>
				        </div>
						<div class="new-traffic traffic_5 table-6">
				            <h2 class="heading-same">Top performing NS Pages</h2>
							<div class="search-icon-n">
					            <a href="#"><img src="Images_new/search-img.png"/></a>
				     	    </div>
							<div class="data-in-most-viewed">
							    <div class="ifo-rel-ed-cars-etc"><p>iNVENTORY pAGE  </p><span>1701</span></div>
								<div class="ifo-rel-ed-cars-etc"><p>fINANCE </p><span>1690</span></div>
								<div class="ifo-rel-ed-cars-etc"><p>Payment Calculator </p><span>1680</span></div>
								<div class="ifo-rel-ed-cars-etc"><p>VAST </p><span>1670</span></div>
							
								
							</div>
				        </div>
						<div class="new-traffic traffic_5 table-6">
				            <h2 class="heading-same">Top performing Models</h2>
							<div class="search-icon-n">
					            <a href="#"><img src="Images_new/search-img.png"/></a>
				     	    </div>
							<div class="data-in-most-viewed">
							    <div class="ifo-rel-ed-cars-etc"><p>Porsche </p><span>1701</span></div>
								<div class="ifo-rel-ed-cars-etc"><p>Ford   </p><span>1690</span></div>
								<div class="ifo-rel-ed-cars-etc"><p>BMW   </p><span>1680</span></div>
							
								
							</div>
				        </div>
						<div class="new-traffic traffic_5 table-6">
				            <h2 class="heading-same">Inventory In/Out</h2>
							<div class="search-icon-n">
					            <a href="#"><img src="Images_new/search-img.png"/></a>
				     	    </div>
							<div class="data-in-most-viewed">
							    <div class="ifo-rel-ed-cars-etc"><p>dAILY  </p><span>0/4</span></div>
								<div class="ifo-rel-ed-cars-etc"><p>gTD  </p><span>6-7</span></div>
								<div class="ifo-rel-ed-cars-etc"><p>mTD   </p><span>14-20</span></div>
								<div class="ifo-rel-ed-cars-etc"><p>YTD   </p><span>174-189</span></div>
								
								
							</div>
				        </div>
						<div class="clr"></div>
					</div>
				</div>
		</div>
        <div class="clear">
        </div>
       
<?php
include("includes/footer.php");
?>