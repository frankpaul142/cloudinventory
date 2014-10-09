<?php 
 
class Globals
{
    public static function triggerAlerts($alertsId, $additional) {
        $message = '';

        switch ($alertsId) {
            case 1:
                if (isset($additional['productId'])) {
                    $product = Product::find($additional['productId']);
                    if ( ! is_null($product)) {
                        if ($product->stock > 0 AND $product->stock < $product->minimum_stock) {
                            $message = 'El producto ' . $product->name . ' ha bajado del stock mínimo.';
                        }
                    }
                }
                break;
            case 2:
                if (isset($additional['productId'])) {
                    $product = Product::find($additional['productId']);
                    if ( ! is_null($product)) {
                        if ($product->stock == 0) {
                            $message = 'El producto ' . $product->name . ' no tiene stock.';
                        }
                    }
                }
                break;
            case 3:
                if (isset($additional['userId'])) {
                    $user = User::find($additional['userId']);
                    if ( ! is_null($user)) {
                        $message = 'El usuario ' . $user->display_name . ' necesita aprobación.';
                    }
                }
                break;
            case 4:
                if (isset($additional['productId'])) {
                    $product = User::find($additional['productId']);
                    if ( ! is_null($product)) {
                        $message = 'El producto ' . $product->name . ' ha sido creado.';
                    }
                }
                break;
            case 5:
                if (isset($additional['supplierOrderId'])) {
                    $supplierOrder = User::find($additional['supplierOrderId']);
                    if ( ! is_null($supplierOrder)) {
                        $message = 'Se ha creado un nuevo pedido al proveedor ' . $supplierOrder->supplier->name . '.';
                    }
                }
                break;
            case 6:
                if (isset($additional['supplierOrderId'])) {
                    $supplierOrder = User::find($additional['supplierOrderId']);
                    if ( ! is_null($supplierOrder)) {
                        $message = 'Se ha creado un nuevo pedido al proveedor ' . $supplierOrder->supplier->name . '.';
                    }
                }
                break;
            default:
                break;
        }

        if ($message != '') {
            static::__sendAlert($alertsId, $message);
        }
    }

    private static function __sendAlert($alertsId, $message) {
        $alert = Alert::find($alertsId);
        if ( ! is_null($alert)) {
            $alerts_to = $alert->users;
            foreach ($alerts_to as $current) {
                if ($current->pivot->to_facebook) {
                    static::__sendFacebook($current->facebook_id, $message);
                }
                if ($current->pivot->to_sms) {
                    static::__sendSms($current->mobile, $message);
                }
                if ($current->pivot->to_email) {
                    static::__sendEmail(array($current->email, $current->display_name), $message);
                }
            }
        }
    }

    private static function __sendFacebook($to, $message) {
    }

    private static function __sendSms($to, $message) {
        $user = "xavier.rivas";
        $password = "LQEKHPSQNVgURD";
        $api_id = "3499731";
        $baseurl ="http://api.clickatell.com";
     
        $text = urlencode($message);
     
        // auth call
        $url = "$baseurl/http/auth?user=$user&password=$password&api_id=$api_id";
    
        //http://api.clickatell.com/http/auth?user=xavier.rivas&password=LQEKHPSQNVgURD&api_id=3499731

        // do auth call
        $ret = file($url);
     
        // explode our response. return string is on first line of the data returned
        $sess = explode(":",$ret[0]);
        if ($sess[0] == "OK") {
            $sess_id = trim($sess[1]); // remove any whitespace
            $url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";

            // do sendmsg call
            $ret = file($url);
        }
    }

    private static function __sendEmail($to, $text) {
        $mailView = 'emails.alert';
        $subject = 'Alerta de CloudInventory';

        Mail::send(
            $mailView,
            array(
                'text' => $text,
            ),
            function($message) use ($to, $subject){
                $message->to($to[0], $to[1])->subject($subject);
            }
        );
    }
}