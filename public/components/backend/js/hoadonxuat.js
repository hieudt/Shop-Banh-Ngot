$.widget("app.hoadon", {
    options: {
        fetchUrl: '',
        postUrl: '',
        commentUrl: '',
        updateUrl: '',
    },
    _create: function () {
        var opt = this.options;
        var self = this;
        console.log("INIT PROJECT");
        if (!opt.fetchUrl == '') {
            this._fetch(opt.fetchUrl, '#order-listing')
            console.log('fetch');
        }
        this._formValidate()

        $('#hdForm').on('submit', function (event) {
            if ($(this).valid()) {
                self._formPost(this, event, opt.postUrl)
            }
        })

        $('#comment').click(function () {
            const data = {
                id : $('#id_hdx').val(),
                messages : $('#editor1').val(),
            }

            self._comment(data, opt.commentUrl);
        })

        $('#updateStatus').click(function () {
            const data = {
                status: $('#selStatus').val(),
                id : $('#id_hdx').val(),
            }
            var dataString = "status="+data.status+"&id="+data.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: opt.updateUrl,
                method: "POST",
                data: dataString,
                success: function (data) {
                    console.log(data)
                    $('.alert').show()
                },
            })
        })
    },
    _fetch: function (fetchUrl, idElement) {
        const data = [
            { data: 'id', name: 'id' },
            { data: 'created_at', name: 'created_at' },
            { data: 'tongtien', name: 'tongtien' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action' }

        ]
        db(fetchUrl, idElement, data);
    },
    _formValidate: function () {
        if ($('#hdForm').length > 0) {
            $('#hdForm').validate({
                rules: {

                },
                messages: {

                },
            })
        }
    },
    _formPost: function (form, event, posturl) {
        event.preventDefault();
        $.ajax({
            url: posturl,
            method: "POST",
            data: new FormData(form),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                console.log(data)
                $('.alert').show();
            },
        })
    },
    _comment: function (data, posturl) {
        var dataString = "id_hdx=" + data.id + "&messages=" + CKEDITOR.instances.editor1.getData();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: posturl,
            data: dataString,
            success: function (data) {
                console.log(data);
                location.reload();
            },
            error: function (request, status) {
                $.each(request.responseJSON.errors, function (key, val) {
                    console.log(val);
                });
            }
        })
    }
});