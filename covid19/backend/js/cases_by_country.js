let count = 1;

$.getJSON("backend/json/cases_by_country.json", function(json) {

    let list, list_id, number, country, total_cases, total_deaths, btn_details;

    for(let i=0; i < json.countries_stat.length; i ++) {

        // Skip loop if country name or cases does not exist.
        if(json.countries_stat[i].country_name == '' || json.countries_stat[i].cases == '') {
            continue;
        }

        // Skip loop if country is 'MYANMAR'.
        if(json.countries_stat[i].country_name.toLowerCase() == 'myanmar') {
            continue;
        }

        // Set json data to list cases by country.
        list = document.getElementById('globalCase');
        list_id = '<span id="lis?' + i + '"></span>'
        number = '<span class="globalCaseTableTitleNum">' + (count++) + '</span>';
        country = '<span class="globalCaseTableTitleCountry">' + json.countries_stat[i].country_name + '</span>';
        total_cases = '<span class="globalCaseTableTitleTotal">' + json.countries_stat[i].cases + '</span>';
        total_deaths = '<span class="globalCaseTableTitleDeath">' + json.countries_stat[i].deaths + '</span>';
        btn_details = '<span class="globalCaseTableTitleMore">' + '<a href="caseDetails.php?lis=' + i + '">အသေးစိတ်ကြည့်ရန်</a>' + '</span>';
        
        list.innerHTML += '<div class="globalCaseTableRow">' + list_id + number + country + total_cases + total_deaths + btn_details + '</div>';
    
    }

    console.log(json); // To Debug

    if(window.location.hash) {
        // Call recent user view
        setTimeout(callRecentView(),1000);
    }
});


function callRecentView() {
    let id = window.location.hash.substr(5);
    
    if(id > 6) {
        window.location.replace( window.location.hash.substr(0,5) + ( parseInt(id)-6 ) );
    }
}