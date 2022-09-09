<?php

namespace App\Libraries;

class Gerencianet {

    private $gerencianet_config;

    public function __construct() {
        $Payment_methods_model = model("App\Models\Payment_methods_model");

        $this->gerencianet_config = $Payment_methods_model->get_oneline_payment_method("gerencianet");

        require_once(APPPATH . "ThirdParty/Gerencianet/vendor/autoload.php");
    }

    public function get_gerencianet_payment_intent_session($data = array(), $login_user = 0) {
        $invoice_id = get_array_value($data, "invoice_id");
        $currency = get_array_value($data, "currency");
        $payment_amount = get_array_value($data, "payment_amount");
        $description = get_array_value($data, "description");
        $verification_code = get_array_value($data, "verification_code");
        $contact_user_id = $login_user ? $login_user : get_array_value($data, "contact_user_id");
        $client_id = get_array_value($data, "client_id");
        $payment_method_id = get_array_value($data, "payment_method_id");
        $balance_due = get_array_value($data, "balance_due");

        if (!$invoice_id) {
            return false;
        }

        //validate public invoice information
        if (!$login_user && !validate_invoice_verification_code($verification_code, array("invoice_id" => $invoice_id, "client_id" => $client_id, "contact_id" => $contact_user_id))) {
            return false;
        }

        //check if partial payment allowed or not
        if (get_setting("allow_partial_invoice_payment_from_clients")) {
            $payment_amount = unformat_currency($payment_amount);
        } else {
            $payment_amount = $balance_due;
        }

        $redirect_to = "invoices/preview/$invoice_id";
        if ($verification_code) {
            $redirect_to = "pay_invoice/index/$verification_code";
        }

        //validate payment amount
        if ($payment_amount < $this->gerencianet_config->minimum_payment_amount * 1) {
            $error_message = app_lang('minimum_payment_validation_message') . " " . to_currency($this->gerencianet_config->minimum_payment_amount, $currency . " ");
            $session = \Config\Services::session();
            $session->setFlashdata("error_message", $error_message);
            app_redirect($redirect_to);
        }

        //we'll verify the transaction with a random string code after completing the transaction
        $payment_verification_code = make_random_string();

        $gerencianet_ipn_data = array(
            "verification_code" => $verification_code,
            "invoice_id" => $invoice_id,
            "contact_user_id" => $contact_user_id,
            "client_id" => $client_id,
            "payment_method_id" => $payment_method_id,
            "payment_verification_code" => $payment_verification_code
        );

        \Gerencianet\Gerencianet::setApiKey($this->gerencianet_config->secret_key);
        $session = \Gerencianet\Checkout\Session::create(array(
                    'payment_method_types' => array('card'),
                    'line_items' => array(
                        array(
                            'name' => 'INVOICE #' . $invoice_id,
                            'description' => $description,
                            'amount' => $payment_amount * 100, //gerencianet will devide it with 100
                            'currency' => $currency,
                            'quantity' => 1,
                            'images' => array(
                                get_file_uri("assets/images/gerencianet-payment-logo.png")
                            )
                        )
                    ),
                    'payment_intent_data' => array(
                        "description" => get_invoice_id($invoice_id) . ", " . app_lang('amount') . ": " . to_currency($payment_amount, $currency . " "),
                        "metadata" => $gerencianet_ipn_data,
                        'setup_future_usage' => 'off_session', //save this paymentIntent's payment method for future use
                    ),
                    'success_url' => get_uri("gerencianet_redirect/index/$payment_verification_code"),
                    'cancel_url' => get_uri($redirect_to),
        ));

        if ($session->id) {
            //so, the session creation is success
            //save ipn data to db
            $gerencianet_ipn_data["payment_intent"] = $session->payment_intent;
            $Gerencianet_ipn_model = model("App\Models\Gerencianet_ipn_model");
            $Gerencianet_ipn_model->ci_save($gerencianet_ipn_data);

            return $session;
        }
    }

    public function get_publishable_key() {
        return $this->gerencianet_config->publishable_key;
    }

    public function is_valid_ipn($payment_intent) {
        \Gerencianet\Gerencianet::setApiKey($this->gerencianet_config->secret_key);
        $payment = \Gerencianet\PaymentIntent::retrieve($payment_intent);
        if ($payment && $payment->status == "succeeded") {
            //so the payment is successful
            return $payment;
        }
    }

}
