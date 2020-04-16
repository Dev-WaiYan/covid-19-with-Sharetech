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
        list = document.getElementById('caseBody');
        list_id = '<tr><td id="lis?' + i + '"></td>'
        number = '<td class="globalCaseTableTitleNum">' + (count++) + '</td>';
        country = '<td class="globalCaseTableTitleCountry">' + json.countries_stat[i].country_name + '</td>';
        total_cases = '<td class="globalCaseTableTitleTotal">' + json.countries_stat[i].cases + '</td>';
        total_deaths = '<td class="globalCaseTableTitleDeath">' + json.countries_stat[i].deaths + '</td>';
        btn_details = '<td class="globalCaseTableTitleMore">' + '<a href="caseDetails.php?lis=' + i + '">အသေးစိတ်ကြည့်ရန်</a>' + '</td></tr>';
        
        list.innerHTML += '<tbody id="caseBody">' + number + country + total_cases + total_deaths + btn_details + '</tbody>';
    
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