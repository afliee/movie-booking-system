<?php
require_once assets('app/Views/public/header.php');
if (session()->exists('code')) {
    $code = session()->get('code');
}
?>

<style>
	<?php require_once assets('/public/css/ticket/payment.css')?>
</style>
<div class="container white-space payment" style="background-color: #eee">
	<div class="row m-0">
		<div class="col-md-6 col-12 mr-3 justify-content-between">
			<div class="row">
				<div class="col-12 mb-4">
					<div class="row box-right">
						<div class="col-md-8 ps-0 ">
							<p class="ps-3 textmuted fw-bold h6 mb-0">TOTAL RECIEVED</p>
							<p class="h1 fw-bold d-flex">
								<i class=" bi bi-currency-dollar  pe-1 h6 align-text-top mt-1 text-dark"></i> <span class="textmuted">
									<?php echo formatVND($price_tickets + $price_products)?>
								</span>
							</p>
						</div>
						<div class="col-md-4">
							<p class="p-blue"> <span class="fas fa-circle pe-2"></span>Pending </p>
							<p>
								<i class="pe-1  align-text-top mt-1 text-dark"></i> <span class="textmuted">
									<?php echo formatVND($price_tickets + $price_products)?>
								</span>
							</p>
							<p class="p-org"><span class="fas fa-circle pe-2"></span>On drafts</p>
							<p class="fw-bold"><span class="textmuted">00.00</span></p>
						</div>
					</div>
				</div>
				<div class="col-12 px-0 mb-4">
					<div class="box-right">
						<div class="d-flex pb-2">
							<p class="ms-auto p-blue"><span class=" bg btn btn-primary fas fa-pencil-alt me-3"></span> <span
									class=" bg btn btn-primary far fa-clone"></span> </p>
						</div>
						<div class="bg-blue p-2">
							<P class="h8 textmuted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum recusandae
								dolorem voluptas nemo, modi eos minus nesciunt.
							<p class="p-blue bg btn btn-primary h8">LEARN MORE</p>
							</P>
						</div>
					</div>
				</div>
                <div class="col-12 px-0">
                    <div class="box-right">
                        <div class="d-flex mb-2">
                            <p class="fw-bold text-dark">Please press your email</p>
                            <p class="ms-auto textmuted"><span class="fas fa-times"></span></p>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <p class="textmuted h8">Email</p>
                                    <input class="form-control email_send"
                                    type="email" placeholder="enter your email, please..." name="email">
                                    <button class="btn btn-primary d-block h8 mt-4 btn-send">Get code</button>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<div class="col-md-5 col-12 ps-md-5 p-0 ">
			<div class="box-left">
				<p class="textmuted h8">Invoice</p>
				<p class="fw-bold h7">TMT Cenima</p>
				<p class="textmuted h8">3897 Hickroy St, salt Lake city</p>
				<p class="textmuted h8 mb-2">Utah, United States 84104</p>
				<div class="h8">
					<div class="row m-0 border mb-3">
						<div class="col-6 h8 pe-0 ps-2">
							<p class="textmuted py-2">Items</p>
							<?php foreach ($items as $index => $item) { ?>
								<span class="d-block py-2 border-bottom" style="color: #000"><?php echo $item?></span>
							<?php }?>
						</div>
						
					</div>
					<div class="d-flex h7 mb-2">
						<p class="">Total Amount</p>
						<p class="ms-auto"><span class="fas fa-dollar-sign"></span>1400</p>
					</div>
					<div class="h8 mb-5">
						<p class="textmuted">Lorem ipsum dolor sit amet elit. Adipisci ea harum sed quaerat tenetur </p>
					</div>
				</div>
				<div class="">
					<p class="h7 fw-bold mb-1 text-dark">Pay this Invoice</p>
					<p class="textmuted h8 mb-2">Make payment for this invoice by filling in the details</p>
					<div class="form">
						<div class="row">
							<div class="col-12">
								<div class="card border-0"> <input class="form-control ps-5 input-code" type="text" placeholder="your code">
									<span class="far fa-credit-card"></span>
								</div>
							</div>
							<div class="col-6"> <input class="form-control my-3" type="text" placeholder="MM/YY"> </div>
							<div class="col-6"> <input class="form-control my-3" type="text" placeholder="cvv"> </div>
							<p class="p-blue h8 fw-bold mb-3">MORE PAYMENT METHODS</p>
						</div>
						<div class="btn btn-primary d-block h8 btn-payment">PAY <?php echo formatVND($price_tickets + $price_products)?><span
								class="ms-3 fas fa-arrow-right"></span></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<img src="<?php echo url('public/assets/images/color-sharp.png')?>" alt="" class="background-image-left">
<img src="<?php echo url('public/assets/images/color-sharp2.png')?>" alt="" class="background-image-right">
<script>
    $('.btn-send').on('click', function (event) {
        console.log($('.email_send').val());
        if (!$('.email_send').val()) {
            toast({
                title: 'Error',
                message: 'Please enter your email address',
                type: 'error',
                duration: 2000
            })
        } else {
            $.ajax({
                url: "<?php echo url('api/send-email')?>",
                method: 'POST',
                data: {
                    email : $('.email_send').val()
                },
                success: function (data) {
                    console.log(data);
                }
            })
        }
    })

    $('.btn-payment').on('click', function (event) {
		if (!$('.input-code').val()) {
			toast({
				title: "Warning",
				message: "Please enter your code",
				type: 'warning',
				duration: 2000
			})
		} else {
			toast({
				title: "Success",
				message: "Payment successful",
				type: 'success',
				duration: 2000
			})
		}
	})
</script>
<?php require_once assets('app/Views/public/footer.php')?>