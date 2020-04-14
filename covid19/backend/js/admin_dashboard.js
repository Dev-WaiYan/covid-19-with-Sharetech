function edit_myanmar_record() {
    document.getElementById('main_dashboard').style.display = 'none';
    document.getElementById('localnews_panel').style.display = 'none';
    document.getElementById('globalnews_panel').style.display = 'none';
    document.getElementById('edit_myanmar_panel').style.display = 'initial';
}

function call_localnews_panel() {
    document.getElementById('main_dashboard').style.display = 'none';
    document.getElementById('edit_myanmar_panel').style.display = 'none';
    document.getElementById('globalnews_panel').style.display = 'none';
    document.getElementById('localnews_panel').style.display = 'initial';
}

function call_globalnews_panel() {
    document.getElementById('main_dashboard').style.display = 'none';
    document.getElementById('edit_myanmar_panel').style.display = 'none';
    document.getElementById('localnews_panel').style.display = 'none';
    document.getElementById('globalnews_panel').style.display = 'initial';
}

$(document).ready(function() {

    $('#localImg').click(function(){
        $('#localnews_main_photo').click();
    });

    $('#globalImg').click(function(){
        $('#globalnews_main_photo').click();
    });

});