<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.add_product', function(e) {
            e.preventDefault();
            let name = $('#name').val();
            let color = $('#color').val();
            let weight = $('#weight').val();
            let price = $('#price').val();

            $.ajax({
                url: "{{ route('product.store') }}",
                method: 'post',
                data: {
                    name: name,
                    color: color,
                    weight: weight,
                    price: price
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addModal').modal('hide');
                        $('#addProductForm')[0].reset();
                        $('.table').load(location.href + ' .table');
                    }
                },
                error: function(err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $('.errMessageContainer').append(
                            '<span class="text-danger">' + value + '</span>' +
                            '</br>')
                    })
                }
            });
        });

        // Show product value in update form
        $document().on('click', '.update_product_form', function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let color = $(this).data('color');
            let weight = $(this).data('weight');
            let price = $(this).data('price');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_color').val(color);
            $('#up_weight').val(weight);
            $('#up_price').val(price);
        })

        // Update product data
        $(document).on('click', '.update_product', function(e) {
            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_color = $('#up_color').val();
            let up_weight = $('#up_weight').val();
            let up_price = $('#up_price').val();

            $.ajax({
                url: "{{ route('product.update') }}",
                method: 'post',
                data: {
                    up_id: up_id,
                    up_name: up_name,
                    up_color: up_color,
                    up_weight: up_weight,
                    up_price: up_price
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#updateModal').modal('hide');
                        $('#updateProductForm')[0].reset();
                        $('.table').load(location.href + ' .table');
                    }
                },
                error: function(err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $('.errMessageContainer').append(
                            '<span class="text-danger">' + value + '</span>' +
                            '</br>')
                    })
                }
            });
        });
    });
</script>
