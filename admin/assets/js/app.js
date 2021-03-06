


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
                        toastr["success"]("Category Deleted !");
                        setInterval(function () { window.location.reload(); }, 1500);
                    }
                });
            }
            return false;
        });
    });

    /**
     * Add Cat
     */
    $(document).on('click', 'a[data-role=addcat]', function () {
        $('#AddModle').modal('toggle');
        $('#addcat').click(function () {

            var catname = $('#catnames').val();
            var catdes = $('#catdess').val();
            if (1) {

                $.ajax({
                    type: 'post',
                    url: 'add_category.php',
                    data: {
                        catname: catname,
                        catdes: catdes
                    },
                    success: function (res) {
                        $('#AddModle').modal('toggle');
                        window.location.reload();
                    }
                });
            }
            return false;
        });

    });

    /**
     * Delete Post
     */
    $(document).on('click', 'a[data-role=deletepost]', function () {

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
                        toastr["success"]("The Post Deleted !");
                        setInterval(function () { window.location.reload(); }, 1500);

                    }
                });
            }
            return false;
        });
    });
    /**
     * Delete AD
     */
    $(document).on('click', 'a[data-role=deletead]', function () {

        var id = $(this).data('id');
        var isactive = $('#' + id).children('td[data-target=isactive]').text().trim();
        $('#adid').val(id);
        $('#isactive').val(isactive);
        $('#Admodal').modal('toggle');
        $('#ad-delete').click(function () {

            var adid = $('#adid').val();
            var isactive = $('#isactive').val();
            if (adid && isactive == 1) {
                $.ajax({
                    type: 'post',
                    url: 'delete_ad.php',
                    data: {
                        adid: adid
                    },
                    success: function (res) {
                        $('#exampleModal').modal('toggle');
                        toastr["success"]("The AD Deleted !");
                        setInterval(function () { window.location.reload(); }, 1500);

                    }
                });
            }
            return false;
        });
    });
    /**
     * Accepted Post
     */
    $(document).on('click', 'a[data-role=accepted]', function () {

        var id = $(this).data('id');
        var isaccpted = $('#' + id).children('td[data-target=accept]').text().trim();
        $('#postida').val(id);
        $('#isaccpted').val(isaccpted);
        $('#AcceptedModle').modal('toggle');

    });
    $('#acceptpost').click(function () {

        var postid = $('#postida').val().trim();
        var isaccpted = $('#isaccpted').val().trim();

        if (postid && isaccpted == 'no') {
            console.log(postid, isaccpted);
            $.ajax({
                type: 'post',
                url: 'accept_post.php',
                data: {
                    postid: postid,

                },
                success: function (res) {
                    window.location.reload();
                }
            });
        }
        return false;
    });

    /**
     * Disactivate accounts
     */
    $(document).on('click', 'a[data-role=disactivate]', function () {
        var userid = $(this).data('id');
        $('#userid').val(userid);
        $('#accountmodle').modal('toggle');

        $('#Disactivate').click(function () {
            var userid = $('#userid').val().trim();
            if (userid) {
                $.ajax({
                    type: 'post',
                    url: 'accounts_logic.php',
                    data: {
                        userid: userid
                    },
                    success: function (res) {
                        window.location.reload();
                    }

                });
            }
        });
    });
    /**
     * Activat Accounts
     */
    $(document).on('click', 'a[data-role=activat]', function () {
        var userid = $(this).data('id');
        $('#userids').val(userid);
        $('#activatmodel').modal('toggle');

        $('#Disactivate').click(function () {
            var userid = $('#userids').val().trim();
            if (userid) {
                $.ajax({
                    type: 'post',
                    url: 'activat.php',
                    data: {
                        userid: userid
                    },
                    success: function (res) {
                        window.location.reload();
                    }

                });
            }
        });
    });
    /**
     * Delete BrakingNews
     */
    $(document).on('click', 'a[data-role=deletenews]', function () {
        var newsid = $(this).data('id');
        $('#newsid').val(newsid);
        $('#activatmodel').modal('toggle');
        console.log(newsid);
        $('#deletenews').click(function () {
            var newsid = $('#newsid').val().trim();
            if (newsid) {
                $.ajax({
                    type: 'post',
                    url: 'Delete_brackingnews.php',
                    data: {
                        newsid: newsid
                    },
                    success: function (res) {
                        window.location.reload();
                    }

                });
            }
        });
    });
    /**
     * Edit BrakingNews
     */
    $(document).on('click', 'a[data-role=editnews]', function () {
        var newsids = $(this).data('id');
        var brackingnews = $('#' + newsids).children('td[data-target=brackingText]').text().trim();
        $('#News').val(brackingnews);
        $('#newsids').val(newsids);
        $('#editbrackingnews').modal('toggle');

        $('#confermedit').click(function () {
            var brackingnews = $('#News').val().trim();
            var newsids = $('#newsids').val().trim();
            if (newsids && brackingnews) {
                $.ajax({
                    type: 'post',
                    url: 'edit_brackingnews.php',
                    data: {
                        brackingnews: brackingnews,
                        newsids: newsids
                    },
                    success: function (res) {
                        window.location.reload();
                    }

                });
            }
        });
    });
    /**
     * up
     */
    $(document).on('click', 'i[data-role=up]', function () {
        var postid = $('#postid').val().trim();
        var counter = parseInt($('#counter').val().trim());
        counter += 1;
        if (postid && counter) {
            $.ajax({
                type: 'post',
                url: 'rank.php',
                data: {
                    postid: postid,
                    counter: counter
                },
                success: function (res) {
                    window.location.reload();
                }
            });
        }
    });
    /**
     * down
     */
    $(document).on('click', 'i[data-role=down]', function () {
        var postid = $('#postid').val().trim();
        var counter = parseInt($('#counter').val().trim());
        counter -= 1;
        if (postid && counter) {
            $.ajax({
                type: 'post',
                url: 'rank.php',
                data: {
                    postid: postid,
                    counter: counter
                },
                success: function (res) {
                    window.location.reload();
                }
            });
        }

    });

    $(document).on('click', 'button[data-role=addcomment]', function () {
        var postid = $('#postids').val().trim();
        var comment = $('#comments').val().trim();
        if (postid && comment) {
            console.log(postid, comment);
            $.ajax({
                type: 'post',
                url: 'add_comment.php',
                data: {
                    postid: postid,
                    comment: comment
                },
                success: function (res) {
                    Swal.fire({
                        icon: 'succes',
                        title: 'Done!...',
                        text: 'Comment Added !',

                    });
                    setInterval(function () { window.location.reload(); }, 3000);
                }
            });

        }
        else {
            Swal.fire({
                icon: 'error',
                title: 'Opss!...',
                text: 'Add Comment First !',

            });
        }
    });
    $("#NEWS").click(function () {
        $('html, body').animate({
            scrollTop: $("#LASTNEWS").offset().top
        }, 1000);
    });
    // $(document).ready(function () {
    //     $('#newsTicker1').breakingNews();

    // });
});