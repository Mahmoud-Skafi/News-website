$(document).ready(function () {
    $(document).on('click', 'a[data-role=edit]', function () {
        var id = $(this).data('id');
        var catname = $('#' + id).children('td[data-target=catname]').text().trim();
        var catdes = $('#' + id).children('td[data-target=catdes]').text().trim();
        var catactive = $('#' + id).children('td[data-target=catactive]').text().trim();
        $('#catname').val(catname);
        var k = $('#catname').val(catname);
        // console.log(k);
        $('#catdes').val(catdes);
        $('#catactive').val(catactive);
        $('#catid').val(id);
        console.log( $('#catid').val());
        $('#exampleModal').modal('toggle');
        $('#kk').click(function () {
            console.log("ok");
            var catname = $('#catname').val();
            var catdes = $('#catdes').val();
            var catactive = $('#catactive').val();
            var catid= $('#catid').val();
            console.log(catname, catdes, catactive);
            if (catname && catdes && catactive) {
                console.log('kkkk');
                $.ajax({

                    type: 'post',
                    url: 'edit_category.php',
                    data: {
                        catname: catname,
                        catdes: catdes,
                        catid: catid,
                        isactive: catactive
                    },
                    success: function (res) {
                        $('#' + id).children('td[data-target=catname]').text(catname);
                        $('#' + id).children('td[data-target=catdes]').text(catdes);
                        $('#' + id).children('td[data-target=catactive]').text(catactive);
                        $('#exampleModal').modal('toggle');
                        // alert(res);
                    }
                });
            }

            return false;
        });
    });


});