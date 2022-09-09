<div id="page-content" class="page-wrapper clearfix public-invoice-preview">
    <?php
    echo view('includes/head');

    load_css(array(
        "assets/css/invoice.css",
    ));
    ?>
    <style>
        body {
            /* background-color: #EEF1F9; */
        }
    </style>

    <div class="invoice-preview">
        <?php if ($invoice_total_summary->balance_due >= 1 && count($payment_methods) && !$client_info->disable_online_payment) { ?>

            <div class="bg-white d-block p15 clearfix mt-2">
                <div>
                    <p>Para o conforto de nossos cliente fornecemos varios metodos de pagamento </p>
                </div>
                <div class="strong float-start pt5 pr15">
                    Escolha um metodo de pagamento:
                </div>

                <?php
                foreach ($payment_methods as $payment_method) {

                    $method_type = get_array_value($payment_method, "type");

                    $pass_variables = array(
                        "payment_method" => $payment_method,
                        "balance_due" => $invoice_total_summary->balance_due,
                        "currency" => $invoice_total_summary->currency,
                        "invoice_info" => $invoice_info,
                        "invoice_id" => $invoice_id,
                        "paypal_url" => $paypal_url,
                        "contact_user_id" => $contact_id,
                        "verification_code" => $verification_code
                    );

                    if ($invoice_total_summary->balance_due >= get_array_value($payment_method, "minimum_payment_amount")) {
                        if ($method_type == "stripe") {
                            echo view("invoices/_stripe_payment_form", $pass_variables);
                        } else if ($method_type == "paypal_payments_standard") {
                            echo view("invoices/_paypal_payments_standard_form", $pass_variables);
                        } else if ($method_type == "paytm") {
                            echo view("invoices/_paytm_payment_form", $pass_variables);
                        } else if ($method_type == "gerencianet") {
                            echo view("invoices/_gerencianet_payment_form", $pass_variables);
                        }

                        app_hooks()->do_action('app_hook_invoice_payment_extension', array_merge(array("method_type" => $method_type), $pass_variables));
                    }
                }
                ?>
                <div class="float-start pt5 pr15" style="width: 100%;">
                    <p>Apos clicar no botão você sera redirecionado para o metodo de pagamento escolhido</p>
                </div>
            </div>

        <?php } ?>

        <div id="invoice-preview" class="invoice-preview-container bg-white mt15">
            <div class="row">
                <div class="col-md-12 position-relative">
                    <div class="ribbon"><?php echo $invoice_status_label; ?></div>
                </div>
            </div>

            <?php
            echo $invoice_preview;
            ?>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#payment-amount").change(function() {
            var value = $(this).val();
            $(".payment-amount-field").each(function() {
                $(this).val(value);
            });
        });
    });

    $("html, body").css({
        "overflow-y": "auto"
    });
</script>