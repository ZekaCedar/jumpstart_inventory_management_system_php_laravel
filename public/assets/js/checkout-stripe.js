$(function () {
    var $form = $(".require-validation");
    $("form.require-validation").bind("submit", function (e) {
        var $form = $(".require-validation"),
            inputSelector = [
                "input[type=email]",
                "input[type=password]",
                "input[type=text]",
                "input[type=file]",
                "textarea",
            ].join(", "),
            $inputs = $form.find(".required").find(inputSelector),
            $errorMessage = $form.find(".inp-error"),
            valid = true;
        $errorMessage.addClass("d-none");
        $(".has-error").removeClass("has-error");

        $inputs.each(function (i, el) {
            var $input = $(el);
            if ($input.val() === "") {
                $input.parent().addClass("has-error");
                $errorMessage.removeClass("d-none");
                e.preventDefault();
            }
        });

        if (!$form.data("cc-on-file")) {
            var StripeKey =
                "pk_test_51LsLglLjHdZtO1de23HgkK1ck0JNQ3uwxIXfGJkOkRRKrDxXD4rtYUDBntY5C5nnF1P8ivCO1upGew42UB7oZ7yg00C43nhDVs";

            e.preventDefault();
            Stripe.setPublishableKey(StripeKey);
            Stripe.createToken(
                {
                    number: $(".card-number").val(),
                    cvc: $(".card-cvc").val(),
                    exp_month: $(".card-expiry-month").val(),
                    exp_year: $(".card-expiry-year").val(),
                },
                stripeResponseHandler
            );
        }
    });

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $(".stripe-error").text(response.error.message);
        } else {
            var token = response["id"];
            $form.find("input[type=text]").empty();
            $form.append(
                "<input type='hidden' name='stripeToken' value='" +
                    token +
                    "'/>"
            );
            $form.get(0).submit();
        }
    }
});
