$(function() {
    $('form').on('submit', function(e) {
        e.preventDefault();
        var forma = $(this);
        var url   = forma.attr('action');
        var vars  = forma.serialize();
        $.post(url, vars, function(resp) {
            if (resp.indexOf('Error')<0) {
                window.location = 'sistema.php';
            } else {
                alert(resp);
            }
        });
    });
});