

/**
 * Edit Category
 */
$(document).ready(function () {
    $(document).on('click', 'a[data-role=editcat]', function () {
        var id = $(this).data('id');
        var catname = $('#' + id).children('td[data-target=catname]').text().trim();
        var catdes = $('#' + id).children('td[data-target=catdes]').text().trim();
        var catactive = $('#' + id).children('td[data-target=catactive]').text().trim();
        $('#catname').val(catname);
        $('#catdes').val(catdes);
        $('#catactive').val(catactive);
        $('#catid').val(id);

        $('#exampleModal').modal('toggle');
        $('#kk').click(function () {
            console.log("ok");
            var catname = $('#catname').val();
            var catdes = $('#catdes').val();
            var catactive = $('#catactive').val();
            var catid = $('#catid').val();

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

    /**
     * Delete Category
     */
    $(document).on('click', 'a[data-role=deletecat]', function () {
        var id = $(this).data('id');
        var catactive = $('#' + id).children('td[data-target=catactive]').text().trim();
        console.log(id, catactive);
        $('#catid').val(id);
        $('#isactive').val(catactive);
        $('#DeleteModal').modal('toggle');


        $('#deletecat').click(function () {
            console.log("skafi");
            var catactive = $('#isactive').val();
            var catid = $('#catid').val();
            if (catid && catactive == 1) {
                console.log(catid);
                $.ajax({
                    type: 'post',
                    url: 'delete_category.php',
                    data: {
                        catid: catid,
                    },
                    success: function (res) {

                        $('#DeleteModal').modal('toggle');
                        // window.location.reload();
                    }
                });
            }
            return false;
        });
    });

    /**
     * Add Post
     */
    $(document).on('click','button[data-role=addcat]', function () {
        // var id = $(this).data('id');
        console.log("adadad");
        $('#AddModle').modal('toggle');
        $('#addcat').click(function () {
            
            var catname = $('#catnames').val();
            var catdes = $('#catdess').val();
            if (1) {
                console.log("addcat");
                $.ajax({
                    type:'post',
                    url:'add_category.php',
                    data:{
                        catname:catname,
                        catdes:catdes
                    },
                    success:function(res){
                        // alert(res);
                    }
                });
            }
            return false;
        });

    });

    /**
     * Delete Post
     */
    $(document).on('click', 'a[data-role=delete]', function () {
        var id = $(this).data('id');
        var isactive = $('#' + id).children('td[data-target=isactive]').text().trim();
        $('#postid').val(id);
        $('#isactive').val(isactive);
        $('#exampleModal').modal('toggle');

        $('#deletepost').click(function () {
            var postid = $('#postid').val();
            var isactive = $('#isactive').val();
            if (postid && isactive == 1) {
                console.log(postid);
                $.ajax({
                    type: 'post',
                    url: 'view_post.php',
                    data: {
                        postid: postid
                    },
                    success: function (res) {
                        $('#exampleModal').modal('toggle');
                        window.location.reload();
                    }
                });
            }
            return false;
        });
    });

});