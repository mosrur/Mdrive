/**
 * Created by Mosrur on 7/17/2016.
 */


$(document).ready(function(){
    $("#pass-box").hide();

    $('.share-link').on('click', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var fileid = id.substr(11);

        $('#share-box-'+fileid).toggle();
    })
});


