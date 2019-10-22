$.widget("app.hoadon", {
    options: {
        fetchUrl: '',
        postUrl: '',
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
    }
});