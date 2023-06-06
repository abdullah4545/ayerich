<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromQuery, WithHeadings,WithMapping
{




    use Exportable;
    private $curierid;

    public function __construct($curierid)
    {
        $this->curierid = $curierid;
    }


    public function map($order): array
    {
        if($this->curierid ==3){
            return [
                "C-1-11620",
                $order->invoiceID,
                "standard",
                "regular",
                implode(', ', $order->orderproducts->pluck('productName')->toArray()),
                $order->subTotal,
                $order->customers->customerName,
                $order->customers->customerAddress,
                $order->cities->cityName,
                $order->zones->zoneName,
                $order->customers->customerPhone,

            ];
        }else{
            return [
                $order->invoiceID,
                $order->customers->customerName,
                $order->customers->customerPhone,
                $order->customers->customerAddress,
                $order->cities->cityName,
                $order->zones->zoneName,
                $order->zones->zoneId,
                $order->cities->division,
                $order->subTotal,
                $order->subTotal,
                "500",
                implode(', ', $order->orderproducts->pluck('productName')->toArray()),
                "",
                "",

            ];
        }
    }

    public function query()
    {
        $id=$this->curierid;
        return Order::with(['orderproducts', 'customers', 'cities', 'zones'])->where('courier_id', $id)->where('status', 'Checked Invoiced');

    }


    public function headings(): array
    {
        if($this->curierid == 3){
            return ["Merchant Code", "Merchant order reference", "Package option", "Delivery option", "Product breif", "Product Price", "Customer Name", "Customer Adress", "Customer districe name", "Customer Thana name", "Customer phone number"];
        }else{
            return ["Invoice", "Customer Name", "Contact No.", "Customer Address", "District", "Area", "Area ID", "Division", "Price", "Product Selling Price",'Weight(g)', "Instruction","Seller Name","Seller Phone"];
        }
    }



}
