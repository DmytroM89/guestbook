$.get('/api/authors', function (res) {
    var ul = $('.authorslist');
    $('.authorslist > li').remove();
    $.each(res, function(i, e) {
        ul.append('<li>' + e.name + '</li>');
    });
});


$('.addAuthor').click(function () {
    $.post('/api/author/new', {
        name: $('#newAuthor').val(),
        _token: $('meta[name="_token"]').attr('content')
    }, function (res) {
        console.log(res);
        if(res.status == 'success') {
            var ul = $('.authorslist');
            ul.append('<li>' + $('#newAuthor').val() + '</li>');
        }
    }, 'json');
});

