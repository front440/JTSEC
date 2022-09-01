<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use Illuminate\Http\Request;


class UpdateOrderStatusMaillable extends Mailable
{
    use Queueable, SerializesModels;

    // private $subject = 'Update Order Status';
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $this->order = Order::find($request->id);
        
        return $this->view("emails.updateOrderStatus")
            ->with([
                "order" => $this->order,
                "status" => $this->calcStatus($this->order->status)
            ]);
    }

    public function calcStatus($status)
    {

        switch ($status) {
            case 0:
                return "Estamos desarrollando tu diseño";
            case 1:
                return "Estamos imprimiendo tu diseño";
            case 2:
                return "Hemos enviado tu paquete";
            case 3:
                return "Tu paquete está en el domicilio";
        }
    }
}
