$('.getlist').click(function () {
    $.get('/api/authors', function (res) {
        var ul = $('.authorslist');
        $('.authorslist > li').remove();
        $.each(res, function(i, e) {
            ul.append('<li>' + e.name + '</li>');
        });
    });
});


$('.addAuthor').click(function () {
    $.post('/api/author/new', { authorName: $('#newAuthor').val() }, function (res) {
        console.log(res);
    });
});

