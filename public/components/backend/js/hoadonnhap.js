$.widget("app.hoadonnhap", {
    options: {
        fetchUrl: '',
        postUrl: '',
        commentUrl: '',
        updateUrl: '',
        baseUrl: '',
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

        $('#ctForm').on('submit', function (event) {
            self._formPost(this, event, opt.postUrl)
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

        $('#addProduct').click(function () {
            if ($('#ctForm').valid()) {
                $('#cart').append(self._mageTemplate()).show('slow')
            }
        })

        $("select#id_nguyenlieu").change(function(){
            var el = $(this).children("option:selected");
            $('#nl_image').val(el.attr('image'))
            $('#nl_ten').val(el.attr('ten'))
            $('#nl_id').val(el.val())
        })

        $(document).on('click', '.removeProduct', function (){
            $(this).parents(".box-product").remove()
        })
    },
    _fetch: function (fetchUrl, idElement) {
        const data = [
            { data: 'id_daily', name: 'id_daily' },
            { data: 'created_at', name: 'created_at' },
            { data: 'tongtien', name: 'tongtien' },
            { data: 'action', name: 'action' }

        ]
        db(fetchUrl, idElement, data);
    },
    _formValidate: function () {
        if ($('#ctForm').length > 0) {
            $('#ctForm').validate({
                rules: {
                    thanhtien: {
                        required: true,
                        number: true,
                        min: 0,
                    },
                    soluong: {
                        required: true,
                        number: true,
                        min: 0,
                    },
                },
                messages: {
                    thanhtien: {
                        required: "Thiếu đơn giá nguyên liệu",
                        number: "Đơn giá phải là số",
                        min: "Đơn giá phải lớn hơn 0"
                    },
                    soluong: {
                        required: "Thiếu số lượng nguyên liệu",
                        number: "Số lượng nguyên liệu phải là số",
                        min: "Số lượng phải lớn hơn 0"
                    },
                },
            })
        }
    },
    _formPost: function (form, event, posturl) {
        event.preventDefault();
        var dataPost = this._getCart();
        console.log(dataPost)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: posturl,
            method: "POST",
            data: {dataPost},
            success: function (data) {
                $('.alert').show();
            },
        })
    },
    _getCart: function() {
        var data = []
        $('#cart').find('.box-product').each(function () {
            data.push({
                'id' : $(this).find('.id_nl').val(),
                'soluong' : $(this).find('.soluong_nl').val(),
                'thanhtien' : $(this).find('.thanhtien_nl').val(),
                'id_daily' : $('#id_daily').val(),
            }) 
        })
        return data;
    },
    _mageTemplate: function(image, money, qty, name) {
        return `<div class="col-sm-6 col-xs-12 box-product">
        <div class="info-box">
          <span class="info-box-icon">
          <img src="`+this.options.baseUrl+`/`+$('#nl_image').val()+`">
          </span>

          <div class="info-box-content">
            <span class="info-box-text ten">`+$('#nl_ten').val()+`</span>
            <span class="info-box-text dongia"><small>Đơn giá : `+$('#thanhtien').val()+`</small></span>
            <span class="info-box-text soluong">Số lượng : `+$('#soluong').val()+`</span>
            <input type="hidden" class="id_nl" value="`+$('#nl_id').val()+`"> 
            <input type="hidden" class="thanhtien_nl" value="`+$('#thanhtien').val()+`">
            <input type="hidden" class="soluong_nl" value="`+$('#soluong').val()+`">
            <button class="btn btn-danger removeProduct">
                    X
            </button>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>`
    },
});