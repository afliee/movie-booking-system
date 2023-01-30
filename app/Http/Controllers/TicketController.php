<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Libraries\database_drivers\mysql\DB;
use App\Mails\HelloUser;
use Libraries\Request\Request;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        login_required();
        try {
            $db = new DB();
            $movieId = $request->get('movie_id');
            $timer = $request->get('timer');
            $categoryId = $request->get('category_id');
            $premierDate = $request->get('premier_date');
            $sql = "SELECT 
                tickets.*,seats.*,rooms.*, tickets.id 
            FROM 
                tickets
                JOIN movies ON tickets.movie_id = movies.id
                JOIN seats ON tickets.seat_id = seats.id
                JOIN rooms ON rooms.id = seats.room_id
            WHERE 
                movies.id = $movieId
                AND DATE_FORMAT(tickets.premiered_at,'%H:%i') LIKE '$timer'
                AND DATE_FORMAT(tickets.premiered_at, '%d/%m/%Y') LIKE '$premierDate' 
            ORDER BY 
                rooms.id,
                LEFT(seats.location, POSITION(':' IN seats.location) -1), 
                LEFT(REVERSE(seats.location),POSITION(':' IN REVERSE(seats.location)) -1 )";
            $tickets = $db->raw($sql);
            $sql = "
                SELECT ticket_id FROM invoice_ticket
            ";

            $ticketsPurchased = flatten($db->raw($sql));

            $sql = "
                SELECT
                    *
                FROM
                    movies
                    JOIN movie_category ON movie_category.movie_id = movies.id
                WHERE
                     movie_category.movie_id = $movieId AND
                     movie_category.category_id = $categoryId
            ";
            $movie = $db->raw($sql);
            $movie = array_pop($movie);
            $room = $this->cleanData($tickets, $ticketsPurchased);
            return view('ticket.index', [
                'movie' => $movie,
                'rooms' => $room,
                'id' => "<input type='hidden' name='movie_id' value='$movieId'/>"
            ]);
        } catch (\Exception $e) {
            abort(404);
        }
    }


    public function payment(Request $request) {
        $db = new DB();
        $tickets = $request->get('ticket_id');
        if (!empty($request->get('seat_id'))) {
            $seat_id = $request->get('seat_id');
        }
        if (!empty($request->get('product_id'))) {
            $products = $request->get('product_id');
        }
        $priceTickets = 0;
        $priceProducts = 0;
        $item = [];
        foreach($tickets as $index => $ticket_id) {
            $sql = "
                SELECT 
                    price_per_ticket, location
                FROM 
                    tickets
                    JOIN seats ON tickets.seat_id = seats.id
                WHERE
                    tickets.id = $ticket_id
            ";
            $data = $db->raw($sql)[0];
            $price = $data['price_per_ticket'];
            $item[] = "Ticket " . $data['location']; 
            $price = intval($price, 10);
            $priceTickets += $price;
        }
        if (!empty($products)) {
            foreach($products as $index => $product_id) {
                $sql = "
                    SELECT
                        price,name
                    FROM
                        products
                    WHERE id = $product_id;
                ";
                $data = $db->raw($sql)[0];
                
                // $price = flatten($db->raw($sql))[0];
                $price = intval($price, 10);
                $item[] = $data['name'];
                $priceProducts += $price;
            }
        }
        return view('ticket.payment', [
            "price_tickets" => ($priceTickets),
            "price_products" => ($priceProducts),
            'items' => $item
        ]);
    }


    public function sentEmail(Request $request) {
        /**
         * @throws \PHPMailer\PHPMailer\Exception
         */

        $email = $request->get('email');
        $code = $this->generateRandomString(5);
        session()->put('code', $code);
        $data = [
            'subject' => 'Verification Products',
            'to' => $email,
            'view_name' => 'mail',
            'view_data' => [
                'title' => 'Verify',
                'code' => $code
            ]
        ];
        $mail = new HelloUser($data);
        $mail->send();
        return response()->json([
            'status'=> true,
            'code' => md5($code)
        ]);
    }
    private function cleanData($tickets, $ticketsPurchased): array
    {
        $result = [];
        foreach ($tickets as $ticket) {
            $room_name = $ticket['name'];
            if (in_array($ticket['id'], $ticketsPurchased)) {
                $ticket['is_bought'] = 1;
            } else {
                $ticket['is_bought'] = 0;
            }
            if (empty($result[$room_name])) {

                $result[$room_name] = [$ticket];
            } else {
                array_push($result[$room_name], $ticket);
            }
        }
        return $result;
    }

     public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}