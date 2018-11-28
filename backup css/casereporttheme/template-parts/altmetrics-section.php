<?php
        $altmetricsIssns = get_option('bmj_altmetrics_issns');
        $altmetricsNumres = get_option('bmj_altmetrics_numresult');
        $altmetricsDuration = get_option('bmj_altmetrics_duration');
    ?>
        <input type="hidden" id="issns" value="<?php echo $altmetricsIssns;?>">
        <input type="hidden" id="numres" value="<?php echo $altmetricsNumres;?>">
        <input type="hidden" id="duration" value="<?php echo $altmetricsDuration;?>">

    <div id='top_ten'></div>
    <script>
    
var issns = $('#issns').val();
var number_results_to_show = $('#numres').val();

function get_articles(time_period) {
    //alert('TEST2');
    // use your own API call here.
    var url = "https://api.altmetric.com/v1/citations/" + time_period + "?issns=" + issns;
    $.ajax({
      url: url,
      success: function (data, status, jqXHR) {
          if (status == "success") {
              parse_articles(data);
          } else {
              // failed to get data from the Altmetric API - put your code to handle that situation here.
          }
      },  
      dataType: "json"
    });
}

function parse_articles(data) {
    if ("results" in data) {
        $.each(data.results, function(index, value) {
            if (index <= (number_results_to_show - 1)) {
                // convert last_updated (currently a UNIX timestamp) to human readable form
                console.log(value);
                var last_updated = new Date(value.last_updated * 1000);   
                var resultHTML = "<article><div class='row'><div class='col-md-12 col-lg-3'>";
                resultHTML += "<figure><a href='" + value.details_url + "'><img src='" + value.images.small + "'/></a></figure></div>";
                resultHTML += "<div class='col-md-12 col-lg-9'><div class='copy'><h4><a href='" + value.url + "'>" + value.title + "</a></h4>";
                if (last_updated != "Invalid Date") {
                    resultHTML += "<footer>" + last_updated.toDateString() + "</footer>";
                }
                resultHTML += "</div></div></div></article>";
                $("#top_ten").append(resultHTML);
            }
        });
    } else {
        console.log("no results");
    }
}

function select_timeperiod() {
    // get currently selected time period, fetch relevant articles
    //alert('TEST1');
    var time_period = $('#duration').val();
    $("#top_ten").html("");
    get_articles(time_period);
}

$(document).ready(function(){
    //alert('TEST');
    select_timeperiod();
});

    </script>

