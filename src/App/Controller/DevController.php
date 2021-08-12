<?php

namespace App\Controller;


class DevController
{
    public function francis()
    {
        $model = new \Drupal\scl\Model\FrancisTest();

        return ['#theme' => 'francis_test', '#someTitle' => $model->getTitle(), '#someElements' => $model->getElements(), '#someValue' => $model->getValue()];
    }

    public function francisJson()
    {
        set_time_limit(0);

        $client = new Client(new Endpoint('KsbWgncVXABDzHv2vXK95kEp6htDeQxsWG7plkSaH280pHSCbtQyHrSz1mqHjD9b'));

        $orders_collection =  $client->request('GET', 'documents?' . http_build_query([
            'limit' => '1000',
            'type' => 'INVOICE'
                ])
        );


        // orders
        // $order_pages = $orders_collection['pages'];
        $orders = $orders_collection['items'];
        $order_pages = 1;

        $filteredOrders = [];

            for ($i = 1; $i <= $order_pages; $i++){

                $orders_collection = $client->request('GET', 'documents?' . http_build_query([
                    'limit' => '10',
                    'pages' => $i,
                    'type' => 'INVOICE'
                        ])
                );

                $orders = $orders_collection['items'];

                $filteredOrders = [];
                for ($j = 0; $j < count($orders); $j++) {

                    array_push($filteredOrders, [
                        'easyBillId' => $orders[$j]['id'],
                        'created_at' => $orders[$j]['created_at'],
                        // 'updated_at' => $orders[$j]['updated_at'],
                        'status' => $orders[$j]['status'],
                        'currency'=> $orders[$j]['currency'],
                        // 'shipping_value' => $orders[$j]['amount'],
                        'total_product_value' => $orders[$j]['amount']
                        ]);
                }

                // dd($filteredOrders);

                foreach($filteredOrders as $order){
                    // Create Invoice Directory
                    $source = 'easybill';
                    $year = date('Y',strtotime($order['created_at']));
                    $month = date('m',strtotime($order['created_at']));
                    $dir = './invoices/'.$source.'/'.$year.'/'.$month.'/';

                    $docID =$order['easyBillId'];
                    $fileurl = $client->request('GET', "documents/{$docID}/pdf", null, true);

                    if(!is_dir($dir)) mkdir($dir, 0777, true);
                    $file = tempnam(sys_get_temp_dir(), 'pdf_');

                    file_put_contents($file, $fileurl);
                    rename($file, $dir.'wedoinvoice_' . $docID . '.pdf');


                    echo 'file moved to '. $dir;


                    $order = \Drupal\scl\Entity\OrderEntity::create();
                    $order->SetCreatedAt(date('Y-m-d H:i:s'));
                    // $order->SetCustomerId($newCustomer->id());
                    $order->save();

                    dd($order);
                }

                foreach($filteredCustomers as $customer){
                    // Address Creation
                    $newAddress = \Drupal\scl\Entity\Address::create();
                    $newAddress->SetFirstName($customer['delivery_first_name']);
                    $newAddress->SetLastName($customer['delivery_last_name']);
                    // need to get an enumeration of the taxonomy values, but for time's sake let's take the direct number
                    $newAddress->SetSalutationTid($customer['delivery_salutation']);
                    $newAddress->save();

                    //New Customer
                    $newCustomer = \Drupal\scl\Entity\Customer::create();
                    $newCustomer->SetFirstName($customer['first_name']);
                    $newCustomer->SetLastName($customer['last_name']);

                    $newCustomer->save();

                }

                echo 'Done Processing Page '. ' '. $i .' of ' . $customer_pages;
                // drupal_flush_all_caches();

            }



            echo 'Done';
            exit;

    }

    /**
     * Example function to demonstrate how to create entities.
     *
     * @return void
     */

}
?>
