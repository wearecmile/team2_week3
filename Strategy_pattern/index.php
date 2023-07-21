<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decorator | Design Pattern</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/custom.css" />
</head>

<body class="bgimg">
    <div class="container mt-3" style="background: #ecf0f1;">
        <h3></h3>
        <form action="javascript:void(0)" method="post">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="discount_type" disabled>
                        <option value="" disabled selected>Select Discount Type</option>
                        <option value="shipping">Shipping</option>
                        <option value="discount">Discount</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <h5 class="form-text text-center" style="color: #58B19F;">Strategy Design Pattern</h5>
                    <h3 class="form-text text-center" style="color: #8e44ad; font-family: 'Lilita One', cursive;
font-family: 'Mochiy Pop One', sans-serif;
font-family: 'Mochiy Pop P One', sans-serif;
font-family: 'Poppins', sans-serif;"><b>Fruit Mart</b></h3>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="discount_price" disabled>
                        <option value="" disabled selected>Select Level</option>
                    </select>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center;">Item</th>
                        <th class="text-center">Cost</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label class="form-check-label">Banana</label></td>
                        <td class="text-center d-flex">
                            <strong class="mt-2 mr-2 ml-1 h6">&#8377;</strong>
                            <input type="text" class="form-control text-center" name="item[]" value="30" disabled>
                        </td>
                        <td class="text-center"><input type="text" class="form-control" name="quantity[]"></td>
                        <td class="text-center d-flex"><strong class="mt-2 mr-2 ml-1 h6">&#8377;</strong><input type="text" class="form-control" name="total" value="0" disabled></td>
                    </tr>
                    <tr>
                        <td><label class="form-check-label">Grapes</label></td>
                        <td class="text-center d-flex">
                            <strong class="mt-2 mr-2 ml-1 h6">&#8377;</strong>
                            <input type="text" class="form-control text-center" name="item[]" value="35" disabled>
                        </td>
                        <td class="text-center"><input type="text" class="form-control" name="quantity[]"></td>
                        <td class="text-center d-flex"><strong class="mt-2 mr-2 ml-1 h6">&#8377;</strong><input type="text" class="form-control" name="total" value="0" disabled></td>
                    </tr>
                    <tr>
                        <td><label class="form-check-label">Orange</label></td>
                        <td class="text-center d-flex">
                            <strong class="mt-2 mr-2 ml-1 h6">&#8377;</strong>
                            <input type="text" class="form-control text-center" name="item[]" value="20" disabled>
                        </td>
                        <td class="text-center"><input type="text" class="form-control" name="quantity[]"></td>
                        <td class="text-center d-flex"><strong class="mt-2 mr-2 ml-1 h6">&#8377;</strong><input type="text" class="form-control" name="total" value="0" disabled></td>
                    </tr>
                    <tr>
                        <td><label class="form-check-label">Mango</label></td>
                        <td class="text-center d-flex">
                            <strong class="mt-2 mr-2 ml-1 h6">&#8377;</strong>
                            <input type="text" class="form-control text-center" name="item[]" value="25" disabled>
                        </td>
                        <td class="text-center"><input type="text" class="form-control" name="quantity[]"></td>
                        <td class="text-center d-flex"><strong class="mt-2 mr-2 ml-1 h6">&#8377;</strong><input type="text" class="form-control" name="total" value="0" disabled></td>
                    </tr>
                    <tr id="price">
                        <th colspan="3" class="text-center">Total</th>
                        <td class="text-center">RS <span class="totaltemsPrice">00.00</span></td>
                    </tr>
                    <tr id="discountPriceTr" style="background: #32ff7e;">
                        <th colspan="3" class="text-center text-dark">Discount Total</th>
                        <td class="text-center text-dark"><b>RS <span>00.00</span></b></td>
                    </tr>
                </tbody>
            </table>
            <button name="submit" class="btn btn-primary" disabled>Submit</button>
        </form>
    </div>

    <script src="./assets/js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('submit', 'form', function() {
                const discountType = $('select[name="discount_type"] option:selected').val();
                const discountPrice = $('select[name="discount_price"] option:selected').val();
                const totaltemsPrice = parseInt($('.totaltemsPrice').html());
                if (discountType != '') {
                    if (discountPrice != '') {
                        $.ajax({
                            method: "POST",
                            url: "response.php",
                            data: {
                                totaltemsPrice: totaltemsPrice,
                                discount_type: discountType,
                                discountPrice: discountPrice
                            },
                            success: function(response) {
                                discountTypeName = '';
                                if(discountType == 'shipping') {
                                    discountTypeName = 'Shipping Total';
                                } else {
                                    discountTypeName = 'Discount Total';
                                }
                                var amount = parseFloat(response).toFixed(2);
                                $("#discountPriceTr").html('<th colspan="3" class="text-center text-dark">'+ discountTypeName +'</th><th id="price" class="text-center text-dark">RS <span>' + amount + '</span></th>');
                            }
                        });
                    } else {
                        alert('Please select discount level.');
                    }
                } else {
                    alert('Please select discount type.');
                }
            });

            $(document).on('input', 'input[name="quantity[]"]', function() {
               var numbericValue =  $(this).val().replace(/[^0-9]/g, '');
               $(this).val(numbericValue);

                var tableRow = $(this).closest('tr');
                var quantity = $(this).val();
                var fruitPrice = tableRow.find('input[name="item[]"]').val();
                var fruitTotalPrice = fruitPrice * quantity;
                tableRow.find('input[name="total"]').val(fruitTotalPrice);

                let totalPrice = 0;
                $('input[name="total"]').each(function(index, element) {
                    thisprice = ($(element).val()) ? $(element).val() : 0;
                    totalPrice += parseFloat(thisprice);
                });

                if (totalPrice != 0) {
                    $('button[name="submit"]').attr('disabled', false);
                    $('select[name="discount_type"]').attr('disabled', false);
                } else {
                    $('button[name="submit"]').attr('disabled', true);
                    $('select[name="discount_type"]').prop('value', '');
                    $('select[name="discount_type"]').attr('disabled', true);
                    $('select[name="discount_price"]').empty();
                    $('select[name="discount_price"]').append('<option value="" disabled selected>Select Level</option>');
                    $('select[name="discount_price"]').attr('disabled', true);
                    $('#discountPriceTr').html('<th colspan="3" class="text-center text-dark">Discount Total</th><td class="text-center text-dark"><b>RS <span>00.00</span></b></td></tr>');
                }
                $(".totaltemsPrice").html(totalPrice.toFixed(2));
            });

            $(document).on('change', 'select[name="discount_type"]', function() {
                let changedDiscType = $(this).val();
                if (changedDiscType == 'shipping') {
                    discountLevel = '<option value="" disabled selected>Select Shipping Discount Level</option>' +
                        '<option value="10">10 %</option>'
                } else {
                    discountLevel = '<option value="" disabled selected>Select Discount Level</option>' +
                        '<option value="10">Silver - 10</option>' +
                        '<option value="20">Platinum - 20</option>' +
                        '<option value="30">Gold - 30</option>'
                }
                $('select[name="discount_price"]').empty();
                $('select[name="discount_price"]').append(discountLevel);
                $('select[name="discount_price"]').attr('disabled', false);
            });
        });
    </script>
</body>

</html>