function hideDetails() {
    let list_id = document.getElementById('list_id').value;
    window.location.replace('index.php#lis?' + list_id);
}


function showDetails(index) {

    $.getJSON("backend/json/cases_by_country.json", function(jsonData) { 
        // Set list ID.
        document.getElementById('list_id').value = index;

        // Set contents details.
        document.getElementById('detail_country_name').innerHTML = jsonData.countries_stat[index].country_name;
        document.getElementById('country_total_cases').innerHTML = jsonData.countries_stat[index].cases;
        
        document.getElementById('detail_new_cases').innerHTML = jsonData.countries_stat[index].new_cases;
        document.getElementById('detail_active_cases').innerHTML = jsonData.countries_stat[index].active_cases;
        document.getElementById('detail_serious_cases').innerHTML = jsonData.countries_stat[index].serious_critical;
        document.getElementById('detail_total_cases').innerHTML = jsonData.countries_stat[index].cases;
        document.getElementById('detail_total_deaths').innerHTML = jsonData.countries_stat[index].deaths;
        document.getElementById('detail_total_recovered').innerHTML = jsonData.countries_stat[index].total_recovered;
    
    });

}